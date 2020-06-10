<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {
 
  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('form', 'url', 'string'));
    $this->load->library(array('session','form_validation'));
    $this->load->library("pagination");

    $uri = $this->uri->segment(2);

    if (!isset($_SESSION['customerId']) && !in_array($uri,array('login','logout','checklogin'))) {
      redirect('customer/login');
    }
    // if (!isset($_SESSION['customerId'])) {
    //   redirect('customer/login');
    // }
  } 

  public function login() {

    $this->load->view('customer/login');
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

  public function addTest() {

    $title = $_POST['test-title'];
    $type = $_POST['test-type'];

    //$check_mcq_test_id = $_POST['check_mcq_test_id'];
    $check_mcq_test_id = 0;

    //$check_drive_id = $_POST['check_drive_id'];
    $check_drive_id = 0;

    //$isProctored = $_POST['is-proctored'];
    $isProctored = 0;
    //$customerCode = explode("-",$_POST['customer-code']); //change to customer id

    $data = array(
      'title' => $title,
      'type' => $type,
      'customer_id' => $_SESSION['customerId'],
      'is_proctored' => $isProctored,
      'created_by' => $_SESSION['customerId']
    );


    if ($check_mcq_test_id != 0) {
        $data = array(
            'title' => $title,
            'type' => $type
        );
        
        $this->db->where('id', $check_mcq_test_id);
        $this->db->update('mcq_test',$data);
        $testId = $check_mcq_test_id;
    } else {    
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


        if ($check_drive_id != 0) {
          $this->db->where('id', $check_drive_id);
          $this->db->update('drive-details',$data);
        } else {  
          $this->db->insert('drive_details', $data);
        }               
      }
    }

    echo $testId;
  }

   public function addTestTime() {
    $mcqId = $_POST['mcqId'];

    $totalSection = $_POST['totalSection'];
    $sectionIds = explode(",",$_POST['sectionIds']);
    $totalQuestion = explode(",",$_POST['totalQuestion']);
    $totalTime = explode(",",$_POST['sectionTime']);

    //$check_exist_id = explode(",",$_POST['check_exist_id']);

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
        $this->db->insert('mcq_time', $t);
        $this->db->insert('mcq_test_pattern', $p);
    }
    //$this->session->set_flashdata('success-test', 'MCQ Created successfully');
    echo true;
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
      $_SESSION['isMCQAssigned'] = $result->mcq;
      $_SESSION['isInterviewAssigned'] = $result->interview;
      //redirect('customer/dashboard');
      redirect('customer/mcq-list');
    } else {
       redirect('customer/login');
    }
  }

  public function createTest() {
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/create-mcq');
    $this->load->view('customer/footer');
  }

  public function viewDashboard() {
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/mcq-list');
    $this->load->view('customer/footer');
  }

  public function viewMcqList() {
    $customerId = $_SESSION['customerId'];

    $mcqname = '';
    $mcqcode = '';
    $proctored = '';

    $sql = "SELECT mcq_test.id,mcq_test.is_proctored, mcq_test.title, mcq_code.code, SUM(mcq_test_pattern.total_question) as totalQuestion
            FROM mcq_test
            LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
            LEFT JOIN mcq_test_pattern on mcq_test.id=mcq_test_pattern.mcq_test_id";
    $sql .= " WHERE mcq_test.customer_id = $customerId";

    $sql .= " GROUP by mcq_test.id, mcq_test.title, mcq_code.code";

    //echo $sql; die;
    // $query = $this->db->query($sql);


    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/mcq-list';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $query = $this->getAllRows($sql,$config['per_page'], $start_index);


    // $result = array();

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
    $this->load->view('customer/mcq-list',array(
      "mcq"=>$mcq,
      "mcqname"=>$mcqname,
      "mcqcode"=>$mcqcode,
      "proctored"=>$proctored,
      "links"=>$links,
      'proctored' => 2

    ));
    $this->load->view('customer/footer');
  }



