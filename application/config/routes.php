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
$route['trang-chu'] = 'testlab/home';
$route['dang-nhap'] = 'testlab/users/login';
$route['update-user'] = 'testlab/users/update';
$route['dang-ki'] = 'testlab/users/register';
$route['dang-tin'] = 'testlab/users/add_news';
$route['bang-tin'] = 'testlab/users/load_news';
$route['trang-tin'] = 'testlab/products/load_news';
$route['trang-tin/(:any)'] = 'testlab/products/load_news';
$route['don-hang'] = 'testlab/users/order';
$route['dang-nhap-app'] = 'app/app_api/login';
$route['bai-viet'] = 'testlab/users/news';
$route['sua-bai-viet'] = 'testlab/products/edit_news';
$route['dang-xuat'] = 'testlab/users/logout';
$route['gioi-thieu'] = 'testlab/home/intro';
$route['web'] = 'testlab/home/web';
$route['android'] = 'testlab/home/android';
$route['bai-viet-app'] = 'testlab/users/newsapp';
$route['friends-list'] = 'testlab/friends/load_friends';
$route['messages'] = 'testlab/friends/load_messages';
$route['chat-room'] = 'testlab/friends/chat_room';
$route['classroom-page'] = 'testlab/classrooms/class_page';
$route['add-class'] = 'testlab/classrooms/add_class';
$route['web-class'] = 'testlab/classrooms/web_class';
$route['test'] = 'testlab/classrooms/test';
$route['test-topic'] = 'testlab/classrooms/test_topic';
$route['xoa-test'] = 'testlab/classrooms/delete_test';
$route['edit-test'] = 'testlab/classrooms/edit_test';
$route['add-question'] = 'testlab/classrooms/add_question';
$route['edit-question'] = 'testlab/classrooms/edit_question';
$route['delete-question'] = 'testlab/classrooms/delete_question';
$route['delete-comment'] = 'testlab/comments/delete_comment';
$route['load-stock'] = 'testlab/stocks/load_stocks';
$route['add-stock'] = 'testlab/stocks/add_stock';
$route['update-stock'] = 'testlab/stocks/update_stock';
$route['delete-stock'] = 'testlab/stocks/delete_stock';
$route['crawl-stock'] = 'testlab/crawl/crawl_stock';
$route['search'] = 'testlab/products/search';
/* app api*/
$route['update-pos'] = 'app/app_api/insert';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
