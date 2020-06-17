<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Vimeo\Vimeo;
class AdminController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('form', 'url', 'string'));
    $this->load->library(array('session','form_validation'));
    $this->load->library('form_validation');

    $this->load->library("pagination");

    $uri = $this->uri->segment(2);
    //echo $uri; die;
    if (count($_SESSION) == 1 && !in_array($uri,array('login','logout','checklogin','updateToken','checkCode','uploadQuestion','download-students'))) {
      redirect('admin/login');
    }

    //$this->db2 = $this->load->database('database2', TRUE);
    // $client = new Vimeo("dfe4d40e1b610f1fc70286ddc017e53e039e7984", "0tyi2RmRxGpejcv3bcsnRFE/b3HT7Y9LOBYJnkODQlSOXuj/StlNqbevYWBThVZMeNd7qKH6Gkjb+AYfNuRJzHSTZimT3QYpj3ubkwFPM68q106nh3j/znAo26wGBMUq", "d598a2fbacd583051d3b80065915e95d");
    
    //3a1186d4de292af3e94c232d87fe6d3e
    //7972fa1e01c364e40690ffcbc2489f33
//81dd9df6320cd89f942caf7dbf87b4ce
// $response = $client->request('/tutorial', array(), 'GET');
// print_r($response);

//for check progress
//     $uri = "/videos/412211063";
//     $response = $client->request($uri . '?fields=transcode.status');
// if ($response['body']['transcode']['status'] === 'complete') {
//   print 'Your video finished transcoding.';
// } elseif ($response['body']['transcode']['status'] === 'in_progress') {
//   print 'Your video is still transcoding.';
// } else {
//   print 'Your video encountered an error during transcoding.';
// }
// die;


// $file_name = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4";
// //echo $file_name;
// //print_r(var_dump(is_file($file_name))); die;
// //echo $file_name;
// $uri = $client->upload($file_name, array(
//   "name" => "test-assess",
//   "description" => "The description goes here."
// ));

// echo "Your video URI is: " . $uri;

    //  $getUrl = $this->uri->segment(2);
    //  $checkUrl = array('create-test','view-mcq', 'view-questions', 'view-results', 'view-students', 'download-students', 'add-question', 'edit-question', 'create-interview','logout');

    // if (in_array($getUrl, $checkUrl)) {
    //   if (!isset($_SESSION['admin_id'])) {
    //     redirect('admin/login');
    //   }
    // }

  }
  public function testlogin() {
    echo "da"; die;
  }
  public function getRefreshedToken($refreshToken) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.getgo.com/oauth/v2/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=".$refreshToken);

    $headers = array();
    $headers[] = 'Authorization: Basic QXN3a2o2QTRSS0dVMG5BeldEMGNtMWFUbFc3R0xVZFk6SFMwQW1XT0lHYVZrbTB2VA==';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    return json_decode($result);
  }

  public function updateAccessToken() {

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


  public function getAccessToken() {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.getgo.com/oauth/v2/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=password&username=trainer112@qspiders.com&password=SuperAdmin112");

    $headers = array();
    $headers[] = 'Authorization: Basic QXN3a2o2QTRSS0dVMG5BeldEMGNtMWFUbFc3R0xVZFk6SFMwQW1XT0lHYVZrbTB2VA==';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    // echo "<pre>";

    // print_r(json_decode($result));
    $result = json_decode($result);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $data  = array (
      'first_name' => $result->firstName,
      'last_name' => $result->lastName,
      'email' => $result->email,
      'access_token' => $result->access_token,
      'refresh_token' => $result->refresh_token,
      'token_type' => $result->token_type,
      'account_key' => $result->account_key,
      'organizer_key' => $result->organizer_key
    );

    $this->db->insert('gotomeeting_token_details', $data);

    echo "success";

  }

 public function createMeeting ($startDate, $startTime, $assessId , $call = NULL, $meetingId = 0, $duration = 3) {
        //echo "test";
  //$sql = "SELECT * FROM `bse_citrix` limit 2";
//
//$time = date("m/d/Y h:i:s a", strtotime("+30 seconds"));

//$startTime =+ ":00";


//$time = date("m/d/Y h:i:s a", strtotime("+30 seconds"));

  $timestamp = strtotime($startTime); // 3 hours
  $startTime1 = date('H:i:s', $timestamp);

  $timestamp = strtotime("-6 hours 30 minutes", $timestamp); 
  $startTime = date('H:i:s', $timestamp);

  $startTestTime = $startDate.'T'.$startTime.'.000Z';

  $startTestTime1 = $startDate.'T'.$startTime1.'.000Z';

  $duration = $duration * 3600;

  $timestamp = strtotime($startTime) + $duration; // 3 hours
  $timestamp2 = strtotime($startTime1) + $duration; // 3 hours

  $endTime = date('H:i:s', $timestamp);
  $endTime2 = date('H:i:s', $timestamp2);
  
  $endTestTime = $startDate.'T'.$endTime.'.000Z';
  $endTestTime1 = $startDate.'T'.$endTime2.'.000Z';

  if ($call != "interview" || !$meetingId) {
    $meetingEmail = "trainer111@qspiders.com";  
  } else {
    $sql = "SELECT email from `gotomeeting_token_details` where id = $meetingId";
    $result = $this->db->query($sql)->row();
    $meetingEmail = $result->email;
  }

  $sql = "SELECT access_token FROM `gotomeeting_token_details` where email='".$meetingEmail."'";

  $meeting = $this->db->query($sql)->result();

  foreach($meeting as $key => $value) {

    $token = $value->access_token;
   // $timeZone = "Asia/Calcutta";
    $timeZone = "";
    $headers = array(
            'Content-Type: application/json',
            "accept: application/json",
            "Authorization: ".$token,
    );

    $url = 'https://api.getgo.com/G2M/rest/meetings';
     // $meetdes=preg_replace("/[^a-zA-Z]/", "", $course->description);
      //$meettit=preg_replace("/[^a-zA-Z]/", "", $course->course_title);


      $fields = array(
          'subject' => "test",
          'starttime'=> $startTestTime,
           'endtime' => $endTestTime,
          'conferencecallinfo'=>'Free',
          'timezonekey'=> $timeZone,
          "passwordrequired" => FALSE,
          "meetingtype" =>  "scheduled",
      );
/*
if ($call = "interview") {

$fields['subject'] = "DXC Interview";

}*/
//              echo '<pre>';print_r($fields);
// print_r(json_encode($fields)); die;


  $ch = curl_init();
  curl_setopt($ch,CURLOPT_HTTPHEADER, $headers );
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));


        $result = curl_exec($ch);

        curl_close($ch);
        $webinars = json_decode($result);

        if($webinars!=''){
          if(isset($webinars->int_error_code) || isset($webinars->int_err_code)){
            continue;
          }else{
//print_r($webinars); die;
$data = array(
      'meeting_id' => $webinars[0]->meetingid,
      'user_join_url' => $webinars[0]->joinURL,
      'starttime'=> $startTestTime1,
      'endtime' => $endTestTime1
  );
if ($call == "test") {
$this->db->where('id', $assessId);
     $this->db->update('proctored_mcq',$data);
} else if ($call == "interview") {
//echo "test", $assessId;
//$this->db->where('id', $assessId);
                       //$this->db->update('interview_details',$data);

foreach ($assessId as $key => $value) {
                          /*$data[]  =array(
                              'id' => $value,
                              'meeting_id' => $webinars[0]->meetingid,
                              'user_join_url' => $webinars[0]->joinURL
                          );*/
// $data = array(
//                             'meeting_id' => $webinars[0]->meetingid,
//                             'user_join_url' => $webinars[0]->joinURL,
//                             'starttime'=> $startTestTime,
//                             'endtime' => $endTestTime,
//                     );

$this->db->where('id', $value);
                       $this->db->update('interview_details',$data);
                        }

                       //$this->db->updateBatch('interview_details',$data, 'id');


}
echo "Success";
    //start meeting
    //$this->startMeeting($webinars->meetingid, $headers);
    break;
          }
         }
}
//          echo "<pre>";
//print_r($mcq); die;
  }