public function viewMcqListSearch() {
    $customerId = $_SESSION['customerId'];

    $mcqname = $_GET['mcqname'];
     $mcqcode = $_GET['mcqcode'];
     $proctored = $_GET['select_roctored'];

    $sql = "SELECT mcq_test.id,mcq_test.is_proctored, mcq_test.title, mcq_code.code, SUM(mcq_test_pattern.total_question) as totalQuestion
            FROM mcq_test
            LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
            LEFT JOIN mcq_test_pattern on mcq_test.id=mcq_test_pattern.mcq_test_id";
    $sql .= " WHERE mcq_test.customer_id = $customerId";


    // $sql .= " and mcq_test.is_proctored like '%$proctored%'  and mcq_test.title like '%$mcqname%'    and mcq_code.code like '%$mcqcode%'  ";

   if( $mcqname){
      $sql .= "   and mcq_test.title like '%$mcqname%' ";
    }

    if ($mcqcode) {
      $sql .= "   and mcq_code.code like '%$mcqcode%' ";
    }


    if(($proctored == 0 || $proctored == 1) ){
      $sql .= " and mcq_test.is_proctored = $proctored  ";
    }

    if($proctored == 2){
      $sql .= " and mcq_test.is_proctored in(0, 1) ";
    }



    $sql .= " GROUP by mcq_test.id, mcq_test.title, mcq_code.code";

    // $query = $this->db->query($sql);

 $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/mcq-list-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $query = $this->getAllRows($sql,$config['per_page'], $start_index);


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
    $this->load->view('customer/mcq-list',array(
      "mcq"=>$mcq,
      "mcqname"=>$mcqname,
      "mcqcode"=>$mcqcode,
      "proctored"=>$proctored,
      "links"=>$links

    ));
    $this->load->view('customer/footer');
  }


  public function getAllRows($sql, $start=0 ,$offset=0) {

          $sql = $sql." limit $offset ,$start";
          
          $query = $this->db->query($sql);
          return $query;
  }
 
  public function viewMcqData() {
      $mcqId = $this->uri->segment(3); 
      //echo $mcqId; die;
      $sql = "SELECT mcq_test.id as id,title, mcq_test.is_proctored as proctoredTest,mcq_code.code FROM `mcq_test` 
       LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
       WHERE mcq_test.id=".$mcqId;

      $mcq = $this->db->query($sql)->row();

      $mcqData['mcq-details'] = $mcq;

      $sql = "SELECT  assess_usr_pwd.*, student_register.id as studentId,student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `assess_usr_pwd` 
        LEFT JOIN student_register ON assess_usr_pwd.id=student_register.assess_usr_pwd_id
      where mcq_test_id= $mcqId
      order by assess_usr_pwd.id asc";

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . "customer/view-mcq-data/$mcqId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $mcqData['mcq-users']= $this->getAllRowsRecord($sql,$config['per_page'], $start_index);
// echo "<pre>";
//print_r($mcqData['mcq-users']); die;
        // $query = $this->db->query($sql);
        // $mcqData['mcq-users'] = $query->result();
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
        $this->load->view('customer/view-mcq-data', array(
          'mcq' => $mcqData,'links' => $links,
          'mcqId' =>$mcqId
        ));
        //$this->load->view('admin/view-mcq-data');
        $this->load->view('customer/footer');
  }

  public function viewMcqDataSearch() {
    $mcqId = $this->uri->segment(3); 

    $searchname =$_GET['searchname'];

    $searchemail =$_GET['searchemail'];

    $contactno =$_GET['contactno'];

    $searchusername =$_GET['searchusername'];

        $sql = "SELECT mcq_test.id as id,title, mcq_test.is_proctored as proctoredTest,mcq_code.code FROM `mcq_test` 
         LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
         WHERE mcq_test.id=".$mcqId;

        $mcq = $this->db->query($sql)->row();

         $mcqData['mcq-details'] = $mcq;

        $sql = "SELECT  assess_usr_pwd.*, student_register.id as studentId,student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `assess_usr_pwd` 
               LEFT JOIN student_register ON assess_usr_pwd.id=student_register.assess_usr_pwd_id
        where mcq_test_id= $mcqId";

        // order by assess_usr_pwd.id asc";

      if($searchname){
        $sql .= " and ( student_register.first_name like '%$searchname%' or   student_register.last_name like '%$searchname%'  )  ";
      }

      if($searchemail){
        $sql .= "  and student_register.email like '%$searchemail%' ";
      }

       if($contactno){
        $sql .= "  and student_register.contact_no like '%$contactno%' ";
      }


       if($searchusername){
        $sql .= "  and assess_usr_pwd.username like '%$searchusername%'  ";
      }

      $sql .= "  order by assess_usr_pwd.id asc ";


    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . "customer/view-mcq-data-search/$mcqId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $mcqData['mcq-users']= $this->getAllRowsRecord($sql,$config['per_page'], $start_index);


        // $query = $this->db->query($sql);
        // $mcqData['mcq-users'] = $query->result();
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
        $this->load->view('customer/view-mcq-data', array(
          'mcq' => $mcqData,
          'mcqId' => $mcqId,
          'links' => $links,
          'searchname' => $searchname,
          'searchemail' => $searchemail,
          'contactno' => $contactno,
          'searchusername' => $searchusername
        ));
        //$this->load->view('admin/view-mcq-data');
        $this->load->view('customer/footer');
  }


  public function getAllRowsRecord($sql, $start=0 ,$offset=0) {

      $sql = $sql." limit $offset ,$start";
      
      $query = $this->db->query($sql);

      $questionData = $query->result();
      return $questionData;
  }



  public function viewInterview() {
    $customerId = $_SESSION['customerId']; 
    $searchcode ='';

    $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();

    $sql = "SELECT DISTINCT(interview_code),count(DISTINCT(id)) as total_students FROM `interview_users` where interview_customer_id=$customerId and interview_code is not null GROUP BY interview_code";

    // $result = $this->db->query($sql)->result_object();

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    
    $config['base_url'] = base_url() . 'customer/view-interview';
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
     
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
   
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);
     
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/view-interview', array(
      'customer'=> $customerName->customer_name,
      'interview' => $result,
      'searchcode' => $searchcode,
      'links' => $links
    ));
    //$this->load->view('admin/view-mcq-data');
    $this->load->view('customer/footer');
   // $this->load->view('admin/view-mcq.php', array('mcq'=>$mcq));
  }



  public function viewInterviewSearch() {
    $customerId = $_SESSION['customerId']; 
    $searchcode = $_GET['searchcode'];;

    $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();

    $sql = "SELECT DISTINCT(interview_code),count(DISTINCT(id)) as total_students FROM `interview_users` where interview_customer_id=$customerId and interview_code is not null and interview_code like '%$searchcode%' GROUP BY interview_code";


    // $result = $this->db->query($sql)->result_object();
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';
      $config['prev_link'] = '<i class=""></i>Previous Page';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = 'Next Page<i class=""></i>';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['reuse_query_string'] = true;
      
      $config['base_url'] = base_url() . 'customer/view-interview-search';
      $config['total_rows'] = $this->getNumberOfRows($sql);
      $config['per_page'] = 10;
      $config["uri_segment"] = 3;
       
      $this->pagination->initialize($config);
      $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
     
      $links = $this->pagination->create_links();

      $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/view-interview', array(
      'customer'=> $customerName->customer_name,
      'interview' => $result,
      'searchcode' => $searchcode,
      'links' => $links
    ));
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
    // $interview['users'] = $this->db->query($sql)->result();

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . "customer/interview-result/$interviewCode";
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
    $config['reuse_query_string'] = true;

             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $interview['users'] = $this->getAllRowsData($sql,$config['per_page'], $start_index);

