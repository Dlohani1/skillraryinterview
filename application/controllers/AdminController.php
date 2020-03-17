<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('form', 'url', 'string'));
    $this->load->library(array('session','form_validation'));
  }


  public function generateUsernamePwd($size) {

    //$params = $this->input->post();

    return strtoupper(random_string('alnum',$size));

  }

  public function createTest()
  {
    $this->load->view('admin/create-mcq.php');
  }


  public function showStudents() {
    $mcqId = $this->uri->segment(3);   
    $sql = "SELECT DISTINCT(student_id) FROM `student_answers` where mcq_test_id =".$mcqId;

    $query = $this->db->query($sql);

    $result = array();

    $i = 0;



    $studentData = array();
          
    if($query->num_rows() > 0)  {

      foreach ($query->result() as $row) {
        $sql = "SELECT * FROM `student_register` WHERE id=".$row->student_id;

        $student = $this->db->query($sql)->row();

        $studentData[$i] = $student;
        $i++;
      }
    }
    //echo "<pre>"; 
    //print_r($studentData);

    $this->load->view('admin/view-students', array('studentData' => $studentData));

  }


 public function viewResult() {
  $sql = "SELECT DISTINCT(mcq_test_id),count(DISTINCT(student_id)) as total_students FROM `student_answers` GROUP BY mcq_test_id";

    $query = $this->db->query($sql);

    $result = array();

    $i = 0;

    $mcqData = array();
          
    if($query->num_rows() > 0)  {

        foreach ($query->result() as $row) {



        $sql = "SELECT title FROM `mcq_test` WHERE id=".$row->mcq_test_id;

        $mcq = $this->db->query($sql)->row();
          
          $mcqData[$i]['title'] = $mcq->title;
          $mcqData[$i]['id'] = $row->mcq_test_id;
          $mcqData[$i]['students'] = $row->total_students;
          $i++;
        }
    }

    $this->load->view('admin/view-result.php', array('mcq' => $mcqData));
 }
  

  public function viewQuestion() {

    $sql = "SELECT question_bank.id, question_bank.question, section.section_name, question_levels.level,sub_section.sub_section_name FROM `question_bank`
      INNER JOIN section on section.id = question_bank.section_id
      INNER JOIN question_levels on question_levels.id = question_bank.level_id
      INNER JOIN sub_section on sub_section.id = question_bank.sub_section_id";

    $query = $this->db->query($sql);


    //print_r($query->result_object()); die;


    $this->load->view('admin/view-questions', array("questionData" => $query->result_object()));
  }

  public function viewTest() {


    $sql = "SELECT mcq_test.id, mcq_test.title, mcq_code.code, SUM(mcq_test_pattern.total_question) as totalQuestion
            FROM mcq_test
            INNER JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
            INNER JOIN mcq_test_pattern on mcq_test.id=mcq_test_pattern.mcq_test_id
            GROUP by mcq_test.id, mcq_test.title, mcq_code.code";

    $query = $this->db->query($sql);

    $result = array();

    $i = 0;
          
    if($query->num_rows() > 0)  {

        foreach ($query->result() as $row) {

            $mcq[$i]['id'] = $row->id;
            $mcq[$i]['title'] = $row->title;
            $mcq[$i]['code'] = $row->code;
            $mcq[$i]['question'] = $row->totalQuestion;
            $i++;
        }
    }


    $this->load->view('admin/view-mcq.php', array('mcq'=>$mcq));
  }


  private function getCode() {

    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
    .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    .'0123456789!@#$%^&*()'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
  
    return $rand;
  }


  public function codeTest() {


    $url = "https://code.skillrary.com/api/get-assessment_id";

    $fields = array ('group_code' => $_POST['code']);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS,"user_id=1");
    // In real life you should use something like:
    curl_setopt($ch, CURLOPT_POSTFIELDS, 
    http_build_query($fields));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);

    
    $result = json_decode($server_output);
    curl_close ($ch);
    print_r($result->result);

    $data  = array ('mcq_test_id' => $_POST['mcqId'], 'code_id' => $result->result);

    $this->db->insert('mcq_code_test', $data);
    die;

  }

   public function addTest() {

              //echo var_dump(); die;

                $title = $_POST['test-title'];
                $type = $_POST['test-type'];

                $data = array(
                        'title' => $title,
                        'type' => $type
                );

                $this->db->insert('mcq_test', $data);


                $testId = $this->db->insert_id();

                $code = $this->getCode();

                $data = array(
                        'mcq_test_id' => $testId,
                        'code' => $code
                );

                $this->db->insert('mcq_code', $data);

                if (strlen(trim($_POST['drive-date'])) > 0) {
                  $data = array(
                    'mcq_test_id' => $testId,
                    'drive_date' =>trim($_POST['drive-date']),
                    'drive_time' =>trim($_POST['drive-time']),
                    'drive_place' =>trim($_POST['drive-place'])

                  );

                  $this->db->insert('drive-details', $data);                  
                }


                echo $testId;
        }

                public function addTestTime() {
                $mcqId = $_POST['mcqId'];
                // $time1= $_POST['time1'];
                // $time2= $_POST['time2'];
                // $time3= $_POST['time3'];

                // $params = json_decode($data, true);
                // $title = $params['test-title'];
                // $type = $params['test-type'];

                $totalSection = $_POST['totalSection'];
                $sectionIds = explode(",",$_POST['sectionIds']);
                $totalQuestion = explode(",",$_POST['totalQuestion']);
                $totalTime = explode(",",$_POST['sectionTime']);

                $requiredQuestion = explode(",", $_POST['requiredQnos']);

                $data = array();

                $patternData = array();

                for($i=0; $i < $totalSection; $i++) {
                    $t = array (
                        'mcq_test_id' => $mcqId,
                        'section_id' => $sectionIds[$i],
                        'completion_time' => $totalTime[$i],
                        'total_question' => $totalQuestion[$i]
                    );

                    $data[] = $t;

                    $p = $t;
                    $p['level_id'] = "1";
                    $p['sub_section_id'] = "1";
                    $p['total_question'] = $requiredQuestion[$i];

                    $patternData[] = $p;

                }


                // $t1 = array (
                //         'mcq_test_id' => $mcqId,
                //         'section_id' => 1,
                //         'completion_time' => $time1,
                //         'total_question' =>
                // );

                // $t2 = array (
                //         'mcq_test_id' => $mcqId,
                //         'section_id' => 2,
                //         'completion_time' => $time2,
                //          'total_question' =>
                // );

                // $t3 = array (
                //         'mcq_test_id' => $mcqId,
                //         'section_id' => 3,
                //         'completion_time' => $time3,
                //         'total_question' =>
                // );

                // $data = array(
                //         $t1, $t2, $t3
                // );

                $this->db->insert_batch('mcq_time', $data);


                $this->db->insert_batch('mcq_test_pattern', $patternData);
        }

        public function showQuestion() {

          $sectionId = $this->uri->segment(3);

          $sql = "SELECT id,sub_section_name from `sub_section` where section_id= ".$sectionId;

          $query = $this->db->query($sql);

          $resultSubSection = array();
                
          if($query->num_rows() > 0)  {

              foreach ($query->result() as $row) {

                  $resultSubSection['id'][] = $row->id;
                  $resultSubSection['section-name'][] = $row->sub_section_name;
              }
          }

         //print_r($resultSubSection); die;

          $sql = "";

          for ($i=0; $i < count($resultSubSection['id']); $i++) {

            if ($i > 0) {
              $sql .= " UNION ALL ";
            } 
            
            //echo $resultSubSection[$i]; die;
           // echo $sectionId; die;

           $sql .= "SELECT COUNT(id)  as total FROM `question_bank` WHERE section_id = ".$sectionId." and sub_section_id =".$resultSubSection['id'][$i]." and level_id = 1 UNION ALL SELECT COUNT(id)  as total FROM `question_bank` WHERE section_id=".$sectionId." and sub_section_id=".$resultSubSection['id'][$i]." and level_id = 2 UNION ALL SELECT COUNT(id) as total FROM `question_bank` WHERE section_id=".$sectionId."  and sub_section_id=".$resultSubSection['id'][$i]." and level_id = 3";

               // echo $sql; die;
            
          }


          $resultQ = array();


           $query = $this->db->query($sql);
                
            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                    $resultQ[] = $row->total;
                }
            } 

            

            $sectionArray = array_chunk($resultQ,3);
  
            // echo "<pre>";

            // print_r($sectionArray); die;

            $this->load->view('admin/section-view', array("sectionId"=> $resultSubSection['id'],"sectionName"=>$resultSubSection['section-name'],"sectionDetail" => $sectionArray));

        }

        public function checkAvailableQuestion() {
          $sectionId = $_POST['sectionId'];
          $subSectionId = $_POST['subSectionId'];
          $levelId = $_POST['level'];

          $sql = "SELECT COUNT(id)  as total FROM `question_bank` WHERE section_id = ".$sectionId." and sub_section_id =".$subSectionId." and level_id = ".$levelId;

          

          $questionData = $this->db->query($sql)->row();

          if (null != $questionData) {

            print_r($questionData->total);
          } else {
            echo 0;
          }

        }

        public function addPatern() {
          //echo "<pre>";
          
          $sectionArray = array_chunk($_POST,3);
          $aa = $sectionArray[0]; 
          //print_r($aa); die;
          $mcqId = $sectionArray[0][0];
          $sectionId = $sectionArray[0][1];
          //echo $mcqId; die;
          unset($sectionArray[0]);
         // die;
          // print_r($sectionArray); 
          // die;

           $sql = "";

           $data = array ();

          foreach ($sectionArray as $key => $value) {
            if ($value[0] > 0) {
                $j = $key ;
                $sql .= "INSERT INTO mcq_test_pattern (mcq_test_id, section_id, sub_section_id, level_id, total_question)
                VALUES ('$mcqId', '$sectionId', '$j','1','$value[0]');";
                $q = array(
                  'mcq_test_id' => $mcqId,
                  'section_id' => $sectionId,
                  'sub_section_id' => $j,
                  'level_id' => 1,
                  'total_question' => $value[0]
                );

                $data[] = $q;
            }

            if ($value[1] > 0) {
              $j = $key ;
                $sql .= "INSERT INTO mcq_test_pattern (mcq_test_id, section_id, sub_section_id, level_id, total_question)
                VALUES ('$mcqId', '$sectionId', '$j','2','$value[1]');";
                 $q = array(
                        'mcq_test_id' => $mcqId,
                        'section_id' => $sectionId,
                        'sub_section_id' => $j,
                        'level_id' => 2,
                        'total_question' => $value[1]
                );
                  $data[] = $q;
            }

            if ($value[2] > 0) {
              $j = $key ;
                $sql .= "INSERT INTO mcq_test_pattern (mcq_test_id, section_id, sub_section_id, level_id, total_question)
                VALUES ('$mcqId', '$sectionId', '$j','3','$value[2]');";
                 $q = array(
                        'mcq_test_id' => $mcqId,
                        'section_id' => $sectionId,
                        'sub_section_id' => $j,
                        'level_id' => 3,
                        'total_question' => $value[2]
                );
                  $data[] = $q;
            }

          }

          // if ($conn->multi_query($sql) === TRUE) {
          //     echo "New records created successfully"; die;
          // } else {
          //     echo "Error: " . $sql . "<br>" . $conn->error;
          // }




          $this->db->insert_batch('mcq_test_pattern', $data);

          //print_r($sql); die;

          $this->close_method();

          die;
        }

        function close_method(){
          echo  "<script type='text/javascript'>";
          echo "window.close();";
          echo "</script>";
        }

        public function createQuestion() {
          $this->load->view('admin/create-question');

        }

        public function editQuestion() {
          $questionId = $this->uri->segment(3);

          $sql = "SELECT question_bank.*, answers.*  FROM question_bank 
                LEFT JOIN answers 
                ON answers.question_id = question_bank.id
                WHERE question_bank.id = '$questionId' ";

                $query = $this->db->query($sql);

                $i = 0;

                $questionData = array();
                foreach ($query->result() as $row) {

                  if ($i<1) {
                    $questionData['question_type'] = $row->question_type;
                    $questionData['question_id'] = $row->question_id;
                    $questionData['question'] = $row->question;
                    $questionData['section_id'] = $row->section_id;
                    $questionData['sub_section_id'] = $row->sub_section_id;
                    $questionData['level_id'] = $row->level_id;

                  }           
                  
                  $questionData['options'][$i]['id'] = $row->id;
                  $questionData['options'][$i]['option'] = $row->answer;
                  $questionData['options'][$i]['correct'] = $row->is_correct;
                  $i++;
                }

          $this->load->view('admin/edit-question', array('questionData' => $questionData));

        }

        public function getSection() {
          $sql = "SELECT * FROM `section`";
          $query = $this->db->query($sql);

          $i = 0;
          $sectionData = array();
          foreach ($query->result() as $row) {
                  $sectionData[$i]['id'] = $row->id;
                  $sectionData[$i]['name'] = $row->section_name;
                  $i++;
          }
          print_r(json_encode($sectionData));
        }

        

        public function getTotalQuestion() {
          $sectionId = $_POST['Id'];
          $sql = "SELECT count(id) as total_question FROM `question_bank` where section_id=$sectionId";
          //$query = $this->db->query($sql);
            //$sql = "SELECT * FROM `student_register` WHERE id=".$row->student_id;

            $result = $this->db->query($sql)->row();

            //print_r($result);
          // $i = 0;
          // $sectionData = array();
          // foreach ($query->result() as $row) {
          //         $sectionData[$i]['id'] = $row->id;
          //         $sectionData[$i]['name'] = $row->section_name;
          //         $i++;
          // }
           print_r(json_encode($result));
        }


        public function uploadQuestion() {
          //$sectionId = $_POST['Id'];
          //$sql = "SELECT count(id) as total_question FROM `question_bank` where section_id=$sectionId";
          //$query = $this->db->query($sql);
            //$sql = "SELECT * FROM `student_register` WHERE id=".$row->student_id;

            //$result = $this->db->query($sql)->row();

            //print_r($result);
          // $i = 0;
          // $sectionData = array();
          // foreach ($query->result() as $row) {
          //         $sectionData[$i]['id'] = $row->id;
          //         $sectionData[$i]['name'] = $row->section_name;
          //         $i++;
          // }

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

                  //$this->load->view('upload_form', $error);
          }
          else {
             $filename = 'uploads/'.$_FILES['questionFile']['name'];
          }

