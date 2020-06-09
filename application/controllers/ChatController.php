<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends CI_Controller{



	public function __construct() {
		parent::__construct();
    	$this->load->database();
	    $this->load->helper(array('form', 'url', 'string'));
	    $this->load->library("pagination");
	    $this->load->helper('smiley');
	    $this->load->library('table');
	}

	public function showJoinPage()
	{	
		$this->load->view('skillrary-chat/joinPage');
	}

	public function isStudentApproved() {
		$name = $_SESSION['studentName'] ;
		$chatCode = $_SESSION['chatCode'];
		$sql = "Select is_approved from student_chat where student_name = '".$name."' and chat_code = $chatCode";
		$result = $this->db->query($sql)->row();

		return $result->is_approved;
	}
	public function showChatPage(){

		$image_array = get_clickable_smileys(base_url().'resources/images/smileys/', 'comments');
        $col_array = $this->table->make_columns($image_array, 8);
        $data['smiley_table'] = $this->table->generate($col_array);
		

		if( isset($_SESSION['trainerId'] )){

			$trainer_id = $_SESSION['trainerId'];
			$channel_title = $_SESSION['channelTitle'];
			$chatRoomDataSQL = "select * from chat_room where trainer_id = ".$trainer_id." and channel_title = '".$channel_title."';";

			$result = $this->db->query($chatRoomDataSQL);
			$chatroomData = $result->result_array();
			$actualData = $chatroomData['0'];
			
			$this->load->view('skillrary-chat/chatPage', $data + $actualData);
		}
		else if(isset($_SESSION['studentName'] )){

			$getChanneltitle = "select * from chat_room where code = ".$_SESSION['chatCode'];
			$runQuery = $this->db->query($getChanneltitle);
			$getResults = $runQuery->result_array();
			$actualData = $getResults['0'];
			$studentApproved = $this->isStudentApproved();
			$sdata = array("student" => $this->isStudentApproved());
			$this->load->view('skillrary-chat/chatPage', $data + $actualData + $sdata);

		}
		else{
			$this->session->set_flashdata('chat_error', 'You are not authorised');
			redirect("skillrary-chat");
		}
		
	}

	public function createChatFun()
	{	

		$emailData = $_POST['trainer_email'];
		$nameData = $_POST['trainer_name'];
		$titleData = $_POST['channel_title'];

		$sql = "SELECT * FROM trainer_chat WHERE trainer_email ='".$_POST['trainer_email']."' and is_active = 1";
		$result = $this->db->query($sql);
		$temp = $result->result();



		if(isset($temp['0']->id)){ //check for valid trainer or not
				
				$_SESSION['trainerId'] = $temp['0']->id;
				$_SESSION['trainerName'] = $temp['0']->trainer_name;

				$updateData = array('is_logged' => 1);
				$array = array('id' => $_SESSION['trainerId'], 'trainer_name' => $_SESSION['trainerName']);
				$this->db->where($array);
				$this->db->update('trainer_chat', $updateData);

				$chatCode = random_string('numeric',5);
				$_SESSION['chatCode'] = $chatCode;

			    $chatroomData = array(
						      "trainer_id" => $temp['0']->id,
						      "code" => $chatCode,
						      "created_at" => date('Y-m-d h:i:sa'),
						      "trainer_name" => $temp['0']->trainer_name,
						      "trainer_email" => $temp['0']->trainer_email,
						      "channel_title" => $_POST['channel_title']
						    );

			    $titleCheck = "SELECT channel_title FROM chat_room WHERE channel_title  = '".$_POST['channel_title']."' ";
			    $result = $this->db->query($titleCheck);
			    $temp = $result->result();

			    if(isset($temp['0']->channel_title)){ //check for chat-title is exists or

			    	$this->session->set_flashdata('chat_error', 'Chat is already exists with this name');
					redirect("skillrary-chat");

			    }
			    else{
			    		$_SESSION['channelTitle'] = $_POST['channel_title'];
			    		$this->db->insert('chat_room', $chatroomData);
			    		$this->addSuccessMessage($_SESSION['trainerName'],$_SESSION['channelTitle'],'create');
			    		redirect("chat-room");
			    }
				
		}
		else{
			$this->session->set_flashdata('chat_error', 'You dont have previlage to start chat room');
			redirect("skillrary-chat");
		}
		

	}

	public function logout() {

		if( isset($_SESSION['studentName']) ){
			
			$updateData = array('is_logged'=>0);
			$array = array('student_name' => $_SESSION['studentName'], 'chat_code' => $_SESSION['chatCode']);
			$this->db->where($array);
			$this->db->update('student_chat', $updateData);
			$this->addSuccessMessage($_SESSION['studentName'],$_SESSION['channelTitle'],'logout');
		}

		if( isset($_SESSION['trainerName']) ){
			$updateData = array('is_logged'=>0);
			$array = array('id' => $_SESSION['trainerId'], 'trainer_name' => $_SESSION['trainerName']);
			$this->db->where($array);
			$this->db->update('trainer_chat', $updateData);
			$this->addSuccessMessage($_SESSION['trainerName'],$_SESSION['channelTitle'],'logout');
		}

      $this->session->sess_destroy();
      redirect('skillrary-chat');
  }

  public function saveMessageFun()
  {

  	$text = $_POST['text'];
  	$text = parse_smileys($text, base_url().'resources/images/smileys/');
  	//print_r($text); die;
  	$fileName = $_SESSION['channelTitle'].".html";
  	date_default_timezone_set('Asia/kolkata');
  	$date = date('h:i A', time());
  	$fp = fopen($fileName, 'a');

  	if($_SESSION['trainerName']){
  		fwrite($fp, "<div class='msgln'>(".$date.") <b>".$_SESSION['trainerName']."</b>: ".$text."<br></div>");
  	}
  	else if($_SESSION['studentName']){
  		fwrite($fp, "<div class='msgln'>(".$date.") <b>".$_SESSION['studentName']."</b>: ".$text."<br></div>");
  	}

  	

    fclose($fp);
  }

  public function showMessageFun(){

  	$file_name = $_SESSION['channelTitle'].".html";

  	if (file_exists ( $file_name ) && filesize ( $file_name ) > 0){
  		$file = fopen($file_name, 'r');
  		$contents = fread($file,filesize ( $file_name ));
  		print_r($contents);
  	}

  }

  public function joinChatFun(){

  	$studentNameData = $_POST['student_name'];
  	$chatcodeData = $_POST['chat_code'];


  	$checkValidcode = "SELECT id FROM chat_room WHERE code = '".$chatcodeData."'";
  	$queryResult = $this->db->query($checkValidcode);
  	$actualResult = $queryResult->result();

  	if(isset($actualResult['0']->id)){ // check for valid code
  		
  		$sql = "SELECT * FROM student_chat WHERE student_name  = '".$_POST['student_name']."' and chat_code = '".$_POST['chat_code']."'";

  		$result = $this->db->query($sql);
  		$temp = $result->result();


  		$trainerDetails = "SELECT trainer_chat.is_logged FROM trainer_chat JOIN chat_room ON trainer_chat.id=chat_room.trainer_id where chat_room.code = ".$_POST['chat_code'];
  			$runtrainerDet = $this->db->query($trainerDetails);
  			$gettrainerResults = $runtrainerDet->result();



  		
  		if(count($temp)){ // student already exists
  			
  			$_SESSION['studentName'] = $temp['0']->student_name;
  			$_SESSION['chatCode'] = $temp['0']->chat_code;


  			if($gettrainerResults[0]->is_logged == '0'){
  				unset($_SESSION['studentName']);
  				unset($_SESSION['chatCode']);
  				$this->session->set_flashdata('chat_error', 'Trainer has ended this session');
  				redirect("skillrary-chat");
  			}
  			else{

  				$getChanneltitle = "select * from chat_room where code = ".$_SESSION['chatCode'];
				$runQuery = $this->db->query($getChanneltitle);
				$getResults = $runQuery->result_array();
				$_SESSION['channelTitle'] = $getResults['0']['channel_title'];


	  			$updateData = array('is_logged'=>1);
				$this->db->where('student_name', $_SESSION['studentName']);
				$this->db->update('student_chat', $updateData);

				$this->addSuccessMessage($_SESSION['studentName'],$_SESSION['channelTitle'],'login');
	  			redirect("chat-room");

  			}

  			

  			
  		}
  		else{ // add student details
  			$_SESSION['studentName'] = $studentNameData;
  			$_SESSION['chatCode'] = $chatcodeData;

  			
  			if($gettrainerResults[0]->is_logged == '0'){
  				unset($_SESSION['studentName']);
  				unset($_SESSION['chatCode']);
  				$this->session->set_flashdata('chat_error', 'Trainer has ended this session');
  				redirect("skillrary-chat");
  			}

  			else{

  				$studentData = array(
						      "student_name" => $studentNameData,
						      "chat_code" => $chatcodeData,
						      "created_at" => date('Y-m-d h:i:sa'),
						      "is_logged" => '1',
						      "is_approved" => '0'
						    );
	  			$_SESSION['studentName'] = $studentNameData;
	  			$_SESSION['chatCode'] = $chatcodeData;


	  			$getChanneltitle = "select * from chat_room where code = ".$_SESSION['chatCode'];
				$runQuery = $this->db->query($getChanneltitle);
				$getResults = $runQuery->result_array();
				$_SESSION['channelTitle'] = $getResults['0']['channel_title'];

	  			$this->db->insert('student_chat', $studentData);//insert new student row

	  			$this->addSuccessMessage($_SESSION['studentName'],$_SESSION['channelTitle'],'login');//insert login message
	  			
	  			redirect("chat-room");

  			}
  			
  			




  		}



  	}
  	else{
  		
  		$this->session->set_flashdata('chat_error', 'Invalid Code');
  		redirect("skillrary-chat");
  	}



  	
  }

  public function addSuccessMessage($user,$channeltitle,$type)
  {

  	if($type == 'login'){
  		$text = $user." has joined the chat session.";
  	}
  	else if($type == 'logout'){
  		$text = $user." has left session.";
  	}

  	else if($type == 'create'){
  		$text = $user." has created session.";
  	}

  	$fileName = $_SESSION['channelTitle'].".html";
  	date_default_timezone_set('Asia/kolkata');
  	$date = date('h:i A', time());
  	$fp = fopen($fileName, 'a');

  	if(isset($_SESSION['trainerName'])){
  		fwrite($fp, "<div class='msgln'>(".$date.")  ".stripslashes(htmlspecialchars($text))."<br></div>");
  	}
  	else if(isset($_SESSION['studentName'])){
  		fwrite($fp, "<div class='msgln'>(".$date.")  ".stripslashes(htmlspecialchars($text))."<br></div>");
  	}

  	

    fclose($fp);


  	
  }



  public function showStudentChatPage()
  {
  		if( isset($_SESSION['trainerId']) && isset($_SESSION['studentName']) ){
  			die('student chat box');
  		}
  		else{
  			$this->session->set_flashdata('chat_error', 'Admin is not logged in');
			redirect("skillrary-chat");
  		}
  }

  public function displayApprovedUsers(){

  	$code = $_POST['code'];
  	$result = $this->db->query("select student_name from student_chat where chat_code = ".$code." and is_logged = 1 and is_approved = 1")->result_array();

  	print_r(json_encode($result));

  }

  public function displayWaitingUsers(){

  	$code = $_POST['code'];
  	$result = $this->db->query("select id,student_name from student_chat where chat_code = ".$code." and is_logged = 1 and is_approved = 0")->result_array();
  	print_r(json_encode($result));
  }

  public function approveWaitingUsers(){
  		$studentId = $_POST["student"];
  		$action = $_POST["action"];
  		$updateData = array("is_approved" => $action);
		$this->db->where("id",$studentId);
		$this->db->update('student_chat', $updateData);
		echo "success";
  }





}

?>