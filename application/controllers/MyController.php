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

        $u = 1;

       if ($urls == 'registration' ||  $urls == 'login' || $urls == 'signin' || $urls == 'register' || $urls == 'new-login' || $urls == 'checkCode') {
       		$u = 0;
       }

       //echo var_dump($this->session->id); die;

        if ( (null == $this->session->id) && $u) {
        if (isset($_SESSION['username'])) {
            redirect('user/create/profile');
          }        	
        	redirect('user/login');
        } else if (!$u && (null !== $this->session->id)) {

          if (isset($_SESSION['username'])) {
            if ($urls == "logout") {
              $this->logout();
            } else {
              redirect('user/create/profile');
            }
            
          }
          redirect('user/home');
        }  
    }

    public function logout() {

      $this->session->sess_destroy();
      redirect('user/new-login');
    } 

    public function loginOpt() {
      //$this->load->view('codheader');
      //$this->load->view('loginviacode');

      $this->load->view('codheader');
      $this->load->view('loginnew1');
      $this->load->view('codefooter');

    }
}