// echo "<pre>";print_r($interview['users']); die;
    $roundResult = array();
    foreach ($interview['users'] as $key => $value) {
      $intervieweeId = $value->id;
      //echo $intervieweeId; die;
      //$intervieweeId = 10;
      $sql = "SELECT max(round) as active_round FROM interview_details where interview_users_id = $intervieweeId";
      $activeRound = $this->db->query($sql)->row();
      //print_r(var_dump($activeRound)); die;
      $roundResult = array();
      if (null !== $activeRound->active_round) {
        for ($i = 1; $i <= $activeRound->active_round; $i++) {
          $sql = "SELECT * FROM interview_details where round = $i and interview_users_id = $intervieweeId";

          $result = $this->db->query($sql)->row();
          //$round = "round".$i;
          if (isset($result->interview_status)) {
              $roundR = "round_".$i;
              $interview['users'][$key]->totalRound = $i; 
            $interview['users'][$key]->$roundR = $result->interview_status;
            //$roundResult[$intervieweeId][$round] = $result->interview_status;
          }
        } 
      } else {
         $interview['users'][$key]->totalRound = 0;
         $interview['users'][$key]->roundResult = 0;
      }      
    }

    // foreach ($interview['users'] as $key => $value) {
    //   $intervieweeId = $value->id;
    //   for ($i = 1; $i<4;$i++) {
    //     $sql = "SELECT * FROM interview_details where round = $i and interview_users_id = $intervieweeId";

    //     $result = $this->db->query($sql)->row();
    //     $round = "round".$i;
    //     if (isset($result->interview_status)) {
    //       $roundResult[$intervieweeId][$round] = $result->interview_status;
    //     } else {
    //       if ($i == "1") {
    //         $roundResult[$intervieweeId][$round] = 1;
    //       } else {
    //         $roundResult[$intervieweeId][$round] = 0;  
    //       }            
    //     }
    //   }              
    // }

    // echo "<pre>";

    // print_r($roundResult); die;

    //$interview['round-result'] = $roundResult;

    // $sql = "SELECT * FROM mcq_test ";

    // $query = $this->db->query($sql);

    // $result = $query->result();

    // $interview['mcqs-list'] = $query->result();
    $sql = "SELECT id, email FROM `gotomeeting_token_details` where customer_id=$customerId ";

    $interview['meeting-id'] = $this->db->query($sql)->result_object();

    $sql = "SELECT * from `assess_login` where role= 6"; //interviewer role

    $query = $this->db->query($sql);

    $interview['interviewer-list'] = $query->result();

    $searchname = '';
    $searchemail = '';
    $searchcontact = '';

    //print_r($interview); die;
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/interview',array(
      'interviewData'=> $interview,

      'searchname'=> $searchname,
      'searchemail'=> $searchemail,
      'searchcontact'=> $searchcontact,
      'interviewCode'=> $interviewCode,
       'links' => $links

    ));
    $this->load->view('customer/footer');  
 }


  public function interviewResultSearch() {
    /*$sql = "SELECT  interview_users.*, student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `interview_users` 
    LEFT JOIN student_register ON interview_users.id=student_register.interview_user_id
    order by interview_users.id asc";
*/
      $customerId = $_SESSION['customerId'];
      $interviewCode = $this->uri->segment(3);
      
      $searchname = $_GET['searchname'];
      $searchemail = $_GET['searchemail'];
      $searchcontact = $_GET['searchcontact'];


  $sql = "SELECT  interview_users.*, student_register.id as studentId, student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `interview_users` 
    LEFT JOIN student_register ON interview_users.id=student_register.interview_users_id";

    if ($customerId > 0) {
       $sql.=" where interview_users.interview_customer_id = $customerId and interview_users.interview_code = '".$interviewCode."'";
    }
 
    if(!empty($searchname)){
          $sql.="   and (student_register.first_name like '%$searchname%'
      or student_register.last_name like '%$searchname%') "; 
    }

    if(!empty($searchemail)){
          $sql.="   and student_register.email like '%$searchemail%' "; 
    }

    if(!empty($searchcontact)){
          $sql.="   and student_register.contact_no like '%$searchcontact%'  "; 
    }


    $sql.=" order by interview_users.id asc";

    // $interview['users'] = $this->db->query($sql)->result();

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . "customer/interview-result-search/$interviewCode";
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
    $config['reuse_query_string'] = true;

             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $interview['users'] = $this->getAllRowsData($sql,$config['per_page'], $start_index);



