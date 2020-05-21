<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('form', 'url', 'string'));
    $this->load->library(array('session','form_validation'));

    // $uri = $this->uri->segment(2);
    // //echo $uri; die;
    // if (count($_SESSION) == 1 && !in_array($uri,array('login','logout','checklogin'))) {
    //   redirect('admin/login');
    // }
  }

  public function login() {

    $this->load->view('customer/login');
  }



  public function checkLogin() {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `customers` where username = '$login' and password='$password' and is_active='1'";

    $result = $this->db->query($sql)->row();

    //print_r(var_dump($result)); die;

    if (null !== $result) {
      $customerId = $result->id;
      $_SESSION['customerId'] = $customerId;
      $_SESSION['customerName'] = $result->customer_name;
      //redirect('customer/dashboard');
      redirect('customer/mcq-list');
    } else {
       redirect('customer/login');
    }
  }

  public function viewDashboard() {
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/mcq-list');
    $this->load->view('customer/footer');
  }

  public function viewMcqList() {
    $customerId = $_SESSION['customerId'];
    $sql = "SELECT mcq_test.id,mcq_test.is_proctored, mcq_test.title, mcq_code.code, SUM(mcq_test_pattern.total_question) as totalQuestion
            FROM mcq_test
            LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
            LEFT JOIN mcq_test_pattern on mcq_test.id=mcq_test_pattern.mcq_test_id";
    $sql .= " WHERE mcq_test.customer_id = $customerId";

    $sql .= " GROUP by mcq_test.id, mcq_test.title, mcq_code.code";

    //echo $sql; die;
    $query = $this->db->query($sql);

    $result = array();

    $i = 0;
     $mcq = array();     
    if($query->num_rows() > 0)  {

        foreach ($query->result() as $row) {

            $mcq[$i]['id'] = $row->id;
            $mcq[$i]['proctored'] = $row->is_proctored;
            $sectionDetails = $this->getMcqSection($row->id);
            $mcq[$i]['sectionCount'] = isset($sectionDetails['section']) ? count($sectionDetails['section']) : 0;
            $mcq[$i]['title'] = $row->title;
            $mcq[$i]['code'] = $row->code;
            $mcq[$i]['question'] = $row->totalQuestion;
            $i++;
        }
    }

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/mcq-list',array("mcq"=>$mcq));
    $this->load->view('customer/footer');
  }
  public function viewMcqData() {
     $mcqId = $this->uri->segment(3);   


        $sql = "SELECT mcq_test.id as id,title, mcq_test.is_proctored as proctoredTest,mcq_code.code FROM `mcq_test` 
         LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
         WHERE mcq_test.id=".$mcqId;

        $mcq = $this->db->query($sql)->row();

         $mcqData['mcq-details'] = $mcq;

        $sql = "SELECT  assess_usr_pwd.*, student_register.id as studentId,student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `assess_usr_pwd` 
               LEFT JOIN student_register ON assess_usr_pwd.id=student_register.assess_usr_pwd_id
        where mcq_test_id= $mcqId
        order by assess_usr_pwd.id asc";

        $query = $this->db->query($sql);
        $mcqData['mcq-users'] = $query->result();
//echo '<pre>'; print_r(var_dump($mcqData)); die;
        $failCount = $passCount = 0;
        foreach ($mcqData['mcq-users'] as $key => $value) {
          
          if (null === $value->studentId) {
            continue;
          }
          $result = $this->viewResult($mcqId,$value->studentId);

          $totalAptitudeMarks = 0;
          $totalAptitudeQualifyingMarks = 0;
          $totalUserAptitudeMarks = 0;
          for ($i =0; $i < count($result['Aptitude']); $i++) {
          
            
          $totalMarks = $result['Aptitude'][$i]['total_question'];                   
          $minMarks =  $result['Aptitude'][$i]['total_question']/2;
          $userMarks = $result['Aptitude'][$i]['user_ans'];

          if ($totalMarks < 10 ) {
              $totalMarks *= 10;
              $minMarks *= 10;    
              $userMarks *= 10;
          }
          $totalAptitudeMarks += $totalMarks;
          $totalAptitudeQualifyingMarks += $minMarks;
          $totalUserAptitudeMarks += $userMarks;
        }
        //echo $totalAptitudeQualifyingMarks,",",$totalUserAptitudeMarks; die;
        if ($totalAptitudeQualifyingMarks > $totalUserAptitudeMarks) {
          $mcqData['mcq-users'][$key]->status = "FAIL";
          ++$failCount;
        } else {
          $mcqData['mcq-users'][$key]->status = "PASS";
          ++$passCount;
        }
        }
       
       $sql = "SELECT * from `assess_login` where role= 7"; //proctor role

        $query = $this->db->query($sql);

        //   echo "<pre>";
        //   print_r($query->result());

        // print_r($mcq); die;

        $mcqData['mcq-proctor'] = $query->result();
       
        //print_r($mcqData); die;

        $sql = "SELECT count(DISTINCT(`student_id`)) as total FROM `mcq_test_question` where mcq_test_id = $mcqId";


        $totalStudent = $this->db->query($sql)->row();

        $mcqData['mcq-details']->totalStudent = $totalStudent->total;

        $mcqData['mcq-details']->failCount = $failCount;
        $mcqData['mcq-details']->passCount = $passCount;

        $sql = "SELECT assess_usr_pwd_id as assessIds FROM `proctored_mcq` where mcq_test_id = $mcqId";


        $assessIds = $this->db->query($sql)->result();
        $proctoredIds = array();

        foreach ($assessIds as $key => $value) {
          $proctoredIds[] = $value->assessIds;

        }

        $mcqData['proctoredIds'] = $proctoredIds;
// echo "<pre>";
//         print_r($mcqData); die;

        $this->load->view('customer/header');
        $this->load->view('customer/sidenav');
        $this->load->view('customer/view-mcq-data', array('mcq' => $mcqData));
        //$this->load->view('admin/view-mcq-data');
        $this->load->view('customer/footer');
  }

  public function viewInterview() {
    $customerId = $_SESSION['customerId']; 

    $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();

    $sql = "SELECT DISTINCT(interview_code),count(DISTINCT(id)) as total_students FROM `interview_users` where interview_customer_id=$customerId and interview_code is not null GROUP BY interview_code";

    $result = $this->db->query($sql)->result_object();

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/view-interview', array('customer'=> $customerName->customer_name,'interview' => $result));
    //$this->load->view('admin/view-mcq-data');
    $this->load->view('customer/footer');
   // $this->load->view('admin/view-mcq.php', array('mcq'=>$mcq));
  }

 public function interviewResult() {
    /*$sql = "SELECT  interview_users.*, student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `interview_users` 
    LEFT JOIN student_register ON interview_users.id=student_register.interview_user_id
    order by interview_users.id asc";
*/
      $customerId = $_SESSION['customerId'];
      $interviewCode = $this->uri->segment(3);

    $sql = "SELECT  interview_users.*, student_register.id as studentId, student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `interview_users` 
    LEFT JOIN student_register ON interview_users.id=student_register.interview_users_id";

    if ($customerId > 0) {
       $sql.=" where interview_users.interview_customer_id = $customerId and interview_users.interview_code = '".$interviewCode."'";
    }
  
    $sql.=" order by interview_users.id asc";

    $interview['users'] = $this->db->query($sql)->result();

    $roundResult = array();

    foreach ($interview['users'] as $key => $value) {
          $intervieweeId = $value->id;
          for ($i = 1; $i<4;$i++) {
              $sql = "SELECT * FROM interview_details where round = $i and interview_users_id = $intervieweeId";

              $result = $this->db->query($sql)->row();
              $round = "round".$i;
              if (isset($result->interview_status)) {
                
                $roundResult[$intervieweeId][$round] = $result->interview_status;
              } else {
                if ($i == "1") {
                  $roundResult[$intervieweeId][$round] = 1;
                } else {
                  $roundResult[$intervieweeId][$round] = 0;  
                }
                
              }
          }
              
    }
    // echo "<pre>";

    // print_r($roundResult); die;

    $interview['round-result'] = $roundResult;

    $sql = "SELECT * FROM mcq_test ";

    $query = $this->db->query($sql);

    $result = $query->result();

    $interview['mcqs-list'] = $query->result();

    $sql = "SELECT * from `assess_login` where role= 6"; //interviewer role

    $query = $this->db->query($sql);

    // $sql = "SELECT interview_status from `interview_details` where role= 6"; //round status

    // $query = $this->db->query($sql);

    //   echo "<pre>";
    //   print_r($query->result());

    // print_r($mcq); die;

    $interview['interviewer-list'] = $query->result();

    //print_r($interview); die;
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/interview',array('interviewData'=> $interview));
    $this->load->view('customer/footer');  
 }
  //duplicate
  public function viewResult($mcqId, $sId) {
//echo $mcqId; echo $sId; die;
            // $mcqId = $this->session->mcqId;
            // $studentId = $this->session->id;

            $mcqId = $mcqId;
            $studentId = $sId;

             $sql = "SELECT mcq_test_pattern.section_id , section.section_name FROM `mcq_test_pattern` inner join section on section.id = mcq_test_pattern.section_id where mcq_test_id =".$mcqId;


            $query = $this->db->query($sql);
            $sectionData = array();
            $sectionDetail = array();
            $countSection = 0;

            $sqlTotal = "";
            $sqlTime = "";
            $i = 0;

            $sectionId  = array();
            foreach ($query->result() as $row) {
                if ($i > 0) {
                    $sqlTotal .= " UNION AlL ";
                    $sqlTime .= " UNION ALL ";
                }
                $sqlTotal .= "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = ". $row->section_id;

                $sqlTime .= "SELECT completion_time FROM `mcq_time` where mcq_test_id =".$mcqId." and section_id =".$row->section_id;

                $sectionId['id'][$i] = $row->section_id;
                $sectionId['name'][$i] = $row->section_name;
                $i++;

                
            }
//             echo "<pre>";
// print_r($sectionId); die;
            $sql = $sqlTotal;

            $query = $this->db->query($sql);
                $i = 0;
            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                    $resultQ['qno'][$i] = $row->total;
                    $resultQ['name'][$i] = $sectionId['name'][$i];
                    $i++;
                }
            }

            $sql = $sqlTime;

            //$attempt = $this->session->attempt;
            $attempt = 1;
            $query = $this->db->query($sql);
           
            $sqlAns = "";
            $i = 0;

            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                    $result2[] = $row->completion_time;

                    if ($i > 0) {
                        $sqlAns .= " UNION ALL ";

                    }

                    $sqlAns .= "SELECT sum(correct_ans) as user_ans FROM `student_answers` WHERE mcq_test_id = ".$mcqId." and student_id =".$studentId." and section_id=".$sectionId['id'][$i]." and test_attempt=".$attempt;

                    $i++;
                }
            }

            $sql = $sqlAns;           

            $query = $this->db->query($sql);
           
            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                    $result1[] = $row->user_ans;
                }
            }

            $codeTest = 0;

            // if (isset($_SESSION['codeTestId'])) {
            //     $codeResult = $this->codeTestResult();

            //     $codeTest = $codeResult[3]; 
            // }
            //print_r($codeResult[3][1]); die;

            $result = array ($resultQ, $result2, $result1);

            $a = array();
            $i = 0;
            foreach ($result2 as $key => $value) {
               $a[$i]['total_question'] = $resultQ['qno'][$i];
               $a[$i]['section'] = $resultQ['name'][$i];
               
               // if ($value > 60 ) {
               //  $min = intval($value / 60);
               //  $sec = $value % 60;

               //  $totaltime = $min." min ";

               //  if ($sec > 0) {
               //      $totaltime .= $sec." sec";
               //  }
               // } else {

               //  $totaltime = $value." sec";
               // }

               // $a[$i]['total_time'] = $totaltime;
               
               // if ($result1[$i] > 60 ) {
               //  $min = intval($result1[$i] / 60);
               //  $sec = $result1[$i] % 60;
               //  $time = $min." min ".$sec. " sec";
               // } else {
               //  if ($result1[$i] > 0) {
               //      $time = $result1[$i]." sec";    
               //  } else {
               //      $time = "NA";
               //  }
                
               // }
               //print_r($result1); die;
               $a[$i]['user_ans'] = $result1[$i];
               $i++;
            }

            //$_SESSION['attempt'] = 2;
            $result = array("Aptitude"=>$a, "Programming" => $codeTest);
            return $result; die;
            // $this->load->view('user-header');
            // $this->load->view('results', array("results"=>$a, "codeTestResult" => $codeTest));
            // $this->load->view('codefooter');

        }

  //duplicate
  public function getMcqSection($mcqId) {

            $sql = "SELECT mcq_test_pattern.section_id, section.section_name FROM `mcq_test_pattern` inner join section on mcq_test_pattern.section_id = section.id
                    where mcq_test_pattern.mcq_test_id =".$mcqId;

            

            $query = $this->db->query($sql);

                $i = 0;

                $section = array();
                foreach ($query->result() as $row) {
                        
                        $section['section'][$i]['id'] = $row->section_id;
                        $section['section'][$i]['name'] = $row->section_name;
                        $i++;
                }


            return $section;
            
        }
          public function logout() {

      $this->session->sess_destroy();
      redirect('customer/login');
  }

     

  public function CustomerupdateAccessToken() {

    $customerId = $_SESSION['customerId'];
    $sql = "SELECT id,refresh_token from gotomeeting_token_details";

    $result = $this->db->query($sql)->result();

    foreach ($result as $key => $value) {
      $token = $this->getRefreshedToken($value->refresh_token);
      //print_r($token); die;
      $data = array(
        'access_token' => $token->access_token,
        'refresh_token' => $token->refresh_token
      );

      $this->db->where('id', $value->id);
      $this->db->update('gotomeeting_token_details',$data);
    }
    
    echo "success";
  }

  public function addSection() {
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/add-section');
    $this->load->view('customer/footer');
  }

  public function uploadQuestionView() {
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/upload-question');
    $this->load->view('customer/footer');
  }
  public function saveSection() {
    //print_r($_POST); die;
    $sectionName = $_POST['sectionName'];
    $subSectionName = $_POST['subSectionName'];
    $sectionData = array(
      "customer_id" => $_SESSION['customerId'],
      "section_name" => $sectionName 
    );
    $this->db->insert('section', $sectionData);

    // $sectionId = $this->db->insert_id();

    // $subSectionData = array(
    //   "section_id" => $sectionId,
    //   "sub_section_name" => $subSectionName
    // );
    // $this->db->insert('sub_section', $subSectionData);
    redirect('/customer/add-section');
  }

  public function saveUploadedQuestion() {
    print_r($_POST); die;
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = '*';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('questionFile'))
    {
      $error = array('error' => $this->upload->display_errors());
      print_r($error); die;
    }
    else {
       $filename = 'uploads/'.$_FILES['questionFile']['name'];
    }

    // Open the file for reading
    if (($h = fopen("{$filename}", "r")) !== FALSE) {
      $i = 0;
      while (($data = fgetcsv($h, 100000, ",")) !== FALSE) {
        if ($i == 0) {
          $i++;
          continue;
        }
        print_r($data); die;
        $data[1] = str_replace("'",'"',$data[1]);

        $qdata = array (
          "section_id" => $_POST['sectionUpload'],
          "question_type" => $data[0],
          "question" => $data[1],
          "level_id" => $data[9]
        );
        
        $this->db->insert('question_bank', $qdata);
        $questionId = $this->db->insert_id();
        $correct  = 0;

        $a1 = array(
          'question_id' => $questionId,
          'answer' => $data[2],
          'is_correct' => $correct,
        );

        $a2 = array(
          'question_id' => $questionId,
          'answer' => $data[3],
          'is_correct' => $correct,
        );

        $a3 = array(
          'question_id' => $questionId,
          'answer' => $data[4],
          'is_correct' => $correct,
        );

        $a4 = array(
          'question_id' => $questionId,
          'answer' => $data[5],
          'is_correct' => $correct,
        );

        for($i=1;$i<5;$i++) {
          $varName = "a".$i;
          if ($data[8] == $i) {
            ${$varName}['is_correct'] = 1; 
          }
        }

        $data = array(
          $a1, $a2, $a3, $a4
        );
        $this->db->insert_batch('answers', $data);
      }

      $this->session->set_flashdata('success', 'Questions Uploaded successfully');
      redirect('/customer/question-upload', 'refresh');
      //echo "success"; die;
    }
  }

  public function saveInterviewer() {
    $customerId = $_SESSION['customerId'];

    $interviewerData = array(
      "role" => 6,
      "username" => $_POST['username'],
      "password" => $_POST['password'],
      "first_name" => $_POST['first-name'],
      "last_name" => $_POST['last-name'],
      "email" => $_POST['user-email'],
      "contact_no" => $_POST['user-cno'],
      "created_by" => $customerId
    );

    $this->db->insert('assess_login', $interviewerData);
    $assessLoginId = $this->db->insert_id();

    $customerInterviewer = array(
      "customer_id" => $customerId,
      "assess_login_id" => $assessLoginId
    );
    $this->db->insert('customer_interviewers', $customerInterviewer);
  } 

  public function addInterviewer() {
    $customerId = $_SESSION['customerId'];
   
    $sql = "SELECT * FROM roles ";

    $query = $this->db->query($sql);

    $result = $query->result();

    $sql = "SELECT * FROM assess_login INNER JOIN roles on roles.id = 6 and created_by = $customerId";

    $query = $this->db->query($sql);

    $userResult = $query->result();

    //print_r($userResult); die;

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/create-interviewers', array("user"=>$userResult,"roles"=>$result));
    $this->load->view('customer/footer');
  }

}