public function startMeeting() {

    //$sql = "SELECT * FROM `bse_citrix` limit 3";

    $call = $_POST['call'];
    $this->updateAccessToken();

    //$sql = "SELECT * FROM `bse_citrix` where email='trainer134@qspiders.com'";

    $sql = "SELECT * FROM `gotomeeting_token_details` where email='trainer111@qspiders.com'";

    // $meeting = $this->db2->query($sql)->result();
    $meeting = $this->db->query($sql)->result();

    foreach($meeting as $key => $value) {

    $token = $value->access_token;
    $timeZone = "Asia/Calcutta";
    $headers = array(
      "Content-Type: application/json",
      "accept: application/json",
      "Authorization: ".$token,
    );

    if ($call == "test") {
      $tableName = "proctored_mcq";
      $fieldName = "assess_usr_pwd_id";
    } else if ($call == "interview") {
      $tableName = "interview_details";
      $fieldName = "id";
    }

    $sql = "SELECT meeting_id FROM $tableName WHERE $fieldName  = ".$_POST['assessId'];

    $meetingDetails = $this->db->query($sql)->row();

    $meetingId = $meetingDetails->meeting_id;


    $start_url = "https://api.getgo.com/G2M/rest/meetings/".$meetingId."/start";

    $ch1 = curl_init();
    curl_setopt($ch1,CURLOPT_HTTPHEADER, $headers );
    curl_setopt($ch1,CURLOPT_URL, $start_url);
    curl_setopt($ch1,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
    $startmeeting = curl_exec($ch1);
    curl_close($ch1);
    $start_meetings=json_decode($startmeeting);   
    $message = '';

    //echo $token;
    //print_r($start_meetings); die;

    if(isset($start_meetings->int_error_code) || isset($start_meetings->int_err_code)){
      $start_meeting_url = $key." ".$start_meetings->int_err_code;
      continue;
    }

    $start_meeting_url = "No meeting assigned";
    
    if(isset($start_meetings->hostURL)) {
      $start_meeting_url = $start_meetings->hostURL;

      if ($call == "test") { 

        $data = array(
        'proctor_meeting_url' => $start_meeting_url
        );

        $this->db->where('assess_usr_pwd_id', $_POST['assessId']);
        $this->db->update('proctored_mcq',$data);

        } else if ($call == "interview") {
        $data = array(
        'interviewer_meeting_url' => $start_meeting_url
        );

        $this->db->where('id', $_POST['assessId']);
        $this->db->update('interview_details',$data);
      }


      echo $start_meeting_url; die;
      // echo "Success"; die;
      break;
    }  else{
        $start_meeting_url = '';
        $message = isset($start_meetings->message) ? $start_meetings->message : '';
        continue;
    }
  }
    echo $start_meeting_url;
}

public function startMeetingIframe() {

    //$sql = "SELECT * FROM `bse_citrix` limit 3";

    $call = $_GET['call'];

    //$sql = "SELECT * FROM `bse_citrix` where email='trainer134@qspiders.com'";

    $sql = "SELECT * FROM `gotomeeting_token_details` where email='trainer111@qspiders.com'";

    // $meeting = $this->db2->query($sql)->result();
    $meeting = $this->db->query($sql)->result();

    foreach($meeting as $key => $value) {

    $token = $value->access_token;
    $timeZone = "Asia/Calcutta";
    $headers = array(
      "Content-Type: application/json",
      "accept: application/json",
      "Authorization: ".$token,
    );

    if ($call == "test") {
      $tableName = "proctored_mcq";
      $fieldName = "assess_usr_pwd_id";
    } else if ($call == "interview") {
      $tableName = "interview_details";
      $fieldName = "id";
    }

    $sql = "SELECT meeting_id FROM $tableName WHERE $fieldName  = ".$_GET['assessId'];

    $meetingDetails = $this->db->query($sql)->row();

    $meetingId = $meetingDetails->meeting_id;


    $start_url = "https://api.getgo.com/G2M/rest/meetings/".$meetingId."/start";

    $ch1 = curl_init();
    curl_setopt($ch1,CURLOPT_HTTPHEADER, $headers );
    curl_setopt($ch1,CURLOPT_URL, $start_url);
    curl_setopt($ch1,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
    $startmeeting = curl_exec($ch1);
    curl_close($ch1);
    $start_meetings=json_decode($startmeeting);   
    $message = '';

    //echo $token;
    //print_r($start_meetings); die;

    if(isset($start_meetings->int_error_code) || isset($start_meetings->int_err_code)){
      $start_meeting_url = $key." ".$start_meetings->int_err_code;
      continue;
    }

    $start_meeting_url = "No meeting assigned";
    
    if(isset($start_meetings->hostURL)) {
      $start_meeting_url = $start_meetings->hostURL;

      if ($call == "test") { 

        $data = array(
        'proctor_meeting_url' => $start_meeting_url
        );

        $this->db->where('assess_usr_pwd_id', $_POST['assessId']);
        $this->db->update('proctored_mcq',$data);

        } else if ($call == "interview") {
        $data = array(
        'interviewer_meeting_url' => $start_meeting_url
        );

        $this->db->where('id', $_POST['assessId']);
        $this->db->update('interview_details',$data);
      }

      $_SESSION['startMeetingUrl'] = $start_meeting_url;
      redirect("admin/view-meeting");
      echo $start_meeting_url; die;
      // echo "Success"; die;
      break;
    }  else{
        $start_meeting_url = '';
        $message = isset($start_meetings->message) ? $start_meetings->message : '';
        continue;
    }
  }
  $_SESSION['startMeetingUrl'] = $start_meeting_url;
    echo $start_meeting_url;

}

public function gotomeetingView() {
  $this->load->view('admin/meeting');
}

public function gotomeetingJoin() {
  $this->load->view('user-gotomeeting');
}

public function saveInterviewStatusnew() {
 $data = array(
    'interview_status' => $_POST['status']
  );

  $whereArray = array (
    'interview_users_id' => $_POST['userId'],
    'round' => $_POST['round']
  );

  $this->db->where($whereArray);
  $this->db->update('interview_details',$data);

echo "success";
}

public function saveInterviewStatus() {
 $data = array(
    'interview_status' => $_POST['status'],
  );

  $this->db->where('id', $_POST['userId']);
  $this->db->update('interview_users',$data);

echo "success";
}

public function saveActiveRound() {
  $data = array(
    'interview_status' => $_POST['status']
  );
  $whereArray = array(
    'round' => $_POST['round'],
    'interview_users_id' => $_POST['userId']
  );
  $this->db->where($whereArray);
  $this->db->update('interview_details',$data);

echo "success";
}

public function saveActiveRoundOld() {
  $data = array(
    'active_round' => $_POST['round']
  );

  $this->db->where('id', $_POST['userId']);
  $this->db->update('interview_users',$data);

echo "success";
}

public function showInterviewFeedback() {
   $id = $_POST['id'];
   $round = $_POST['round'];
   $sql = "Select * from interview_details where interview_users_id = $id and round = $round and final_decision IS NOT NULL";

   $result = $this->db->query($sql)->result();

   //print_r($result); die;
    header('Content-Type: application/json');
    echo json_encode( $result );

}

public function studentDetail() {
  $id = $_POST['id'];

  $sql = "SELECT  first_name,
last_name,
gender,
dob,
email,
contact_no,
states.name as state_name,
cities.name as city_name,
city,
tenth_board,
tenth_passing_year,
tenth_percentage,
twelveth_board,
twelveth_passing_year,
twelveth_percentage,
degree,
degree_college_name,
degree_university,
degree_percentage,
degree_passing_year,
-- pg_college,
-- pg_passing_year,
-- pg_branch,
-- pg_university,
-- pg_percentage,
-- pg_degree,
stream,
work_location from `student_register` left join states on student_register.state = states.id
left join cities on student_register.city = cities.id where student_register.id = $id";


    $result = $this->db->query($sql)->row();

    $studentData = array();

    foreach ($result as $key => $value) {
      switch ($key) {
        case 'first_name':
          $studentData['Name'] = $value;
          # code...
          break;
          case 'last_name':
          $studentData['Name'] = $studentData['Name']." ".$value;
          # code...
          break;
          case 'gender':
          # code...
          $studentData['Gender'] = $value == "1" ? "Male" : "Female";
          break;
          case 'dob':
          # code...
          $studentData['Date of Birth'] = $value;
          break;
          case 'email':
          # code...
          $studentData['Email'] = $value;
          break;
          case 'contact_no':
          # code...
          $studentData['Contact No'] = $value;
          break;
          case 'state_name':
          # code...
          $studentData['State'] = $value;
          break;
          case 'city_name':
          # code...
          $studentData['City'] = $value;
          break;
          case 'tenth_board':
          # code...
          $studentData['10th Board'] = $value;
          break;
          case 'tenth_passing_year':
          # code...
          $studentData['10th Passing Year'] = $value;
          break;
          case 'tenth_percentage':
          # code...
          $studentData['10th Percentage'] = $value;
          break;
          case 'twelveth_board':
          # code...
          $studentData['12th Board'] = $value;
          break;
          case 'twelveth_passing_year':
          # code...
          $studentData['12th Passing Year'] = $value;
          break;
          case 'twelveth_percentage':
          # code...
          $studentData['12th Percentage'] = $value;
          break;
          case 'degree':
          # code...
          $studentData['Degree'] = $value;
          break;
          case 'degree_college_name':
          # code...
          $studentData['College'] = $value;
          break;

          case 'degree_university':
          # code...
          $studentData['Unitversity'] = $value;
          break;
            case 'degree_percentage':
          # code...
          $studentData['Degree Percentage'] = $value;
          break;
          case 'degree_passing_year':
          # code...
          $studentData['Degree Passing Year'] = $value;
          break;
          case 'stream':
          # code...
          $studentData['Stream/Branch'] = $value;
          break;
          case 'work_location':
          # code...
          $studentData['Work Location Preferred'] = $value;
          break;

        
        default:
          # code...
          break;
      }

    }

    header('Content-Type: application/json');
    echo json_encode( $studentData );
}

public function activateTest() {
 
 $data = array(
      'start_test' => $_POST['status']
  );

 $this->db->where('assess_usr_pwd_id', $_POST['assessId']);
 $this->db->update('proctored_mcq',$data);
 echo "success";
}

// public function pauseTest() {
//  $data = array(
//       'start_test' => 1
//   );

//  $this->db->where('assess_usr_pwd_id', $_POST['assessId']);
//  $this->db->update('proctored_mcq',$data);
//  echo "success";
// }


public function closeInterview() {
 $data = array(
      'is_active' => 0
    );

 $this->db->where('id', $_POST['assessId']);
        $this->db->update('interview_details',$data);

echo "success";
}

public function startTest() {
  $sql = "SELECT start_test FROM `proctored_mcq` WHERE assess_usr_pwd_id= ".$_POST['assessId'];

  $result = $this->db->query($sql)->row();
  if (null !== $result) {
    echo $result->start_test;
  } else {
    //check for non proctored mcq
    echo 1;
  }
}

public function joinMeeting() {

$sql = "SELECT proctor_meeting_url as joinUrl FROM `proctored_mcq` WHERE assess_usr_pwd_id= ".$_POST['assessId'];

              $result = $this->db->query($sql)->row();


               echo $result->joinUrl;
}


  public function saveUser() {


    $data  = array (
      'first_name' => $_POST['first-name'],
      'last_name' => $_POST['last-name'],
      'email' => $_POST['user-email'],
      'contact_no' => $_POST['user-cno'],
      'role' => $_POST['roleId'],
      'username' => $_POST['username'],
      'password' => $_POST['password']
    );

    $this->db->insert('assess_login', $data);

    echo "success";

  }



  public function createUser() {

    $sql = "SELECT * FROM roles ";

    $query = $this->db->query($sql);

    $result = $query->result();

    $sql = "SELECT * FROM assess_login INNER JOIN roles on roles.id = assess_login.role";

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

    $config['base_url'] = base_url() . 'admin/create-users';
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

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');

    $searchusername = '';
    $searchrole = '';

    $this->load->view('admin/create-users', array(
      "user"=>$userResult,
      "roles"=>$result,
      "searchusername"=>$searchusername,
      "searchrole"=>$searchrole,
       "links"=>$links

    ));
    $this->load->view('admin/footer');
    
  }


  public function createUserSearch() {

    $searchusername = $_GET['searchusername'];
    $searchrole = $_GET['searchrole'];

    $sql = "SELECT * FROM roles ";

    $query = $this->db->query($sql);

    $result = $query->result();

    $sql = "SELECT * FROM assess_login INNER JOIN roles on roles.id = assess_login.role 
            where assess_login.username like '%$searchusername%'  and roles.roles like '%$searchusername%' ";

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


    $config['base_url'] = base_url() . 'admin/create-users-search';
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

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');

    $this->load->view('admin/create-users', array(
      "user"=>$userResult,
      "roles"=>$result,
      "searchusername"=>$searchusername,
      "searchrole"=>$searchrole,
       "links"=>$links

    ));

    $this->load->view('admin/footer');
    
  }




  public function saveCustomer() {
    $sql = "SELECT MAX(id) as id FROM customers";
    $result = $this->db->query($sql)->row();
    $customerId = 1;

    if (null !== $result->id) {
      $customerId += $result->id;
    }

   // $data  = $this->input->post();
    $hidden_customer_id = $_POST['hidden_customer_id'];

    $data['customer_name'] = $_POST['customer_name'];
    $data ['customer_email'] = $_POST['customer_email'];
    $data['customer_contactno'] = $_POST['customer_contactno'];
    $data['customer_address'] = $_POST['customer_address'];
    $data['mcq'] = $_POST['mcq'];
    $data['interview'] = $_POST['interview'];

    if($hidden_customer_id){
      $this->db->where('id', $hidden_customer_id);
      $this->db->update('customers',$data);
      $this->session->set_flashdata('success', $data['customer_name']." Updated successfully.");
      echo "updated successfully";
    }else{
       $data['customer_code'] = ucfirst(substr($data['customer_name'],0,1)).$customerId;
       $data['username'] = substr($data['customer_name'],0,2)."_".$customerId;
       $data['password'] = $this->generatePassword();
       $this->db->insert('customers', $data);

      $this->session->set_flashdata('success', $data['customer_name']." Created successfully.");

       echo "Created successfully";
    }
  }
 
  public function mcqCustomer() {
    $sql = "SELECT distinct(customer_id) FROM mcq_test order by customer_id asc";

    $result = $this->db->query($sql)->result_array();


    $searchcode = '';
    $searchname = '';
    $searchemail = '';
    $searchcontact = '';

    $ids = "";

    foreach ($result as $key => $value) {
      if (count($result)-$key > 1) {
        $ids .= $value['customer_id'].","; 
      } else {
        $ids .= $value['customer_id'];
      }
    }

   $sql = "select * from customers where id in (".$ids.")";
   //echo $sql; die;


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


    $config['base_url'] = base_url() . 'admin/mcq-customers';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

   // $result = $this->db->query($sql)->result_object();

//    print_r($result); die;

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/mcq-customers', array(
        "customers"=>$result,
        "searchcode"=>$searchcode,
        "searchname"=>$searchname,
        "searchemail"=>$searchemail,
        "searchcontact"=>$searchcontact,
         "links"=>$links
    ));
    $this->load->view('admin/footer');
  }

  public function mcqCustomerSearch() {

    $searchcode = $_GET['searchcode'];
    $searchname = $_GET['searchname'];
    $searchemail = $_GET['searchemail'];
    $searchcontact = $_GET['searchcontact'];

    $sql = "SELECT distinct(customer_id) FROM mcq_test order by customer_id asc";

    $result = $this->db->query($sql)->result_array();

    $ids = "";

    foreach ($result as $key => $value) {
      if (count($result)-$key > 1) {
        $ids .= $value['customer_id'].","; 
      } else {
        $ids .= $value['customer_id'];
      }
    }

   // $sql = "select * from customers where id in (".$ids.") ";


    $sql = "SELECT * from customers where id in (".$ids.") 
        and  customer_code like '%$searchcode%'
        and customer_name like '%$searchname%'
        and customer_email like '%$searchemail%'
        and customer_contactno like '%$searchcontact%'";


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


    $config['base_url'] = base_url() . 'admin/mcq-customers-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

   //echo $sql; die;
   // $result = $this->db->query($sql)->result_object();

//    print_r($result); die;

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/mcq-customers', array(
        "customers"=>$result,
        "searchcode"=>$searchcode,
        "searchname"=>$searchname,
        "searchemail"=>$searchemail,
        "searchcontact"=>$searchcontact,
        "links"=>$links
    ));
    // $this->load->view('admin/mcq-customers', array("customers"=>$result));
    $this->load->view('admin/footer');


  }


  public function todaysInterview() {

    $searchdate = '';
    $todaysDate = date("Y-m-d");
    
    $sql = "SELECT interview_details.gotomeeting_id, interview_details.user_email, interview_details.interview_date, 
              interview_details.interview_time, gtd.email , interview_details.endtime
              FROM interview_details 
              inner  join gotomeeting_token_details as gtd
              on gtd.id = interview_details.gotomeeting_id  
              where interview_date = ('$todaysDate')   
              order by interview_details.interview_time ";


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


    $config['base_url'] = base_url() . 'admin/todays-interview';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);


   // $result = $this->db->query($sql)->result_object();

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/todays-interview', array(
        "todaysinterview"=>$result,
        "searchdate"=>$searchdate,
        'links' => $links
    ));
    $this->load->view('admin/footer');
  }



  public function todaysInterviewSearch() {

    $searchdate = $_GET['searchdate'];
    $todaysDate = date("Y-m-d");
    
    $sql = "SELECT interview_details.gotomeeting_id, interview_details.user_email, interview_details.interview_date, 
              interview_details.interview_time, gtd.email, interview_details.endtime
              FROM interview_details 
              inner  join gotomeeting_token_details as gtd
              on gtd.id = interview_details.gotomeeting_id ";

    if(!empty($searchdate)){
        $sql .= " where interview_date = ('$searchdate') ";
    }else{
        $sql .= " where interview_date = ('$todaysDate') ";
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


    $config['base_url'] = base_url() . 'admin/todays-interview-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/todays-interview', array(
        "todaysinterview"=>$result,
        "searchdate"=>$searchdate,
        'links' => $links
    ));
    $this->load->view('admin/footer');
  }


  public function createCustomer() {
    $sql = "SELECT * FROM customers ";

    $searchcode = '';
    $searchname = '';
    $searchemail = '';
    $searchcontact = '';

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


    $config['base_url'] = base_url() . 'admin/create-customers';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);
    
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
 
    $this->load->view('admin/create-customers', array(
      "customers"=>$result,
      "searchcode"=>$searchcode,
      "searchname"=>$searchname,
      "searchemail"=>$searchemail,
      "searchcontact"=>$searchcontact,
      "links"=>$links
    ));

    // $this->load->view('admin/create-customers', array("customers"=>$result));
    $this->load->view('admin/footer');
  } 




  public function createCustomerSearch() {
      $searchcode = $_GET['searchcode'];
      $searchname = $_GET['searchname'];
      $searchemail = $_GET['searchemail'];
      $searchcontact = $_GET['searchcontact'];

    $sql = "SELECT * FROM customers
    where customer_code like '%$searchcode%' 
    and customer_name like '%$searchname%'
    and customer_email like '%$searchemail%'
    and customer_contactno like '%$searchcontact%'";

    // $query = $this->db->query($sql);

    // $result = $query->result();


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
    $config['base_url'] = base_url() . 'admin/create-customers-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);
    
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');

    $this->load->view('admin/create-customers', array(
      "customers"=>$result,
      "searchcode"=>$searchcode,
      "searchname"=>$searchname,
      "searchemail"=>$searchemail,
      "searchcontact"=>$searchcontact,
      "links"=>$links

    ));
    $this->load->view('admin/footer');
  } 

 
  public function interviewCustomers() {
    $sql = "SELECT DISTINCT(interview_customer_id) FROM `interview_users` WHERE interview_customer_id is NOT NULL";
    $result = $this->db->query($sql)->result_array();
    $customers = array();

    if (count($result) > 0) {
      $customerIds = "";

      foreach ($result as $key => $value) {
        if ($key == (count($result) - 1)) {
          $customerIds .= $value['interview_customer_id'];
        } else {
          $customerIds .= $value['interview_customer_id'].",";  
        }
      }
      
      $sql = "SELECT * FROM customers WHERE id IN ($customerIds)";

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

    $config['base_url'] = base_url() . 'admin/interview-customers-list';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $customers = $this->getAllRowsData($sql,$config['per_page'], $start_index);



      // $customers = $this->db->query($sql)->result_object();
    }

     $searchcode = '';

     $searchname = '';

     $searchemail = '';

     $searchcontact = '';

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    // $this->load->view('admin/interview-customers-view', array("customers"=>$customers));
    $this->load->view('admin/interview-customers-view', array(
         "customers"=>$customers,
         "searchcode"=>$searchcode,
         "searchname"=>$searchname,
         "searchemail"=>$searchemail,
         "searchcontact"=>$searchcontact,
         "links" => $links
    ));
    $this->load->view('admin/footer');
  }


  public function interviewCustomersSearch() {

         $searchcode = $_GET['searchcode'];

         $searchname = $_GET['searchname'];

         $searchemail = $_GET['searchemail'];

         $searchcontact = $_GET['searchcontact'];

         $sql = "SELECT distinct(c.id), c.customer_code, c.username, c.password, c.customer_name,
                  c.customer_email, c.customer_contactno, c.customer_address, c.is_active
                  FROM customers as c
                  inner join interview_users as iu
                  on c.id = iu.interview_customer_id
                  where iu.interview_customer_id is not null
                  and c.customer_code like '%$searchcode%'
                  and c.customer_name like '%$searchname%'
                  and c.customer_email like '%$searchemail%'
                  and c.customer_contactno like '%$searchcontact%'";

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

    $config['base_url'] = base_url() . 'admin/interview-customers-list-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $customers = $this->getAllRowsData($sql,$config['per_page'], $start_index);


         // $customers = $this->db->query($sql)->result_object();
        $this->load->view('admin/header');
        $this->load->view('admin/sidenav');
        $this->load->view('admin/interview-customers-view', array(
             "customers"=>$customers,
             "searchcode"=>$searchcode,
             "searchname"=>$searchname,
              "searchemail"=>$searchemail,
             "searchcontact"=>$searchcontact,
             "links" => $links
        ));
        $this->load->view('admin/footer');
  }


  public function addRoles() {
    $sql = "SELECT * FROM roles ";


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


    $config['base_url'] = base_url() . 'admin/create-roles';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    // $query = $this->db->query($sql);

    // $result = $query->result();
 
    $searchrole = '';
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-roles', array(
      "roles"=>$result,
      'links' =>$links,
      'searchrole' => $searchrole

    ));
    $this->load->view('admin/footer');
  }


  public function addRolesSearch() {
    $searchrole = $_GET['searchrole'];

    $sql = "SELECT * FROM roles ";

    if(!empty($searchrole)){
       $sql .= " where roles like '%$searchrole%' ";
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


    $config['base_url'] = base_url() . 'admin/create-roles-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    // $query = $this->db->query($sql);

    // $result = $query->result();
 

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-roles', array(
      "roles"=>$result,
      'links' =>$links,
      'searchrole' => $searchrole

    ));
    $this->load->view('admin/footer');
  }



  public function saveRole() {
    $data  = array ('roles' => $_POST['role']);

    $this->db->insert('roles', $data);

    echo "success";

  }

