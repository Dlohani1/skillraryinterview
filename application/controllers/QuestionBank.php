<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."controllers/MyController.php");

class QuestionBank extends MyController {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('session','form_validation'));
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

        public function showCodeTest() {
            echo "aa";die;
        }
        public function show() {
                // if ($this->isMcqTaken() > 0) {
                //         echo "MCQ test already taken";
                // } else {
                    $userData = $this->showUserProfile(true);

                    $codeId = $this->getCodeTest();

                    $mcqSection = $this->getMcqSection();

                    $this->session->set_userdata('codeTestId', $codeId); 

                    $this->load->view('mcq_form', array('userData'=>$userData,'codeId'=>$codeId, 'sections' => $mcqSection));      
                // }
                
        }

        public function getMcqSection() {

            $sql = "SELECT mcq_test_pattern.section_id, section.section_name FROM `mcq_test_pattern` 
                    inner join section on mcq_test_pattern.section_id = section.id
                    where mcq_test_pattern.mcq_test_id =".$this->session->mcqId;

            

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

        public function getCodeTest() {
            $mcqId = $this->session->mcqId;
            $sql = "SELECT * FROM `mcq_code_test` WHERE mcq_test_id =".$mcqId;

            $codeId = $this->db->query($sql)->row();

            if (null !== $codeId) {
                return $codeId->code_id;    
            } else {
                return 0;
            }

            
        }

        private function isMcqTaken($attemptCheck = false, $attemptNo = 0) {
                $studentId = $this->session->id;
                $mcqId = $this->session->mcqId;
                $sql = "SELECT test_attempt FROM `student_answers` WHERE student_id = '$studentId' AND mcq_test_id = '$mcqId' 
                order by test_attempt desc";

                if ($attemptCheck) {
                    $sql = "SELECT * FROM `student_answers` WHERE student_id = '$studentId' AND mcq_test_id = '$mcqId' AND test_attempt =".$attemptNo;                    
                }




                 $isAttempted = $this->db->query($sql)->row();

              if (null != $isAttempted) {
                return $isAttempted->test_attempt;
              } else {
                return 0;
              }
                // $query = $this->db->query($sql);
                // return $query->num_rows();
                 // if($query->num_rows() > 0)  {

                 // }
        }

        public function registration() {
                // $this->load->view('registration');
                $this->load->view('codheader');
                $this->load->view('coderegister');
                $this->load->view('codefooter');            
        }

        public function login() {
                // $this->load->view('login');
                $this->load->view('codheader');      
                $this->load->view('codelogin');
                $this->load->view('codefooter');      
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
                WHERE question_bank.id = '$questionId' ";

                $query = $this->db->query($sql);

                $i = 0;

                $questionData = array();
                foreach ($query->result() as $row) {
                        $questionData['question'] = $row->question;
                        $questionData['options'][$i]['id'] = $row->id;
                        $questionData['options'][$i]['option'] = $row->answer;
                        $i++;
                }

                $questionData['userAnswer'] = array();

                $answerAttempt = $this->session->attempt;

                $sql = "SELECT answer_id FROM `student_answers` WHERE student_id='$studentId' AND question_id = '$questionId' AND mcq_test_id='$mcqId' AND test_attempt = '$answerAttempt'";

                $answer = $this->db->query($sql)->row();

              if (null != $answer) {
                 $questionData['userAnswer']['id'] = $answer->answer_id;
             }


                print_r(json_encode($questionData));
        }


        public function logout() {

            $this->session->sess_destroy();
           
            redirect('user/new-login');
        } 

        public function register() {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student_register.email]');
               if ($this->form_validation->run() == FALSE)
                {
                        $this->registration();
                }
                else
                {
               $data = array(
                        'first_name' => $_POST['firstname'],
                        'last_name' => $_POST['lastname'],
                        'email' => $_POST['email'],
                        'contact_no' => $_POST['cno'],
                        // 'state' => $_POST['state'],
                        // 'city' => $_POST['city'],
                        // 'dob' => $_POST['dob'],
                        'gender' => $_POST['gender'],
                        // '10th_passing_year' => $_POST['10th_py'],
                        // '10th_percentage' => $_POST['10th_per'],
                        // '12th_passing_year' => $_POST['12th_py'],
                        // '12th_percentage' => $_POST['12th_per'],
                        // 'degree' => $_POST['degree'],
                        // 'degree_percentage' => $_POST['degree_per'],
                        // 'degree_passing_year' => $_POST['degree_py'],
                        // 'stream' => $_POST['stream'],
                        // 'work_location' => $_POST['pwl'],
                        'password' => $_POST['password'],
                );

                $this->db->insert('student_register', $data);
                $this->session->set_flashdata('success', 'Registration successfull. Please Login');
                redirect('user/new-login', 'refresh');
            }
            
        }

        public function saveAnswer() {

            $studentId = $_POST['student_id'];
            $mcqId = $_POST['mcq_id'];
            $questionId = $_POST['question_id'];
            $timeTaken = $_POST['time_taken'];

            $data = array(
                'answer_id' => $_POST['answer_id'],
                'section_id' => $_POST['section_id'],
                'mcq_test_id' => $_POST['mcq_id'],
                'question_id' => $_POST['question_id'],
                'student_id' => $_POST['student_id'],
                'correct_ans' => 0,
                'time_taken' => $timeTaken,
                'test_attempt' => $this->session->attempt
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

            $attempt = $this->session->attempt;

            $sql = "SELECT id FROM `student_answers` WHERE student_id='$studentId' AND mcq_test_id = '$mcqId' AND question_id='$questionId' AND test_attempt = '$attempt'";

            $alreadyAnswer = $this->db->query($sql)->row();

            if (null != $alreadyAnswer) {
                $this->db->where('id', $alreadyAnswer->id);
                $this->db->update('student_answers',$data);
            } else {
                $this->db->insert('student_answers', $data);
            }
        }

        public function loadTest() {
            $this->load->view('mcq-test');
        }

        public function userHome() {
            $userData = $this->showUserProfile(true);
            $this->load->view('user-header');

            $this->load->view('user-home' , array('userData' => $userData));

            $this->load->view('codefooter');            
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
                // $time1= $_POST['time1'];
                // $time2= $_POST['time2'];
                // $time3= $_POST['time3'];

                // $params = json_decode($data, true);
                // $title = $params['test-title'];
                // $type = $params['test-type'];

                $totalSection = $_POST['totalSection'];
                $sectionIds = explode(",",$_POST['sectionIds']);
                $totalQuestion = explode(",",$_POST['questionNos']);
                $totalTime = explode(",",$_POST['sectionTime']);

                $data = array();

                for($i=0; $i < $totalSection; $i++) {
                    $t = array (
                        'mcq_test_id' => $mcqId,
                        'section_id' => $sectionIds[$i],
                        'completion_time' => $totalTime[$i],
                        'total_question' => $totalQuestion[$i]
                    );

                    $data[] = $t;

                }

//print_r(var_dump($data)); die;
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
            //    $pwd = md5(trim($_POST['pwd']));
               $pwd = trim($_POST['pwd']);
               $sql = "SELECT * FROM `student_register` WHERE email='$email' AND password = '$pwd'";

               $user = $this->db->query($sql)->row();


              if (null != $user) {
                $this->session->set_userdata('id', $user->id); 

                $this->session->set_userdata('email', $user->email); 

                $this->session->set_userdata('contact', $user->contact_no);

                $this->session->set_userdata('firstName', $user->first_name); 

                $this->session->set_userdata('lastName', $user->last_name);

                $this->session->set_userdata('userGender', $user->gender);

                 if ($this->checkProfile()) {
                    //echo "aa"; die;
                    $this->session->set_flashdata('success', 'Complete your profile');
                    redirect('user/profile');
                    //return $this->showUserProfile();
                } else {
                    if (strlen(trim($_POST['enter-code'])) > 0) {
                        $this->session->set_userdata('code', trim($_POST['enter-code']));
                        redirect('user/enter-code');
                    }
                    //redirect('user/enter-code');
                    redirect('user/home');
                }


            //     if (strlen(trim($_POST['enter-code'])) > 0) {
            //         //check profile if empty

            //         if ($this->checkProfile()) {
            //             //redirect('user/profile', 'refresh');
            //             $this->session->set_flashdata('success', 'Complete your profile');
            //             return $this->showUserProfile();
            //         } else {
            //            $a = $this->checkCode($_POST['enter-code']);
            //            echo $a; die;
            //         }

                    
            //     } else {
            //                     $userId = $this->session->id;

            // $sql = "SELECT * FROM `student_register` Where id = '$userId'" ;

            // $query = $this->db->query($sql);

            // $isEmpty = 0;

            // $userData = array();
           
            // if($query->num_rows() > 0)  {

            //     foreach ($query->result() as $row) {
                    
            //         $userData['first_name'] = $row->first_name;
            //         $userData['last_name'] = $row->last_name;
            //         $userData['email'] = $row->email;
            //         $userData['contact_no'] = $row->contact_no;
            //         $userData['state'] = $row->state;
            //         $userData['city'] = $row->city;
            //         $userData['dob'] = $row->dob;
            //         $userData['gender'] = $row->gender;
            //         $userData['tenth_passing_year'] = $row->tenth_passing_year;
            //         $userData['tenth_percentage'] = $row->tenth_percentage;
            //         $userData['twelveth_passing_year'] = $row->twelveth_passing_year;
            //         $userData['twelveth_percentage'] = $row->twelveth_percentage;
            //         $userData['degree'] = $row->degree;
            //         $userData['degree_passing_year'] = $row->degree_passing_year;
            //         $userData['degree_percentage'] = $row->degree_percentage;
            //         $userData['stream'] = $row->stream;
            //         $userData['work_location'] = $row->work_location;
            //     }
            // }

            //         $this->load->view('user-header');
            //         $this->load->view('update-profile',array('userData' => $userData));
            //         $this->load->view('codefooter');
            //     }
                   
                // if($query->num_rows() > 0)  {
                //         //$this->load->view('enter-code');

                // foreach ($query->result() as $row) {

                //         $id = $row->id;
                // }

                // $this->session->set_userdata('id', $id); 


                //redirect('read-instructions');   

               // redirect('enter-code', 'refresh');
                // }
              } else {
                $this->session->set_flashdata('error', 'Invalid Credentials');
                redirect('user/new-login', 'refresh');
              }
                
                

        }

        public function genereatePwd() {
            $this->load->helper('string');
            return (random_string('alnum',6));
        }

        public function userProfileUpdate() {
            $userData = array();

            $userData['first_name'] = $_POST['firstname'];
            $userData['last_name'] = $_POST['lastname'];
            $userData['email'] = $_POST['email'];
            $userData['contact_no'] = $_POST['cno'];
            $userData['gender'] = $_POST['gender'];
            $userData['state'] = $_POST['state'];
            $userData['city'] = $_POST['city'];
            $userData['dob'] = $_POST['dob'];
            $userData['tenth_passing_year'] = $_POST['tenth_py'];
            $userData['tenth_percentage'] = $_POST['tenth_per'];
            $userData['twelveth_passing_year'] = $_POST['twelveth_py'];
            $userData['twelveth_percentage'] = $_POST['twelveth_per'];
            $userData['degree'] = $_POST['degree'];
            $userData['degree_passing_year'] = $_POST['degree_py'];
            $userData['degree_percentage'] = $_POST['degree_per'];
            $userData['stream'] = $_POST['branch'];
            $userData['work_location'] = $_POST['pwl'];


            $userData['degree_university'] = $_POST['university'];

            $userData['pg_college'] = $_POST['collegem'];
            $userData['pg_passing_year'] = $_POST['degree_pym'];
            $userData['pg_university'] = $_POST['universitym'];
            $userData['pg_branch'] = $_POST['branchm'];

            $userData['pg_percentage'] = $_POST['degree_perm'];
            $userData['pg_degree'] = $_POST['degreem'];

            if (isset($_POST['gap'])) {
                $userData['year_gap'] = $_POST['gap'];
            }



    

            if (isset($_POST['isCreate'])) {

                //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student_register.email]');
                

                // if ($this->form_validation->run() == false)
                // {
                //     $this->createUserProfile();
                // } else {

                    if (isset($_SESSION['username'])) {
                        $userData['username'] = $_SESSION['username']['username'];
                        $userData['password'] = $_SESSION['username']['password'];
                    }

                    $this->db->insert('student_register', $userData);

                    $userId = $this->db->insert_id();

                    // $data = array (
                    //     'password' => $this->genereatePwd()
                    // );

                    // $this->db->where('id', $userId);
                    // $this->db->update('student_register',$data);  

                    $this->session->set_userdata('id', $userId);

                    // $cred = "Please note your Credentials  username : ".$userData['email']." and password : ".$data['password'];
                    
                    // $this->session->set_flashdata('credentials', $cred);

                    $this->session->set_userdata('id', $userId); 

                    $this->session->set_userdata('email', $userData['email']); 

                    $this->session->set_userdata('contact', $userData['contact_no']);

                    $this->session->set_userdata('firstName', $userData['first_name']); 

                    $this->session->set_userdata('lastName', $userData['last_name']);
                    
                    $this->session->set_userdata('userGender', $userData['gender']);

                    $this->session->set_flashdata('success', 'Profile Created Successfully');

                    redirect('user/profile', 'refresh');

                //}

            } else {

                $userId = $this->session->id;

                $this->db->where('id', $userId);
                $this->db->update('student_register',$userData);  
                $this->session->set_flashdata('success', 'Profile Updated Successfully');
                redirect('user/profile', 'refresh');
            }

        }  

        public function showUserProfile($user = false) {

            $userId = $this->session->id;

            $sql = "SELECT first_name,last_name,email,contact_no,state, city, dob, gender, tenth_passing_year, tenth_percentage, twelveth_passing_year, twelveth_percentage, degree, degree_passing_year, degree_percentage, stream, work_location, profile_image FROM `student_register` Where id = '$userId'" ;

            $query = $this->db->query($sql);

            $isEmpty = 0;

            $userData = array();
           
            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {
                    
                    $userData['first_name'] = $row->first_name;
                    $userData['last_name'] = $row->last_name;
                    $userData['email'] = $row->email;
                    $userData['contact_no'] = $row->contact_no;
                    $userData['state'] = $row->state;
                    $userData['city'] = $row->city;
                    $userData['dob'] = $row->dob;
                    $userData['gender'] = $row->gender;
                    $userData['tenth_passing_year'] = $row->tenth_passing_year;
                    $userData['tenth_percentage'] = $row->tenth_percentage;
                    $userData['twelveth_passing_year'] = $row->twelveth_passing_year;
                    $userData['twelveth_percentage'] = $row->twelveth_percentage;
                    $userData['degree'] = $row->degree;
                    $userData['degree_passing_year'] = $row->degree_passing_year;
                    $userData['degree_percentage'] = $row->degree_percentage;
                    $userData['stream'] = $row->stream;
                    $userData['work_location'] = $row->work_location;
                    $userData['profile-pic'] = $row->profile_image;
                }
            }

            if ($user) {

                return $userData;

            } else {

                $this->load->view('user-header');
                $this->load->view('update-profile', array('userData' => $userData));
                $this->load->view('codefooter');
            }
        }

        public function createUserProfile () {
            $this->load->view('user-header');
            $this->load->view('user-profile');
            $this->load->view('codefooter');
        }

        public function enterCode() {

            // if ($this->checkProfile()) {
            //     redirect('user/profile', 'refresh');
                    
            // } else {
                $this->load->view('user-header');
                $this->load->view('enter-code');
                $this->load->view('codefooter');
           // }
            
            //$this->load->view('html/index.html'); 
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

        // public function checkCode() {
        //     $code = $_POST['code'];

        //     $sql = "SELECT * FROM `mcq_code` WHERE code='$code' AND is_active = 1";

        //    $query = $this->db->query($sql);
           
        //     if($query->num_rows() > 0)  {

        //         foreach ($query->result() as $row) {

        //                 $mcqId = $row->mcq_test_id;
        //         }   

        //         $this->session->set_userdata('mcqId', $mcqId); 
                

        //         $this->generateQuestion($code, $mcqId);

        //     }
        // }
        
        public function viewResult() {

            $mcqId = $this->session->mcqId;
            $studentId = $this->session->id;

            //$sql = "SELECT mcq_test_pattern.section_id , section.name FROM `mcq_test_pattern` where mcq_test_id = ". $mcqId. " join section on section.id = mcq_test_pattern.id ";

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
                // $countSection = $countSection + 1;

                // $sql = "sql".$countSection;
                // $$sql = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id =".$row->section_id;
                

                // $sectionDetail[] = $row->section_id;
                // $result = "result".$countSection;
                // $$result =  $this->db->query($$sql);
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



           
            // $sql = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 1 UNION ALL
            //     SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 2
            //     UNION ALL
            //     SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 3";

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



            //$sql = "SELECT completion_time FROM `mcq_time` where mcq_test_id =".$mcqId." and section_id = 1 union ALL SELECT completion_time FROM `mcq_time` where mcq_test_id =".$mcqId." and section_id = 2 UNION ALL SELECT completion_time FROM `mcq_time` where mcq_test_id =".$mcqId." and section_id = 3";

            $sql = $sqlTime;

            $attempt = $this->session->attempt;
           
            $query = $this->db->query($sql);
           
            $sqlAns = "";
            $i = 0;

            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                    $result2[] = $row->completion_time;

                    if ($i > 0) {
                        $sqlAns .= " UNION ALL ";

                    }

                    $sqlAns .= "SELECT sum(time_taken) as time_taken FROM `student_answers` WHERE mcq_test_id = ".$mcqId." and student_id =".$studentId." and section_id=".$sectionId['id'][$i]." and test_attempt=".$attempt;

                    $i++;
                }
            }



            

            // $sql = "SELECT sum(time_taken) as time_taken FROM `student_answers` WHERE mcq_test_id = ".$mcqId." and student_id =".$studentId." and section_id=1 and test_attempt='$attempt' UNION ALL SELECT sum(time_taken) as time_taken FROM `student_answers` WHERE mcq_test_id = ".$mcqId." and student_id = ".$studentId." and section_id=2 and test_attempt='$attempt' UNION ALL SELECT sum(time_taken) as time_taken FROM `student_answers` WHERE mcq_test_id = ".$mcqId." and student_id =".$studentId." and section_id=3 and test_attempt='$attempt'";

            $sql = $sqlAns;           

            $query = $this->db->query($sql);
           
            if($query->num_rows() > 0)  {

                foreach ($query->result() as $row) {

                    $result1[] = $row->time_taken;
                }
            }


            //$codeResult = $this->codeTestResult();

            $result = array ($resultQ, $result2, $result1);
            $a = array();
            $i = 0;
            foreach ($result2 as $key => $value) {
               $a[$i]['total_question'] = $resultQ['qno'][$i];
               $a[$i]['section'] = $resultQ['name'][$i];
               
               if ($value > 60 ) {
                $min = intval($value / 60);
                $sec = $value % 60;

                $totaltime = $min." min ";

                if ($sec > 0) {
                    $totaltime .= $sec." sec";
                }
               } else {

                $totaltime = $value." sec";
               }

               $a[$i]['total_time'] = $totaltime;
               
               if ($result1[$i] > 60 ) {
                $min = intval($result1[$i] / 60);
                $sec = $result1[$i] % 60;
                $time = $min." min ".$sec. " sec";
               } else {
                if ($result1[$i] > 0) {
                    $time = $result1[$i]." sec";    
                } else {
                    $time = "NA";
                }
                
               }
               $a[$i]['user_time'] = $time;
               $i++;
            }
           // echo "<pre>";
           // print_r($a); die;

            $this->load->view('user-header');
            $this->load->view('results', array("results"=>$a));
            $this->load->view('codefooter');

        }

        public function codeTestResult() {

            $id = $this->session->id;
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,"https://code.skillrary.com/api/user-timings");
            curl_setopt($ch, CURLOPT_POST, 1);
            //curl_setopt($ch, CURLOPT_POSTFIELDS,"user_id=1");

            // In real life you should use something like:
             curl_setopt($ch, CURLOPT_POSTFIELDS, 
                     http_build_query(array('user_id' => $id)));

            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);


            $result = json_decode($server_output);

            curl_close ($ch);

            
            $codeResult = array ("Code Test", "2", "120", $result->result);
            return $codeResult;

            // Further processing ...
            //if ($server_output == "OK") { ... } else { ... }

        }

        public function checkCode($code = null) {

            if ($this->checkProfile()) {
                $this->session->set_flashdata('success', 'Update Profile to start test');

                redirect('user/profile');
            }


            // if ($this->isMcqTaken() > 0) {
            //     $this->session->set_flashdata('success', 'Invalid Code');

            //     redirect('user/enter-code');
            // } else {

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
                    
                    if ($attempt > 0) {
                        $attemptCount = $this->isMcqTaken(true,$attempt);
                    } else {
                        $attemptCount = $this->isMcqTaken();
                    }

                    if ($attemptCount == $attempt) {
                        $this->session->set_flashdata('success', 'You have crossed the number of attempts to take test. Please contact admin');

                        redirect('user/enter-code');
                    } else {
                           //++$attemptCount;
//echo $this->isMcqTaken() ;die;
                        $attemptCount = $this->isMcqTaken() + 1;

                        $this->session->set_userdata('attempt', $attemptCount);

                        $this->generateQuestion($code, $mcqId);
                    }
                } else {
                    $this->session->set_flashdata('success', 'Invalid Code');

                        redirect('user/enter-code');
                }
            // }            
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
            $sql = "SELECT section_id FROM `mcq_test_pattern` where mcq_test_id = ". $mcqId;
            $query = $this->db->query($sql);
            $sectionData = array();
            $sectionDetail = array();
            $countSection = 0;