// echo "<pre>";print_r($interview['users']); die;
    $roundResult = array();
    foreach ($interview['users'] as $key => $value) {
      $intervieweeId = $value->id;
      //echo $intervieweeId; die;
      //$intervieweeId = 10;
      $sql = "SELECT max(round) as active_round FROM interview_details where interview_users_id = $intervieweeId";
      $activeRound = $this->db->query($sql)->row();
      //print_r(var_dump($activeRound)); die;
      $roundResult = array();
      if (null !== $activeRound->active_round) {
        for ($i = 1; $i <= $activeRound->active_round; $i++) {
          $sql = "SELECT * FROM interview_details where round = $i and interview_users_id = $intervieweeId";

          $result = $this->db->query($sql)->row();
          //$round = "round".$i;
          if (isset($result->interview_status)) {
              $roundR = "round_".$i;
              $interview['users'][$key]->totalRound = $i; 
            $interview['users'][$key]->$roundR = $result->interview_status;
            //$roundResult[$intervieweeId][$round] = $result->interview_status;
          }
        } 
      } else {
         $interview['users'][$key]->totalRound = 0;
         $interview['users'][$key]->roundResult = 0;
      }      
    }

    // foreach ($interview['users'] as $key => $value) {
    //   $intervieweeId = $value->id;
    //   for ($i = 1; $i<4;$i++) {
    //     $sql = "SELECT * FROM interview_details where round = $i and interview_users_id = $intervieweeId";

    //     $result = $this->db->query($sql)->row();
    //     $round = "round".$i;
    //     if (isset($result->interview_status)) {
    //       $roundResult[$intervieweeId][$round] = $result->interview_status;
    //     } else {
    //       if ($i == "1") {
    //         $roundResult[$intervieweeId][$round] = 1;
    //       } else {
    //         $roundResult[$intervieweeId][$round] = 0;  
    //       }            
    //     }
    //   }              
    // }

    // echo "<pre>";

    // print_r($roundResult); die;

    //$interview['round-result'] = $roundResult;

    // $sql = "SELECT * FROM mcq_test ";

    // $query = $this->db->query($sql);

    // $result = $query->result();

    // $interview['mcqs-list'] = $query->result();
    $sql = "SELECT id, email FROM `gotomeeting_token_details` where customer_id=$customerId ";

    $interview['meeting-id'] = $this->db->query($sql)->result_object();

    $sql = "SELECT * from `assess_login` where role= 6"; //interviewer role

    $query = $this->db->query($sql);

    $interview['interviewer-list'] = $query->result();


    //print_r($interview); die;
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/interview',array(
      'interviewData'=> $interview,

      'searchname'=> $searchname,
      'searchemail'=> $searchemail,
      'searchcontact'=> $searchcontact,
      'interviewCode'=> $interviewCode,
       'links' => $links

    ));
    $this->load->view('customer/footer');  
 }


   public function getNumberOfRows($sql) {
      $query = $this->db->query($sql);

      return $query->num_rows();

   }

  public function getAllRowsData($sql, $start=0 ,$offset=0) {

          $sql = $sql." limit $offset ,$start";
          
          $query = $this->db->query($sql);

        $questionData = $query->result_object();

        return $questionData;

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

  // public function addSection() {
  //   $this->load->view('customer/header');
  //   $this->load->view('customer/sidenav');
  //   $this->load->view('customer/add-section');
  //   $this->load->view('customer/footer');
  // } 

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

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/create-interviewers';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $userResult = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    // $query = $this->db->query($sql);

    // $userResult = $query->result();

    //print_r($userResult); die;

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $searchusername ='';

    $this->load->view('customer/create-interviewers', array(
      "user"=>$userResult,
      "roles"=>$result,
      "links"=>$links,
      'searchusername' => $searchusername

    ));
    $this->load->view('customer/footer');
  }



 public function addInterviewerSearch() {
    $customerId = $_SESSION['customerId'];

    $searchusername = $_GET['searchusername'];

     
   
    $sql = "SELECT * FROM roles ";

    $query = $this->db->query($sql);

    $result = $query->result();

    $sql = "SELECT * FROM assess_login INNER JOIN roles on roles.id = 6 and created_by = $customerId";


    if (!empty($searchusername)) {
        $sql .= "  where assess_login.username like '%$searchusername%' ";
    }

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/create-interviewers-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $userResult = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    // $query = $this->db->query($sql);

    // $userResult = $query->result();

    //print_r($userResult); die;

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/create-interviewers', array(
      "user"=>$userResult,
      "roles"=>$result,
      "links"=>$links,
      'searchusername' => $searchusername

    ));
    $this->load->view('customer/footer');
  }

























  public function random_strings($length_of_string, $type) { 
  
    if ($type == "numeric") {
      $str_result = '0123456789';      
    } else if ($type == "alphaNuMCaps") {
      $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';      
    } else {
      $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
    }
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result), 0, $length_of_string); 
  }

  public function generateInterviewUsrPwd($internalCall=false, $num=null, $group=null) {
    
    if (!$internalCall) {
      $num = $_POST['num'];
      $group = $_POST['code'];
    }

    $customerId = $_SESSION['customerId'];
    $sql = "SELECT * from `interview_users` where interview_code = '$group' and interview_customer_id = '$customerId'";
    $codeCheck = $this->db->query($sql)->result();

    $codeCheck =($codeCheck == null)? '' : $codeCheck[0]->interview_code ;


    if ($codeCheck) {
      $this->session->set_flashdata('message', "$group code already exist.");
      redirect('customer/create-interview-group');
    } 

    $mcqId = 0;
    
    for ($i=1; $i<=$num; $i++) {
      $username = $this->random_strings(4,"alphaNuMCaps");
      $password = $this->random_strings(4,"numeric");
      $data[]  = array ('username' => $username, 'password' => $password, 'mcq_test_id' => $mcqId, 'interview_code' => $group,'interview_customer_id' => $customerId);
    }

    $this->db->insert_batch('interview_users', $data);
  }

  public function getTimeStamp($date, $time, $duration = null) {

    $x = strtotime($date." ".$time);
    if (null !== $duration) {
      $x = strtotime("+".$duration."hours",$x);
    }
    return $x;
  }

  public function checkRoom() {
  //print_r($_POST);
  $testDate = $_POST['testdate'];
  $testTime = $_POST['testTime'];
  $duration = $_POST['duration'];

  $interviewTimeStamp = $this->getTimeStamp($testDate, $testTime);
  $durationTimeStamp = $this->getTimeStamp($testDate, $testTime, ($duration*2)); 

  //$testDate = $_POST['datetime'];
  $testDate = explode("/",$testDate);

  $testDate = $testDate[2]."-".$testDate[0]."-".$testDate[1];

  $customerId = $_SESSION['customerId'];

  //print_r($getIds); die;

  $sql = "SELECT gotomeeting_id from `interview_details` where customer_id = $customerId AND interview_date = '".$testDate."' AND interview_timestamp <= '".$interviewTimeStamp."' AND  duration_timestamp >='".$interviewTimeStamp."'";

  $interviewSchedule = $this->db->query($sql)->result_object();

  $usedIds = array();
  $gotomeetingIds = array();
  if (null !== $interviewSchedule) {
    foreach ($interviewSchedule as $key => $value) {
      $usedIds[] = $value->gotomeeting_id;
    }
  }

  $sql = "SELECT id , email from `gotomeeting_token_details` where customer_id = $customerId";

  $getIds = $this->db->query($sql)->result_object();

  $i = 0;
  foreach ($getIds as $key => $value) {

    if (in_array($value->id, $usedIds)) {
      continue;
    }
    $gotomeetingIds[$i]['id'] = $value->id;
    $i++;
  }

  print_r(json_encode($gotomeetingIds));
  //print_r($gotomeetingIds);
  }
 
  public function createInteviewGroup() {
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/interview-group');
    $this->load->view('customer/footer');
  }

  public function saveInterviewGroup() {
    //print_r($_POST); die;
    //$customerId = $_SESSION['customerId'];

// var_dump($_POST['generate'],$_POST['code']);
// return;





    $this->generateInterviewUsrPwd(true,$_POST['generate'],$_POST['code']);
    redirect('customer/view-interview');
  }

  public function removeInterviewUsrPwd() {
    
    $num = $_POST['num'];
    $group = $_POST['code'];
    $mcqId = 0;
    $customerId = $_SESSION['customerId'];
    for ($i=1; $i<=$num; $i++) {
      $username = $this->random_strings(4,"alphaNuMCaps");
      $password = $this->random_strings(4,"numeric");
      $data[]  = array ('username' => $username, 'password' => $password, 'mcq_test_id' => $mcqId, 'interview_code' => $group,'interview_customer_id' => $customerId);
    }

    $this->db->insert_batch('interview_users', $data);
  }


