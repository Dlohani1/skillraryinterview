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

       if ($urls == 'registration' || $urls == 'login' || $urls == 'signin' || $urls == 'register') {
       		$u = 0;
       }

       //echo var_dump($this->session->id); die;

        if ( (null == $this->session->id) && $u) {        	
        	redirect('user/login');
        } else if (!$u && (null !== $this->session->id)) {
            redirect('user/home');
        }  
    }
}