//echo $sql; die;
            foreach ($query->result() as $row) {
                $countSection = $countSection + 1;

                $sql = "sql".$countSection;
                $$sql = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id =".$row->section_id;
                

                $sectionDetail[] = $row->section_id;
                $result = "result".$countSection;
                $$result =  $this->db->query($$sql);
                
            }

//print_r($countSection); die;
            // $sql1 = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id = 1";
            // $sql2 = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id = 2";
            // $sql3 = "SELECT * FROM `mcq_test_pattern` WHERE mcq_test_id= '$mcqId' AND section_id = 3";

            // $result1 =  $this->db->query($sql1);
            // $result2 =  $this->db->query($sql2);
            // $result3 =  $this->db->query($sql3);


                //foreach ($query->result() as $row) {
                    $j = 0;
                for($a = 1; $a <= $countSection; $a++) {

                    $sqlCount = "sqlQ".$a;
                    $resultCount = "result".$a;
                        
                   if($$resultCount->num_rows() > 0)  {
                        $i = 0;
                        $$sqlCount = "";
                        // output data of each row
                        foreach ($$resultCount->result() as $row)  {
                            if ($i > 0 ) {
                                    $$sqlCount .= "UNION ALL";
                            }
                            $levelId = $row->level_id;
                            $totalQ = $row->total_question;
                            // $$sqlCount .= "(SELECT id FROM `question_bank` WHERE section_id =".$sectionDetail[$j]." and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
                            $$sqlCount .= "(SELECT id FROM `question_bank` WHERE section_id =".$sectionDetail[$j]." ORDER BY id LIMIT ".$totalQ.")";

                            $i++;
                            $j++;
                        }

                    }    
                }

               //  $i = 0;
                
               //  $sqlQ1 = "";

               // if($result1->num_rows() > 0)  {
               //      // output data of each row
               //      foreach ($result1->result() as $row)  {
               //          if ($i > 0 ) {
               //                  $sqlQ1 .= "UNION ALL";
               //          }
               //          $levelId = $row->level_id;
               //          $totalQ = $row->total_question;
               //          $sqlQ1 .= "(SELECT id FROM `question_bank` WHERE section_id = 1 and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
               //          $i++;
               //      }

               //  }


               //  $i = 0;
               //  $sqlQ2="";
               //   if($result2->num_rows() > 0)  {
               //      // output data of each row
               //      foreach ($result2->result() as $row)  {
               //          if ($i > 0 ) {
               //                  $sqlQ2 .= "UNION ALL";
               //          }

               //          $levelId = $row->level_id;
               //          $totalQ = $row->total_question;

               //          $sqlQ2 .= "(SELECT id FROM `question_bank` WHERE section_id = 2 and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
               //          $i++;
               //      }

               //  }

               //  $i = 0;
               //  $sqlQ3="";
               //   if($result3->num_rows() > 0)  {
               //      // output data of each row
               //      foreach ($result3->result() as $row)  {
               //          if ($i > 0 ) {
               //                  $sqlQ3 .= "UNION ALL";
               //          }
               //          $levelId = $row->level_id;
               //          $totalQ = $row->total_question;

               //          $sqlQ3 .= "(SELECT id FROM `question_bank` WHERE section_id = 3 and level_id = ".$levelId." ORDER BY id LIMIT ".$totalQ.")";
               //          $i++;
               //      }

               //  }


                for($a = 1; $a <= $countSection; $a++) {
                    $result = "resultQ".$a;
                    $q = "sqlQ".$a;
                    $$result = $this->db->query($$q);    
                }

                // $resultQ1 = $this->db->query($sqlQ1);
                // $resultQ2 = $this->db->query($sqlQ2);
                // $resultQ3 = $this->db->query($sqlQ3);



                // $q1 = "";
                // $q2 = "";
                // $q3 = "";

                // $i = 0;

                // if($resultQ1->num_rows() > 0)  {
                //     // output data of each row
                //     foreach ($resultQ1->result() as $row)  {
                //         if ($i > 0 ) {
                //                 $q1 .= ",";
                //         }
                //         $q1 .= $row->id;
                //         $i++;
                //     }
                // }


                for($a = 1; $a <= $countSection; $a++) {
                    $result = "resultQ".$a;
                    $q = "q".$a;
                    // $$result = $this->db->query($$q); 
                    $$q = "";

                    if($$result->num_rows() > 0)  {
                        $i = 0;
                        // output data of each row
                        foreach ($$result->result() as $row)  {
                            if ($i > 0 ) {
                                    $$q .= ",";
                            }
                            $$q .= $row->id;
                            $i++;
                        }
                    }
                }   
                





                //echo $sqlQ2; die;
                // $i = 0;
                // if($resultQ2->num_rows() > 0)  {
                //     // output data of each row
                //      foreach ($resultQ2->result() as $row)  {
                //         if ($i > 0 ) {
                //                 $q2 .= ",";
                //         }
                //         $q2 .= $row->id;
                //         $i++;
                //     }

                // }

                // $i = 0;
                // if($resultQ3->num_rows() > 0)  {
                //     // output data of each row
                //     foreach ($resultQ3->result() as $row)  {
                //         if ($i > 0 ) {
                //                 $q3 .= ",";
                //         }
                //         $q3 .= $row->id;
                //         $i++;
                //     }

                // }





                //echo $q1, "<br>", $q2, "<br>", $q3;

                // $section1 = explode(",", $q1);
                // shuffle($section1);

                // $section1Questions = implode(",",$section1);

                // $section2 = explode(",", $q2);
                // shuffle($section2);

                // $section2Questions = implode(",",$section2);

                // $section3 = explode(",", $q3);
                // shuffle($section3);

                // $section3Questions = implode(",",$section3);

                for($a = 1; $a <= $countSection; $a++) {
                    $section = "section".$a;
                    $q = "q".$a;
                    $$section = explode(",", $$q);
                    shuffle($$section);

                    $sectionQ = "section".$a."Questions";
                    $$sectionQ = implode(",",$$section);
                }

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

                $data = array();
                $b = 0;
                for($a = 1; $a <= $countSection; $a++) {
                    
                    $q = "q".$a;
                    $qn = "section".$a."Questions";
                    $$q =  array(
                        'student_id' => $studentId,
                        'mcq_test_id' => $mcqId,
                        'mcq_code' => $code,
                        'section_id' => $sectionDetail[$b],
                        'questions' => $$qn
                    );
                    $b++;

                    $data[] = $$q;
                }

                // $q1 = array(
                //         'student_id' => $studentId,
                //         'mcq_test_id' => $mcqId,
                //         'mcq_code' => $code,
                //         'section_id' => 1,
                //         'questions' => $section1Questions
                // );

                // $q2 = array(
                //         'student_id' => $studentId,
                //         'mcq_test_id' => $mcqId,
                //         'mcq_code' => $code,
                //         'section_id' => 2,
                //         'questions' => $section2Questions
                // );

                // $q3 = array(
                //         'student_id' => $studentId,
                //         'mcq_test_id' => $mcqId,
                //         'mcq_code' => $code,
                //         'section_id' => 3,
                //         'questions' => $section3Questions
                // );

                // $data = array(
                //         $q1, $q2, $q3
                // );

                $this->db->insert_batch('mcq_test_question', $data);
                $b = 0;
                for($a = 1; $a <= $countSection; $a++) {

                    $s = "sql".$a;
                    $r = "result".$a;
                    $$s = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id =".$sectionDetail[$b];
                    $$r = $this->db->query($$s);

                    $b++;
                }


                // $sql1 = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 1";
                // $sql2 = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 2";
                // $sql3 = "SELECT sum(total_question) as total FROM `mcq_test_pattern` WHERE mcq_test_id=".$mcqId." and section_id = 3";


                // $result1 = $this->db->query($sql1);
                // $result2 = $this->db->query($sql2);
                // $result3 = $this->db->query($sql3);

                $i = 0;

                $data = array();

                for($a = 1; $a <= $countSection; $a++) {
                    $r = "result".$a;
                    if($$r->num_rows() > 0)  {
                        // output data of each row
                        foreach ($$r->result() as $row)  {

                            $sql = "SELECT section_name FROM `section` WHERE id=".$sectionDetail[$i];

                            $sectionName = $this->db->query($sql)->row();

                           $data[$i]['section'] = $sectionName->section_name;
                           $data[$i]['total'] = $row->total;
                           $i++;
                        }

                    }
                }

                // if($result1->num_rows() > 0)  {
                //     // output data of each row
                //     foreach ($result1->result() as $row)  {
                //        $data[$i]['section'] = "English";
                //        $data[$i]['total'] = $row->total;
                //     }

                // }

                // $i = 1;
                // if($result1->num_rows() > 0)  {
                //     // output data of each row
                //     foreach ($result2->result() as $row)  {
                //        $data[$i]['section'] = "Reasoning";
                //        $data[$i]['total'] = $row->total;
                //     }

                // }

                // $i = 2;
                // if($result1->num_rows() > 0)  {
                //     // output data of each row
                //     foreach ($result1->result() as $row)  {
                //        $data[$i]['section'] = "Quantitative";
                //        $data[$i]['total'] = $row->total;
                //     }

                // }
