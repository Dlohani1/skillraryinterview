<?php
class QuestionBank extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
                $this->load->helper('url');
                $this->load->library('session');
        }

        public function index()
        {
             $this->load->view('question-bank');
        }

        public function getSection() {
                $sql = "SELECT * FROM `section`";
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
                
                $sectionId = $_POST['sectionId'];
                $subSectionId = $_POST['subsection'];
                $levelId = $_POST['levelId'];
                $question = $_POST['question'];

                $ans1 = $_POST['ans1'];
                $ans2 = $_POST['ans2'];
                $ans3 = $_POST['ans3'];
                $ans4 = $_POST['ans4'];

                $qdata = array(
                        'section_id' => $sectionId,
                        'sub_section_id' => $subSectionId,
                        'level_id' => $levelId,
                        'question' => $question
                );

                $this->db->insert('question_bank', $qdata);


                $questionId = $this->db->insert_id();

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

                        $this->db->insert_batch('answers', $data);
        }

        public function show() {
                if ($this->isMcqTaken() > 0) {
                        echo "MCQ test already taken";
                } else {
                 $this->load->view('mcq_form');      
                }
                
        }

        private function isMcqTaken() {
                $studentId = $this->session->id;
                $mcqId = $this->session->mcqId;
                $sql = "SELECT * FROM `student_answers` WHERE student_id = '$studentId' AND mcq_test_id = '$mcqId'";

                $query = $this->db->query($sql);
                return $query->num_rows();
                 // if($query->num_rows() > 0)  {

                 // }
        }

        public function registration() {
                $this->load->view('registration');      
        }

        public function login() {
                $this->load->view('login');      
        }

        public function getQuestion() {
                $studentId = $_POST['id'];
                $sectionId = $_POST['section_id'];
                $mcqId = $_POST['mcq_id'];

                $sql = "SELECT * FROM `mcq_test_question` WHERE student_id = '$studentId' AND section_id = '$sectionId' AND mcq_test_id = '$mcqId'";

                $query = $this->db->query($sql);

                $i = 0;

                $questionData = array();
                foreach ($query->result() as $row) {
                        $questions = explode(",", $row->questions);
                        $questionData[$i]['total'] = count($questions);
                        $questionData[$i]['questions'] = $questions;
                        //$i++;
                }


                $sql = "SELECT * FROM `mcq_time` WHERE mcq_test_id = '$mcqId' AND  section_id = '$sectionId'";

                $query = $this->db->query($sql);


                foreach ($query->result() as $row) {
                        $questionData[$i]['time'] = $row->completion_time;
                }                

                print_r(json_encode($questionData));
        }

        public function fetchQuestion() {
                $studentId = $_POST['id'];
                $sectionId = $_POST['section_id'];
                $mcqId = $_POST['mcq_id'];

                $questionId = $_POST['question_id'];

                $sql = "SELECT question_bank.question, answers.*  FROM question_bank 
                LEFT JOIN answers 
                  ON answers.question_id = question_bank.id
                WHERE question_bank.id = '$questionId'";

                $query = $this->db->query($sql);

                $i = 0;

                $questionData = array();
                foreach ($query->result() as $row) {
                        $questionData['question'] = $row->question;
                        $questionData['options'][$i]['id'] = $row->id;
                        $questionData['options'][$i]['option'] = $row->answer;
                        $i++;
                }

                print_r(json_encode($questionData));
        }

        public function register() {
              // print_r($_POST); die;


               $data = array(
                        'full_name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'contact_no' => $_POST['cno'],
                        'state' => $_POST['state'],
                        'city' => $_POST['city'],
                        'dob' => $_POST['dob'],
                        'gender' => $_POST['gender'],
                        '10th_passing_year' => $_POST['10th_py'],
                        '10th_percentage' => $_POST['10th_per'],
                        '12th_passing_year' => $_POST['12th_py'],
                        '12th_percentage' => $_POST['12th_per'],
                        'degree' => $_POST['degree'],
                        'degree_percentage' => $_POST['degree_per'],
                        'degree_passing_year' => $_POST['degree_py'],
                        'stream' => $_POST['stream'],
                        'work_location' => $_POST['pwl'],
                        'password' => $_POST['pwd'],
                );

                $this->db->insert('student_register', $data);

                $this->load->view('login');
        }

        public function saveAnswer() {

               $data = array(
                        'answer_id' => $_POST['answer_id'],
                        'section_id' => $_POST['section_id'],
                        'mcq_test_id' => $_POST['mcq_id'],
                        'question_id' => $_POST['question_id'],
                        'student_id' => $_POST['student_id'],
                        'correct_ans' => 0
                );

               $questionId = $_POST['question_id'];

               $sql = "SELECT id FROM `answers` WHERE question_id = '$questionId' And is_correct=1";   

               // echo $sql; die;
                $ansId = $this->db->query($sql);

                if($ansId->num_rows() > 0)  {

                foreach ($ansId->result() as $row) {

                        $ansId = $row->id;
                }
            }


                if ($ansId == $_POST['answer_id']) {
                        $data['correct_ans'] = 1;
                }

                $this->db->insert('student_answers', $data);

        }

        public function createMcq() {
                $this->load->view('create_mcq');
        }

        public function addTest() {

                $title = $_POST['test-title'];
                $type = $_POST['test-type'];

                $data = array(
                        'title' => $title,
                        'type' => $type
                );

                $this->db->insert('mcq_test', $data);


                $testId = $this->db->insert_id();

                echo $testId;
        }

        public function addTestTime() {
                $mcqId = $_POST['mcqId'];
                $time1= $_POST['time1'];
                $time2= $_POST['time2'];
                $time3= $_POST['time3'];

                // $params = json_decode($data, true);
                // $title = $params['test-title'];
                // $type = $params['test-type'];


                $t1 = array (
                        'mcq_test_id' => $mcqId,
                        'section_id' => 1,
                        'completion_time' => $time1
                );

                $t2 = array (
                        'mcq_test_id' => $mcqId,
                        'section_id' => 2,
                        'completion_time' => $time2
                );

                $t3 = array (
                        'mcq_test_id' => $mcqId,
                        'section_id' => 3,
                        'completion_time' => $time3
                );

                $data = array(
                        $t1, $t2, $t3
                );

                $this->db->insert_batch('mcq_time', $data);

        }

        public function addQuestion() {
                $mcqTestId = $_POST['mcqTestId'];
                $sectionId = $_POST['sectionId'];
                $subSectionId = $_POST['subSectionId'];
                $levelId = $_POST['levelId'];
                $totalQuestion = $_POST['totalQuestion'];




                $data = array(
                        'mcq_test_id' => $mcqTestId,
                        'section_id' => $sectionId,
                        'sub_section_id' => $subSectionId,
                        'level_id' => $levelId,
                        'total_question' =>  $totalQuestion
                );

                $this->db->insert('mcq_test_pattern', $data);

        }

        public function signin() {
               $email = $_POST['email'];
               $pwd = $_POST['pwd'];
               $sql = "SELECT * FROM `student_register` WHERE email='$email' AND password = '$pwd'";

               $query = $this->db->query($sql);
               
                if($query->num_rows() > 0)  {
                        //$this->load->view('enter-code');

                foreach ($query->result() as $row) {

                        $id = $row->id;
                } 
                $this->session->set_userdata('id', 3); 

                //redirect('read-instructions');   

                redirect('enter-code', 'refresh');
                }

        }

        public function enterCode() {
               $this->load->view('enter-code'); 
        }

        public function checkCode() {
                $code = $_POST['code'];

                $sql = "SELECT * FROM `mcq_code` WHERE code='$code' AND is_active = 1";

               $query = $this->db->query($sql);
               
                if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                        $mcqId = $row->mcq_test_id;
                }   

                $this->session->set_userdata('mcqId', $mcqId); 
                

                $this->generateQuestion($code, $mcqId);

                }                        

                

        }

        public function addMcqCode() {

                $mcqTestId = $_POST['mcqTestId'];

                $code = $this->getCode();

                $data = array(
                        'mcq_test_id' => $mcqTestId,
                        'code' => $code
                );

                $this->db->insert('mcq_code', $data);

                redirect('createMCQ', 'refresh');

               
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


        private function generateQuestion($code, $mcqId) {
                $sql1 = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id = 1";
                $sql2 = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id = 2";
                $sql3 = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id = 3";

                $result1 =  $this->db->query($sql1);
                $result2 =  $this->db->query($sql2);
                $result3 =  $this->db->query($sql3);


                //foreach ($query->result() as $row) {



                $i = 0;
                //echo "aa"; die;
                $sqlQ1 = "";
               if($result1->num_rows() > 0)  {
                    // output data of each row
                    foreach ($result1->result() as $row)  {
                        if ($i > 0 ) {
                                $sqlQ1 .= "UNION ALL";
                        }
                        $levelId = $row->level_id;
                        $totalQ = $row->total_question;
                        $sqlQ1 .= "(SELECT id FROM `question_bank` WHERE section_id = 1 and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
                        $i++;
                    }

                }


                $i = 0;
                $sqlQ2="";
                 if($result2->num_rows() > 0)  {
                    // output data of each row
                    foreach ($result2->result() as $row)  {
                        if ($i > 0 ) {
                                $sqlQ2 .= "UNION ALL";
                        }

                        $levelId = $row->level_id;
                        $totalQ = $row->total_question;

                        $sqlQ2 .= "(SELECT id FROM `question_bank` WHERE section_id = 2 and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
                        $i++;
                    }

                }

                $i = 0;
                $sqlQ3="";
                 if($result3->num_rows() > 0)  {
                    // output data of each row
                    foreach ($result3->result() as $row)  {
                        if ($i > 0 ) {
                                $sqlQ3 .= "UNION ALL";
                        }
                        $levelId = $row->level_id;
                        $totalQ = $row->total_question;

                        $sqlQ3 .= "(SELECT id FROM `question_bank` WHERE section_id = 3 and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
                        $i++;
                    }

                }



                $resultQ1 = $this->db->query($sqlQ1);
                $resultQ2 = $this->db->query($sqlQ2);
                $resultQ3 = $this->db->query($sqlQ3);

                $q1 = "";
                $q2 = "";
                $q3 = "";

                $i = 0;

                 if($resultQ1->num_rows() > 0)  {
                    // output data of each row
                    foreach ($resultQ1->result() as $row)  {
                        if ($i > 0 ) {
                                $q1 .= ",";
                        }
                        $q1 .= $row->id;
                        $i++;
                    }

                }

                //echo $sqlQ2; die;
                $i = 0;
                if($resultQ2->num_rows() > 0)  {
                    // output data of each row
                     foreach ($resultQ2->result() as $row)  {
                        if ($i > 0 ) {
                                $q2 .= ",";
                        }
                        $q2 .= $row->id;
                        $i++;
                    }

                }

                $i = 0;
                if($resultQ3->num_rows() > 0)  {
                    // output data of each row
                    foreach ($resultQ3->result() as $row)  {
                        if ($i > 0 ) {
                                $q3 .= ",";
                        }
                        $q3 .= $row->id;
                        $i++;
                    }

                }





                //echo $q1, "<br>", $q2, "<br>", $q3;

                $section1 = explode(",", $q1);
                shuffle($section1);

                $section1Questions = implode(",",$section1);

                $section2 = explode(",", $q2);
                shuffle($section2);

                $section2Questions = implode(",",$section2);

                $section3 = explode(",", $q3);
                shuffle($section3);

                $section3Questions = implode(",",$section3);

                // $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                //                      .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                //                      .'0123456789!@#$%^&*()'); // and any other characters
                //     shuffle($seed); // probably optional since array_is randomized; this may be redundant
                //     $rand = '';
                //     foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
                 
                    //echo $rand;

                $studentId = $this->session->id;

                // $sql = "INSERT INTO mcq_test_question (mcq_test_id, mcq_code, section_id, questions)
                // VALUES ('$mcqId', '$rand', '1', '$section1Questions');";
                // $sql .= "INSERT INTO mcq_test_question (mcq_test_id, mcq_code, section_id, questions)
                // VALUES ('$mcqId', '$rand', '2', '$section2Questions');";
                // $sql .= "INSERT INTO mcq_test_question (mcq_test_id, mcq_code, section_id, questions)
                // VALUES ('$mcqId', '$rand', '3', '$section3Questions');";

                // if ($conn->multi_query($sql) === TRUE) {
                //     echo "New records created successfully";
                // } else {
                //     echo "Error: " . $sql . "<br>" . $conn->error;
                // }

                $q1 = array(
                        'student_id' => $studentId,
                        'mcq_test_id' => $mcqId,
                        'mcq_code' => $code,
                        'section_id' => 1,
                        'questions' => $section1Questions
                );

                $q2 = array(
                        'student_id' => $studentId,
                        'mcq_test_id' => $mcqId,
                        'mcq_code' => $code,
                        'section_id' => 2,
                        'questions' => $section2Questions
                );

                $q3 = array(
                        'student_id' => $studentId,
                        'mcq_test_id' => $mcqId,
                        'mcq_code' => $code,
                        'section_id' => 3,
                        'questions' => $section3Questions
                );

                $data = array(
                        $q1, $q2, $q3
                );

                $this->db->insert_batch('mcq_test_question', $data);

                $sql1 = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 1";
                $sql2 = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 2";
                $sql3 = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 3";


                $result1 = $this->db->query($sql1);
                $result2 = $this->db->query($sql2);
                $result3 = $this->db->query($sql3);

                $i = 0;

                $data = array();

                if($result1->num_rows() > 0)  {
                    // output data of each row
                    foreach ($result1->result() as $row)  {
                       $data[$i]['section'] = "English";
                       $data[$i]['total'] = $row->total;
                    }

                }

                $i = 1;
                 if($result1->num_rows() > 0)  {
                    // output data of each row
                    foreach ($result2->result() as $row)  {
                       $data[$i]['section'] = "Reasoning";
                       $data[$i]['total'] = $row->total;
                    }

                }

                $i = 2;
                if($result1->num_rows() > 0)  {
                    // output data of each row
                    foreach ($result1->result() as $row)  {
                       $data[$i]['section'] = "Quantitative";
                       $data[$i]['total'] = $row->total;
                    }

                }

                $this->load->view('instructions', array("data"=>$data));
                //redirect('read-instructions');
                //redirect('mcq-question', 'refresh');
                //echo "ok";
        }

        public function showInstructions() {
            $this->load->view('instructions');
        }

        public function redirectPage() {
            $this->load->view('redirecting-page');
        }
}