public function deleteUsrPwd() {
   $mcqId = $_POST['mcqId'];

   $sql = "SELECT id FROM assess_usr_pwd   WHERE mcq_test_id = $mcqId AND NOT EXISTS (SELECT 1 FROM student_register  WHERE assess_usr_pwd.id = student_register.assess_usr_pwd_id)";
   $result = $this->db->query($sql)->result_array();

   $ids = "";
   foreach ($result as $key => $value) {

     if (count($result)-$key > 1) {
      $ids .= $value['id'].","; 
     } else {
        $ids .= $value['id'];
     }
     
   }
   $sql = "Delete from assess_usr_pwd where id in (".$ids.")";
   //echo $sql; die;
   $result = $this->db->query($sql);
   
// Delete from Customers
// WHERE Country IN ('Spain');

        

//    $sql = $this->db->where_in(["id" => $ids])->delete("assess_usr_pwd");
    print_r($result);
    //print_r($ids);
    // $data = array();
    // $mcqId = $_POST['mcqId'];
    // for ($i=1; $i<=$num; $i++) {
    //   $username = $this->random_strings(4,"alphaNuMCaps");
    //   $password = $this->random_strings(4,"numeric");
    //   $data[]  = array ('mcq_test_id' => $mcqId,'username' => $username, 'password' => $password);
    // }

    //print_r($data);
    //$this->db->insert_batch('assess_usr_pwd', $data);

  }

  public function generateUsernamePwd($size) {

    //$params = $this->input->post();

    return strtoupper(random_string('alnum',$size));
  }
 

  public function createTest() {
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-mcq');
    $this->load->view('admin/footer');
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

 public function viewResult1() {
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

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/view-result', array('mcq' => $mcqData));
    $this->load->view('admin/footer');
 }

 public function contact() {
  $sql = "SELECT * FROM `bse_citrix` limit 2";

       // $mcq = $db2->query($sql)->row();
          
print_r($mcq); die;
 $this->load->view('admin/testcontact');
  //$this->load->view('admin/emailbody');
 }
 public function sendMail($from, $to, $subject, $data) {
 // echo "a"; die;
        $this->load->config('email');
        $this->load->library('email');
        
        //$from = "info@skillrary.com";
        // $to = $this->input->post('to');
        // $subject = $this->input->post('subject');
        // $message = $this->input->post('message');
        //$from = "info@skillrary.com";
         //$to = $this->input->post('to');
        //$subject = $this->input->post('subject');
        //$message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);

       //     $data = array(

       // 'name'=> 'Deepak Lohani',
       // 'username' => "abc",
       // 'password' => "123"

       //   );
//   $this->load->view('admin/emailbody');
// die;
        $body = $this->load->view('admin/emailbody',$data,TRUE);

        $this->email->message($body); 
        //$this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

 public function sendInvite() {

  $mcqId = $_POST['mcqId'];
  $email = $_POST['email'];
  $testDate = $_POST['testDate'];
  $testTime = $_POST['testTime'];
  $proctorId = $_POST['proctorId'];
  $assessId = $_POST['assessId'];

  $testDate = explode("/",$testDate);

  $testDate = $testDate[2]."-".$testDate[0]."-".$testDate[1];

    $data  = array (
      'mcq_test_id' => $mcqId,
      'proctor_id' => $proctorId,
      'user_email' => $email,
      'test_date' => $testDate,
      'test_time' => $testTime,
      'assess_usr_pwd_id' => $assessId
    );

     //print_r($data); die;
    $this->db->insert('proctored_mcq', $data);

  $proctoredMcqId = $this->db->insert_id();

    $data  = array (
      'assess_usr_pwd_id' => $assessId,
      'email' => $email
    );



    $this->db->insert('student_register', $data);

    $sql = "SELECT username, password from assess_usr_pwd where id = ".$assessId;

    $result = $this->db->query($sql)->row();

  //  print_r(var_dump($result)); die;

      $from = "info@skillrary.com";


      $interviewTime = explode(":",$testTime);

      $interviewTimeHour = $interviewTime[0];


      $timeA = "am";

      if ($interviewTimeHour >= 12) {
        $interviewTimeHour = $this->getTimein12Hour($interviewTimeHour);
        $timeA = "pm";
      }


      $data = array(
        "username" => $result->username,
        "password" => $result->password,
        "testDateTime" => $testDate." ". $testTime,
        "testTime" => $interviewTimeHour.":".$interviewTime[1]." ".$timeA,
        "link" => "https://assess.skillrary.com/user/new-login"
      );

      $this->updateAccessToken();
      $this->createMeeting($testDate, $testTime, $proctoredMcqId, "test");
      $this->sendMail($from,$email, "SkillRary Assessment Details", $data);

      $sql = "SELECT * from `assess_login` where id =".$proctorId;

      $result = $this->db->query($sql)->row();

      $data = array(
        "username" => $result->username,
        "password" => $result->password
      );

      //$this->sendMail($from,$result->email, "SkillRary Assessment Details", $data);

      echo "success";
    //send email
 }

 public function getTimeStamp($date, $time, $duration = null) {
//   $date = "2020-04-13";
// $time = "15:00";

$x = strtotime($date." ".$time);

// $new_time = strtotime("+3hours",$x);
// echo $new_time;
// echo "<br>";
// echo $x;
if (null !== $duration) {
  $x = strtotime("+".$duration."hours",$x);
}
return $x;
 }

 public function sendInterviewInvite() {
 
  $mcqId = 0;
  $customerId = $_POST['customerId'];
  $meetingId = $_POST['meetingId'];
  $email = $_POST['email'];
  $testDate = $_POST['testDate'];
  $testTime = $_POST['testTime'];
  $interviewerId = $_POST['interviewerId'];
  $userId = $_POST['userId'];
  $interviewMode = $_POST['interviewMode'];
  $interviewVenue = $_POST['interviewVenue'];
  $round = $_POST['round'];
  $duration = $_POST['duration'];

  $interviewTimeStamp = $this->getTimeStamp($testDate, $testTime);
  $durationTimeStamp = $this->getTimeStamp($testDate, $testTime, ($duration*2)); 

  if ($interviewMode == "1") {
    $interviewMode = "online";
  } else if ($interviewMode == "1") {
    $interviewMode = "offline";
  }

  $testDate = explode("/",$testDate);

  $testDate = $testDate[2]."-".$testDate[0]."-".$testDate[1];


  $sql = "SELECT * from `interview_details` where gotomeeting_id = $meetingId AND interview_date = '".$testDate."' AND duration_timestamp >='".$interviewTimeStamp."' order by duration_timestamp DESC";

  $interviewSchedule = $this->db->query($sql)->row();

  if (null == $interviewSchedule) {
    foreach ($interviewerId as $key => $value) {
      $data[]  = array (
        'customer_id' => $customerId,
        'gotomeeting_id' => $meetingId,
        'interview_users_id' => $userId,
        'mcq_test_id' => $mcqId,
        'interviewer_id' => $value,
        'user_email' => $email,
        'interview_date' => $testDate,
        'interview_time' => $testTime,
        'interview_mode' => $interviewMode,
        'interview_venue' => $interviewVenue,
        'round' => $round,
        'duration' => $duration,
        'interview_timestamp' => $interviewTimeStamp,
        'duration_timestamp' => $durationTimeStamp
      );
    }

    $this->db->insert_batch('interview_details', $data);

    $interviewDetailsId =  $this->db->insert_id();

    $ids = array();
    
    for ($i = 0; $i < count($interviewerId); $i++) {
        if (!$i) {
            $ids[] = $interviewDetailsId;
        } else {
            $ids[] =  $interviewDetailsId + $i;
        }
    }

    // $sql = "SELECT id FROM `student_register` where email = '".$email."'";


    //     $result = $this->db->query($sql)->row();

    //     if (null == $result) {
    //     $data  = array (
    //       'interview_users_id' => $userId,
    //       'email' => $email
    //     );

    //   $this->db->insert('student_register', $data);

    // } else {
    //   $this->db->where('email', $email);
    //   $data  = array (
    //       'interview_users_id' => $userId
    //     );sendInter

    //   $this->db->update('student_register',$data);
    // }

    $sql = "SELECT id FROM `student_register` where email = '".$email."'";
    $result = $this->db->query($sql)->row();

    if (null == $result) {
      $data  = array (
      'interview_users_id' => $userId,
      'email' => $email
      );
      $this->db->insert('student_register', $data);
    }

    $sql = "SELECT username, password from interview_users where id = ".$userId;

    $result = $this->db->query($sql)->row();

    $from = "info@skillrary.com";
    $interviewTime = explode(":",$testTime);

    $interviewTimeHour = $interviewTime[0];


    $timeA = "am";

    if ($interviewTimeHour >= 12) {
      $interviewTimeHour = $this->getTimein12Hour($interviewTimeHour);
      $timeA = "pm";
    }

    $data = array(
      "username" => $result->username,
      "password" => $result->password,
      "testDateTime" => $testDate." ". $testTime,
      "testTime" => $interviewTimeHour.":".$interviewTime[1]." ".$timeA,
      "link" => "https://assess.skillrary.com/interview/login"
    );

      $this->updateAccessToken();
      $call = "interview";
      $this->createMeeting($testDate, $testTime, $ids , $call, $meetingId, $duration);
      
      $this->sendMail($from,$email, "SkillRary Assessment Details", $data);

      $response = array ('status' => "200", "data" => "success" );
      print_r($response);
      //header('Content-Type: application/json');
      //echo json_encode( $response );
    } else {

      $interviewTime = explode(":",$interviewSchedule->interview_time);

      $interviewTimeHour = $interviewTime[0] + ($interviewSchedule->duration*2);

      $timeA = "am";

      if ($interviewTimeHour >= 12) {
        $interviewTimeHour = $this->getTimein12Hour($interviewTimeHour);
        $timeA = "pm";
      }
      //echo $interviewTimeHour; die;

      $response = array ('status' => "400", "data" => "Interview slot free after ".$interviewTimeHour.":".$interviewTime[1]." ".$timeA );
      header('Content-Type: application/json');
      echo json_encode( $response );
    }
 }

 public function getTimein12Hour($hr) {
   switch ($hr) {
     case '13':
     $hr = '01';
       # code...
       break;
 
case '14':
$hr = '02';
       # code...
       break;
       case '15':
$hr = '03';
       # code...
       break;     
       case '16':
$hr = '04';
       # code...
       break;
       case '17':
$hr = '05';
       # code...
       break;
       case '18':
$hr = '06';
       # code...
       break;
       case '19':
$hr = '07';
       # code...
       break;
       case '20':
$hr = '08';
       # code...
       break;
       case '21':
$hr = '09';
       # code...
       break;
       case '22':
$hr = '10';
       # code...
       break;
       case '23':
$hr = '11';
       # code...
       break;
     default:
       $hr = '12';
       break;
   }
   return $hr;

 }

public function generateInterviewUsrPwd($internalCall = false, $user=0, $customer=0, $group=0) {
  if (!$internalCall) {
    $num = $_POST['num'];
    $mcqId = $_POST['mcqId'];
    $group = $_POST['code'];
    $customer = $_POST['customer'];
  } else {
    $num = $user;
    $mcqId = 0;
  }
  for ($i=1; $i<=$num; $i++) {
    $username = $this->random_strings(4,"alphaNuMCaps");
    $password = $this->random_strings(4,"numeric");
    if (isset($_POST['code']) && $_POST['code'] != "") {
      $data[]  = array ('username' => $username, 'password' => $password, 'mcq_test_id' => $mcqId, 'interview_code' => $group,'interview_customer_id' => $customer);
    } else {
      $data[]  = array ('username' => $username, 'password' => $password, 'mcq_test_id' => $mcqId, 'interview_code' => $group,'interview_customer_id' => $customer);  
    }
    
  }

   

   //print_r($data); die;

  $this->db->insert_batch('interview_users', $data);
}

  public function createInterviewCustomers() {
    $sql = "SELECT DISTINCT(interview_customer_id) FROM `interview_users` WHERE interview_customer_id is NOT NULL";
    $result = $this->db->query($sql)->result_array();
    $customers = array();

    if (count($result) > 0) {
      $customerIds = "";

      foreach ($result as $key => $value) {
        if ($key == (count($result) - 1)) {
          $customerIds .= $value['interview_customer_id'];
        } else {
          $customerIds .= $value['interview_customer_id'].",";  
        }
      }
      
      $sql = "SELECT * FROM customers WHERE id IN ($customerIds)";
      $customers = $this->db->query($sql)->result_object();
    }

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/interview-customers',array('customers'=> $customers));
    $this->load->view('admin/footer');
  }


 public function createInterview() {
    /*$sql = "SELECT  interview_users.*, student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `interview_users` 
    LEFT JOIN student_register ON interview_users.id=student_register.interview_user_id
    order by interview_users.id asc";
*/

     $this->load->library("pagination");
      $customerId = $this->uri->segment(3);
      $interviewCode = $this->uri->segment(4);

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

    $config['base_url'] = base_url() . "admin/create-interview/$customerId/$interviewCode";
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 5;


             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(5)) ? $this->uri->segment(5) :0 ;
           
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
       
// echo "<pre>";
//     print_r($interview); die;
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/interview',array(
      'interviewData'=> $interview,
      'searchname'=> $searchname,
      'searchemail'=> $searchemail,
      'searchcontact'=> $searchcontact,
      'customerId' => $customerId,
      'interviewCode' => $interviewCode,
      'links' => $links
    ));
    $this->load->view('admin/footer');  
 }



 public function createInterviewSearch() {
    /*$sql = "SELECT  interview_users.*, student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `interview_users` 
    LEFT JOIN student_register ON interview_users.id=student_register.interview_user_id
    order by interview_users.id asc";
*/

    $searchname = $_GET['searchname'];
    $searchemail = $_GET['searchemail'];
    $searchcontact = $_GET['searchcontact'];

    $customerId = $this->uri->segment(3);
    $interviewCode = $this->uri->segment(4);

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

    $config['base_url'] = base_url() . "admin/create-interview-search/$customerId/$interviewCode";
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 5;
    $config['reuse_query_string'] = true;

             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(5)) ? $this->uri->segment(5) :0 ;
           
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

    // $sql = "SELECT * FROM mcq_test ";

    // $query = $this->db->query($sql);

    // $result = $query->result();

    // $interview['mcqs-list'] = $query->result();
    $sql = "SELECT id, email FROM `gotomeeting_token_details` where customer_id=$customerId ";

    $interview['meeting-id'] = $this->db->query($sql)->result_object();

    $sql = "SELECT * from `assess_login` where role= 6"; //interviewer role

    $query = $this->db->query($sql);

    $interview['interviewer-list'] = $query->result();

   
       
