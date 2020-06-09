<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
 
$route['user/new-login']['GET'] = 'MyController/loginOpt';

$route['question/create'] = 'questionBank';
// $route['question/getSection']['POST'] = 'questionBank/getSection';
$route['question/getSection']['POST'] = 'AdminController/getSection';

$route['question/getQuestionLevel']['POST'] = 'AdminController/getQuestionLevel';

$route['question/getTotalQuestion']['POST'] = 'AdminController/getTotalQuestion';


$route['question/uploadQuestion']['GET'] = 'AdminController/uploadQuestion';

// $route['question/getSubSection']['POST'] = 'questionBank/getSubSection';

$route['question/getSubSection']['POST'] = 'AdminController/getSubSection';
$route['addPatern']['POST'] = 'AdminController/addPatern';

$route['admin/save']['POST'] = 'AdminController/save';

$route['mcq-question'] = 'questionBank/show';

$route['code-test'] = 'questionBank/showCodeTest';

$route['getQuestion'] = 'questionBank/getQuestion';
$route['fetchQuestion'] = 'questionBank/fetchQuestion';

$route['search/MCQ'] = 'questionBank/searchTest';

$route['admin/uploadQuestion']['POST'] = 'AdminController/uploadQuestion';

$route['user/registration'] = 'questionBank/registration';

$route['user/register']['POST'] = 'questionBank/register';

$route['user/login'] = 'questionBank/login';

$route['user/signin']['POST'] = 'questionBank/signin';

$route['saveAnswer'] = 'questionBank/saveAnswer';

$route['createMCQ'] = 'questionBank/createMcq';
//$route['addTest']['POST'] = 'questionBank/addTest';

$route['saveCodeTest']['POST'] = 'AdminController/codeTest';

$route['generateUsrPwd']['POST'] = 'AdminController/generateUsrPwd';

$route['addTest']['POST'] = 'AdminController/addTest';

$route['checkAvailableQuestion']['POST'] = 'AdminController/checkAvailableQuestion';

$route['addTestTime']['POST'] = 'AdminController/addTestTime';
$route['editTestTime']['POST'] = 'AdminController/editTestTime';

$route['addQuestion']['POST'] = 'questionBank/addQuestion';

$route['add-question/:any/:any']= 'AdminController/showQuestion';

$route['user/enter-code'] = 'questionBank/enterCode';
 
$route['user/profile'] = 'questionBank/showUserProfile';

$route['user/profile-state'] = 'questionBank/showUserProfileState';

$route['user/profile-city']['POST'] = 'questionBank/showUserProfileCity';

$route['user/create/profile'] = 'AdminController/createUserProfile';

$route['user/update-profile']['POST'] = 'questionBank/userProfileUpdate';

$route['read-instructions'] = 'questionBank/showInstructions';

$route['user/checkCode']['POST'] = 'questionBank/checkCode';

$route['admin/checkCode']['POST'] = 'AdminController/checkCode';

$route['user/logout'] = 'MyController/logout';

$route['user/home'] = 'questionBank/userHome';

$route['user/home'] = 'questionBank/userHome';




$route['user/test'] = 'questionBank/codeTestResult';

$route['user/upload/do_upload'] = 'questionBank/uploadProfileImage';

$route['admin/create-test'] = 'AdminController/createTest';

$route['admin/view-mcq/:any'] = 'AdminController/viewTest';

$route['admin/view-mcq/:any/:any'] = 'AdminController/viewTest';

$route['admin/view-mcq-search/:any'] = 'AdminController/viewTestSearch';

$route['admin/view-mcq-search/:any/:any'] = 'AdminController/viewTestSearch';

$route['admin/view-interview/:any'] = 'AdminController/viewInterview';

$route['admin/view-interview/:any/:any'] = 'AdminController/viewInterview';

$route['admin/view-interview-search/:any'] = 'AdminController/viewInterviewSearch';
$route['admin/view-interview-search/:any/:any'] = 'AdminController/viewInterviewSearch';