//print_r($data); die;
                $b = 0;
                for($a = 1; $a <= $countSection; $a++) {
                    $sql = "SELECT completion_time FROM `mcq_time` WHERE mcq_test_id='$mcqId' AND section_id = ".$sectionDetail[$b];

                   //$query = $this->db->query($sql);

                   $totalTime = $this->db->query($sql)->row();
//echo $sql;
//print_r(var_dump($totalTime)); die;
                   $data[$b]['time'] = $totalTime->completion_time;
                   $b++;
                }


               //  $sql = "SELECT completion_time FROM `mcq_time` WHERE mcq_test_id='$mcqId' AND section_id = 1";

               // //$query = $this->db->query($sql);

               // $totalTime = $this->db->query($sql)->row();

               // $data[0]['time'] = $totalTime->completion_time;

               //  $sql = "SELECT completion_time FROM `mcq_time` WHERE mcq_test_id='$mcqId' AND section_id = 2";

               // //$query = $this->db->query($sql);

               // $totalTime = $this->db->query($sql)->row();

               // $data[1]['time'] = $totalTime->completion_time;

               //  $sql = "SELECT completion_time FROM `mcq_time` WHERE mcq_test_id='$mcqId' AND section_id = 3";

               // //$query = $this->db->query($sql);

               // $totalTime = $this->db->query($sql)->row();

               // $data[2]['time'] = $totalTime->completion_time;


                $data['isCodeId'] = $this->getCodeTest();

                //print_r($data); die;
                //$this->showInstructions($data);
               $this->session->set_userdata('instructionData', $data); 
                redirect('read-instructions');
                //redirect('mcq-question', 'refresh');
                //echo "ok";
        }

        // public function showInstructions($data) {
        //     $this->load->view('instructions', array("data"=>$data));
        // }

        public function uploadProfileImage() {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('profilePic'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    print_r($error); die;

                    //$this->load->view('upload_form', $error);
            }
            else
            {
                // echo "dfafa"; die;
                    // $data = array('upload_data' => $this->upload->data());

                    // $this->load->view('upload_success', $data);
                $userId = $this->session->id;

            $userData = array();

            $userData['profile_image'] = "uploads/".$_FILES['profilePic']['name'];

           
            $this->db->where('id', $userId);
            $this->db->update('student_register',$userData);

            $this->session->set_flashdata('success', 'Updated successfully');
                redirect('user/profile', 'refresh');
            }
        }

        public function loadFrame() {
            $this->load->view('loadiframe');
        }

        public function showInstructions() {
            $this->load->view('user-header');
            $this->load->view('instructions');
        }

        public function redirectPage() {
            $this->load->view('redirecting-page');
        }

        public function searchTest() {
            echo "hello"; die;
        }
}