// echo "<pre>";
//     print_r($interview); die;
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/interview',array(
      'interviewData'=> $interview,
      'searchname'=> $searchname,
      'searchemail'=> $searchemail,
      'searchcontact'=> $searchcontact,
      'customerId' => $customerId,
      'interviewCode' => $interviewCode,
      'links' => $links
    ));
    $this->load->view('admin/footer');  
 }

  

  public function viewMcqData() {
    $mcqId = $this->uri->segment(3);


    // $pageNo = 1;
    // if (isset($_GET['page'])) {
    //   $pageNo = $_GET['page'];
    // } 
    // $offset = $pageNo*10; 
    // $page = $offset - 10;

   

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


    $config['base_url'] = base_url() . "admin/view-mcq-data/$mcqId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $mcqData['mcq-users']= $this->getAllRowsRecord($sql,$config['per_page'], $start_index);


        // $mcqData['mcq-users'] = $this->db->query($sql)->result();

        $student = $this->updateResult($mcqId);

        $failCount = $passCount = 0;
        
        foreach ($mcqData['mcq-users'] as $key => $value) {
          
          if (null === $value->studentId) {
            continue;
          }
          $result = $this->viewResult($mcqId,$value->studentId);

          $totalAptitudeMarks = 0;
          $totalAptitudeQualifyingMarks = 0;
          $totalUserAptitudeMarks = 0;
          $countMarks = 0;  
          for ($i =0; $i < count($result['Aptitude']); $i++) {
          
            
          $totalMarks = $result['Aptitude'][$i]['total_question'];                   
          $minMarks =  $result['Aptitude'][$i]['total_question']/2;
          $userMarks = $result['Aptitude'][$i]['user_ans'];

          if (null == $userMarks) {
            $countMarks += 1;

            continue;
          }
          
          if ($totalMarks < 10 ) {
              $totalMarks *= 10;
              $minMarks *= 10;    
              $userMarks *= 10;
          }
          $totalAptitudeMarks += $totalMarks;
          $totalAptitudeQualifyingMarks += $minMarks;
          $totalUserAptitudeMarks += $userMarks;
        }

        if ($countMarks == count($result['Aptitude'])) {
          continue;
        }

        //echo $totalAptitudeQualifyingMarks,",",$totalUserAptitudeMarks; die;
        if ($totalAptitudeQualifyingMarks > $totalUserAptitudeMarks) {
          $mcqData['mcq-users'][$key]->status = "FAIL";
          ++$failCount;
          if (isset($_GET['passed'])) {
            $passed = $_GET['passed'];

            if ($passed == "1") {
              if (in_array($value->studentId, $student['fail'])) {
                unset($mcqData['mcq-users'][$key]);
              }
            } 
          }
        } else {
          $mcqData['mcq-users'][$key]->status = "PASS";
          ++$passCount;
          if (isset($_GET['passed'])) {
            $passed = $_GET['passed'];
            if ($passed == "2") {
              if (in_array($value->studentId, $student['pass'])) {
                unset($mcqData['mcq-users'][$key]);
              }
            }
          } 
        }
        }
      $mcqData['mcq-users'] = array_values($mcqData['mcq-users']);

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

        $this->load->view('admin/header');
        $this->load->view('admin/sidenav');
        $this->load->view('admin/view-mcq-data', array(
          'mcq' => $mcqData,
          'links' => $links,
          'mcqId' => $mcqId

        ));
        //$this->load->view('admin/view-mcq-data');
        $this->load->view('admin/footer');
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
      where mcq_test_id= $mcqId ";

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


    $config['base_url'] = base_url() . "admin/view-mcq-data-search/$mcqId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $mcqData['mcq-users']= $this->getAllRowsRecord($sql,$config['per_page'], $start_index);


        // $mcqData['mcq-users'] = $this->db->query($sql)->result();

        $student = $this->updateResult($mcqId);

        $failCount = $passCount = 0;
        
        foreach ($mcqData['mcq-users'] as $key => $value) {
          
          if (null === $value->studentId) {
            continue;
          }
          $result = $this->viewResult($mcqId,$value->studentId);

          $totalAptitudeMarks = 0;
          $totalAptitudeQualifyingMarks = 0;
          $totalUserAptitudeMarks = 0;
          $countMarks = 0;  
          for ($i =0; $i < count($result['Aptitude']); $i++) {
          
            
          $totalMarks = $result['Aptitude'][$i]['total_question'];                   
          $minMarks =  $result['Aptitude'][$i]['total_question']/2;
          $userMarks = $result['Aptitude'][$i]['user_ans'];

          if (null == $userMarks) {
            $countMarks += 1;

            continue;
          }
          
          if ($totalMarks < 10 ) {
              $totalMarks *= 10;
              $minMarks *= 10;    
              $userMarks *= 10;
          }
          $totalAptitudeMarks += $totalMarks;
          $totalAptitudeQualifyingMarks += $minMarks;
          $totalUserAptitudeMarks += $userMarks;
        }

        if ($countMarks == count($result['Aptitude'])) {
          continue;
        }

        //echo $totalAptitudeQualifyingMarks,",",$totalUserAptitudeMarks; die;
        if ($totalAptitudeQualifyingMarks > $totalUserAptitudeMarks) {
          $mcqData['mcq-users'][$key]->status = "FAIL";
          ++$failCount;
          if (isset($_GET['passed'])) {
            $passed = $_GET['passed'];

            if ($passed == "1") {
              if (in_array($value->studentId, $student['fail'])) {
                unset($mcqData['mcq-users'][$key]);
              }
            } 
          }
        } else {
          $mcqData['mcq-users'][$key]->status = "PASS";
          ++$passCount;
          if (isset($_GET['passed'])) {
            $passed = $_GET['passed'];
            if ($passed == "2") {
              if (in_array($value->studentId, $student['pass'])) {
                unset($mcqData['mcq-users'][$key]);
              }
            }
          } 
        }
        }
      $mcqData['mcq-users'] = array_values($mcqData['mcq-users']);

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

        $this->load->view('admin/header');
        $this->load->view('admin/sidenav');
        $this->load->view('admin/view-mcq-data', array(
          'mcq' => $mcqData,
          'links' => $links,
          'mcqId' => $mcqId,
          'searchname' => $searchname,
          'searchemail' => $searchemail,
          'contactno' => $contactno,
          'searchusername' => $searchusername
        ));
        //$this->load->view('admin/view-mcq-data');
        $this->load->view('admin/footer');
  }


  public function getAllRowsRecord($sql, $start=0 ,$offset=0) {

          $sql = $sql." limit $offset ,$start";
          
          $query = $this->db->query($sql);

          $questionData = $query->result();
          return $questionData;
  }


  public function addInterviewGroup() {
    $customerId = explode('-',$_POST['customer']);

   $this->generateInterviewUsrPwd(true,$_POST['generate'],$customerId[1], $_POST['code']);
   redirect('admin/view-interview/'.$customerId[1]);
  }

  
  public function proctoredUsers() {
    $searchdate = '';
    $sql = "SELECT * FROM proctored_mcq where proctor_id = ".$_SESSION['admin_id'];

    // $query = $this->db->query($sql);

    // $result = $query->result();
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

    $config['base_url'] = base_url() . 'proctor/assignedUsers';
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    //print_r($result); die;
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/assigned-proctor-users', array(
      "users"=>$result,
      "searchdate"=>$searchdate,
      "links"=>$links

    ));
    $this->load->view('admin/footer');
  }



  public function proctoredUsersSearch() {
    $this->load->library("pagination");

    $searchdate = $_GET['searchdate'];

    $sql = "SELECT * FROM proctored_mcq where proctor_id = ".$_SESSION['admin_id']."  and test_date like '%$searchdate%'" ;

    $query = $this->db->query($sql);

    $result = $query->result();

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

    $config['base_url'] = base_url() . 'proctor/assignedUsersSearch';
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
    $config['reuse_query_string'] = true;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    //print_r($result); die;
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/assigned-proctor-users', array(
      "users"=>$result,
      "searchdate"=>$searchdate,
      "links" => $links

    ));
    $this->load->view('admin/footer');
  }


  public function assignedInterviews() {

    $this->load->library("pagination");
    $sql = "SELECT * FROM interview_details where interviewer_id = ".$_SESSION['admin_id'];

    // $query = $this->db->query($sql);

    // $result = $query->result();
    $searchdate = '';

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

    $config['base_url'] = base_url() . 'interviewer/assignedInterviews';
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/assignedInterviews', array(
      "users"=>$result, 
      'searchdate' => $searchdate,
      'links' => $links
    ));
    $this->load->view('admin/footer');
  }


  public function assignedInterviewsSearch() {

    $this->load->library("pagination");

    $searchdate = $_GET['searchdate'];

    $sql = "SELECT * FROM interview_details where interviewer_id = ".$_SESSION['admin_id']."  and interview_date like '%$searchdate%'" ;

    // $query = $this->db->query($sql);

    // $result = $query->result();

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

    $config['base_url'] = base_url() . 'interviewer/assignedInterviewsSearch';
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
    $config['reuse_query_string'] = true;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
     $this->load->view('admin/assignedInterviews', array(
      "users"=>$result, 
      'searchdate' => $searchdate,
      'links' => $links
    ));
    // $this->load->view('admin/assignedInterviews', array("users"=>$result, 'searchdate' => $searchdate));
    $this->load->view('admin/footer');
  }



