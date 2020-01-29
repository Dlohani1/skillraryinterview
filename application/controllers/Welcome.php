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
    }
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('home');
	}

	public function showEssay() {
		//$this->load->view('codheader');
		$this->load->view('essay');
		//$this->load->view('codefooter');
	}

	public function mypdf(){

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
}