$route['admin/interview-customers-list'] = 'AdminController/interviewCustomers';
$route['admin/interview-customers-list/:any'] = 'AdminController/interviewCustomers';

$route['admin/interview-customers-list-search'] = 'AdminController/interviewCustomersSearch';

$route['admin/interview-customers-list-search/:any'] = 'AdminController/interviewCustomersSearch';
 
$route['admin/view-questions'] = 'AdminController/viewQuestion';

$route['admin/view-questions/:any'] = 'AdminController/viewQuestion';

$route['admin/view-questions-search'] = 'AdminController/viewQuestionSearch';

$route['admin/view-questions-search/:any'] = 'AdminController/viewQuestionSearch';


$route['customer/view-questions'] = 'CustomerController/viewQuestion';

$route['customer/view-questions/:any'] = 'CustomerController/viewQuestion';

$route['customer/view-questions-search'] = 'CustomerController/viewQuestionSearch';

$route['customer/view-questions-search/:any'] = 'CustomerController/viewQuestionSearch';


$route['admin/view-results'] = 'AdminController/viewResult';

$route['admin/view-mcq-data/:any'] = 'AdminController/viewMcqData';
$route['admin/view-mcq-data/:any/:any'] = 'AdminController/viewMcqData';

$route['admin/view-mcq-data-search/:any'] = 'AdminController/viewMcqDataSearch';

$route['admin/view-mcq-data-search/:any/:any'] = 'AdminController/viewMcqDataSearch';

$route['admin/view-students/:any']= 'AdminController/showStudents';

$route['admin/download-students/:any/:any']= 'AdminController/downloadExcel';

$route['admin/add-question'] = 'AdminController/createQuestion';

$route['customer/add-question'] = 'CustomerController/createQuestion';

$route['admin/edit-question/:any'] = 'AdminController/editQuestion';

$route['customer/edit-question/:any'] = 'CustomerController/editQuestion';

//$route['admin/login'] = 'AdminController/adminLogin';

$route['admin/test-code'] = 'AdminController/viewCodeTest';

$route['essay'] = 'welcome/showEssay';

$route['user/view-results'] = 'questionBank/viewResult';

$route['addMcq']['POST'] = 'questionBank/addMcqCode';

$route['redirect-to-code'] = 'questionBank/redirectPage';

$route['saveTestStatus'] = 'questionBank/saveTestStatus';
$route['saveResult'] = 'questionBank/saveResult';

$route['load-frame'] = 'questionBank/loadFrame';

$route['create/test'] = 'questionBank/loadTest';

$route['mypdf'] = "welcome/generateXls";

$route['download-pdf/:any/:any'] = "welcome/mypdf";

$route['default_controller'] = 'welcome';
//$route['default_controller'] = 'createMCQ';
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'AdminController/adminLogin'; 

$route['admin/checklogin']['POST'] = 'AdminController/checkLogin';

$route['admin/logout'] = 'AdminController/logout';

$route['admin/edit-test/:any'] = 'AdminController/editTest';

$route['admin/edit-test-save']['POST'] = 'AdminController/editTestsave';

//4 april

$route['admin/create-roles'] = 'AdminController/addRoles'; 

$route['admin/upload-image'] = 'AdminController/uploadImage';

$route['admin/upload-image-save']['POST'] = 'AdminController/uploadImageSave';

$route['admin/upload-image-delete']['POST'] = 'AdminController/activeSiteImage';


$route['admin/saveRole'] ['POST']= 'AdminController/saveRole'; 

$route['admin/create-roles/:any'] = 'AdminController/addRoles'; 

$route['admin/create-roles-search'] = 'AdminController/addRolesSearch'; 

$route['admin/create-roles-search/:any'] = 'AdminController/addRolesSearch'; 

$route['admin/saveRole'] ['POST']= 'AdminController/saveRole'; 

$route['admin/create-users'] = 'AdminController/createUser'; 
$route['admin/create-users/:any'] = 'AdminController/createUser'; 