public function interviewFeedback() {

 $data = array(
      'comment' => $_POST['feedback'],
      //'interview_status' => $_POST['status']
      'communication_skill' => $_POST['CommunicationSkill'],
      'problem_solving_skill' => $_POST['ProblemSolvingSkill'],
      'job_specific_skill' => $_POST['JobSpecificSkill'],
      'experience' => $_POST['exp'],
      'overall_personality' => $_POST['OverallPersonality'],
      'overall_evaluation' => $_POST['OverallEvaluation'],
      'final_decision' => $_POST['FinalStatus']

    );



 $this->db->where('id', $_POST['assessId']);
        $this->db->update('interview_details',$data);

echo "success";
}
 

  public function viewQuestion() {

      $this->load->library("pagination");

      $sql = "SELECT question_bank.id, question_bank.question, section.section_name, question_levels.level,sub_section.sub_section_name FROM `question_bank`
      INNER JOIN section on section.id = question_bank.section_id
      INNER JOIN question_levels on question_levels.id = question_bank.level_id
      INNER JOIN sub_section on sub_section.id = question_bank.sub_section_id";

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
            
            $config['base_url'] = base_url() . 'admin/view-questions';
            $config['total_rows'] = $this->getNumberOfRows($sql);
            $config['per_page'] = 10;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
              $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
         $links = $this->pagination->create_links();

          $questionData = $this->getAllRowsData($sql,$config['per_page'], $start_index);

          $this->load->view('admin/header');
          $this->load->view('admin/sidenav');


          $this->load->view('admin/view-questions',array(
            'questionData' => $questionData,
            'links' => $links,
            'section' => $section ,
            'subsection' => $subsection,
            'difficultylevel' => $difficultylevel,

            ));


      // $this->load->view('admin/view-questions', ($params));
  
    $this->load->view('admin/footer');
  }


  public function viewQuestionSearch() {
      $this->load->library("pagination");
      $section = '';
      $subsection = '';
      $difficultylevel = '';

    if ( $_GET['section'] != 0){
      $section = $_GET['section'];
      $sql = "SELECT * FROM section where id = $section ";

      $query = $this->db->query($sql);

      $result = $query->result();
      $section  = $result[0]->section_name;
    }

    if ( $_GET['subsection'] != 0)
    {
      $subsection = $_GET['subsection'];
      $sql = "SELECT * FROM sub_section where id = $subsection";
      $query = $this->db->query($sql);
      $result = $query->result();
      $subsection  = $result[0]->sub_section_name;
    }

    if (  $_GET['difficultylevel'] != 0) 
    {
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

            $config['base_url'] = base_url() . 'admin/view-questions-search';
            $config['reuse_query_string'] = true;
            $config['total_rows'] = $this->getNumberOfRows($sql);
            $config['per_page'] = 10;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
              $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
         $links = $this->pagination->create_links();

          $questionData = $this->getAllRowsData($sql,$config['per_page'], $start_index);

          $this->load->view('admin/header');
          $this->load->view('admin/sidenav');

          $this->load->view('admin/view-questions',array(
            'questionData' => $questionData,
            'links' => $links,
            'section' => $section ,
            'subsection' => $subsection,
            'difficultylevel' => $difficultylevel,

            ));
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


  public function viewTest() {

    $adminId = $_SESSION['admin_id'];
    $customerId = $this->uri->segment(3); 


    $sql = "SELECT mcq_test.id,mcq_test.is_proctored, mcq_test.title, mcq_code.code, SUM(mcq_test_pattern.total_question) as totalQuestion
            FROM mcq_test
            LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
            LEFT JOIN mcq_test_pattern on mcq_test.id=mcq_test_pattern.mcq_test_id";

    // if ($adminId > 1) {
    //   $sql .= " WHERE mcq_test.created_by = $adminId ";
    // }
    $sql .= " WHERE mcq_test.customer_id = $customerId";

    $sql .= " GROUP by mcq_test.id, mcq_test.title, mcq_code.code";



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


    $config['base_url'] = base_url() . "admin/view-mcq/$customerId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $query = $this->getAllRows($sql,$config['per_page'], $start_index);






    //echo $sql; die;
    // $query = $this->db->query($sql);

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

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/view-mcq', array(
      'mcq' => $mcq,
      'customerId' => $customerId,
      'links' => $links,
      'select_roctored' => 2
    ));
    $this->load->view('admin/footer');
  }







  public function viewTestSearch() {

    $adminId = $_SESSION['admin_id'];
    $customerId = $this->uri->segment(3); 

    $searchname = $_GET['searchname'];
    $search_mcq_code = $_GET['search_mcq_code'];
    $select_roctored = $_GET['select_roctored'];

    $sql = "SELECT mcq_test.id,mcq_test.is_proctored, mcq_test.title, mcq_code.code, SUM(mcq_test_pattern.total_question) as totalQuestion
            FROM mcq_test
            LEFT JOIN mcq_code ON mcq_test.id=mcq_code.mcq_test_id
            LEFT JOIN mcq_test_pattern on mcq_test.id=mcq_test_pattern.mcq_test_id";


    $sql .= " WHERE mcq_test.customer_id = $customerId";

    if( $searchname){
      $sql .= "   and mcq_test.title like '%$searchname%' ";
    }

    if ($search_mcq_code) {
      $sql .= "   and mcq_code.code like '%$search_mcq_code%' ";
    }


    if(($select_roctored == 0 || $select_roctored == 1) ){
      $sql .= " and mcq_test.is_proctored = $select_roctored  ";
    }

    if($select_roctored == 2){
      $sql .= " and mcq_test.is_proctored in(0, 1) ";
    }

    $sql .= " GROUP by mcq_test.id, mcq_test.title, mcq_code.code";

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


    $config['base_url'] = base_url() . "admin/view-mcq-search/$customerId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $query = $this->getAllRows($sql,$config['per_page'], $start_index);




    // $query = $this->db->query($sql);

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

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/view-mcq', array(
      'mcq' => $mcq,
      'customerId' => $customerId,
      'searchname' => $searchname,
      'search_mcq_code' => $search_mcq_code,
      'select_roctored' => $select_roctored,
      'links' => $links

    ));
    $this->load->view('admin/footer');
  }


  public function getAllRows($sql, $start=0 ,$offset=0) {

          $sql = $sql." limit $offset ,$start";
          
          $query = $this->db->query($sql);
          return $query;
  }

public function viewInterview() {
//echo "dd";
   // $adminId = $_SESSION['admin_id'];
    $customerId = $this->uri->segment(3); 

    $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();

    $sql = "SELECT DISTINCT(interview_code),count(DISTINCT(id)) as total_students FROM `interview_users` where interview_customer_id=$customerId and interview_code is not null GROUP BY interview_code";


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

    $config['base_url'] = base_url() . "admin/view-interview/$customerId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    // $result = $this->db->query($sql)->result_object();


    $interviewcode = '';
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/view-interview', array(

      'customer'=> $customerName->customer_name,
      'interview' => $result,
      'customerId' => $customerId,
      'interviewcode' => $interviewcode,
      'links' => $links

    ));

    //$this->load->view('admin/view-mcq-data');
    $this->load->view('admin/footer');
   // $this->load->view('admin/view-mcq.php', array('mcq'=>$mcq));
  }


public function viewInterviewSearch() {

    $customerId = $this->uri->segment(3); 

    $interviewcode = $_GET['interviewcode'];

    $sql  = "SELECT customer_name from customers where id = $customerId";
    $customerName = $this->db->query($sql)->row();

    $sql = "SELECT DISTINCT(interview_code),count(DISTINCT(id)) as total_students
    FROM interview_users 
    where interview_customer_id=$customerId
    and interview_code is not null
    and interview_code like '%$interviewcode%'
    GROUP BY interview_code";

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

    $config['base_url'] = base_url() . "admin/view-interview-search/$customerId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    // $result = $this->db->query($sql)->result_object();

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/view-interview', array(
      'customer'=> $customerName->customer_name,
      'interview' => $result,
      'customerId' => $customerId,
      'interviewcode' => $interviewcode,
      'links' => $links
    ));   

    $this->load->view('admin/footer');


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
    //print_r($result->result);

    $data  = array ('mcq_test_id' => $_POST['mcqId'], 'code_id' => $result->result);

    $this->db->insert('mcq_code_test', $data);
    die;

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

  public function generateUsrPwd() {
    
    $data = array();
    $mcqId = $_POST['mcqId'];
    $sql = "SELECT customer_code from customers where id = (SELECT customer_id from mcq_test where id = $mcqId)";
    $result = $this->db->query($sql)->row();
    $customerCode = $result->customer_code;
    $instance = INSTANCE;
    $num = $_POST['num'];
    for ($i=1; $i<=$num; $i++) {
      $username = $customerCode."_".$instance."_".$this->random_strings(4,"alphaNuMCaps");
      $password = $this->random_strings(4,"numeric");
      $data[]  = array ('mcq_test_id' => $mcqId,'username' => $username, 'password' => $password);
    }

    //print_r($data);
    $this->db->insert_batch('assess_usr_pwd', $data);

  }

  public function addTest() {

              //echo var_dump(); die;

                $title = $_POST['test-title'];
                $type = $_POST['test-type'];

                //$check_mcq_test_id = $_POST['check_mcq_test_id'];
                $check_mcq_test_id = isset($_POST['check_mcq_test_id']) ? $_POST['check_mcq_test_id'] : 0 ;
                // $check_drive_id = $_POST['check_drive_id'];
                $check_drive_id = isset($_POST['check_drive_id']) ? $_POST['check_drive_id'] : 0;

                $isProctored = $_POST['is-proctored'];
                $customerCode = explode("-",$_POST['customer-code']); //change to customer id

                $data = array(
                  'title' => $title,
                  'type' => $type,
                  'customer_id' => $customerCode[1],
                  'is_proctored' => $isProctored
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

                      // $this->db->insert('drive-details', $data);                  
                    }
                }

                echo $testId;


                // $this->db->insert('mcq_test', $data);


                // $testId = $this->db->insert_id();

                // $code = $this->getCode();

                // $data = array(
                //         'mcq_test_id' => $testId,
                //         'code' => $code
                // );

                // $this->db->insert('mcq_code', $data);

                // if (strlen(trim($_POST['drive-date'])) > 0) {
                //   $data = array(
                //     'mcq_test_id' => $testId,
                //     'drive_date' =>trim($_POST['drive-date']),
                //     'drive_time' =>trim($_POST['drive-time']),
                //     'drive_place' =>trim($_POST['drive-place'])

                //   );

                //   $this->db->insert('drive_details', $data);                  
                // }


                // echo $testId;
        }



 //  public function addTest() {
 // $title = $_POST['test-title'];
 //    $type = $_POST['test-type'];

 //    $check_mcq_test_id = $_POST['check_mcq_test_id'];

 //    $check_drive_id = $_POST['check_drive_id'];


 //    $isProctored = $_POST['is-proctored'];
 //    $customerCode = explode("-",$_POST['customer-code']); //change to customer id


 //    $data = array(
 //            'title' => $title,
 //            'type' => $type,
 //            'customer_id' => $customerCode[1],
 //            'is_proctored' => $isProctored,
 //            'created_by' => $_SESSION['admin_id']
 //    );

 //    $this->db->insert('mcq_test', $data);


 //    $testId = $this->db->insert_id();

 //    $code = $this->getCode();

 //    $data = array(
 //            'mcq_test_id' => $testId,
 //            'code' => $code
 //    );

 //    $this->db->insert('mcq_code', $data);

 //    if (strlen(trim($_POST['drive-date'])) > 0) {
 //      $data = array(
 //        'mcq_test_id' => $testId,
 //        'drive_date' =>trim($_POST['drive-date']),
 //        'drive_time' =>trim($_POST['drive-time']),
 //        'drive_place' =>trim($_POST['drive-place'])

 //      );

 //                if ($check_mcq_test_id != 0) {
 //                    $data = array(
 //                        'title' => $title,
 //                        'type' => $type
 //                    );
                    
 //                    $this->db->where('id', $check_mcq_test_id);
 //                    $this->db->update('mcq_test',$data);
 //                    $testId = $check_mcq_test_id;
 //                } else {    
 //                    $this->db->insert('mcq_test', $data);
 //                    $testId = $this->db->insert_id();

 //                    $code = $this->getCode();

 //                    $data = array(
 //                            'mcq_test_id' => $testId,
 //                            'code' => $code
 //                    );

 //                    $this->db->insert('mcq_code', $data);




 //                    if (strlen(trim($_POST['drive-date'])) > 0) {


 //                        $data = array(
 //                          'mcq_test_id' => $testId,
 //                          'drive_date' =>trim($_POST['drive-date']),
 //                          'drive_time' =>trim($_POST['drive-time']),
 //                          'drive_place' =>trim($_POST['drive-place'])

 //                        );


 //                        if ($check_drive_id != 0) {


 //      $this->db->insert('drive_details', $data);                  
 //    }

 //    echo $testId;
 //  }

 //                            $this->db->where('id', $check_drive_id);
 //                            $this->db->update('drive-details',$data);
 //                        } else {  
 //                          $this->db->insert('drive_details', $data);

 //                        }

 //                      // $this->db->insert('drive-details', $data);                  
 //                    }
 //                }

 //                echo $testId;


 //                // $this->db->insert('mcq_test', $data);


 //                // $testId = $this->db->insert_id();

 //                // $code = $this->getCode();

 //                // $data = array(
 //                //         'mcq_test_id' => $testId,
 //                //         'code' => $code
 //                // );

 //                // $this->db->insert('mcq_code', $data);

 //                // if (strlen(trim($_POST['drive-date'])) > 0) {
 //                //   $data = array(
 //                //     'mcq_test_id' => $testId,
 //                //     'drive_date' =>trim($_POST['drive-date']),
 //                //     'drive_time' =>trim($_POST['drive-time']),
 //                //     'drive_place' =>trim($_POST['drive-place'])

 //                //   );

 //                //   $this->db->insert('drive_details', $data);                  
 //                // }


 //                // echo $testId;
 //        }

                public function addTestTime() {
                 $mcqId = $_POST['mcqId'];

                $sql = " SELECT customer_id FROM mcq_test where id = $mcqId";

                $query = $this->db->query($sql);
                $customerId = $query->result()[0]->customer_id;

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
                    $p['customer_id'] = $customerId;


                    $patternData[] = $p;





                      // if ($check_exist_id[$i] != 0) {
                      //    $tt = array (
                      //         'section_id' => $sectionIds[$i],
                      //         'completion_time' => $totalTime[$i],
                      //         'total_question' => $totalQuestion[$i]
                      //     );
                      //     $this->db->where('id', $check_exist_id[$i]);
                      //     $this->db->update('mcq_time',$tt);
                      // } else {    
                        $this->db->insert('mcq_time', $t);
                        $this->db->insert('mcq_test_pattern', $p);
                      // }


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

                // $this->db->insert_batch('mcq_time', $data);


                // $this->db->insert_batch('mcq_test_pattern', $patternData);
        }












 public function editTestTime() {
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

                $check_exist_id = explode(",",$_POST['check_exist_id']);


                for($i=0; $i < $totalSection; $i++) {
                    $t = array (
                        'mcq_test_id' => $mcqId,
                        'section_id' => $sectionIds[$i],
                        'completion_time' => $totalTime[$i],
                        'total_question' => $totalQuestion[$i]
                    );

                    // $p = $t;
                    // $p['level_id'] = "1";
                    // $p['sub_section_id'] = "1";

                   
                      if ($check_exist_id[$i] != 0) {
                         $tt = array (
                              'section_id' => $sectionIds[$i],
                              'completion_time' => $totalTime[$i],
                              'total_question' => $totalQuestion[$i]
                          );
                          $this->db->where('id', $check_exist_id[$i]);
                          $this->db->update('mcq_time',$tt);
                      } else {    
                        $this->db->insert('mcq_time', $t);
                        // $this->db->insert('mcq_test_pattern', $p);
                      }


                }

        }

















        public function viewCodeTest() {
          $this->load->view('codeframe');
        }

        public function adminLogin() {
          //$this->load->view('admin/admin-login');

          $sessionId = $this->session->userdata('admin_id');


          if($sessionId) {
            redirect('admin/create-test');
          }
          else{
            $this->load->view('admin/admin-login');
          }
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
          $this->load->view('admin/header');
          $this->load->view('admin/sidenav');
          $this->load->view('admin/create-question');
          $this->load->view('admin/footer');
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
          
          if (isset($_SESSION['customerId'])) {
            $customerId = $_SESSION['customerId'];
            $sql = "SELECT * FROM `section` where customer_id = $customerId";  
          }

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


        public function getQuestionLevel() {
          $sql = "SELECT * FROM `question_levels`";
          $query = $this->db->query($sql);

          $i = 0;
          $questionLevelData = array();
          foreach ($query->result() as $row) {
                  $questionLevelData[$i]['id'] = $row->id;
                  $questionLevelData[$i]['level'] = $row->level;
                  $i++;
          }
          print_r(json_encode($questionLevelData));
        }

        

        public function getTotalQuestion() {
          $sectionId = $_POST['Id'];

          $customer_code = $this->getCustomerCode();

          if ($customer_code != 'no') {
            $sql = "SELECT count(id) as total_question FROM question_bank_$customer_code question_bank where section_id=$sectionId";
          }else{
            $sql = "SELECT count(id) as total_question FROM `question_bank` where section_id=$sectionId";
          }


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

    if(isset($_SESSION['customerId'])) {
      $qdata['customer_id'] = $_SESSION['customerId'];
    }

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
               // redirect('user/login', 'refresh');
redirect($_SERVER['HTTP_REFERER']);  

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

    if (isset($_SESSION['customerId'])) {
      $qdata['customer_id'] = $_SESSION['customerId']; 
    }


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

        $filter = $this->uri->segment(4);
        
        $sql = "SELECT DISTINCT(student_id) FROM `student_answers` where mcq_test_id =".$mcqId;

        $query = $this->db->query($sql);


        $result = array();

        $i = 0;

        $sectionDetails = $this->getMcqSection($mcqId);

        //$codingDetails = $this->getCodingDetails($mcqId);

        $sectionDetails['mcqId'] = $mcqId; 
        $studentData = array();
              
        if($query->num_rows() > 0)  {
            //$student = $this->updateResult($mcqId);
           // print_r($student['fail']); die;
            
            if ($filter == "1") {
              $student = $this->updateResult($mcqId);
              
              $studentIds = $student['pass'];
            } else if ($filter == "2") {
              $student = $this->updateResult($mcqId);
              
              $studentIds = $student['fail'];
            } else {
              $studentIds = $query->result();
            }
            //foreach ($student['pass'] as $key => $student) {
            foreach ($studentIds as $row) {
              if ($filter == "0") {
                $studentId = $row->student_id;
              } else {
                $studentId = $row;
              }
              //$studentId = $student;
              $sql = "SELECT * FROM `student_register` WHERE id=".$studentId;

              $student = $this->db->query($sql)->row();

              $sectionCount = 0;
              $sqll = "";

              
              foreach ($sectionDetails['section'] as $key => $value) {

                if ($sectionCount > 0) {
                  $sqll .= " UNION ALL ";
                }
                
                $sqll .= "select count(id) as result from `student_answers` where test_attempt = (select max(test_attempt) from student_answers where student_id =".$studentId." and mcq_test_id=".$mcqId.") and student_id= ".$studentId." and mcq_test_id=".$mcqId." and section_id=".$value['id']." and correct_ans = 1";
                            
                $sectionCount++;
              }

              $query = $this->db->query($sqll);
                
              foreach ($query->result() as $key => $row) {

                $sec = $sectionDetails['section'][$key]['name'];
                $v = $row->result;
                $student->$sec = $v;
              } 

             

              
                // $codeSql = "SELECT * from code_results where user_id =".$studentId;


                // $query = $this->db->query($codeSql);
                // $codeQuestion = 1;
                // $isCode = 0;
                // foreach ($query->result() as $key => $row) { 

                //   $status = 'program'.$codeQuestion."status";
                //   $student->$status = $row->status;
                  
                //   $q = 'program'.$codeQuestion."time_taken";
                //   $student->$q = $row->time_taken;

                //   if($row->lang_id == 1){
                //       $lng = 'program'.$codeQuestion."language";
                //       $student->$lng = 'Java';
                //   }

                //   if($row->lang_id == 2){
                //       $lng = 'program'.$codeQuestion."language";
                //       $student->$lng = 'Python';
                //   }

                //   $lc = 'program'.$codeQuestion."line_count";
                //   $student->$lc = $row->line_count;

                //   $cc = 'program'.$codeQuestion."compile_count";
                //   $student->$cc = $row->compilation_counter;

                 
                //   $codeQuestion++;
                //   $isCode = 1;
                // } 

                // if (!$isCode) {
                //   for ($codeQno = 1; $codeQno <= 2; $codeQno++) {

                //     $status = 'program'.$codeQno."status";  
                //     $student->$status = 0;

                //     $q = 'program'.$codeQno."time_taken";
                //     $student->$q = 0;

                //     $lng = 'program'.$codeQno."language";
                //     $student->$lng = 0;

                //     $lc = 'program'.$codeQno."line_count";
                //     $student->$lc = 0;

                //     $cc = 'program'.$codeQno."compile_count";
                //     $student->$cc = 0;
                    
                //   }                  
                // }

            $studentData[$i] = $student;
            $i++;
            }
        }
     
   $this->generateXls($studentData, $sectionDetails);
      }


  //     public function getField($a) {

  //       switch ($a) {
  //           case 'Q':
    // return "R";
    // break;
  //     case 'R':
  //               return "S"; 
    // break;
   //    case 'S':
  //               return "T"; 
    // break;
   //    case 'T':
  //               return "U"; 
  //               break;
   //    case 'U':
  //               return "V"; 
    // break;
   //    case 'V':
  //               return "W"; 
  //               break;
  //           case 'W':
  //               return "X"; 
  //               break;

  //           case 'Q1':
  //          return "R1";
  //           break;
  //           case 'R1':
  //           return "S1";
  //           break;

  //           case 'S1':
  //           return "T1";
  //           break;

  //           case 'U1':
  //           return "V1";
  //           break;
  //           case 'V1':
  //           return "W1";
  //           break;
  //           case 'W1':
  //           return "X1";
  //           break;

          
  //         default:
  //           return "Z1";
  //           break;
  //       }

  //     }
      public function getField($a) {

        switch ($a) {
    case 'Q': return "R";
              break;
    case 'R': return "S"; 
              break;
    case 'S': return "T"; 
              break;
    case 'T':  return "U"; 
              break;
    case 'U':  return "V"; 
              break;
    case 'V':  return "W"; 
              break;
    case 'W':  return "X"; 
              break;
    case 'Q2': return "R2";
              break;
    case 'R2':  return "S2";
                break;
    case 'S2':  return "T2";
                break;
    case 'S':  return "T";
                break;
    case 'U':  return "V";
                break;
    case 'V':  return "W";
                break;
    case 'W':  return "X";
                break;
     case 'X':  return "Y";
                break;
     case 'Y':  return "Z";
                break;

       case 'Z':  return "AA";
                break;
       case 'AA':  return "AB";
                break;


       case 'AB':  return "AC";
                break;


       case 'AC':  return "AD";
                break;

        case 'AD':  return "AE";
                break;
        case 'AE':  return "AF";
                break;
          
    default: echo $a; die;return "AG";
              break;
        }

      }

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

        public function generateXls($studentData, $sectionDetails) {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('SkillRary Result');

        $objPHPExcel->getActiveSheet()->mergeCells("A1:Q1");
        $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Personal Details');


      $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        )
    );

      $objPHPExcel->getActiveSheet()->getStyle("A1:Q1")->applyFromArray($style);
      $objPHPExcel->getActiveSheet()->getStyle('A2:AC2')->getFont()->setBold(true);
      // set Header
      $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sl No');

      $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Student Name');

      $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Test Status');

      $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Gender');

      $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Date of Birth');

      $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Mobile');

      $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Email');

      $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'X-Board');

      $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'X-Passing Year');

      $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'X-Marks');


      $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'XII-Board');

      $objPHPExcel->getActiveSheet()->SetCellValue('L2', 'XII-Passing Year');

      $objPHPExcel->getActiveSheet()->SetCellValue('M2', 'XII-Marks');

      $objPHPExcel->getActiveSheet()->SetCellValue('N2', 'College');

      $objPHPExcel->getActiveSheet()->SetCellValue('O2', 'Batch');

      $objPHPExcel->getActiveSheet()->SetCellValue('P2', 'Branch, Degree');

      $objPHPExcel->getActiveSheet()->SetCellValue('Q2', 'Degree Marks');
        

        // $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Start Time');

        //$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'End Time');

        // $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Time Taken');


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

        $a = "Q2";

        $objPHPExcel->getActiveSheet()->mergeCells("G1:I1");

        foreach ($sectionDetails['section'] as $key => $value) {

          $fieldName = $this->getField($a);

          $objPHPExcel->getActiveSheet()->SetCellValue($fieldName, $value['name']." Marks");

          $a = $fieldName;


        }



        

         