//echo $filename ; die;
          //$filename = 'uploads/jv.csv';

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  //echo "<pre>";
  $i = 0;
  while (($data = fgetcsv($h, 100000, ",")) !== FALSE) 
  {

     if ($i == 0) {
      $i++;
      continue;
     }
     // echo "<pre>";
     // print_r($data); die;

    //  echo "$i"; 

    $data[1] = str_replace("'",'"',$data[1]);


    //$sqlb = "INSERT INTO question_bank_test (question_type, question, level_id)
       //     VALUES ('$data[0]', '$data[1]', '$data[9]')";

    $qdata = array (
     "section_id" => $_POST['sectionUpload'],
      "question_type" => $data[0],
      "question" => $data[1],
      "level_id" => $data[9]
    );

//print_r($qdata); die;
    $this->db->insert('question_bank', $qdata);


    $questionId = $this->db->insert_id();

    $correct  = 0;
    //echo "<pre>";
    //print_r($data); die;
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



      // if ($data[8] == 1) {
      //     $correct = 1;
      // }

                $data = array(
                  $a1, $a2, $a3, $a4
                );

                // echo "<pre>";
                // print_r($data); 

                // die;

                $this->db->insert_batch('answers', $data);


      // if ($conn->query($sqlb) === TRUE) {
      //     $last_id = $conn->insert_id;

          

    // $conn->next_result();
    //   } else {
    //      echo "Error1: " . $sqlb . "<br>" . $conn->error;

    //      die;
    //   }

      // echo $last_id;

      // $correct  = 0;
      // if ($data[8] == 1) {
      //     $correct = 1;
      // } 

      // $sql = "";
                    
      // $sql = "INSERT INTO answers_test (question_id, answer, is_correct)
      // VALUES ('$last_id', '$data[2]', '$correct');";

      // if ($data[8] == 2) {
      // $correct = 1;
      // } else {
      // $correct  = 0;
      // }

      // $sql .= "INSERT INTO answers_test (question_id, answer, is_correct)
      // VALUES ('$last_id', '$data[3]', '$correct');";

      // if ($data[8] == 3) {
      //   $correct = 1;
      // } else {
      //   $correct  = 0;
      // }

      // $sql .= "INSERT INTO answers_test (question_id, answer, is_correct)
      // VALUES ('$last_id', '$data[4]', '$correct');";

      // if ($data[8] == 4) {
      //   $correct = 1;
      // } else {
      //   $correct  = 0;
      // }

      // $sql .= "INSERT INTO answers_test (question_id, answer, is_correct)
      // VALUES ('$last_id', '$data[5]', '$correct');";


      // if ($conn->multi_query($sql) === TRUE) {
      //     echo "New records created successfully";
      //     $conn->next_result();
      // } else {
      //     echo "Error: " . $sql . "<br>" . $conn->error; die;
      // }


     //print_r($data); die;
    // Each individual array is being pushed into the nested array
    //$the_big_array[] = $data;   
  }

   $this->session->set_flashdata('success', 'Questions Uploaded successfully');
                redirect('user/login', 'refresh');


