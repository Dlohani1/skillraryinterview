<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SqlController extends CI_Controller {

	public function getViewHere()
	{
		$this->load->view('websql/websql');
	}

}


?>