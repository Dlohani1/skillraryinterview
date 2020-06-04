<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends CI_Controller{



	public function __construct() {
		parent::__construct();
    	$this->load->database();
	    $this->load->helper(array('form', 'url', 'string'));
	   // $this->load->library(array('session','form_validation'));
	    $this->load->library("pagination");

	}

	public function showJoinPage()
	{	
		$this->load->view('skillrary-chat/joinPage');
	}

	public function showChatPage(){
		//$_SESSION['trainerId']

		if(isset($_SESSION['trainerId'])){

			$trainer_id = $_SESSION['trainerId'];
			$channel_title = $_SESSION['channelTitle'];
			$chatRoomDataSQL = "select * from chat_room where trainer_id = ".$trainer_id." and channel_title = '".$channel_title."';";

			$result = $this->db->query($chatRoomDataSQL);
			$chatroomData = $result->result_array();
			$actualData = $chatroomData['0'];
			$this->load->view('skillrary-chat/chatPage', $actualData);
		}
		else{
			$this->session->set_flashdata('chat_error', 'You are not authorised');
			redirect("skillrary-chat");
		}
		
	}

	public function createChatFun()
	{
		$this->load->helper('string');
		$emailData = $_POST['trainer_email'];
		$nameData = $_POST['trainer_name'];
		$titleData = $_POST['channel_title'];

		$sql = "SELECT id,trainer_name FROM trainer_chat WHERE trainer_email  = '".$_POST['trainer_email']."' and is_active = 1";
		$result = $this->db->query($sql);
		$temp = $result->result();



		if(isset($temp['0']->id)){
			
				$_SESSION['trainerId'] = $temp['0']->id;
				//$session->set('trainerId', $temp['0']->id);
				

			    $chatroomData = array(
						      "trainer_id" => $temp['0']->id,
						      "code" => random_string('numeric',5),
						      "created_at" => date('Y-m-d h:i:sa'),
						      "trainer_name" => $temp['0']->trainer_name,
						      "channel_title" => $_POST['channel_title']
						    );

			    $titleCheck = "SELECT channel_title FROM chat_room WHERE channel_title  = '".$_POST['channel_title']."' ";
			    $result = $this->db->query($titleCheck);
			    $temp = $result->result();

			    if(isset($temp['0']->channel_title)){

			    	$this->session->set_flashdata('chat_error', 'Chat is already exists with this name');
					redirect("skillrary-chat");

			    }
			    else{
			    		$_SESSION['channelTitle'] = $_POST['channel_title'];
			    		$this->db->insert('chat_room', $chatroomData);
			    		redirect("chat-room");
			    }
				
		}
		else{
			$this->session->set_flashdata('chat_error', 'You dont have previlage to start chat room');
			redirect("skillrary-chat");
		}
		

	}

	public function logout() {

      $this->session->sess_destroy();
      redirect('skillrary-chat');
  }

  public function saveMessageFun()
  {
  	$text = $_POST['text'];
  	$fileName = $_SESSION['channelTitle'].".html";
  	$date = date('h:i A', time());
  	$fp = fopen($fileName, 'a');
  	fwrite($fp, "<div class='msgln'>(".$date.") <b>".$_SESSION['trainerId']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
  }



}

?>