echo "success"; die;
}



           //print_r(json_encode($result));
        }      

        public function getSubSection() {
                $sectionId = $_POST['Id'];

                $sql = "SELECT * FROM `sub_section` WHERE section_id = $sectionId";
                $query = $this->db->query($sql);
                $sectionData = array();

                $i = 0;

                $sectionData = array();
                foreach ($query->result() as $row) {
                        $sectionData[$i]['id'] = $row->id;
                        $sectionData[$i]['name'] = $row->sub_section_name;
                        $i++;
                }


                print_r(json_encode($sectionData));
        }

  public function save() {
  
    //print_r($_POST); die;

    $sectionId = $_POST['sectionId'];
    $subSectionId = $_POST['subsection'];
    $levelId = $_POST['levelId'];
    $question = $_POST['question'];
    $questionType = $_POST['questionType'];

    if ($questionType == 1) {
      $ans1 = $_POST['ans1'];
      $ans2 = $_POST['ans2'];
      $ans3 = $_POST['ans3'];
      $ans4 = $_POST['ans4'];
    }

    $qdata = array(
      'section_id' => $sectionId,
      'sub_section_id' => $subSectionId,
      'level_id' => $levelId,
      'question' => $question,
      'question_type' => $questionType
    );


    // if (!empty($_FILES['qimg']['name'])) {

    //   $config['upload_path']          = './question-images/';
    //   $config['allowed_types']        = 'gif|jpg|png';
    //   // $config['max_size']             = 100;
    //   // $config['max_width']            = 1024;
    //   // $config['max_height']           = 768;

    //   $this->load->library('upload', $config);
        
    //   if ( ! $this->upload->do_upload('qimg')) {
    //     $error = array('error' => $this->upload->display_errors());

    //     print_r($error); die;
    //   } else {               
    //     $qdata['question_image'] = "question-images/".$_FILES['qimg']['name'];
    //   }
    // }               

  //   $sql = "SELECT * FROM `student_register` WHERE email='$email' AND password = '$pwd'";

  //  $user = $this->db->query($sql)->row();

  // if (null != $user) {

    if (isset($_POST['questionId'])) {
        $this->db->where('id', $_POST['questionId']);
        $this->db->update('question_bank',$qdata);
        $questionId = $_POST['questionId'];
    } else {    
      $this->db->insert('question_bank', $qdata);
      $questionId = $this->db->insert_id();
    }



    if ($questionType == 3) {

      if ($_POST['true_false'] == "1") {
        $opt = array (
          // 'id' => $_POST['answer_id'],
        'question_id' => $questionId,
        'answer' => "true",
        'is_correct' => 1
      );
    

      } else {

        $opt = array (
        // 'id' => $_POST['answer_id'],
        'question_id' => $questionId,
        'answer' => "false",
        'is_correct' => 1
      );
      //$data = array($opt); 

      }

      $data = array($opt); 

    } else {
      $is_correct = 0;
    

      if ($_POST['correct'] == 1) {
              $is_correct = 1;
      } else {
       $is_correct = 0;
      }

      $opt1 = array (
        'question_id' => $questionId,
        'answer' => $ans1,
        'is_correct' => $is_correct
      );

      if ($_POST['correct'] == 2) {
              $is_correct = 1;
      } else {
       $is_correct = 0;
      }

      $opt2 = array (
        'question_id' => $questionId,
        'answer' => $ans2,
        'is_correct' => $is_correct
      );


      //$sql .= "INSERT INTO answers (question_id, answer, is_correct) VALUES ('$questionId', '$ans2', '$is_correct');";
      if ($_POST['correct'] == 3) {
              $is_correct = 1;
      } else {
       $is_correct = 0;
      }
      $opt3 = array (
        'question_id' => $questionId,
        'answer' => $ans3,
        'is_correct' => $is_correct
      );

      // $sql .= "INSERT INTO answers (question_id, answer, is_correct) VALUES ('$questionId', '$ans3', '$is_correct');";

      if ($_POST['correct'] == 4) {
              $is_correct = 1;
      } else {
       $is_correct = 0;
      }
      $opt4 = array (
        'question_id' => $questionId,
        'answer' => $ans4,
        'is_correct' => $is_correct
      );
      $data = array(
              $opt1, $opt2, $opt3, $opt4
      ); 

      if (isset($_POST['questionId'])) { 

        //print_r($data); die;

        $opt1['id'] = $_POST['ans1Id'];
        $opt2['id'] = $_POST['ans2Id'];
        $opt3['id'] = $_POST['ans3Id'];
        $opt4['id'] = $_POST['ans4Id'];

        $updateData = array(
          $opt1, $opt2, $opt3, $opt4
        ); 
      }
    }


    if (isset($_POST['questionId'])) { 

      //print_r($data); die;

      // $opt1['id'] = $_POST['ans1Id'];
      // $opt2['id'] = $_POST['ans2Id'];
      // $opt3['id'] = $_POST['ans3Id'];
      // $opt4['id'] = $_POST['ans4Id'];

      // $updateData = array(
      //   $opt1, $opt2, $opt3, $opt4
      // ); 
      //echo "<pre>";
      //print_r($updateData); die;
      if ($questionType == 3) {
        $opt['id'] = $_POST['answer_id'];
        $updateData = array($opt);
      }
      //print_r($updateData); die;
      $this->db->update_batch('answers', $updateData, 'id');
    } else {
      $this->db->insert_batch('answers', $data);  
    } 

    redirect($_SERVER['HTTP_REFERER']);   
  }

  public function downloadExcel() {
        $mcqId = $this->uri->segment(3);
    
        $sql = "SELECT DISTINCT(student_id) FROM `student_answers` where mcq_test_id =".$mcqId;

        $query = $this->db->query($sql);

        $result = array();

        $i = 0;

        $sectionDetails = $this->getMcqSection($mcqId);

        $studentData = array();
              
        if($query->num_rows() > 0)  {

            foreach ($query->result() as $row) {
              $sql = "SELECT * FROM `student_register` WHERE id=".$row->student_id;

              $student = $this->db->query($sql)->row();

              $sectionCount = 0;
              $sqll = "";
              foreach ($sectionDetails['section'] as $key => $value) {
                

                if ($sectionCount > 0) {
                  $sqll .= " UNION ALL ";
                }

                $sqll .= "SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id =".$value['id']." and correct_ans = 1";

                $sectionCount++;
              }

                $query = $this->db->query($sqll);
                //$sub = array("verbal", "reasoning", "quantitative");
                //print_r($sectionDetails); die;

                foreach ($query->result() as $key => $row) {

                  $sec = $sectionDetails['section'][$key]['name'];
                  $v = $row->result;
                  $student->$sec = $v;
                }  

            //for ($j =1 ; $j < 4; $j++) {
                // $sqll = "SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id = 1 and correct_ans = 1";

                // $sqll .= " UNION ALL SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id = 2 and correct_ans = 1";


                // $sqll .= " UNION ALL SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id = 3 and correct_ans = 1";

                // $result = $this->db->query($sqll)->row();

                // print_r($result); die;

                // if ($j = 1 ) {
                //   $sub = "verbal";
                // } else if ($j = 2) {
                //   $sub = "reasoning";
                // } else {
                //   $sub = "quantitative";
                // }

                // $query = $this->db->query($sqll);
                // $sub = array("verbal", "reasoning", "quantitative");

                // foreach ($query->result() as $key => $row) {
                //     $sec = $sub[$key];
                //     $v = $row->result;
                //     $student->$sec = $v;
                // }  
                //die;
            //}



            $studentData[$i] = $student;
            $i++;
            }
        }


        // $sql = "SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id = 1 and correct_ans = 1";

        // $sql .= " UNION ALL SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id = 2 and correct_ans = 1";


        // $sql .= " UNION ALL SELECT count(id) as result FROM `student_answers` WHERE mcq_test_id =".$mcqId." and student_id=".$row->student_id." and section_id = 3 and correct_ans = 1";

    echo "<pre>";

    print_r($studentData); die;    

        $this->generateXls($studentData, $sectionDetails);
      }

      public function getField($a) {

        switch ($a) {
          
            case 'S1':
           return "T1";
            break;
            case 'T1':
            return "U1";
            break;

            case 'U1':
            return "V1";
            break;

            case 'V1':
            return "W1";
            break;
            case 'W1':
            return "X1";
            break;
            case 'X1':
            return "Y1";
            break;

          
          default:
            return "Z1";
            break;
        }

      }

      public function getMcqSection($mcqId) {

            $sql = "SELECT mcq_test_pattern.section_id, section.section_name FROM `mcq_test_pattern` 
                    inner join section on mcq_test_pattern.section_id = section.id
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

        public function generateXls($studentData, $sectionDetails) {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Student Name');
        
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Test Status');

        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Gender');

        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Date of Birth');

        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Mobile');

        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Email');

        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'X-Board');

        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'X-Passing Year');

        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'X-Marks');


        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'XII-Board');

        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'XII-Passing Year');

        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'XII-Marks');

        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'College');

        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Batch');

        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Branch, Degree');

        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Degree Marks');

        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Start Time');

        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'End Time');

        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Time Taken');


        // $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'UserEmail');
        // $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Contact No ');
        // $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Residence city');
        // $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Residence State');
        // $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Date of Birth');
        // $objPHPExcel->getActiveSheet()->SetCellValue('H1', '10th Percentage');
        // $objPHPExcel->getActiveSheet()->SetCellValue('I1', '10th Passing year');
        // $objPHPExcel->getActiveSheet()->SetCellValue('J1', '12th Percentage');
        // $objPHPExcel->getActiveSheet()->SetCellValue('K1', '12th Passing year');
        // $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Degree');
        // $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Stream');
        // $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Degree Percentage');
        // $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Degree Passing year');


        //$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Preferred Work Location');

        $a = "S1";

        foreach ($sectionDetails['section'] as $key => $value) {

          $fieldName = $this->getField($a);

          $objPHPExcel->getActiveSheet()->SetCellValue('Q1', $value['name']." Marks");

          $a = $fieldName;          
        }

        // $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Verbal Correct Answer');
        // $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Resoning Correct Answer');
        // $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Quantitative Correct Answer');

        // set Row
        $rowCount = 2;
        $i = 1;
        foreach ($studentData as $student) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $student->first_name." ".$student->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $student->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $student->contact_no);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $student->city);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $student->state);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $student->dob);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $student->tenth_percentage);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $student->tenth_passing_year);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $student->twelveth_percentage);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $student->twelveth_passing_year);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $student->degree);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $student->stream);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $student->degree_percentage);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $student->degree_passing_year);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $student->work_location);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $student->verbal);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $student->reasoning);
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $student->quantitative);
            $rowCount++;
            $i++;
        }
        $filename = "skillrary_mcq". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }

    public function generatePassword() {
      $fourdigitrandom = rand(1000,9999); 
      return $fourdigitrandom; 
    }  

    public function checkCode($code = null) {

      if (isset($_POST['code'])) {
        $code = trim($_POST['code']);
      }



      $sql = "SELECT * FROM `mcq_code` WHERE code='$code' AND is_active = 1";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0)  {

          foreach ($query->result() as $row) {

                  $mcqId = $row->mcq_test_id;
                  $attempt = $row->attempt;
          }

          $this->session->set_userdata('mcqId', $mcqId);
          $this->session->set_userdata('mcqCode', $code);

          //redirect('user/create/profile');
          if (!isset($_SESSION['username'])) {
            $data = array (
              'username' => $this->generateUsernamePwd(4),
              'password' => $this->generatePassword()
           );  
          $this->session->set_userdata('username', $data);
  
          }
          


          
          redirect('user/create/profile');

           //$this->createUserProfile();           

      } else {
       // echo "code is invalid";
        $this->session->set_flashdata('error', 'Please enter valid code');
                redirect('user/new-login', 'refresh');
      }
  }




  public function createUserProfile () {
    $this->load->view('user-header');
    $this->load->view('user-profile');
    $this->load->view('codefooter');
  }

        public function checkProfile() {
            $userId = $this->session->id;

            $sql = "SELECT * FROM `student_register` Where id = '$userId'" ;

           $query = $this->db->query($sql);

           $isEmpty = 0;
           
            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {
                   if (empty($row->first_name)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->last_name)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->email)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->contact_no)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->state)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->city)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->dob)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->gender)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->tenth_passing_year)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->tenth_percentage)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->twelveth_passing_year)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->twelveth_percentage)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->degree)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->degree_percentage)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->degree_passing_year)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->stream)) {
                      $isEmpty = 1; 
                    }
                    if (empty($row->work_location)) {
                      $isEmpty = 1; 
                    }
                }
            }

            return $isEmpty;
        }
}