public function todaysInterview() {

    $searchdate = '';
    $todaysDate = date("Y-m-d");

    $customerId = $_SESSION['customerId'];

    
    $sql = "SELECT interview_details.gotomeeting_id, interview_details.user_email, interview_details.interview_date, 
              interview_details.interview_time, gtd.email , interview_details.endtime
              FROM interview_details 
              inner  join gotomeeting_token_details as gtd
              on gtd.id = interview_details.gotomeeting_id  
              where interview_date = ('$todaysDate') 
              and interview_details.customer_id = $customerId   
              and gtd.customer_id = $customerId  
              order by interview_details.interview_time ";

              // echo $customerId;

              // return;


    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/todays-interview';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);


   // $result = $this->db->query($sql)->result_object();

    $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();


    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/todays-interview', array(
        "todaysinterview"=>$result,
        "searchdate"=>$searchdate,
        'customer'=> $customerName->customer_name,
        'links' => $links
    ));

    $this->load->view('customer/footer');

  }



  public function todaysInterviewSearch() {

    $searchdate = $_GET['searchdate'];
    $todaysDate = date("Y-m-d");
    $customerId = $_SESSION['customerId'];

    
    $sql = "SELECT interview_details.gotomeeting_id, interview_details.user_email, interview_details.interview_date, 
              interview_details.interview_time, gtd.email, interview_details.endtime
              FROM interview_details 
              inner  join gotomeeting_token_details as gtd
              on gtd.id = interview_details.gotomeeting_id ";

              $sql1 = " and interview_details.customer_id = $customerId   
              and gtd.customer_id = $customerId  ";

    if(!empty($searchdate)){
        $sql .= " where interview_date = ('$searchdate')  $sql1 ";
    }else{
        $sql .= " where interview_date = ('$todaysDate') $sql1 ";
    }

    $sql .= " order by interview_details.interview_time  "; 

   // $result = $this->db->query($sql)->result_object();

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
        // $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
        // $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/todays-interview-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

      $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/todays-interview', array(
        "todaysinterview"=>$result,
        "searchdate"=>$searchdate,
        'customer'=> $customerName->customer_name,
        'links' => $links
    ));

    $this->load->view('customer/footer');
  }



  public function createQuestion() {
          $this->load->view('customer/header');
          $this->load->view('customer/sidenav');
          $this->load->view('customer/create-question');
          $this->load->view('customer/footer');
  }




 public function createSection() {
    $customerId = $_SESSION['customerId'];
    $sql = " SELECT * FROM section where customer_id = $customerId";

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . 'customer/add-section';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $searchSection = '';

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/create-section', array(
      "section"=>$result,
      "links"=>$links,
      "searchSection" => $searchSection

    ));
    $this->load->view('customer/footer');
  }



  public function createSectionSearch() {

    $customerId = $_SESSION['customerId'];
    $searchSection = $_GET['searchSection'];

    $sql = " SELECT * FROM section where customer_id = $customerId";

    if(!empty($searchSection)){
        $sql .= " AND section_name like '%$searchSection%' ";
    }

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';


    $config['base_url'] = base_url() . 'customer/add-section-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/create-section', array(
      "section"=>$result,
      "links"=>$links,
      "searchSection" => $searchSection

    ));
    $this->load->view('customer/footer');
  }

  public function addNewSection() {
    $customerId = $_SESSION['customerId'];
    $sectionName = trim($_POST['searchSection']);

    if (empty($sectionName)) {
        $this->session->set_flashdata('error', "Enter section name.");
        redirect('customer/add-section');
    }

    $sql = "select section_name from section 
             where customer_id = $customerId and section_name = '".$sectionName."'";

    $query = $this->db->query($sql);
    $result = $query->result();

    if (null != $result) {
    
      $this->session->set_flashdata('error', "$sectionName already exist.");
      redirect('customer/add-section');

    } else {
      $data  = array ('customer_id'=>$customerId,'section_name' => $sectionName);
      $this->db->insert('section', $data);

      $this->session->set_flashdata('success', "$sectionName added successfully.");

      redirect('customer/add-section');
    }
  }


  public function deleteSection() {

      $status = ($_POST['value'] == 1) ? 0 : 1;

       $data = array(
          'is_active' => $status
       );

       $this->db->where('id', $_POST['id']);
       $this->db->update('section',$data);
  }


  public function viewQuestion() {

    $customerId = $_SESSION['customerId'];
      $this->load->library("pagination");

      $sql = "SELECT question_bank.id, question_bank.question, section.section_name, question_levels.level,sub_section.sub_section_name FROM question_bank_Q8 as question_bank
      INNER JOIN section on section.id = question_bank.section_id
      INNER JOIN question_levels on question_levels.id = question_bank.level_id
      INNER JOIN sub_section on sub_section.id = question_bank.sub_section_id
      where question_bank.customer_id=$customerId";

      $section = '';
      $subsection = '';
      $difficultylevel = '';

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_link'] = '<i class=""></i>Previous Page';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next Page<i class=""></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            
            $config['base_url'] = base_url() . 'customer/view-questions';
            $config['total_rows'] = $this->getNumberOfRows($sql);
            $config['per_page'] = 10;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
              $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
         $links = $this->pagination->create_links();

          $questionData = $this->getAllRowsData($sql,$config['per_page'], $start_index);

          $this->load->view('customer/header');
          $this->load->view('customer/sidenav');


          $this->load->view('customer/view-questions',array(
            'questionData' => $questionData,
            'links' => $links,
            'section' => $section ,
            'subsection' => $subsection,
            'difficultylevel' => $difficultylevel,

            ));


      // $this->load->view('admin/view-questions', ($params));
  
    $this->load->view('customer/footer');
  }


  public function viewQuestionSearch() {
    $customerId = $_SESSION['customerId'];
    $this->load->library("pagination");
    $section = '';
    $subsection = '';
    $difficultylevel = '';

    if ( $_GET['section'] != 0) {
      $section = $_GET['section'];
      $sql = "SELECT * FROM section where id = $section ";

      $query = $this->db->query($sql);

      $result = $query->result();
      $section  = $result[0]->section_name;
    }

    if ( $_GET['subsection'] != 0) {
      $subsection = $_GET['subsection'];
      $sql = "SELECT * FROM sub_section where id = $subsection";
      $query = $this->db->query($sql);
      $result = $query->result();
      $subsection  = $result[0]->sub_section_name;
    }

    if (  $_GET['difficultylevel'] != 0) {
      $difficultylevel = $_GET['difficultylevel'];
      $sql = "SELECT * FROM question_levels where id = $difficultylevel";
      $query = $this->db->query($sql);
      $result = $query->result();
      $difficultylevel  = $result[0]->level;
    }


    $sql = "SELECT question_bank.id, question_bank.question, section.section_name, 
              question_levels.level,sub_section.sub_section_name 
            FROM question_bank
                  INNER JOIN section 
                on section.id = question_bank.section_id
                  INNER JOIN question_levels
                on question_levels.id = question_bank.level_id
                  INNER JOIN sub_section
                on sub_section.id = question_bank.sub_section_id
                    
                where question_bank.customer_id = $customerId 
                 and section.section_name like '%$section%'
                 and
               sub_section.sub_section_name  like '%$subsection%'
                and
             question_levels.level like '%$difficultylevel%'";

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . 'customer/view-questions-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
    $links = $this->pagination->create_links();
    $questionData = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/view-questions',array(
      'questionData' => $questionData,
      'links' => $links,
      'section' => $section ,
      'subsection' => $subsection,
      'difficultylevel' => $difficultylevel
    ));
    $this->load->view('customer/footer');
  }

  public function editQuestion() {
    $questionId = $this->uri->segment(3);

    $customer_code = $this->getCustomerCode();

    $sql = "SELECT question_bank.*, answers.*  FROM question_bank_$customer_code question_bank
          LEFT JOIN answers_$customer_code  answers
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
    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');        
    $this->load->view('customer/edit-question', array('questionData' => $questionData));
    $this->load->view('customer/footer');
  }







 public function createSubSection() {

   $customerId = $_SESSION['customerId'];

    $section_id = $this->uri->segment(3);
    $sql = "SELECT * FROM section where id = $section_id AND customer_id = $customerId ";

    $query = $this->db->query($sql);
    $section_name = $query->result()[0]->section_name;

    $sql = " SELECT * FROM sub_section inner join section on section.id = sub_section.section_id 
              where section_id =  $section_id AND customer_id = $customerId";

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . "customer/add-sub-section/$section_id";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $searchSubSection = '';

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/create-sub-section', array(
      "subSection"=>$result,
       "section_id" => $section_id,
       "section_name" => $section_name,
      "links"=>$links,
      "searchSubSection" => $searchSubSection

    ));
    $this->load->view('customer/footer');
  }


  public function createSubSectionSearch() {
   $customerId = $_SESSION['customerId'];

    $section_id = $this->uri->segment(3);
    $sqlQ = "SELECT * FROM section where id = $section_id AND customer_id = $customerId ";

    $query = $this->db->query($sqlQ);
    $section_name = $query->result()[0]->section_name;

    $searchSubSection = $_GET['searchSubSection'];

    $sql = " SELECT * FROM sub_section  inner join section on section.id = sub_section.section_id 
              where section_id =  $section_id AND customer_id = $customerId";

    if(!empty($searchSubSection)){
        $sql .= " AND  sub_section_name like '%$searchSubSection%' ";
    }

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';

    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . "customer/add-sub-section-search/$section_id";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');
    $this->load->view('customer/create-sub-section', array(
      "subSection"=>$result,
      "section_id" => $section_id,
      "section_name" => $section_name,
      "links"=>$links,
      "searchSubSection" => $searchSubSection
    ));
    $this->load->view('customer/footer');
  }

  public function saveSubSection() {
    $customerId = $_SESSION['customerId'];

    $section_id = trim($_POST['section_id']);
    $sub_section_name = trim($_POST['sub_section_name']);

    if (empty($sub_section_name)) {
      $this->session->set_flashdata('error', "Enter sub section name.");
      redirect("customer/add-sub-section/$section_id");
    }

    $sql = "select sub_section_name from sub_section inner join section on section.id = sub_section.section_id  where section_id = '$section_id' AND customer_id = $customerId AND sub_section_name = '$sub_section_name' ";

    $query = $this->db->query($sql);
    $result = $query->result();


    if (null != $result) {
      $this->session->set_flashdata('error', "$sub_section_name already exist.");
      redirect("customer/add-sub-section/$section_id");
    } else {
      $data  = array (
        'sub_section_name' => $sub_section_name,
        'section_id' => $section_id

      );

      $this->db->insert('sub_section', $data);
      $this->session->set_flashdata('success', "$sub_section_name added successfully.");
      redirect("customer/add-sub-section/$section_id");
    }
  }

  public function getCustomerCode()
  {
    $customerId = $_SESSION['customerId'];
    $sql = " SELECT customer_code FROM customers where id = $customerId "; 
    $query = $this->db->query($sql);
    $customer_code = $query->result()[0]->customer_code;
    
    return $customer_code;
  }



 public function saveWithCode() {
  
    $customerId = $_SESSION['customerId'];

    // $sql = " SELECT customer_code FROM customers where id = $customerId "; 
    // $query = $this->db->query($sql);
    $customer_code = $this->getCustomerCode();


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

    if (isset($_SESSION['customerId'])) {
      // $qdata['customer_id'] = $_SESSION['customerId']; 


    }


    if (isset($_POST['questionId'])) {
        $this->db->where('id', $_POST['questionId']);
        $this->db->update("question_bank_$customer_code",$qdata);
        $questionId = $_POST['questionId'];
    } else {    
      $this->db->insert("question_bank_$customer_code", $qdata);
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

      if ($questionType == 3) {
        $opt['id'] = $_POST['answer_id'];
        $updateData = array($opt);
      }
      $this->db->update_batch("answers_$customer_code", $updateData, 'id');
    } else {
      $this->db->insert_batch("answers_$customer_code", $data);  
    } 

    redirect($_SERVER['HTTP_REFERER']);  


  }



 public function viewQuestionWithCode() {

    $customerId = $_SESSION['customerId'];
      $this->load->library("pagination");

    $customer_code = $this->getCustomerCode();

      $sql = "SELECT question_bank.id, question_bank.question, section.section_name, question_levels.level,sub_section.sub_section_name FROM question_bank_$customer_code as question_bank
      INNER JOIN section on section.id = question_bank.section_id
      INNER JOIN question_levels on question_levels.id = question_bank.level_id
      INNER JOIN sub_section on sub_section.id = question_bank.sub_section_id ";

      //      where question_bank.customer_id=$customerId";

      $section = '';
      $subsection = '';
      $difficultylevel = '';

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_link'] = '<i class=""></i>Previous Page';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next Page<i class=""></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            
            $config['base_url'] = base_url() . 'customer/view-questions';
            $config['total_rows'] = $this->getNumberOfRows($sql);
            $config['per_page'] = 10;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
              $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
         $links = $this->pagination->create_links();

          $questionData = $this->getAllRowsData($sql,$config['per_page'], $start_index);

          $this->load->view('customer/header');
          $this->load->view('customer/sidenav');


          $this->load->view('customer/view-questions',array(
            'questionData' => $questionData,
            'links' => $links,
            'section' => $section ,
            'subsection' => $subsection,
            'difficultylevel' => $difficultylevel,

            ));


      // $this->load->view('admin/view-questions', ($params));
  
    $this->load->view('customer/footer');
  }



