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
elab/admin/dashboard
|
*/
$route['default_controller'] = 'elab/home';
$route['trang-chu'] = 'elab/home';
$route['dang-nhap'] = 'elab/users/login';
$route['update-user'] = 'elab/users/update';
$route['dang-ki'] = 'elab/users/register';
$route['dang-tin'] = 'elab/users/add_news';
$route['bang-tin'] = 'elab/users/load_news';
$route['trang-tin'] = 'elab/products/load_news';
$route['trang-tin/(:any)'] = 'elab/products/load_news';
$route['don-hang'] = 'elab/users/order';
$route['dang-nhap-app'] = 'app/app_api/login';
$route['bai-viet'] = 'elab/users/news';
$route['sua-bai-viet'] = 'elab/products/edit_news';
$route['dang-xuat'] = 'elab/users/logout';
$route['gioi-thieu'] = 'elab/home/intro';
$route['web'] = 'elab/home/web';
$route['messages'] = 'elab/friends/load_messages';
$route['chat-room'] = 'elab/friends/chat_room';
$route['classroom-page'] = 'elab/classrooms/class_page';
$route['add-class'] = 'elab/classrooms/add_class';
$route['web-class'] = 'elab/classrooms/web_class';
$route['test'] = 'elab/classrooms/test';
$route['test-topic'] = 'elab/classrooms/test_topic';
$route['xoa-test'] = 'elab/classrooms/delete_test';
$route['edit-test'] = 'elab/classrooms/edit_test';
$route['add-question'] = 'elab/classrooms/add_question';
$route['edit-question'] = 'elab/classrooms/edit_question';
$route['delete-question'] = 'elab/classrooms/delete_question';
$route['delete-comment'] = 'elab/comments/delete_comment';
$route['search'] = 'elab/products/search';
/* app api*/
$route['update-pos'] = 'app/app_api/insert';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
