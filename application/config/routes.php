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
$route['default_controller'] = 'home';
$route['/login'] = 'home/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['templates/artsproject/1'] 		= 'templates/createtemplate/1';
$route['templates/bookreport/2'] 		= 'templates/createtemplate/2';
$route['templates/highschoolessay/3'] 	= 'templates/createtemplate/3';
$route['templates/discussionforum/4'] 	= 'templates/createtemplate/4';
$route['templates/literacycheck/5'] 	= 'templates/createtemplate/5';
$route['templates/numeracycheck/6'] 	= 'templates/createtemplate/6';
$route['templates/physedrubric/7'] 		= 'templates/createtemplate/7';
$route['templates/readingresponse/8'] 	= 'templates/createtemplate/8';
$route['templates/researchpaper/9'] 	= 'templates/createtemplate/9';
$route['templates/journalentry/10'] 	= 'templates/createtemplate/10';
$route['templates/blankrubric/11'] 		= 'templates/createtemplate/11';
$route['gradebook'] 					= 'GradeBook/index';
$route['gradebook/(:num)'] 				= 'GradeBook/editGradeBook/$1';
$route['gradebook/delete-grading-scheme/(:num)'] 		= 'GradeBook/deleteGradingScheme/$1';
$route['gradebook/delete-class/(:num)'] 		= 'GradeBook/deleteClass/$1';
$route['gradebook/marks-sheet/(:num)/(:any)/(:any)'] 	= 'GradeBook/marksSheet/$1/$2/$3';
$route['gradebook/marks-sheet/(:num)/(:any)'] 			= 'GradeBook/marksSheet/$1/$2';
$route['gradebook/marks-sheet/(:num)'] 					= 'GradeBook/marksSheet/$1';

$route['gradebook/student-portal/(:num)/(:any)'] = 'Student/studentSuccessPortal/$1/$2';
$route['gradebook/student-portal/(:num)'] 	= 'Student/studentSuccessPortal/$1';

$route['gradebook/rubric-database/(:num)'] 	= 'GradeBook/rubricDatabases/$1';
$route['gradebook/student-data'] 			= 'Student/getStudentData';
$route['gradebook/upload-rubric'] 			= 'GradeBook/uploadRubric';
$route['gradebook/get-upload-rubric'] 		= 'GradeBook/getUploadRubric';

$route['gradebook/downloadReports'] 		= 'GradeBook/downloadReports';
$route['gradebook/updatDefaultCriteriaPercentage/(:num)/(:num)'] 		= 'GradeBook/updateDefaultCriteriaPercentage/$1/$2';