public function viewQuestionWithCodeSearch() {
    $customerId = $_SESSION['customerId'];
    $this->load->library("pagination");

    $customer_code = $this->getCustomerCode();

    $section = '';
    $subsection = '';
    $difficultylevel = '';

    if ( $_GET['section'] != 0) {
      $section = $_GET['section'];
      $sql = "SELECT * FROM section where id = $section ";

      $query = $this->db->query($sql);

      $result = $query->result();
      $section  = $result[0]->section_name;
    }

    if ( $_GET['subsection'] != 0) {
      $subsection = $_GET['subsection'];
      $sql = "SELECT * FROM sub_section where id = $subsection";
      $query = $this->db->query($sql);
      $result = $query->result();
      $subsection  = $result[0]->sub_section_name;
    }

    if (  $_GET['difficultylevel'] != 0) {
      $difficultylevel = $_GET['difficultylevel'];
      $sql = "SELECT * FROM question_levels where id = $difficultylevel";
      $query = $this->db->query($sql);
      $result = $query->result();
      $difficultylevel  = $result[0]->level;
    }


    $sql = "SELECT question_bank.id, question_bank.question, section.section_name, 
              question_levels.level,sub_section.sub_section_name 
            FROM question_bank_$customer_code  question_bank
                  INNER JOIN section 
                on section.id = question_bank.section_id
                  INNER JOIN question_levels
                on question_levels.id = question_bank.level_id
                  INNER JOIN sub_section
                on sub_section.id = question_bank.sub_section_id
                    
                where section.section_name like '%$section%'
                 and
               sub_section.sub_section_name  like '%$subsection%'
                and
             question_levels.level like '%$difficultylevel%'";

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class=""></i>Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'Next Page<i class=""></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['base_url'] = base_url() . 'customer/view-questionswithcode-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
    $links = $this->pagination->create_links();
    $questionData = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('customer/header');
    $this->load->view('customer/sidenav');

    $this->load->view('customer/view-questions',array(
      'questionData' => $questionData,
      'links' => $links,
      'section' => $section ,
      'subsection' => $subsection,
      'difficultylevel' => $difficultylevel
    ));
    $this->load->view('customer/footer');
  }




}
