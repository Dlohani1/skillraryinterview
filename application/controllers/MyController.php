<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyController extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('session','form_validation'));

            $urls = $this->uri->segment(2);
            // echo $urls; die;
            $u = 1;

           if ($urls == 'registration' || $urls == 'login') {
           		$u = 0;
           }

            if (!isset($_SESSION['id']) && $u) {
            	
            	redirect('user/login');
            }
    }
}