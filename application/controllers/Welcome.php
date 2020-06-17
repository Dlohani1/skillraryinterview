<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library(array('session'));
        
        $uri = $this->uri->segment(1);
       $openUri = array("typing-test","html-editor","download-pdf");

        if (count($_SESSION) > 1 && !in_array($uri,$openUri)) {

        //if (count($_SESSION) > 1) {
            redirect("user/home");
        }
    }
    
	public function index() {
		//$this->load->view('welcome_message');
        if (null !== $this->session->id) {          
            redirect('user/home');
        } else {
            //$this->load->view('home');
            $sql = "SELECT logo_image_url, banner_image_url from site_images where is_active = 1";
            $result = $this->db->query($sql)->row();
            if (null !== $result) {
                $this->load->view('new-home',array("images"=>$result));
            } else {
                $this->load->view('home');
            }
        }
	}

	public function showEssay() {
		//$this->load->view('codheader');
		$this->load->view('essay');
		//$this->load->view('codefooter');
	}

    public function showWhiteBoard() {
        $this->load->view('whiteboard');
    }

    public function showEditor() {
         $this->load->view('editor/editor');
    }

public function mypdf(){
    $mcqId = $this->uri->segment(2);
    $studentId = $this->uri->segment(3);

    $result = $this->viewResult($mcqId, $studentId);
   

    $sql = "SELECT student_register.*, states.name as state_name, cities.name as city_name FROM `student_register` left join states on student_register.state = states.id
left join cities on student_register.city = cities.id WHERE student_register.id=".$studentId ;

    $student = $this->db->query($sql)->row();



    // $this->load->view('admin/student-result', array('studentData' => $student));
    $this->load->view('admin/result', array('studentData' => $student,'result' => $result));
}

public function viewResult($mcqId, $sId) {

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



	public function mypdf1(){

    $this->load->library('pdf');


    // $this->pdf->load_view('mypdf');
    // $this->pdf->render();


    // $this->pdf->stream("welcome.pdf");

    // print_r($this->uri->segment(4)); die;

    $studentId = $this->uri->segment(3);
    $html_content = '<h3 align="center">SkillRary Assessment Report</h3>';
            // $html_content .= $this->htmltopdf_model->fetch_single_details($customer_id);
     $sql = "SELECT * FROM `student_register` WHERE id=".$studentId;

    $student = $this->db->query($sql)->row();

    $html_content .= $this->load->view('report',array("student"=>$student),true);
    $this->pdf->loadHtml($html_content);
    $this->pdf->render();
    $this->pdf->stream(""."a".".pdf", array("Attachment"=>0));

    die;
//echo "aa"; die;

	//$this->load->library('pdf');


 //  	$this->pdf->load_view('mypdf');
 //  	$this->pdf->render();


 //  	$this->pdf->stream("welcome.pdf");

		 //load mPDF library
 // $this->load->library('m_pdf'); 
 //now pass the data//
 //$data['mobiledata'] = $this->pdf->mobileList();
 // $html=$this->load->view('admin/view-students'); //load the pdf.php by passing our data and get all data in $html varriable.
 // $pdfFilePath ="webpreparations-".time().".pdf"; 
 //actually, you can pass mPDF parameter on this load() function
 // $pdf = $this->m_pdf->load();
 //generate the PDF!
 // $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
 // apply external css
 // $pdf->WriteHTML($stylesheet,1);
 // $pdf->WriteHTML($html,2);
 //offer it to user via browser download! (The PDF won't be saved on your server HDD)
 // $pdf->Output($pdfFilePath, "D");
 // exit;
   }



       public function generateXls() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        // foreach ($listInfo as $list) {
        //     $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->first_name);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->last_name);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->email);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
        //     $rowCount++;
        // }
        $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }

    public function printUsrPwd() {
        $sql = "Select * from assess_usr_pwd where mcq_test_id =".$_GET['mcqId'];
        $result = $this->db->query($sql)->result();

            
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        //$listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'sl.no');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'username');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'password');    
        // set Row
        $rowCount = 2;
        $i = 1;
        foreach ($result as $key => $value) {
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->username);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value->password);
            $i++;
            $rowCount++;
            }
        // foreach ($listInfo as $list) {
        //     $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->first_name);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->last_name);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->email);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
        //     $rowCount++;
        // }
       // $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        /*header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
        */
        $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Skillrary.xls"');
        $object_writer->save('php://output');
    }

    public function typingTest() {
        $this->load->view('typing-test/home');
    }

    public function typingTestStart() {
        $this->load->library('user_agent');
        $refer = null;
        if ($this->agent->is_referral()) {
            $refer =  $this->agent->referrer();
        }
        /*
        if (null !== $refer) {

        $this->load->view('typing-test/test'); 
        } else {
            redirect('/typing-test');
        } */
        $this->load->view('typing-test/test'); 
    }

    public function typingTestResult() {
         $this->load->library('user_agent');
        $refer = null;
        if ($this->agent->is_referral()) {
            $refer =  $this->agent->referrer();
        }

        /*
        if (null !== $refer) {

        $this->load->view('typing-test/result'); 
        } else {
            redirect('/typing-test');
        }*/
        $this->load->view('typing-test/result'); 
    }


    public function checkcode() {
        $sql = "SELECT logo_image_url from site_images where is_active = 1";
        $result = $this->db->query($sql)->row();
        $this->load->view('log-in-with-code',array("images"=>$result));
    }


    public function checklogin() {
        $sql = "SELECT logo_image_url from site_images where is_active = 1";
        $result = $this->db->query($sql)->row();
        $this->load->view('login-in-with-crediential',array("images"=>$result));
    }
}
