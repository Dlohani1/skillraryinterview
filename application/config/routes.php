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

$route['question/create'] = 'questionBank';
$route['question/getSection']['POST'] = 'questionBank/getSection';

$route['question/getSubSection']['POST'] = 'questionBank/getSubSection';
$route['question/save']['POST'] = 'questionBank/save';

$route['mcq-question'] = 'questionBank/show';

$route['getQuestion'] = 'questionBank/getQuestion';
$route['fetchQuestion'] = 'questionBank/fetchQuestion';


$route['user/registration'] = 'questionBank/registration';
$route['user/register']['POST'] = 'questionBank/register';
$route['user/login'] = 'questionBank/login';
$route['user/signin']['POST'] = 'questionBank/signin';
$route['saveAnswer'] = 'questionBank/saveAnswer';

$route['createMCQ'] = 'questionBank/createMcq';
$route['addTest']['POST'] = 'questionBank/addTest';
$route['addTestTime']['POST'] = 'questionBank/addTestTime';

$route['addQuestion']['POST'] = 'questionBank/addQuestion';
//$route['user/register']['POST'] = 'questionBank/register';

$route['user/enter-code'] = 'questionBank/enterCode';

$route['user/profile'] = 'questionBank/showUserProfile';

$route['user/update-profile']['POST'] = 'questionBank/userProfileUpdate';

$route['read-instructions'] = 'questionBank/showInstructions';

$route['user/checkCode']['POST'] = 'questionBank/checkCode';

$route['user/logout'] = 'questionBank/logout';

$route['user/home'] = 'questionBank/userHome';

$route['user/upload/do_upload'] = 'questionBank/uploadProfileImage';

$route['essay'] = 'welcome/showEssay';
$route['user/view-results'] = 'questionBank/viewResult';

$route['addMcq']['POST'] = 'questionBank/addMcqCode';

$route['redirect-to-code'] = 'questionBank/redirectPage';


$route['load-frame'] = 'questionBank/loadFrame';



$route['default_controller'] = 'welcome';
//$route['default_controller'] = 'createMCQ';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