$route['admin/create-users-search'] = 'AdminController/createUserSearch'; 

$route['admin/create-users-search/:any'] = 'AdminController/createUserSearch'; 

$route['admin/saveUser'] ['POST']= 'AdminController/saveUser'; 

$route['admin/sendInvite'] ['POST']= 'AdminController/sendInvite';

//proctored controller make later
$route['proctor/assignedUsers'] = 'AdminController/proctoredUsers'; 

$route['proctor/assignedUsers/:any'] = 'AdminController/proctoredUsers'; 

$route['proctor/assignedUsersSearch'] = 'AdminController/proctoredUsersSearch'; 

$route['proctor/assignedUsersSearch/:any'] = 'AdminController/proctoredUsersSearch'; 

//email
$route['admin/contact'] = 'AdminController/contact'; 

$route['admin/sendMail'] ['POST']= 'AdminController/sendMail';

$route['admin/createMeeting'] ['POST']= 'AdminController/createMeeting';

$route['admin/startMeeting'] ['POST']= 'AdminController/startMeeting';

$route['admin/activateTest'] ['POST']= 'AdminController/activateTest';

$route['admin/startTest'] ['POST']= 'AdminController/startTest';

$route['admin/joinMeeting']['POST'] = 'AdminController/joinMeeting';

//interview
$route['admin/add-interview']['POST'] = 'AdminController/addInterviewGroup'; 
//$route['admin/create-interview'] = 'AdminController/createInterview'; 
$route['admin/create-interview/:any/:any'] = 'AdminController/createInterview'; 

$route['admin/create-interview/:any/:any/:any'] = 'AdminController/createInterview'; 


$route['admin/create-interview-search/:any/:any'] = 'AdminController/createInterviewSearch';
$route['admin/create-interview-search/:any/:any/:any'] = 'AdminController/createInterviewSearch';


$route['admin/create-interview-customers'] = 'AdminController/createInterviewCustomers'; 

$route['admin/generateInterviewUsrPwd']['POST'] = 'AdminController/generateInterviewUsrPwd';

$route['admin/sendInterviewInvite'] ['POST']= 'AdminController/sendInterviewInvite';

$route['interviewer/assignedInterviews'] = 'AdminController/assignedInterviews'; 

$route['interviewer/assignedInterviews/:any'] = 'AdminController/assignedInterviews';

$route['interviewer/assignedInterviewsSearch'] = 'AdminController/assignedInterviewsSearch';

$route['interviewer/assignedInterviewsSearch/:any'] = 'AdminController/assignedInterviewsSearch';

$route['user/interview'] = 'questionBank/activeInterview';

$route['admin/closeInterview'] ['POST']= 'AdminController/closeInterview';

$route['admin/interviewFeedback'] ['POST']= 'AdminController/interviewFeedback';

$route['interview/login'] = 'questionBank/interviewLogin';

$route['admin/saveInterviewStatus'] ['POST']= 'AdminController/saveInterviewStatus';

$route['admin/showStudentData'] ['POST']= 'AdminController/studentDetail';

$route['admin/showInterviewFeedback'] ['POST']= 'AdminController/showInterviewFeedback';

$route['admin/saveActiveRound'] ['POST']= 'AdminController/saveActiveRound';

$route['admin/getToken'] = 'AdminController/getAccessToken';

$route['admin/updateToken'] = 'AdminController/updateAccessToken';

$route['skillrary/whiteboard'] = 'welcome/showWhiteBoard';

$route['admin/startGotoMeeting'] = 'AdminController/startMeetingIframe';

$route['admin/view-meeting'] = 'AdminController/gotomeetingView';

$route['user/join-meeting'] = 'AdminController/gotomeetingJoin';

$route['deleteUsrPwd']['POST'] = 'AdminController/deleteUsrPwd';
$route['printUsrPwd'] = 'welcome/printUsrPwd';

$route['admin/create-customers'] = 'AdminController/createCustomer';