// change the cell column ...make it dynamic as per section

        $objPHPExcel->getActiveSheet()->mergeCells("T1:X1");
         $objPHPExcel->getActiveSheet()->getStyle('T1:X1')->getFont()->setBold(true);

    

      $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        )
    );

      $styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => 'black'),
        ),
    ),
);
    $objPHPExcel->getActiveSheet()->getStyle('A1:AC6')->applyFromArray($styleArray);

    $codeTest = $this->isCodeTestAvailable($sectionDetails['mcqId']);

    if ($codeTest) {
    $objPHPExcel->getActiveSheet()->getStyle("T1:X1")->applyFromArray($style);

    $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Code Test Program 1');
    $objPHPExcel->getActiveSheet()->SetCellValue('T2', 'Program 1 status');
    $objPHPExcel->getActiveSheet()->SetCellValue('U2', 'timeTaken');
    $objPHPExcel->getActiveSheet()->SetCellValue('V2', 'language');
    $objPHPExcel->getActiveSheet()->SetCellValue('W2', 'lineCount');
    $objPHPExcel->getActiveSheet()->SetCellValue('X2', 'compilationCounter');

    $objPHPExcel->getActiveSheet()->mergeCells("Y1:AC1");
    $objPHPExcel->getActiveSheet()->getStyle('Y1:AC1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Code Test Program 2');

    $objPHPExcel->getActiveSheet()->SetCellValue('Y2', 'Program 2 status');
    $objPHPExcel->getActiveSheet()->SetCellValue('Z2', 'timeTaken');
    $objPHPExcel->getActiveSheet()->SetCellValue('AA2', 'language');
    $objPHPExcel->getActiveSheet()->SetCellValue('AB2', 'lineCount');
    $objPHPExcel->getActiveSheet()->SetCellValue('AC2', 'compilationCounter');
          
    }
      


        

        // $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Verbal Correct Answer');
        // $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Resoning Correct Answer');
        // $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Quantitative Correct Answer');

        // set Row
        $rowCount = 3;
        $i = 1;
        foreach ($studentData as $student) {

    if ($student->gender == "1") {
      $genderValue = "Male";
    } else {
      $genderValue = "Female";
    }
//$marks = 0;

// foreach ($sectionDetails['section'] as $key => $value) {
//           $sectionName = $value['name']; 

//            $marks += $student->$sectionName;
//         }
// $status = "Failed";
// if ($marks >= 15) {
// $status = "Passed";
// }

$result = $this->viewResult($sectionDetails['mcqId'],$student->id);
$totalAptitudeMarks = $totalAptitudeQualifyingMarks = $totalUserAptitudeMarks = 0;

$totalMarks = $result['Aptitude'][0]['total_question'];                   
$minMarks =  $result['Aptitude'][0]['total_question']/2;
$userMarks = $result['Aptitude'][0]['user_ans'];

if ($totalMarks < 10 ) {
    $totalMarks *= 10;
    $minMarks *= 10;    
    $userMarks *= 10;
}
$totalAptitudeMarks += $totalMarks;
$totalAptitudeQualifyingMarks += $minMarks;
$totalUserAptitudeMarks += $userMarks;

//echo $totalAptitudeQualifyingMarks,",",$totalUserAptitudeMarks; die;
if ($totalAptitudeQualifyingMarks > $totalUserAptitudeMarks) {
$status = "Failed";
} else {
$status = "Passed";
}

$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount,  $student->first_name." ".$student->last_name);
$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $status);
$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $genderValue );
$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $student->dob);
$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $student->contact_no);
$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $student->email);

$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $student->tenth_board);

$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $student->tenth_passing_year);
$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $student->tenth_percentage);

$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $student->twelveth_board);

$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $student->twelveth_passing_year);
$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $student->twelveth_percentage);
$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $student->degree_college_name);
$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $student->degree_passing_year);
$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $student->stream.",".$student->degree);
$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $student->degree_percentage);



                                                    

$a = "Q";
foreach ($sectionDetails['section'] as $key => $value) {
  $sectionName = $value['name']; 

  $fieldName = $this->getField($a);

  $objPHPExcel->getActiveSheet()->SetCellValue($fieldName. $rowCount, $student->$sectionName);

  $a = $fieldName;
}





  // for($k=1;$k<3;$k++){
  //   $fieldName = $this->getField($a);


  //   $a = $fieldName;

  //   $st = "program".$k."status";
     
  //   $objPHPExcel->getActiveSheet()->SetCellValue($a. $rowCount, $student->$st);
  //   $tt = 'program'.$k."time_taken";
  //   $fieldName = $this->getField($a);

   
  //   $a = $fieldName;
  //   $objPHPExcel->getActiveSheet()->SetCellValue($a. $rowCount, $student->$tt);
  //   $sl = 'program'.$k."language";
  //   $fieldName = $this->getField($a);

   
  //   $a = $fieldName;
   
  //   $objPHPExcel->getActiveSheet()->SetCellValue($a. $rowCount, $student->$sl);
  //   $lc = 'program'.$k."line_count";
  //   $fieldName = $this->getField($a);

   
  //   $a = $fieldName;
  //   $objPHPExcel->getActiveSheet()->SetCellValue($a. $rowCount, $student->$lc);
  //   $coc = 'program'.$k."compile_count";
  //   $fieldName = $this->getField($a);

   
  //   $a = $fieldName;
  //   $objPHPExcel->getActiveSheet()->SetCellValue($a. $rowCount, $student->$coc);

  //   // $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'timeTaken');
    
  //   // $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'langId');
    
  //   // $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'lineCount');
    
  //   // $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'compilationCounter');
  // }

//die;

  $rowCount++;
  $i++;
        }

        // $filename = "skillrary_mcq". date("Y-m-d-H-i-s").".csv";
        // header('Content-Type: application/vnd.ms-excel'); 
        // header('Content-Disposition: attachment;filename="'.$filename.'"');
        // header('Cache-Control: max-age=0'); 
        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        // $objWriter->save('php://output'); 
