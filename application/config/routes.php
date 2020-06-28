<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the 'welcome' class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
testlab/admin/dashboard
|
*/

$route['default_controller'] = 'testlab/home';
$route['homepage'] = 'testlab/home';
$route['login'] = 'testlab/users/login';
$route['update-user'] = 'testlab/users/update';
$route['register'] = 'testlab/users/register';
$route['logout'] = 'testlab/users/logout';
$route['about'] = 'testlab/home/about';
$route['chat-room'] = 'testlab/friends/chat_room';
$route['classroom'] = 'testlab/classrooms/class_page';
$route['add-class'] = 'testlab/classrooms/add_class';
$route['web-class'] = 'testlab/classrooms/web_class';
$route['test'] = 'testlab/classrooms/test';
$route['test-topic'] = 'testlab/classrooms/test_topic';
$route['delete-test'] = 'testlab/classrooms/delete_test';
$route['edit-test'] = 'testlab/classrooms/edit_test';
$route['add-question'] = 'testlab/classrooms/add_question';
$route['edit-question'] = 'testlab/classrooms/edit_question';
$route['delete-question'] = 'testlab/classrooms/delete_question';
$route['delete-comment'] = 'testlab/comments/delete_comment';
$route['search'] = 'testlab/products/search';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