$route['admin/create-customers-search'] = 'AdminController/createCustomerSearch';

$route['admin/create-customers/:any'] = 'AdminController/createCustomer';

$route['admin/create-customers-search/:any'] = 'AdminController/createCustomerSearch';

$route['admin/mcq-customers'] = 'AdminController/mcqCustomer';

$route['admin/mcq-customers/:any'] = 'AdminController/mcqCustomer';

  
$route['admin/mcq-customers-search'] = 'AdminController/mcqCustomerSearch';

$route['admin/mcq-customers-search/:any'] = 'AdminController/mcqCustomerSearch';

$route['admin/todays-interview'] = 'AdminController/todaysInterview';

$route['admin/todays-interview/:any'] = 'AdminController/todaysInterview';

$route['admin/todays-interview-search'] = 'AdminController/todaysInterviewSearch';

$route['admin/todays-interview-search/:any'] = 'AdminController/todaysInterviewSearch';


$route['admin/fetch-customers']['POST'] = 'AdminController/fetchCustomer'; 
$route['admin/save-customers']['POST'] = 'AdminController/saveCustomer'; 
$route['admin/add-interviewers/:any'] = 'AdminController/showInterviewerList'; 

$route['admin/add-interviewer-customer'] = 'AdminController/addInterviewerToCustomer'; 
$route['admin/remove-interviewer-customer'] = 'AdminController/removeInterviewerToCustomer'; 

$route['admin/uploadGotomeeting'] = 'AdminController/uploadGotomeeting';

$route['html-editor'] = 'welcome/showEditor';

//typing-test

$route['typing-test'] = 'welcome/typingTest';

$route['typing-test/start'] = 'welcome/typingTestStart';

$route['typing-test/result'] = 'welcome/typingTestResult';

$route['customer/login'] = 'CustomerController/login';
$route['customer/checklogin']['POST'] = 'CustomerController/checkLogin';
$route['customer/checkRoom']['POST'] = 'CustomerController/checkRoom';
$route['customer/dashboard'] = 'CustomerController/viewDashboard';

$route['customer/create-test'] = 'CustomerController/createTest';
$route['customer/addTest']['POST'] = 'CustomerController/addTest';
$route['customer/addTestTime']['POST'] = 'CustomerController/addTestTime';

$route['customer/mcq-list'] = 'CustomerController/viewMcqList';
  
$route['customer/mcq-list/:any'] = 'CustomerController/viewMcqList';

$route['customer/mcq-list-search'] = 'CustomerController/viewMcqListSearch';

$route['customer/mcq-list-search/:any'] = 'CustomerController/viewMcqListSearch';

$route['customer/view-mcq-data/:any'] = 'CustomerController/viewMcqData';

$route['customer/view-mcq-data/:any/:any'] = 'CustomerController/viewMcqData';

$route['customer/view-mcq-data-search/:any'] = 'CustomerController/viewMcqDataSearch';

$route['customer/view-mcq-data-search/:any/:any'] = 'CustomerController/viewMcqDataSearch';

$route['customer/view-interview'] = 'CustomerController/viewInterview';

$route['customer/view-interview/:any'] = 'CustomerController/viewInterview';

$route['customer/view-interview-search'] = 'CustomerController/viewInterviewSearch';

$route['customer/view-interview-search/:any'] = 'CustomerController/viewInterviewSearch';

$route['customer/todays-interview'] = 'CustomerController/todaysInterview';

$route['customer/todays-interview/:any'] = 'CustomerController/todaysInterview';

$route['customer/todays-interview-search'] = 'CustomerController/todaysInterviewSearch';

$route['customer/todays-interview-search/:any'] = 'CustomerController/todaysInterviewSearch';


$route['customer/interview-result/:any'] = 'CustomerController/interviewResult'; 

$route['customer/interview-result/:any/:any'] = 'CustomerController/interviewResult'; 

$route['customer/interview-result-search/:any'] = 'CustomerController/interviewResultSearch'; 