/*
       $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="SkillRary Data.xlsx"');
      $object_writer->save('php://output');
*/
      $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="SkillraryReport.xls"');
      $object_writer->save('php://output');
 
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
            $sql = "SELECT customer_code from customers where id = (SELECT customer_id from mcq_test where id = $mcqId)";
            $result = $this->db->query($sql)->row();
            $customerCode = $result->customer_code;
            $instance = INSTANCE;

            $username = $customerCode."_".$instance."_".$this->random_strings(4,"alphaNuMCaps");
            $data = array (
              //'username' => $this->generateUsernamePwd(4),
              'username' => $username,
              'password' => $this->generatePassword()
            );  
            $this->session->set_userdata('username', $data);  
          }          

          $username = $_SESSION['username']['username'];
          $password = $_SESSION['username']['password'];

          $userData  = array ('mcq_test_id' => $mcqId,'username' => $username, 'password' => $password);

          $this->db->insert('assess_usr_pwd', $userData);

          $userId = $this->db->insert_id();

          $_SESSION['assessId'] = $userId;
          
          redirect('user/create/profile');

           //$this->createUserProfile();           

      } else {
       // echo "code is invalid";
        $this->session->set_flashdata('error', 'Please enter valid code');
                redirect('user/new-login', 'refresh');
      }
  }




  public function createUserProfile () {
  //print_r($_SESSION); die;
  $userData = array();
  if (isset($_SESSION['assessId'])) {
                  $sql = "SELECT user_email FROM `proctored_mcq` WHERE assess_usr_pwd_id= ".$_SESSION['assessId'];

              $userEmail = $this->db->query($sql)->row();
        if (isset($userEmail->user_email)) {
    $userData['email']=  $userEmail->user_email;
       }
  }


    $this->load->view('user-header');
    $this->load->view('user-profile', array('userData' => $userData));
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
         public function checkLogin() {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `assess_login` where username = '$login' and password='$password' and is_active='1'";

    $query = $this->db->query($sql);

   $query =  $query->result_object();



   if($query){
       $id = $query[0]->id;
    //  echo $role =  $query[0]->role;
    //   echo  $username =  $query[0]->username;
    //    echo $password =  $query[0]->password;
    //     echo  $is_active =  $query[0]->is_active;


 // if(isset($check[0]->id)){
 //          Session::put('traineradmin', $username);
 //          return redirect('/dashboard');

 //          redirect('user/create/profile');
 //      }
 //      else{
 //        return back()->with('error', 'Wrong Login Details');
 //      } 


        if(isset($id)){
          $this->session->set_userdata('admin_id', $id);
          $this->session->set_userdata('role_id', $query[0]->role);
        // $SessionId = $this->session->userdata('id');
          if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
           redirect('admin/create-test');
          
          } else if ($_SESSION['role_id'] == 7) {
            redirect('proctor/assignedUsers');
          } else if ($_SESSION['role_id'] == 6) {
            redirect('interviewer/assignedInterviews');
          }

        } else{
            redirect('admin/login');
         }

   



  } else { redirect('admin/login'); }
}
 

  public function logout() {

      $this->session->sess_destroy();
      redirect('admin/login');
  }

    public function editTest() {

        $questionId = $this->uri->segment(3);

        $sql = "SELECT id as mcq_test_id, title as mcq_test_title, type as mcq_test_type 
                FROM mcq_test
                where id = $questionId";
        $query = $this->db->query($sql);

        $mcq_test_data = $query->result();
      // var_dump($mcq_test_data[0]->mcq_test_title);
      //           var_dump($mcq_test_data[0]->mcq_test_type);

        $sql = "SELECT id as drive_id, drive_date as drive_drive_date, drive_time 
                as drive_drive_time, drive_place as drive_drive_place
                FROM `drive_details` as drive
                where  mcq_test_id = $questionId";

        $query = $this->db->query($sql);

        $drive_data = $query->result();
                
        $sql = "SELECT mcq_time.id as mcq_time_id, mcq_test_id as mcq_time_mcq_test_id, section_id as mcq_time_section_id , 
                total_question as mcq_time_total_question , completion_time as mcq_time_completion_time,
                section.id as section_id, section_name
                FROM mcq_time 
                inner join 
                section section
                on mcq_time.section_id  =  section.id
                where mcq_test_id= $questionId";

        $query = $this->db->query($sql);

        $mcq_time_data = [];

        foreach ($query->result() as $key => $value) {
          $mcq_time_data[$key]['mcq_time_id']= $value->mcq_time_id;
          $mcq_time_data[$key]['mcq_time_mcq_test_id']= $value->mcq_time_mcq_test_id;
          $mcq_time_data[$key]['mcq_time_section_id']= $value->mcq_time_section_id;
          $mcq_time_data[$key]['mcq_time_total_question']= $value->mcq_time_total_question;
          $mcq_time_data[$key]['mcq_time_completion_time']= $value->mcq_time_completion_time;
          $mcq_time_data[$key]['section_id']= $value->section_id;
          $mcq_time_data[$key]['section_name']= $value->section_name;
                
        } 

        $sql = "SELECT total_question 
                FROM mcq_test_pattern mtp
                inner join section sec
                on sec.id = mtp.section_id
                where mtp.mcq_test_id=$questionId";

        $query = $this->db->query($sql);

        $get_total_question = [];

        foreach ($query->result() as $key => $value) {
          $get_total_question[$key]['total_question']= $value->total_question;
        } 



        $this->load->view('admin/header');
        $this->load->view('admin/sidenav');
   
        $this->load->view('admin/edit-test', array('mcq_test_data' => $mcq_test_data, 'drive_data' => $drive_data, 'mcq_time_data' => $mcq_time_data , 'get_total_question' => $get_total_question));
        $this->load->view('admin/footer');

    }

    

    // public function editTestsave()
    // {


    //    echo $testId = $_POST['testId'];
    //    echo  $mcq_name_title = $_POST['mcq_name_title'];

    //  echo $mcq_code = $_POST['mcq_code'];
    //         echo $total_section = $_POST['total_section'];
    //    echo  $password = $_POST['password'];


    //   echo "string";
    // }

  public function fetchCustomer() {

    $customerCode = $_POST['customerCode'];

    $sql = "SELECT * from customers where customer_code like '%".$customerCode."%'";
    $result = $this->db->query($sql)->result_object();

    $output = '<ul class="auto-customer">';
    if (count($result) > 0) {    
      foreach($result as $row) {
        $output .= '
        <li>'.ucfirst($row->customer_name).'-'.$row->id.'</li>
        ';
      }
    } 
    // else {
    //   $output .= '<li>Invalid Code</li>';
    // }

    $output .= '</ul>';
  
    echo $output;
  }
  

  public function uploadGotomeeting() {
    $sql = "SELECT id,user_email,starttime, endtime, meeting_id from interview_details where is_uploaded = 3 and starttime is not null";
    $interview = $this->db->query($sql)->result_object();
    
    $meetingEmail = "trainer111@qspiders.com"; 
    
    $sql = "SELECT access_token FROM `gotomeeting_token_details` where email='".$meetingEmail."'";
    $meeting = $this->db->query($sql)->row();
    $headers = array(
            'Content-Type: application/json',
            "accept: application/json",
            "Authorization: ".$meeting->access_token,
    );

    foreach ($interview as $key => $value ){
      $fileName = explode("@", $value->user_email);
      $starttime = $value->starttime;
      $endtime = $value->endtime;
      $url = "https://api.getgo.com/G2M/rest/historicalMeetings?startDate=$starttime&endDate=$endtime";
      $curl = curl_init();
//echo $starttime; die;
      echo $url; die;
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => $headers,
      ));
      echo "<pre>";
//print_r($headers); die;
      $response = curl_exec($curl);
 //print_r($response); die;
      curl_close($curl);
      echo "<pre>";
      $result = json_decode($response, true);
     
      if (count($result) > 0 && isset($result[0]['recording']['downloadUrl'])) {
        $client = new Vimeo("dfe4d40e1b610f1fc70286ddc017e53e039e7984", "0tyi2RmRxGpejcv3bcsnRFE/b3HT7Y9LOBYJnkODQlSOXuj/StlNqbevYWBThVZMeNd7qKH6Gkjb+AYfNuRJzHSTZimT3QYpj3ubkwFPM68q106nh3j/znAo26wGBMUq", "d598a2fbacd583051d3b80065915e95d");
          $file_name = $result[0]['recording']['downloadUrl'];
          $videoName = $fileName[0]."_skillrary_interview";
          $video_response = $client->request(
                            '/me/videos',
                            [
                                'upload' => [
                                    'approach' => 'pull',
                                    'link' => $videoName

                                ],
                                "name" => "My video"
                            ],
                            'POST'
                        );
          $vimeoLink = $video_response['body']['link'];

          $data = array ("vimeo_link" => $vimeoLink, "is_uploaded" => 1);
          

      } else {
        //is_uploaded = 2 //  not recorded
        $data = array ("vimeo_link" => "", "is_uploaded" => 2);
      }
      $this->db->where('id', $value->id);
      $this->db->update('interview_details',$data);
    }
    echo "success";
  }

// public function upload($video_name) {
//   $configVideo['upload_path'] = 'uploads'; # check path is correct
// $configVideo['max_size'] = '102400';
// $configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
// $configVideo['overwrite'] = FALSE;
// $configVideo['remove_spaces'] = TRUE;
// $video_name = random_string('numeric', 5);
// $configVideo['file_name'] = $video_name;

// $this->load->library('upload', $configVideo);
// $this->upload->initialize($configVideo);

// if (!$this->upload->do_upload('uploadan')) # form input field attribute
// {
//     # Upload Failed
//     $this->session->set_flashdata('error', $this->upload->display_errors());
//     redirect('controllerName/method');
// }
// else
// {
//   echo "success"; die;
// }
// }
// public function download($filename = NULL) {

//   // load download helder
//     $this->load->helper('download');
//     // read file contents
//     //$data = file_get_contents(base_url('/uploads/'.$filename));
//     $data = file_get_contents($filename);

//     //$data = readfile($filename);
//     force_download("test.mp4", $data);
// }

  public function updateResult($mcqId) {
   // $mcqId = $this->uri->segment(3);
    $sql = "SELECT  assess_usr_pwd.*, student_register.id as studentId,student_register.first_name, student_register.last_name, student_register.email, student_register.contact_no from `assess_usr_pwd` 
               LEFT JOIN student_register ON assess_usr_pwd.id=student_register.assess_usr_pwd_id
        where mcq_test_id= $mcqId
        order by assess_usr_pwd.id asc";

        $query = $this->db->query($sql);
        $mcqData['mcq-users'] = $query->result();
//echo '<pre>'; print_r(var_dump($mcqData)); die;
        $failCount = $passCount = 0;
        $failStudent = array();
        $passStudent = array();
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
          $failStudent[] =  $value->studentId;
          ++$failCount;
        } else {
          $mcqData['mcq-users'][$key]->status = "PASS";
          ++$passCount;
          $passStudent[] =  $value->studentId;
        }
        }

        $studentResult['pass'] = $passStudent;
        $studentResult['fail'] = $failStudent;
        return $studentResult;
  }

  public function isCodeTestAvailable($mcqId) {
    $sql = "SELECT id , code_id from mcq_code_test where mcq_test_id = $mcqId";

    $result = $this->db->query($sql)->row();
    $isAvailable = 0;
    if (null !== $result ) {
      if (null !== $result->code_id) {
        $isAvailable = 1;
      }
    }
    return $isAvailable;
  }


  public function createMeetingCredentials() {
    $sql = "SELECT DISTINCT(interview_customer_id) FROM `interview_users` WHERE interview_customer_id is NOT NULL";
    $result = $this->db->query($sql)->result_array();
    $customers = array();

    if (count($result) > 0) {
      $customerIds = "";

      foreach ($result as $key => $value) {
        if ($key == (count($result) - 1)) {
          $customerIds .= $value['interview_customer_id'];
        } else {
          $customerIds .= $value['interview_customer_id'].",";  
        }
      }
      
      // $sql = "SELECT * FROM gotomeeting_token_details WHERE customer_id IN ($customerIds)";

      $sql = "  SELECT  * , customers.customer_name , customers.customer_code FROM gotomeeting_token_details gtd 
                inner join customers  
                on gtd.customer_id = customers.id 
                WHERE customer_id IN ($customerIds)";

                // echo "$sql";

                // die;

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

    $config['base_url'] = base_url() . 'admin/add-meeting-credentials';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $customers = $this->getAllRowsData($sql,$config['per_page'], $start_index);

      // $customers = $this->db->query($sql)->result_object();
    }


    $customername = '';
    $searchname = '';
    $lastname = '';
    $searchEmail = '';
     $searchcode = '';

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-meeting-credentials',array(
      'customers'=> $customers,
      'links'=> $links,
      'customername'=> $customername,
      'searchname'=> $searchname,
      'lastname'=> $lastname,
      'searchEmail'=> $searchEmail,
      'searchcode' => $searchcode

    ));
    $this->load->view('admin/footer');
  }


  public function createMeetingCredentialsSearch() {

    $customername = $_GET['customername'];
    $searchname = $_GET['searchname'];
    $lastname = $_GET['lastname'];
    $searchEmail = $_GET['searchEmail'];
    $searchcode = $_GET['searchcode'];

    $sql = "SELECT DISTINCT(interview_customer_id) FROM `interview_users` WHERE interview_customer_id is NOT NULL";
    $result = $this->db->query($sql)->result_array();
    $customers = array();

    if (count($result) > 0) {
      $customerIds = "";

      foreach ($result as $key => $value) {
        if ($key == (count($result) - 1)) {
          $customerIds .= $value['interview_customer_id'];
        } else {
          $customerIds .= $value['interview_customer_id'].",";  
        }
      }
      
      // $sql = "SELECT * FROM gotomeeting_token_details WHERE customer_id IN ($customerIds)";

      $sql = "  SELECT  * , customers.customer_name, customers.customer_code  FROM gotomeeting_token_details gtd 
                inner join customers  
                on gtd.customer_id = customers.id 
                WHERE customer_id IN ($customerIds)";

                if (!empty($customername)) {
                  $sql .= "  and  customers.customer_name like '%$customername%' ";
                }


                if (!empty($searchcode)) {
                  $sql .= "  and  customers.customer_code  like '%$searchcode%' ";
                }

                if (!empty($searchname)) {
                  $sql .= "  and first_name like '%$searchname%' ";
                }

                if (!empty($lastname)) {
                  $sql .= "  and  last_name like '%$lastname%' ";
                }

                if (!empty($searchEmail)) {
                  $sql .= "  and   email  like '%$searchEmail%' ";
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

    $config['base_url'] = base_url() . 'admin/add-meeting-credentials-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $customers = $this->getAllRowsData($sql,$config['per_page'], $start_index);

      // $customers = $this->db->query($sql)->result_object();
    }

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-meeting-credentials',array(
      'customers'=> $customers,
      'links'=> $links,
      'customername'=> $customername,
      'searchname'=> $searchname,
      'lastname'=> $lastname,
      'searchEmail'=> $searchEmail,
      'searchcode' => $searchcode

    ));
    $this->load->view('admin/footer');
  }


  public function saveMeetingCredentials() {
   // print_r($this->input->post()); die;
    $customerId = explode('-',$_POST['customer']);
    $username = $_POST['meeting-email'];
    $password = $_POST['password'];
    $this->createCustomerMeetingToken($customerId[1], $username, $password);
    redirect ('admin/add-meeting-credentials');
  }

   private function createCustomerMeetingToken($customerId, $username, $password) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.getgo.com/oauth/v2/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=password&username=".$username."&password=".$password);

    $headers = array();
    $headers[] = 'Authorization: Basic QXN3a2o2QTRSS0dVMG5BeldEMGNtMWFUbFc3R0xVZFk6SFMwQW1XT0lHYVZrbTB2VA==';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    // echo "<pre>";

    // print_r(json_decode($result));
    $result = json_decode($result);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $data  = array (
      'customer_id' => $customerId,
      'first_name' => $result->firstName,
      'last_name' => $result->lastName,
      'email' => $result->email,
      'access_token' => $result->access_token,
      'refresh_token' => $result->refresh_token,
      'token_type' => $result->token_type,
      'account_key' => $result->account_key,
      'organizer_key' => $result->organizer_key
    );

    $this->db->insert('gotomeeting_token_details', $data);

    return true;

  }

  public function showInterviewerList() {
    $sql = "SELECT * FROM roles ";

    $query = $this->db->query($sql);

    $result = $query->result();

    $sql = "SELECT assess_login.id as assessId, username, password, role, roles.roles FROM assess_login INNER JOIN roles on roles.id = assess_login.role where role = 6 and created_by = 0";

    $query = $this->db->query($sql);

    $userResult = $query->result();

    //print_r($userResult); die;

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');

    $this->load->view('admin/interviewers-list', array("user"=>$userResult,"roles"=>$result));
    $this->load->view('admin/footer');
  }

  public function addInterviewerToCustomer() {
    print_r($_POST);
    $customerId = $_POST['customerId'];
    $interviewerIds = $_POST['interviewerIds'];
    foreach ($interviewerIds as $key => $value) {
      $data[]  = array (
        'customer_id' => $customerId,
        'assess_login_id' => $value,
        'is_admin' => 1
      );
    }

    $this->db->insert_batch('customer_interviewers', $data);
    echo "success";
  }

  public function removeInterviewerToCustomer() {
    print_r($_POST);
    $customerId = $_POST['customerId'];
    $interviewerIds = $_POST['interviewerIds'];
    // foreach ($interviewerIds as $key => $value) {
    //   $data[]  = array (
    //     'customer_id' => $customerId,
    //     'assess_login_id' => $value,
    //     'is_admin' => 1
    //   );
    // }

    // $this->db->insert_batch('customer_interviewers', $data);
    $this->db->where_in('assess_login_id', $interviewerIds);
    $this->db->delete('customer_interviewers');
    echo "success";
  }


  public function createSection() {
    $sql = " SELECT * FROM section ";

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

    $config['base_url'] = base_url() . 'admin/add-section';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $searchSection = '';
 
    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-section', array(
      "section"=>$result,
      "links"=>$links,
      "searchSection" => $searchSection

    ));
    $this->load->view('admin/footer');
  }



  public function createSectionSearch() {

    $searchSection = trim($_GET['searchSection']);

    $sql = " SELECT * FROM section ";

    if(!empty($searchSection)){
        $sql .= "  where section_name like '%$searchSection%' ";
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


    $config['base_url'] = base_url() . 'admin/add-section-search';
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-section', array(
      "section"=>$result,
      "links"=>$links,
      "searchSection" => $searchSection

    ));
    $this->load->view('admin/footer');
  }



  public function saveSection() {
    $searchSection = trim($_POST['searchSection']);

    if (empty($searchSection)) {
        $this->session->set_flashdata('error', "Enter section name.");
        redirect('admin/add-section');
    }

      $this->form_validation->set_rules('searchSection', 'Section','required|is_unique[section.section_name]');
      if($this->form_validation->run()== FALSE){
      
        $this->session->set_flashdata('error', "$searchSection already exist.");
        redirect('admin/add-section');

      }else{
        $data  = array ('section_name' => $_POST['searchSection']);
        $this->db->insert('section', $data);

        $this->session->set_flashdata('success', "$searchSection added successfully.");

        redirect('admin/add-section');
      }
  }

 

  public function editSection() {
    $update_section_name = $_POST['update_section_name'];

    $update_section_name = trim($update_section_name);

    if (empty($update_section_name)) {
        $this->session->set_flashdata('error', "Enter section name.");
        redirect('admin/add-section');
    }

      $this->form_validation->set_rules('update_section_name', 'Section','required|is_unique[section.section_name]');
      if($this->form_validation->run()== FALSE){
      
        $this->session->set_flashdata('error', "$update_section_name already exist.");
        redirect('admin/add-section');

      }else{
        $data  = array ('section_name' => $_POST['update_section_name']);

        $this->db->where('id', $_POST['hidden_section_id']);
        $this->db->update('section',$data);

        $this->session->set_flashdata('success', "$update_section_name updated successfully.");

        redirect('admin/add-section');
      }
  }


  public function createSubSection() {
    $section_id = $this->uri->segment(3);
    $sql = "SELECT * FROM section where id = $section_id ";

    $query = $this->db->query($sql);
    $section_name = $query->result()[0]->section_name;

    $sql = " SELECT * FROM sub_section where section_id = $section_id ";

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

    $config['base_url'] = base_url() . "admin/add-sub-section/$section_id";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $searchSubSection = '';


    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-sub-section', array(
      "subSection"=>$result,
       "section_id" => $section_id,
       "section_name" => $section_name,
      "links"=>$links,
      "searchSubSection" => $searchSubSection

    ));
    $this->load->view('admin/footer');
  }


  public function createSubSectionSearch() {

    $section_id = $this->uri->segment(3);
    $sqlQ = "SELECT * FROM section where id = $section_id ";

    $query = $this->db->query($sqlQ);
    $section_name = $query->result()[0]->section_name;

    $searchSubSection = $_GET['searchSubSection'];
   
    $sql = " SELECT * FROM sub_section where section_id = $section_id ";

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

    $config['base_url'] = base_url() . "admin/add-sub-section-search/$section_id";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 4;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) :0 ;
           
    $links = $this->pagination->create_links();

    $result = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/create-sub-section', array(
      "subSection"=>$result,
      "section_id" => $section_id,
      "section_name" => $section_name,
      "links"=>$links,
      "searchSubSection" => $searchSubSection
    ));
    $this->load->view('admin/footer');
  }

  public function saveSubSection() {
    $section_id = $_POST['section_id'];
    $sub_section_name = $_POST['sub_section_name'];
    $sub_section_name = trim($sub_section_name);


    if (empty($sub_section_name)) {
        $this->session->set_flashdata('error', "Enter sub section name.");
        redirect("admin/add-sub-section/$section_id");
    }

    $sqlQ = "select sub_section_name from sub_section where section_id = '$section_id' 
               AND sub_section_name = '$sub_section_name'";

    $query = $this->db->query($sqlQ);
    $original_value = $query->result();


      if (null != $original_value) {
        $this->session->set_flashdata('error', "$sub_section_name already exist.");
        redirect("admin/add-sub-section/$section_id");
      } else {

      $data  = array (
        'sub_section_name' => $sub_section_name,
        'section_id' => $section_id

      );

      $this->db->insert('sub_section', $data);
      $this->session->set_flashdata('success', "$sub_section_name added successfully.");
      redirect("admin/add-sub-section/$section_id");
    }

  }


 public function editSubSection() {
     $section_id = $_POST['section_id'];
     $update_sub_section_name = $_POST['update_sub_section_name'];
     $update_sub_section_name = trim($update_sub_section_name);

    if (empty($update_sub_section_name)) {
        $this->session->set_flashdata('error', "Enter sub section name.");
        redirect("admin/add-sub-section/$section_id");
    }

    $sqlQ = "select sub_section_name from sub_section where section_id = '$section_id' 
               AND sub_section_name = '$update_sub_section_name'";


    $query = $this->db->query($sqlQ);
    $original_value = $query->result();


      if (null != $original_value) {
        $this->session->set_flashdata('error', "$update_sub_section_name already exist.");
        redirect("admin/add-sub-section/$section_id");
      } else {

      $data  = array (
        'sub_section_name' => $update_sub_section_name,
        'section_id' => $section_id

      );

      $this->db->where('id', $_POST['hidden_sub_section_id']);
      $this->db->update('sub_section',$data);

      $this->session->set_flashdata('success', "$update_sub_section_name updated successfully.");
      redirect("admin/add-sub-section/$section_id");
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


  public function uploadImage() {

    $sql = " SELECT * from `site_images` "; 
    $query = $this->db->query($sql);
    $images = $query->result();

    $this->load->view('admin/header');
    $this->load->view('admin/sidenav');
    $this->load->view('admin/upload-image', [
       'images' => $images,
    ]);
    $this->load->view('admin/footer');
  }
 

  public function uploadImageSave() {


    $this->load->helper('url', 'form');
    $logo_image = isset($_FILES['logo_image']['name']) ? $_FILES['logo_image']['name'] : "";
    $banner_image = isset($_FILES['banner_image']['name']) ? $_FILES['banner_image']['name'] : "";    

    $config['upload_path'] = './uploads/images/';
    $config['allowed_types'] = '*';
    // $config['max_size'] = 2000;
    // $config['max_width'] = 1500;
    // $config['max_height'] = 1500;

    $this->load->library('upload', $config);


    $data = array();
    if ( (strlen($logo_image) > 0) && (!$this->upload->do_upload('logo_image')) ) {
      $error = array('error' => $this->upload->display_errors());
      print_r($error); 
      //$this->load->view('upload_form', $error);
    } else {
      if (strlen($logo_image) > 0) {
        $data['logo_image_url'] = "uploads/images/".$logo_image;
      }
    }

    if ( (strlen($banner_image) > 0) && (!$this->upload->do_upload('banner_image')) ) {
      $error = array('error' => $this->upload->display_errors());
      //$this->load->view('upload_form', $error);
      print_r($error); 
    } else {
      if (strlen($banner_image) > 0) {
        $data['banner_image_url'] = "uploads/images/".$banner_image;
      }
    }

    if (!isset($_POST['updateImage'])) {

      $this->db->insert('site_images', $data);
    } else {

      $id = $_POST["hidden_logo_image_id"];
      $this->db->where('id', $id);
      $this->db->update('site_images',$data);
    }
    redirect($_SERVER['HTTP_REFERER']);

  }

  public function activeSiteImage() {
    $data = array(
      'is_active' => !$_POST['value']
    );

    $this->db->where('id', $_POST['id']);
    $this->db->update('site_images',$data);

    $data = array(
      'is_active' => 0
    );
    $this->db->where('id !=',$_POST['id']);
    $this->db->update('site_images',$data);    
  }


  public function downloadFormat() {
    $data = file_get_contents("./uploads/question-format.csv"); // Read the file's contents
    $name = 'upload-question-format.csv';
    $this->load->helper('download');
    force_download($name, $data);
  }

  public function createQuestionBankTable() {
    $customer_code = $_POST['customer_code'];

    $sql_question_bank = "CREATE TABLE question_bank_$customer_code (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `section_id` int(11) DEFAULT NULL,
            `sub_section_id` int(11) DEFAULT NULL,
            `level_id` int(11) DEFAULT NULL,
            `question` text NOT NULL,
            `question_image` text,
            `question_type` int(11) NOT NULL DEFAULT '1',
            `selection_code` int(11) NOT NULL DEFAULT '0',
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=latin1";

    $query = $this->db->query($sql_question_bank);

    if($query){
        $sql_answers = " CREATE TABLE answers_$customer_code(
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `question_id` int(11) NOT NULL,
              `answer` text NOT NULL,
              `is_correct` int(11) NOT NULL DEFAULT '0',
              PRIMARY KEY (`id`)
              ) ENGINE=InnoDB AUTO_INCREMENT=926 DEFAULT CHARSET=latin1";
        $query = $this->db->query($sql_answers);
        echo $query;
    }
  }


  public function getCustomerCode()
  {
    $customerId = isset($_SESSION['customerId']) ? $_SESSION['customerId'] : 0;
    if ($customerId > 0) {
      $sql = " SELECT customer_code FROM customers where id = $customerId "; 
      $query = $this->db->query($sql);
      $customer_code = $query->result();
      if($customer_code != null){
          return $customer_code[0]->customer_code;
      }
    }
    return 'no';
  }


  public function viewStudentResult() {

    $mcq_test_id = $this->uri->segment(3);

    $isCreatorAdmin = $this->checkMcqCreator($mcq_test_id);
    $questionTable = "question_bank";
    $answerTable = "answers";

    if ($isCreatorAdmin) {
      $questionTable = "question_bank_".$_SESSION['customerCode'];
      $answerTable = "answers_".$_SESSION['customerCode'];
    }

    $studentId = $this->uri->segment(4);
    $sql = " SELECT  first_name, last_name FROM student_register where id = $studentId";

    $query = $this->db->query($sql);
    $student_name_result = $query->result();
    $student_name = $student_name_result[0]->first_name.' '.$student_name_result[0]->last_name;

    $sql = " SELECT student_answers.student_id, student_answers.question_id, 
      student_answers.answer_id, student_answers.correct_ans,
      student_answers.mcq_test_id, student_answers.section_id,
      question_bank.question, answers.answer,student_answers.comment
      FROM student_answers
      inner join $questionTable as question_bank
      on student_answers.question_id = question_bank.id
      inner join  $answerTable as answers
      on student_answers.answer_id = answers.id
      where student_answers.student_id= $studentId";

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

    $config['base_url'] = base_url() . "admin/view-student-result/$mcq_test_id/$studentId";
    $config['reuse_query_string'] = true;
    $config['total_rows'] = $this->getNumberOfRows($sql);
    $config['per_page'] = 10;
    $config["uri_segment"] = 5;
             
    $this->pagination->initialize($config);
    $start_index = ($this->uri->segment(5)) ? $this->uri->segment(5) :0 ;
           
    $links = $this->pagination->create_links();

    $student = $this->getAllRowsData($sql,$config['per_page'], $start_index);

    if (isset($_SESSION['customerId']) ) {
      $this->load->view('customer/header');
      $this->load->view('customer/sidenav'); 
      $this->load->view('customer/student-result-view', array(
        "student"=>$student,
        "student_name" => $student_name,
        "links" => $links
      ));
      $this->load->view('customer/footer');
    } else {
      $this->load->view('admin/header');
      $this->load->view('admin/sidenav');  
      $this->load->view('admin/student-result-view', array(
        "student"=>$student,
        "student_name" => $student_name,
        "links" => $links
      ));
      $this->load->view('admin/footer');
    }  
  }

  public function seeAnswerOption()
  {
    $question_id = $_POST['question_id'];
    $mcq_test_id = $_POST['mcq_test_id'];

    $isCreatorAdmin = $this->checkMcqCreator($mcq_test_id);
    $answerTable = "answers";

    if ($isCreatorAdmin) {
      $answerTable = "answers_".$_SESSION['customerCode'];
    }

    $sql = "SELECT answer FROM $answerTable as answers where question_id= $question_id";

    $query = $this->db->query($sql);
    $answwerOption = $query->result();
    print_r(json_encode($answwerOption));

  }


  public function checkMcqCreator($mcqId) {
    $sql = "SELECT created_by from mcq_test where id = $mcqId";
    $creator = $this->db->query($sql)->row()->created_by;
    return $creator;
  }

  
}