$route['customer/interview-result-search/:any/:any'] = 'CustomerController/interviewResultSearch'; 

$route['customer/logout'] = 'CustomerController/logout';

$route['customer/create-interview-group'] = 'CustomerController/createInteviewGroup';

$route['customer/save-interview-group']['POST'] = 'CustomerController/saveInterviewGroup'; 

$route['customer/add-section'] = 'CustomerController/addSection';
$route['customer/save-section'] = 'CustomerController/saveSection';

$route['customer/upload-question'] = 'CustomerController/uploadQuestionView';

$route['customer/save-uploaded-question'] = 'CustomerController/saveUploadedQuestion';

$route['customer/create-interviewers'] = 'CustomerController/addInterviewer';

$route['customer/create-interviewers/:any'] = 'CustomerController/addInterviewer';

$route['customer/create-interviewers-search'] = 'CustomerController/addInterviewerSearch';

$route['customer/create-interviewers-search/:any'] = 'CustomerController/addInterviewerSearch';

$route['customer/save-interviewers']['POST'] = 'CustomerController/saveInterviewer';
$route['customer/generateInterviewUsrPwd']['POST'] = 'CustomerController/generateInterviewUsrPwd';

$route['admin/add-meeting-credentials'] = 'AdminController/createMeetingCredentials'; 

$route['admin/add-meeting-credentials/:any'] = 'AdminController/createMeetingCredentials'; 

$route['admin/add-meeting-credentials-search'] = 'AdminController/createMeetingCredentialsSearch'; 

$route['admin/add-meeting-credentials-search/:any'] = 'AdminController/createMeetingCredentialsSearch'; 

$route['admin/save-meeting-credentials'] = 'AdminController/saveMeetingCredentials'; 

$route['admin/result/:any'] = 'AdminController/updateResult';


$route['skillrary-chat'] = 'ChatController/showJoinPage';
$route['createChat']['POST'] = 'ChatController/createChatFun';
$route['chat-room'] = 'ChatController/showChatPage';
$route['save-mess']['POST'] = 'ChatController/saveMessageFun';
$route['show-message'] = 'ChatController/showMessageFun';

$route['joinChatStudent']['POST'] = 'ChatController/joinChatFun';
$route['approved-users']['POST'] = 'ChatController/displayApprovedUsers';
$route['waiting-users']['POST'] = 'ChatController/displayWaitingUsers';
$route['approving-users']['POST'] = 'ChatController/approveWaitingUsers';

$route['skillrary-chat/logout'] = 'ChatController/logout';
// $route['customer/checkRoom']['POST'] = 'CustomerController/checkRoom';

$route['admin/add-section'] = 'AdminController/createSection'; 

$route['admin/add-section/:any'] = 'AdminController/createSection'; 

$route['admin/add-section-search'] = 'AdminController/createSectionSearch'; 

$route['admin/add-section-search/:any'] = 'AdminController/createSectionSearch'; 

$route['admin/delete-section']['POST'] = 'AdminController/deleteSection'; 

$route['admin/saveSection'] ['POST']= 'AdminController/saveSection'; 

$route['customer/add-section'] = 'CustomerController/createSection'; 

$route['customer/add-section/:any'] = 'CustomerController/createSection'; 

$route['customer/add-section-search'] = 'CustomerController/createSectionSearch'; 

$route['customer/add-section-search/:any'] = 'CustomerController/createSectionSearch'; 

$route['customer/delete-section']['POST'] = 'CustomerController/deleteSection'; 

$route['customer/saveSection'] ['POST']= 'CustomerController/addNewSection';
$route['customer/save']['POST'] = 'AdminController/save'; 

$route['sql-editor'] = 'SqlController/getViewHere';

$route['sql-editor'] = 'SqlController/getViewHere';


$route['checkcode'] = 'Welcome/checkcode';

$route['checklogin'] = 'Welcome/checklogin';
$route['download-format'] = 'AdminController/downloadFormat';

