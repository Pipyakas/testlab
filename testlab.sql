-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 03:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selection` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recommend` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `selection`, `recommend`, `created_at`, `updated_at`) VALUES
(1, 0, 'conduct', 'conduct', '2020-06-28 17:51:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) NOT NULL,
  `avt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `avt`, `title`, `content`, `user_id`, `views`, `created_at`, `updated_at`) VALUES
(2, 'uploads/avts/17_2018/4e99ecf4c8fdef88c7ad33730f8673ca.jpg', 'Lop hoc php', 'Xin chao cac ban', 9, 0, '2018-04-24 09:37:29', '2018-04-24 09:37:30'),
(3, 'uploads/avts/31_2018/8c73a40d00111298965f446978333008.jpg', 'scorpnet', '1', 21, 0, '2018-07-31 11:02:14', '2018-07-31 11:02:14'),
(4, '', '1', '1', 25, 0, '2018-09-05 08:47:01', '0000-00-00 00:00:00'),
(5, '', '1', '1', 21, 0, '2020-04-30 20:51:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `avt` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) NOT NULL,
  `owner_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `friends_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `owner_name`, `friends_name`) VALUES
(3, 'phamhung', 'cuong'),
(4, 'phamhung', 'binh');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `activated` tinyint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `livecodes`
--

CREATE TABLE `livecodes` (
  `id` bigint(20) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `codes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `livecodes`
--

INSERT INTO `livecodes` (`id`, `room_id`, `codes`, `created_at`) VALUES
(9, 9, '<button>hello</button>', '0000-00-00 00:00:00'),
(10, 25, '', '2018-09-05 08:47:01'),
(11, 21, '<button class=\"btn btn-success\"> Trinh</button>', '0000-00-00 00:00:00'),
(12, 21, '', '2020-04-30 20:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lat` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint(20) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `messages` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sender` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `room_id`, `messages`, `sender`) VALUES
(1, 3, 'xin chao cuong', 9),
(2, 3, ' chao hung', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `types_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(20000) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `avt` varchar(200) CHARACTER SET latin1 NOT NULL,
  `views` int(11) NOT NULL DEFAULT '100',
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `types_id`, `content`, `user_id`, `created_at`, `updated_at`, `avt`, `views`, `quantity`, `price`) VALUES
(26, 'Cấu hình XAMPP', '1', '<ol><li><strong>Cấu hình kết nối trang PHPMYADMIN</strong></li></ol><p>Để kết nối với trang <a href=\"http://elab/phpmyadmin\">http://elab/phpmyadmin</a> cấu hình file phpMyAdmin như hình sau</p><p>/* Authentication type and info */</p><p>$cfg[\'Servers\'][$i][\'auth_type\'] = \'config\';</p><p>$cfg[\'Servers\'][$i][\'user\'] = \'root\';</p><p>$cfg[\'Servers\'][$i][\'password\'] = \'xyz123\';</p><p>$cfg[\'Servers\'][$i][\'extension\'] = \'mysqli\';</p><p>$cfg[\'Servers\'][$i][\'AllowNoPassword\'] = true;</p><p>$cfg[\'Lang\'] = \'\';</p>', 21, '2017-11-29 16:52:18', '2020-06-28 19:57:46', 'uploads/avts/48_2017/3150a1926a6d97df4c73345bb58503f2.jpg', 248, 0, 0),
(27, 'Cài đặt hệ thống Code Igniter', '1', '<ol><li><strong>Tạo thư mục, ví dụ với tên elab và copy các thư mực: application, install, static và system.</strong></li><li><strong>Cài đặt tải thư mục tại file autoload.php tại</strong> <strong>\\XAMPP\\htdocs\\elab\\application\\config)</strong></li></ol><p>$autoload[\'libraries\'] sẽ quy định các file trong thư mục libraries được gọi tại đường dẫn  \\XAMPP\\htdocs\\elab\\application\\libraries</p><p>/*</p><p>| -------------------------------------------------------------------</p><p>|  Auto-load Libraries</p><p>| -------------------------------------------------------------------</p><p>|</p><p>*/</p><p>$autoload[\'libraries\'] = array(\'utils\',\'database\',\'template\',\'pagination\',\'form_validation\',\'session\');</p><p>/*</p><p>| -------------------------------------------------------------------</p><p>|  Auto-load Helper Files</p><p>| -------------------------------------------------------------------</p><p>*/</p><p>$autoload[\'helper\'] = array(\'url\',\'currency\',\'utils\');</p><ol start=\"3\"><li><strong>Cài đặt hằng số trong file constants.php tại \\XAMPP\\htdocs\\elab\\application\\config)</strong></li></ol><p>define(\'FILE_READ_MODE\', 0644);</p><p>define(\'FILE_WRITE_MODE\', 0666);</p><p>define(\'DIR_READ_MODE\', 0755);</p><p>define(\'DIR_WRITE_MODE\', 0777);</p><p>/*ACTIVATED*/</p><p>define(\'BAN\', 2);</p><p>define(\'ACTIVATED\', 1);</p><p>define(\'DEACTIVATED\', 0);</p><p>/* <strong>Nằm tại thư mục settings</strong> <strong>\\XAMPP\\htdocs\\elab\\application\\*/</strong></p><p>define(\'EMAIL_SETTING_FILE\', APPPATH.\'/settings/email.dat\');</p><p>define(\'GENERAL_SETTING_FILE\', APPPATH.\'/settings/general.dat\');</p><p>define(\'CONTACT_INFO_SETTING_FILE\', APPPATH.\'/settings/contact_info.dat\');</p><p>define(\'DEFAULT_LOCATION_FILE\', APPPATH.\'/settings/default_location.dat\');</p><p>define(\'PAYPAL_FILE\', APPPATH.\'/settings/paypal.dat\');</p><p>define(\'FACEBOOK_SETTINGS_FILE\', APPPATH.\'/settings/facebook.dat\');</p><p>define(\'GOOGLE_SETTINGS_FILE\', APPPATH.\'/settings/google.dat\');</p><ol start=\"4\"><li><strong>Cài đặt tham số database tại file database.php tại</strong> <strong>XAMPP\\htdocs\\elab\\application\\config</strong></li></ol><p>// The following values will probably need to be changed.</p><p>$db[\'default\'][\'username\'] = \"xyz\";</p><p>$db[\'default\'][\'password\'] = \"xyz123\";</p><p>$db[\'default\'][\'database\'] = \"xyz\";</p><p> </p><p>// The following values can probably stay the same.</p><p>$db[\'default\'][\'hostname\'] = \"localhost\";</p><p>$db[\'default\'][\'dbdriver\'] = \"mysql\";</p><p>$db[\'default\'][\'dbprefix\'] = \"\";</p><p>$db[\'default\'][\'pconnect\'] = TRUE;</p><p>$db[\'default\'][\'db_debug\'] = TRUE;</p><p>$db[\'default\'][\'cache_on\'] = FALSE;</p><p>$db[\'default\'][\'cachedir\'] = \"\";</p><p>$db[\'default\'][\'char_set\'] = \"utf8\";</p><p>$db[\'default\'][\'dbcollat\'] = \"utf8_general_ci\";</p><ol start=\"5\"><li><strong>Cài đặt tham số pagination tại file pagination.php tại</strong> <strong>XAMPP\\htdocs\\elab\\application\\config</strong></li></ol><p>$config[\'uri_segment\'] = 3;</p><p>$config[\'num_links\'] = 9;</p><p>$config[\'per_page\'] = 10;</p><ol start=\"6\"><li><strong>Cài đặt tham số rest tại file rest.php tại</strong> <strong>XAMPP\\htdocs\\elab\\application\\config</strong></li></ol><p>$config[\'force_https\'] = FALSE;</p><p>$config[\'rest_default_format\'] = \'json\';/* định dạng JSON cho giao diện kết nối với di động*/</p><ol start=\"7\"><li><strong>Cài đặt tham số routes tại file routes.php tại</strong> <strong>XAMPP\\htdocs\\elab\\application\\config</strong></li></ol><p>$route[\'trang-chu\'] = \'default/home\';/*khi người dùng gõ đường link web ví dụ <a href=\"http://www.elab/trang-chu\">www.elab/trang-chu</a> thì controller home tại module default \\XAMPP\\htdocs\\elab\\application\\modules\\default\\controllerssẽ được gọi*/</p><ol start=\"8\"><li><strong>Cài đặt tham số template tại file template.php tại</strong> <strong>XAMPP\\htdocs\\elab\\application\\config</strong></li></ol><p>$config[\'layout\'] = \'default\';/* định dạng trang web theo file default.php tại thư mục \\XAMPP\\htdocs\\elabvn\\application\\themes\\elab\\views\\layouts */</p><p>$config[\'theme\'] = \'elab\';/* trong thư mục themes sẽ chọn thư mục elab */</p><p>$config[\'theme_locations\'] = array(</p><p>            APPPATH.\'themes/\';/* themes sẽ nằm tại thư mục \\XAMPP\\htdocs\\slum_cms\\application\\themes */</p><ol start=\"9\"><li><strong>File template default.php tại </strong>\\<strong>XAMPP\\htdocs\\elabvn\\application\\themes\\elab\\views\\layouts</strong></li></ol><p><!doctype html></p><p><html lang=\"en\" ng-app=\"app\"></p><p><head></p><p></head></p><p><body></p><p>            <?php</p><p>            echo $template[\'partials\'][\'header\'];</p><p>            ?></p><p> </p><p>            <?php echo $template[\'partials\'][\'content\']; ?>          </p><p> </p><p>            <?php</p><p>            echo $template[\'partials\'][\'footer\'];</p><p>            ?></p><p> </p><p></body></p><p></html></p>', 21, '2017-11-29 16:59:54', '2020-06-03 14:34:19', 'uploads/avts/48_2017/9fe3c753acc687f1a5ce88f84920d086.png', 249, 0, 0),
(28, 'Hoạt động trong Code Igniter', '1', '<ol><li><strong>Mô hình hoạt động trong CI</strong></li><li><strong>Cấu hình routing trong routes.php</strong></li></ol><p>$route[\'default_controller\'] = \'elabvn/home\'<strong>;</strong></p><p>/* trỏ sang function index trong file controller home.php tại thư mục \\XAMPP\\htdocs\\elabvn\\application\\modules\\elabvn\\controllers */</p><ol start=\"3\"><li><strong>Cấu hình controller home trong file home.php tại thư mục \\XAMPP\\htdocs\\elabvn\\application\\modules\\elabvn\\controllers</strong></li></ol><p>Tại đây sẽ gọi giao diện index.php trong thư mục /frontends/product bằng hàm render_frontend_tp của class MY_Controller.</p><p><?php</p><p>class home extends MY_Controller { /* class MY_Controller nắm trong thư mục \\XAMPP\\htdocs\\elabvn\\application\\core*/</p><p>            function __construct(){</p><p>                        parent::__construct();</p><p>            }</p><p>            function index(){</p><p>                        if (isset($SESSION[\'user\'])){</p><p> </p><p>                        }</p><p>                        else{</p><p>                                    $this->render_frontend_tp(\'/frontends/product/index\',null);/*trỏ sang file index.php tại \\XAMPP\\htdocs\\elabvn\\application\\themes\\ninja\\views\\frontends\\product*/</p><p>                        }</p><p>            }</p><p>}</p><p>?></p><ol start=\"4\"><li><strong>Giao diện Hello Page tại file </strong></li></ol><p><div id=\"content\" ></p><p>            <p>Welcome to Elab</p></p><p></div></p><ol start=\"5\"><li><strong>Nội dung hàm MY_Controller tại thư mục</strong></li></ol><p>class MY_Controller extends CI_Controller{</p><p>function render_frontend_tp($content, $data = null,$slider=false )</p><p>            {</p><p>                        $data[\'general_setting\']=getSettings(GENERAL_SETTING_FILE);</p><p>                  /* gán các giá trị cài đặt trong thư mục \\XAMPP\\htdocs\\elab\\application\\settings*/</p><p>$data[\'contact_info_setting\']=getSettings(CONTACT_INFO_SETTING_FILE);</p><p>                        $data[\'default_location\']=getSettings(DEFAULT_LOCATION_FILE);</p><p>                        if($this->ft_title==\'\' || $this->ft_title==null){</p><p>                                    $this->ft_title=$data[\'general_setting\'][\'title\'];</p><p>                        };</p><p>                        $data[\'slider\']=$slider;</p><p>                        $data[\'title\']=$this->ft_title;</p><p>                        $data[\'menu\']=$this->ft_menu;</p><p>                        if(!isset($data[\'banner\'])){</p><p>                                    $data[\'banner\']=true;</p><p>                        }</p><p>                        $this->utils->_render_frontend($content,$data);/*thư mục</p><p>            }</p><p>}</p><ol start=\"6\"><li><strong>Tạo cơ sở dữ liệu trong MySQL</strong></li></ol><p>Truy cập phpmyadmin tại đường dẫn <a href=\"http://elab.com/myphpadmin\">http://elab.com/myphpadmin</a></p><p>Tạo database elab với kiểu định dạng utf8_general_ci<br /><img src=\"..//uploads/workflow61.jpg\" alt=\"\" width=\"689\" height=\"355\" /></p><p>Và import file languages.sql và file users.sql tại thư mục XAMPP\\htdocs\\elab\\application vào database elab<br /><img src=\"..//uploads/workflow62.jpg\" alt=\"\" width=\"689\" height=\"355\" /></p><ol start=\"7\"><li><strong>Truy cập website</strong></li></ol><p>Mở trình duyệt và gõ <a href=\"http://elab.com/elab\">http://elab.com/elab</a><br /><img src=\"..//uploads/workflow63.jpg\" alt=\"\" width=\"689\" height=\"355\" /></p><p> </p>', 21, '2017-11-29 17:09:35', '2020-06-03 08:13:28', 'uploads/avts/48_2017/5a13973762c2f2578d8f12e1ab6d58ca.jpg', 233, 0, 0),
(29, 'Thiết kế menu bằng bootstrap', '1', '<ol><li><strong>Nguyên tắc thiết kế menu của Bootstrap</strong></li></ol><p>Bootstrap hỗ trợ thiết kế menu cho phép thu gọn hoặc mở rộng kích thước tùy theo kích cỡ màn hình.</p><p> </p><ol start=\"2\"><li><strong>Trong file template.php tại thư mục \\XAMPP\\htdocs\\elabvn\\application\\themes\\elabvn\\views\\layouts</strong></li></ol><p>Cấu hình thẻ meta viewport với bề rộng bằng bề rộng thiết bị, độ phóng màn hình bằng 1. Cấu hình thẻ link file css của bootstrap được tải về thư mục \\XAMPP\\htdocs\\elabvn\\statics\\bootstrap\\css.</p><p>Cấu hình thẻ file style.css để tùy biến tại thư mục \\XAMPP\\htdocs\\elabvn\\statics\\css\\frontend</p><p>Cấu hình thẻ</p><p>&lt;!doctype html&gt;</p><p>&lt;html&gt;</p><p>    &lt;head&gt;</p><p>      &lt;meta name=”viewport” content=”width=device-width, initial-scale=1”&gt;</p><p>      &lt;link rel=\"stylesheet\" type=\"text/css\" href=\"&lt;?php echo base_url().\'statics/boostrap/css/bootstrap.min.css\'?&gt;\"/&gt;  </p><p>      &lt;link rel=\"stylesheet\"  type=\"text/css\" href=\"&lt;?php echo base_url().\'statics/css/frontend/style.css\'?&gt;\"/&gt;</p><p>      &lt;script type=\"text/javascript\" src=\"&lt;?php echo base_url().\'statics/js/jquery.js\'?&gt;\"&gt;&lt;/script&gt;</p><p>      &lt;script type=\"text/javascript\" src=\"&lt;?php echo base_url().\'statics/bootstrap/js/bootstrap.min.js\'?&gt;\"&gt;&lt;/script&gt;</p><p>     &lt;/head&gt;</p><p>&lt;/html&gt;</p><ol start=\"3\"><li><strong>Tại file header.php \\XAMPP\\htdocs\\elabvn \\application\\themes\\elab\\views\\frontends\\commons</strong></li></ol><p>Các thành phần của giao diện được khai báo theo nguyên tắc từ ngoài vào trong, và từ hàng đến cột theo sơ đồ bên dưới<br /><img src=\"http://192.168.0.105:8080/elab/uploads/menu31.jpg\" alt=\"\" width=\"689\" height=\"359\" /></p><p>Chi tiết như sau:</p><p>&lt;div id=\"menu\"&gt;</p><p>  &lt;nav class=\"navbar navbar-fixed-top\"&gt; &lt;!-- navbar là class của css bootstrap, navbar-fixed-top đặt thanh menu lên đỉnh trang web--&gt;</p><p>     &lt;div id=\"menu_logo\" class=\"row col-md-16 col-xs-16 \"&gt; &lt;!--  menu_logo chiếm bề rộng 16 cột trong màn hình vừa và nhỏ --&gt;</p><p>        &lt;img class =\"item col-md-6 col-sm-6\" src=\"&lt;?php echo base_url().\'statics/images/logo.jpg\';?&gt;\"&gt; &lt;!-- ảnh logo chiếm bề rộng 6 cột--&gt;</p><p>    &lt;/div&gt;</p><p>     &lt;div id=\"menu_bar\" class=\"container-fluid row col-md-16 \" &gt;  &lt;!-- menu_bar chiếm bề rộng 16 cột cho dòng tiếp theo--&gt;</p><p>     &lt;a class=\"navbar-brand\" href=\"#\"&gt;Home&lt;/a&gt;</p><p>     &lt;a class=\"navbar-brand\" href=\"#\"&gt;Documentation&lt;/a&gt;</p><p>     &lt;a class=\"navbar-brand\" href=\"#\"&gt;Forum&lt;/a&gt;</p><p>     &lt;a class=\"navbar-brand\" href=\"#\"&gt;Login&lt;/a&gt;</p><p>    &lt;/div&gt;</p><p>    &lt;/nav&gt;</p><p>  &lt;/div&gt;</p><ol start=\"4\"><li><strong>File style.css đặt tại thư mục \\XAMPP\\htdocs\\elab\\statics\\css\\frontend</strong></li></ol><p>File style.css khai báo cho menu ở trên như sau:</p><p>*{</p><p>            box-sizing: border-box;</p><p>            display:flex; &lt;!-- khai báo kiểu css mặc định cho mọi thành phần --&gt;</p><p>}</p><p>.item{</p><p>            margin-right: auto;</p><p>            margin-left: auto;&lt;!-- đặt hai margin-right và margin-left là auto sẽ định vị class item đặt trung tâm của bố cục--&gt;</p><p>}</p><p> </p><p>#menu_logo{</p><p>background-color:#2194D2;</p><p>height:100px;</p><p>color:#ffffff;</p><p>}</p><p>#menu_logo img{</p><p>            height:100px;</p><p>}</p><p>#menu_bar{</p><p>            background-color: #0059a9;</p><p>}</p><p>#menu_bar a{</p><p>            color:white; &lt;!-- màu của các nút link trên menu_bar --&gt;</p><p>}<br /><img src=\"..//uploads/menu41.jpg\" alt=\"\" width=\"689\" height=\"355\" /></p>', 21, '2017-11-29 17:16:53', '2020-06-03 08:32:41', 'uploads/avts/48_2017/8682e923b2b8d8aab77772c4e6462ccc.jpg', 232, 0, 0),
(30, 'Đăng nhập CSDL trên hệ thống Code Igniter Phần 1', '1', '<ol><li><strong><u>Giao diện đăng nhập</u></strong></li></ol><p>Giao diện đăng nhập tạo bởi file index.php tại thư mục XAMPP\\htdocs\\elabvn\\application\\themes\\elabvn\\views\\frontends\\product :</p><p>&lt;div class=\"container page-login\"&gt;</p><p>    &lt;div class=\"form-wrapper col-md-5\"&gt;&lt;!--col-md-5 là độ rộng form login--&gt;</p><p>       &lt;div class=\"item\"&gt;</p><p>           &lt;h3&gt; &lt;?php echo lang(\'msg_login\') ?&gt;&lt;/h3&gt;&lt;!--file msg_lang.php tại thư mục \\XAMPP\\htdocs\\elab\\application\\language\\vietnamese--&gt;</p><p>       &lt;/div&gt;</p><p>       &lt;form class=\"form-login\" method=\"post\" action=\"&lt;?php echo base_url()?&gt;index.php/dang-nhap\"&gt; &lt;!-- gọi phương thức định tuyến trong routes.php --&gt;</p><p>                                    &lt;div class=\"form-group\"&gt;</p><p>                                                &lt;label&gt;&lt;?php echo lang(\'msg_user_name\');?&gt;&lt;/label&gt;</p><p>                                                &lt;input name=\"user_name\" id=\"user_name\" type=\"text\" class=\"form-control\" placeholder=\"Username\" &gt;</p><p>                                                &lt;?php echo form_error(\'user_name\')?&gt;</p><p>                                    &lt;/div&gt;</p><p> </p><p>                                    &lt;div class=\"form-group\"&gt;</p><p>                                                &lt;!-- password --&gt;</p><p>                                                &lt;label&gt;&lt;?php echo lang(\'msg_pwd\');?&gt;&lt;/label&gt;</p><p>                                                &lt;input name=\"pwd\" id=\"pwd\" type=\"password\" class=\"form-control\" placeholder=\"Password\" &gt;</p><p>                                                &lt;?php echo form_error(\'pwd\')?&gt;</p><p>                                    &lt;/div&gt;</p><p> </p><p>                                    &lt;?php</p><p>                                    if(isset($error_msg)){</p><p>                                    echo $error_msg;</p><p>                        }</p><p>                        ?&gt;</p><p>                        &lt;button class=\"btn btn-success\" type=\"submit\"&gt;&lt;?php echo lang(\'msg_login\') ?&gt;&lt;/button&gt;</p><p>            &lt;/form&gt;</p><p>    &lt;/div&gt;</p><p>&lt;/div&gt;</p><ol start=\"2\"><li><strong><u>File CSS</u></strong></li></ol><p>File style.css nằm tại thư mục \\XAMPP\\htdocs\\elabvn\\statics\\css\\frontend</p><p>*{</p><p>            box-sizing: border-box;          </p><p>}</p><p>.item{</p><p>            margin-right: auto;</p><p>            margin-left: auto;&lt;!-- đặt hai margin-right và margin-left là auto sẽ định vị class item đặt trung tâm của bố cục--&gt;</p><p>}</p><p> </p><p>#menu_logo{</p><p>background-color:#2194D2;</p><p>height:100px;</p><p>color:#ffffff;</p><p> </p><p>}</p><p>#menu_logo img{</p><p>            height:100px;</p><p>}</p><p>#menu_bar{</p><p>            background-color: #0059a9;</p><p>           </p><p>}</p><p>#menu_bar a{</p><p>            color:white; &lt;!-- màu của các nút link trên menu_bar --&gt;</p><p>}</p><p>.row {</p><p>    display:flex;&lt;!-- hiển thị các phần tử theo phương ngang--&gt;</p><p>}</p><p>.page-login{</p><p>    margin: 50px auto 130px auto;</p><p>  }</p><p>.form-wrapper{</p><p>   margin: 0px auto; &lt;!-- tạo cân giữa cho form-wraper--&gt;</p><p>   float:none;</p><p>  }</p><p>body{</p><p>  position: relative;</p><p>  background: #f1f1f1;</p><p>  padding-top: 150px; &lt;!-- đẩy nội dung body xuống dưới menu --&gt;</p><p>}</p><ol start=\"3\"><li><strong><u>Tạo giao diện file sau khi đăng nhập index_logined.php </u></strong></li></ol><p>&lt;div class=\"container page-login\"&gt;</p><p>    &lt;div class=\"form-wrapper col-md-5\"&gt;&lt;!--col-md-5 là độ rộng form login--&gt;</p><p>       &lt;div&gt;</p><p>        Bạn đã login!</p><p>       &lt;/div&gt;</p><p>    &lt;/div&gt;</p><p>&lt;/div&gt;</p><ol start=\"4\"><li><strong><u>Tạo file controller home.php</u></strong></li></ol><p>&lt;?php</p><p>class home extends MY_Controller { /* class MY_Controller nắm trong thư mục \\XAMPP\\htdocs\\elabvn\\application\\core*/</p><p>            function __construct(){</p><p>                        parent::__construct();</p><p>            }</p><p>            function index(){</p><p>                        if (isset($_SESSION[\'user\'])){ //user đã đăng nhập</p><p>                                    $this-&gt;render_frontend_tp(\'frontends/product/index_logined\',null);</p><p> </p><p>                        }</p><p>                        else{ //user chưa đăng nhập</p><p>                                    $this-&gt;render_frontend_tp(\'/frontends/product/index\',null);/*trỏ sang file index.php tại \\XAMPP\\htdocs\\elabvn\\application\\themes\\elabvn\\views\\frontends\\product*/</p><p>                        }</p><p>            }</p><p>}</p><p>?&gt;</p><ol start=\"5\"><li><strong><u>Tạo file controller users.php</u></strong></li></ol><p>Controllers users dùng để xử lý các phương thức liên quan đến user.</p><p>&lt;?php</p><p>class Users ex', 21, '2017-11-29 17:25:28', '2020-06-03 05:36:52', 'uploads/avts/48_2017/d52f64e2ca594f15f4cca8faeab85151.jpg', 255, 0, 0),
(31, 'Đăng nhập CSDL trên hệ thống Code Igniter Phần 2', '1', '<p> </p><ol><li><strong><u>Tạo file controller users.php</u></strong></li></ol><p>Controllers users dùng để xử lý các phương thức liên quan đến user.</p><p>&lt;?php</p><p>class Users extends MY_Controller{</p><p>            function __construct(){</p><p>                        parent::__construct();</p><p>                        $this-&gt;load-&gt;model(\'users_model\');// tải hàm model</p><p>            }</p><p>            function login(){</p><p>                        if(isset($_SESSION[\'user\'])){  //nếu đã đăng nhập thì về trang chủ</p><p>                                    redirect(base_url());</p><p>                        }</p><p>                        else{//chưa login</p><p>                                    if ((isset($_POST[\'user_name\']))&amp;&amp;(isset($_POST[\'pwd\']))){</p><p>                                                $this-&gt;form_validation-&gt;set_rules(\'user_name\',$this-&gt;lang-&gt;line(\'msg_user_name\'), \'trim|required|xss_clean\');</p><p>                $this-&gt;form_validation-&gt;set_rules(\'pwd\',$this-&gt;lang-&gt;line(\'msg_pwd\'),\'trim|required|xss_clean\');</p><p>                if ($this-&gt;form_validation-&gt;run()!=false){</p><p>                        $user_name=$_POST[\'user_name\'];</p><p>                        $pwd=$_POST[\'pwd\'];</p><p>                        $data=$this-&gt;users_model-&gt;get_by_username_and_pwd($user_name,$pwd); //kiểm tra thuê bao tồn tại trong MYSQL</p><p>                    if ($data!=null){</p><p>                        $_SESSION[\'user\']=$data;</p><p>                        $updated_data=array(\'updated_at\'=&gt;date(\'Y-m-d H:i:s\',time()),</p><p>                                    \'ip\'=&gt;$_SERVER[\'REMOTE_ADDR\']);</p><p>                        $this-&gt;users_model-&gt;update($updated_data,array(\'id\'=&gt;$data[0]-&gt;id)); //cập nhật dữ liệu vào MYSQL</p><p>                        redirect(base_url());</p><p>                    }</p><p>                }</p><p>                                    }</p><p> </p><p>                        }</p><p>            }</p><p>}</p><p>?&gt;</p><ol start=\"2\"><li><strong><u>Tạo định tuyến trong file routes.php</u></strong></li></ol><p> </p><p>$route[\'default_controller\'] = \'elabvn/home\';</p><p>$route[\'trang-chu\']=\'elabvn/home\';</p><p>$route[\'dang-nhap\']=\'elabvn/users/login\';</p><ol start=\"3\"><li><strong><u>File User_model.php tại thư mục \\XAMPP\\htdocs\\elab\\application\\models</u></strong></li></ol><p>&lt;?php</p><p> </p><p>/**</p><p> </p><p> *</p><p> </p><p> */</p><p> </p><p>class Users_model extends CI_Model {</p><p>            function __construct() {</p><p>                        parent::__construct();</p><p>            }</p><p>    function get($select = \"*\", $where = false, $like = false, $first = false, $offset = false, $order_by = false) {</p><p>                        $data = array();</p><p>                        if( $order_by != false){</p><p>                                    $order = key($order_by);</p><p>                                    if ($order != null) {</p><p>                                                $sort = $order_by[$order];</p><p>                                                $this -&gt; db -&gt; order_by($order, $sort);</p><p>                                    }</p><p>                        }</p><p> </p><p>                        $this -&gt; db -&gt; select($select);</p><p>                        $this -&gt; db -&gt; from(\'users\');</p><p>                        if($where != false)</p><p>                                    $this -&gt; db -&gt; where($where);</p><p>                        if($like != false)</p><p>                                    $this -&gt; db -&gt; like($like);</p><p>                        if($offset != false){</p><p>                                    $this -&gt; db -&gt; limit($offset, $first);</p><p>                        }</p><p> </p><p>                        $query = $this -&gt; db -&gt; get();</p><p>                        if ($query -&gt; num_rows() &gt; 0) {</p><p>                                    foreach ($query-&gt;result() as $rows) {</p><p>                                                $data[] = $rows;</p><p>                                    }</p><p>                                    $query -&gt; free_result();</p><p>                                    return $data;</p><p>                        } else {</p><p>                                    return null;</p><p>                        }</p><p>            }</p><p> </p><p>            function update($data_array, $where) {  //cập nhật dữ liệu vào CSDL</p><p>                        $this -&gt; db -&gt; where($where);</p><p>                        $data_array[\'updated_at\']=date(\'Y-m-d H:i:s\');</p><p>                        $this -&gt; db -&gt; update(\'users\', $data_array);</p><p>            }</p><p>            function get_by_username_and_pwd($username, $pwd) { //đọc dữ liệu với username và password</p><p>                        $select = \'*\';</p><p>                        $like = array();</p><p>   ', 21, '2017-11-29 21:34:48', '2020-06-03 08:42:44', 'uploads/avts/48_2017/64e6fb921cbbfe7cfa2fd450f23f2503.jpg', 194, 0, 0),
(34, 'Bài Giảng: Resource (6.0 API 23) ', '2', '<p><strong><u>Bài Giảng</u></strong><strong>: Resource (6.0 API 23)</strong></p>\n<ol>\n<li><strong>Resource</strong></li>\n</ol>\n<p>Resources là các tài nguyên của ứng dụng như String, Color, Array…</p>\n<ol start=\"2\">\n<li><strong>String</strong></li>\n</ol>\n<p>Mở file strings.xml trong thư mục res/values.</p>\n<p>Nhấn chuột vào Open editor</p>\n<p>Nhấn vào nút + trên góc trái màn hình, sau đó nhập vào các cặp Key và default value, rồi ấn nút OK.<br /><img src=\"../uploads/resource2.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Có thể kiểm tra lại bằng cách xem nội dung file strings.xml<br /><img src=\"../uploads/resource3.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<ol start=\"3\">\n<li><strong>xml</strong></li>\n</ol>\n<p>Để lưu trữ giá trị array, chọn thư mục values, chuột phải chọn New &gt; Values resource file, nhập tên file arrays.xml<br /><img src=\"../uploads/resource4.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Sau đó nhập các giá trị theo mẫu</p>\n<p> </p>\n<p>       first element value</p>\n<p>      second element value ...</p>\n<p> </p>\n<ol start=\"4\">\n<li><strong>Colors</strong></li>\n</ol>\n<p>Tương tự với file colors.xml</p>\n<p><em>&lt;?</em><strong>xml version=\"1.0\" encoding=\"utf-8\"</strong><em>?&gt;<br /> </em>&lt;<strong>resources</strong>&gt;<br />    &lt;<strong>color name=\"colorPrimary\"</strong>&gt;#3F51B5&lt;/<strong>color</strong>&gt;<br />    &lt;<strong>color name=\"colorPrimaryDark\"</strong>&gt;#303F9F&lt;/<strong>color</strong>&gt;<br />    &lt;<strong>color name=\"colorAccent\"</strong>&gt;#448AFF&lt;/<strong>color</strong>&gt;<br />    &lt;<strong>color name=\"correct_answer\"</strong>&gt;#00CC00&lt;/<strong>color</strong>&gt;<br />    &lt;<strong>color name=\"incorrect_answer\"</strong>&gt;#FF0000&lt;/<strong>color</strong>&gt;<br /> &lt;/<strong>resources</strong>&gt;</p>\n<ol start=\"5\">\n<li><strong>Truy cập giá trị từ class:</strong></li>\n</ol>\n<p>Để truy cập vào giá trị của các thuộc tính trên giao diện</p>\n<p>          String url=R.string.<strong><em>web_service_url</em></strong>;</p>\n<p>Hoặc</p>\n<p>          R.color.colorAccent</p>\n<p> </p>\n<p> </p>\n<p> </p>\n<p> </p>', 21, '2017-12-14 08:54:25', '2020-06-03 08:52:23', 'uploads/avts/50_2017/cc178a20c739e8f04d60a6e5ecbbf127.jpg', 295, 10, 15),
(35, 'Bài Giảng: Event (6.0 API 23)', '2', '<p><strong><u>Bài Giảng</u></strong><strong>: Event (6.0 API 23)</strong></p><ol><li><strong>Event</strong></li></ol><p>Ứng dụng Android là lập trình hướng sự kiện (event), Android cung cấp các hàm xử lý các sự kiện khi người dùng tương tác với giao diện (layout) của activity.</p><ol start=\"2\"><li><strong>Xử lý sự kiện trên Button</strong></li></ol><p>Khai báo biến mEmailSignInButton trỏ đến button có “id” là email_sign_in_button</p><p>Khai báo setOnClickListener xử lý sự kiện nhấn chuột trên nút mEmailSignInButton.</p><p>Button mEmailSignInButton = (Button) findViewById(R.id.email_sign_in_button);<br /> mEmailSignInButton.setOnClickListener(new OnClickListener() {<br />     @Override<br />     public void onClick(View view) {<br />         attemptLogin();<br />     }<br /> });</p>', 21, '2017-12-14 09:22:24', '2020-06-03 09:48:53', 'uploads/avts/50_2017/c8950adcd12f0e9a99c2e1108625f102.png', 329, 0, 5),
(39, 'Hello World for Android', '2', '<p><strong><u>Bài Giảng</u></strong><strong>: HelloWorld (6.0 API 23)</strong></p>\n<ol>\n<li><strong>Tạo project mới</strong></li>\n</ol>\n<p>Bật chương trình Android studio chọn File →New →New Project.</p>\n<p> <img src=\"../uploads/HelloWorld_MB/F1.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Nhập tên ứng dụng</p>\n<p> <img src=\"../uploads/HelloWorld_MB/F2.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Chọn API mà ứng dụng hướng đến, ví dụ Android 6.0 API 23.<br /><img src=\"uploads/HelloWorld_MB/F3.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p> </p>\n<p>Chọn kiểu Activity của class chính, ví dụ ở đây là Empty Activity<br /><img src=\"../uploads/HelloWorld_MB/F3.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p> </p>\n<p>Sau đó ấn nút Finish để hoàn tất quá trình tạo project<br /><img src=\"../uploads/HelloWorld_MB/F5.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<ol start=\"2\">\n<li><strong>Tạo máy ảo</strong></li>\n</ol>\n<p>Trong ADT, chọn Tools →AVD Manager<br /><img src=\"../uploads/HelloWorld_MB/F6.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Để tạo thêm máy ảo nhấn Create Virtual Device<br /><img src=\"../uploads/HelloWorld_MB/F7.jpg\" alt=\"\" width=\"628\" height=\"355\" /><br /><strong> </strong>Chọn API phù hợp, có thể download thêm các API chưa có<br /><img src=\"../uploads/HelloWorld_MB/F8.jpg\" /></p>\n<p>Nhấn Finish để kết thúc<br /><img src=\"../uploads/HelloWorld_MB/F9.jpg\" /></p>\n<ol start=\"3\">\n<li><strong>Chạy chương trình</strong></li>\n</ol>\n<p>Chọn Run → Run app<br /><img src=\"../uploads/HelloWorld_MB/F10.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Sau đó chọn máy ảo để thực hiện và nhấn OK<br /><img src=\"../uploads/HelloWorld_MB/F11.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>', 21, '2018-07-31 11:11:47', '2020-06-03 07:09:01', 'uploads/avts/31_2018/4040b1487593649efd358bb033eb4f04.jpg', 417, 0, 0),
(40, 'Layout Design Phần 1', '2', '<p> </p>\n<p><strong><u>Bài Giảng</u></strong><strong>: Thiết kế giao diện (6.0 API 23)</strong></p>\n<ol>\n<li><strong>Giới thiệu</strong></li>\n</ol>\n<p>Giao diện của ứng dụng Android sử dụng ngôn ngữ XML, một cách hiệu quả khi thiết kế giao diện là sử dụng LinearLayout và bố trí các phần tử theo phương dọc trước sau đó vào từng hàng con tạo Row LinearLayout và bố trí các phần tử theo phương ngang. Các phần tử trong kiển trúc sử dụng một mô hình phân cấp các đối tượng View và ViewGroup.</p>\n<p>View là các đối tượng nhìn thấy được, còn ViewGroup là cấu trúc giao diện bao gồm các View và ViewGroup con gọi là layout. Có nhiều loại layout như: LinearLayout, Relative Layout và ConstraintLayout…<br /><img src=\"../uploads/Layout/F1.jpg\" alt=\"\" width=\"552\" height=\"252\" /></p>\n<p> </p>\n<ol start=\"2\">\n<li><strong>Thiết kế giao diện theo hình sau</strong><strong><img src=\"../uploads/Layout/F2.jpg\" alt=\"\" width=\"484\" height=\"578\" /></strong></li>\n<li><strong><strong>Cài đặt LinearLayout trong file content_main.xml</strong></strong>\n<p>Sửa từ định dạng mặc định sang LinearLayout, thêm dòng</p>\n<strong>       android:orientation=\"vertical\"</strong> </li>\n</ol>\n<div>Cấu hình các thuộc tính cơ bản sau</div>\n<div>    xmlns:app=\"http://schemas.android.com/apk/res-auto\"<br />     xmlns:tools=\"http://schemas.android.com/tools\"<br />     android:layout_width=\"match_parent\"<br />     android:layout_height=\"match_parent\"<br />     android:orientation=\"vertical\"<br />     tools:context=\"home.student.MainActivity\"&gt;//MainActivity là class chứa layout. </div>\n<ol start=\"4\">\n<li><strong>Copy file ảnh logo.jpg vào thư mục Drawable</strong></li>\n<li><strong>Chuyển file content_main.xml sang chế độ Design và kéo thả phần tử ImageView vào giao diện id/quizLinearLayout.</strong></li>\n</ol>\n<p>&lt;ImageView<br />     android:id=\"@+id/imageView\"<br />     android:layout_width=\"match_parent\"<br />     android:layout_height=\"wrap_content\"<br />     app:srcCompat=\"@drawable/logo\" /&gt;<br />Sửa thêm một số thuộc tính khác</p>\n<p> &lt;ImageView<br />     android:layout_width=\"match_parent\"  //bằng bề rộng layout ngoài<br />     android:layout_height=\"0dp\"     //chiều cao sẽ được tính theo layout_weight<br />     android:id=\"@+id/ImageView\"<br />     android:layout_gravity=\"center\"  //trung tâm cả chiều dọc và ngang<br />     android:layout_marginBottom=\"@dimen/spacing\"<br />     android:layout_marginLeft=\"@dimen/activity_horizontal_margin\"<br />     android:layout_marginRight=\"@dimen/activity_horizontal_margin\"<br />     android:layout_weight=\"1\"   //mặc định là 0, phần tử có giá trị 1 sẽ được ưu tiên hơn và chiếm tất cả không gian còn lại.<br />     android:adjustViewBounds=\"true\"<br />     android:contentDescription=\"@string/image_description\"<br />     android:scaleType=\"fitCenter\"/&gt; <!--luôn lấy vị trí trung tâm, kéo dãn nhưng giữ nguyên tỷ lệ gốc cho đến hết bề ngang hoặc bề dọc màn hình.--> <br />Chuyển sang chế độ Design<br /><img src=\"../uploads/Layout/F3.jpg\" alt=\"\" width=\"628\" height=\"352\" /></p>\n<p>Và cài đặt các tham số trong ô properties<br /><img src=\"../uploads/Layout/F4.jpg\" alt=\"\" width=\"628\" height=\"355\" /><br /><br /></p>\n<p>Hoàn thành các tham số như cấu hình</p>\nandroid:layout_height=\"wrap_content\"   // chiều cao theo kích thước nội dung<br />android:layout_gravity=\"center_horizontal\"   //đặt vị trí hiển thị theo trung tâm phương ngang của giao diện<br /> android:layout_marginBottom=\"@dimen/spacing\"/&gt;<strong><br /><br /></strong>', 21, '2018-08-07 11:04:00', '2020-06-03 10:04:22', 'uploads/avts/33_2018/465b4c63425491001ac77424df0c5905.jpg', 319, 0, 0),
(41, 'Layout Design Phần 2', '2', '6.    <strong>Tạo từng hàng hai phần tử</strong>\n<p>Tiến hành kéo thả phần tử LinearLayout (Horizontal) từ Palette’s Layouts thả vào Component Tree,đặt tên là row1LinearLayout<br /><img src=\"../uploads/Layout/F5.jpg\" alt=\"\" width=\"628\" height=\"355\" /><br /> Sau đó kéo thả hai phần tử TextView và EditText vào row1LinearLayout <br /><img src=\"../uploads/Layout/F6.jpg\" alt=\"\" width=\"628\" height=\"355\" /><br />&lt;android.support.v7.widget.LinearLayoutCompat<br />    android:id=\"@+id/row1LinearLayout\"<br />    android:layout_width=\"wrap_content\"<br />    android:layout_height=\"wrap_content\"<br />    android:orientation=\"horizontal\"<br />    tools:layout_width=\"match_parent\"&gt;<br />&lt;TextView<br />     android:id=\"@+id/textView\"<br />     android:layout_width=\"wrap_content\"<br />     android:layout_height=\"wrap_content\"<br />     android:text=\"Username\" /&gt;<br />&lt;EditText<br />    android:id=\"@+id/editUsername\"<br />    android:layout_width=\"wrap_content\"<br />    android:layout_height=\"wrap_content\"<br />    android:ems=\"10\"<br />    android:inputType=\"textPersonName\"<br />    android:text=\"Name\" /&gt;<br />7<strong>.      </strong><strong>Tương tự với password<br /></strong>&lt;LinearLayout</p>\n    android:id=\"@+id/row2LinearLayout\"<br />     android:layout_width=\"match_parent\"<br />     android:layout_height=\"wrap_content\"<br />     android:orientation=\"horizontal\"&gt;<br />     &lt;TextView<br />         android:id=\"@+id/textView2\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:layout_weight=\"1\"<br />         android:text=\"Password\" /&gt;<br />     &lt;EditText<br />         android:id=\"@+id/editText\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:layout_weight=\"1\"<br />         android:ems=\"10\"<br />         android:inputType=\"textPassword\" /&gt;<strong> <br /></strong><strong>8.      </strong><strong>Kéo thả nút button </strong>    <br />&lt;Button<br />     android:id=\"@+id/button\"<br />     android:layout_width=\"wrap_content\"<br />     android:layout_height=\"wrap_content\"<br />     android:layout_weight=\"1\"<br />     android:text=\"Login\" /&gt;<br />9<strong>.      </strong><strong>Phân bố kích thước và tạo màu nền cho các vùng layout<br /></strong>&lt;ImageView<br />     android:id=\"@+id/imageView\"<br />     android:layout_width=\"match_parent\"<br />     android:layout_height=\"0dp\"<br />     android:layout_margin=\"0px\"<br />     android:layout_weight=\"6\"<br />     android:background=\"@color/colorAccent\"<br />     android:paddingBottom=\"1dp\"<br />     android:paddingLeft=\"10dp\"<br />     android:paddingRight=\"10dp\"<br />     android:paddingTop=\"0dp\"<br />     app:srcCompat=\"@drawable/logo\" /&gt;<br /> &lt;android.support.v7.widget.LinearLayoutCompat<br />     android:id=\"@+id/row1LinearLayout\"<br />     android:layout_width=\"wrap_content\"<br />     android:layout_height=\"0dp\"<br />     android:paddingLeft=\"30dp\"<br />     android:layout_weight=\"1\"<br />     android:background=\"@color/colorPrimary\"<br />     android:orientation=\"horizontal\"<br />     tools:layout_width=\"match_parent\"&gt;<br />     &lt;TextView<br />         android:id=\"@+id/textView\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:text=\"Username\" /&gt;<br />     &lt;EditText<br />         android:id=\"@+id/editUsername\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:ems=\"10\"<br />         android:inputType=\"textPersonName\"<br />         android:text=\"Name\" /&gt;<br /> &lt;LinearLayout<br />     android:id=\"@+id/row2LinearLayout\"<br />     android:layout_width=\"match_parent\"<br />     android:layout_height=\"0dp\"<br />     android:layout_weight=\"1\"<br />     android:paddingLeft=\"30dp\"<br />     android:background=\"@android:color/holo_purple\"<br />     android:orientation=\"horizontal\"   &gt;<br />     &lt;TextView<br />         android:id=\"@+id/textView2\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:text=\"Password\" /&gt;<br />     &lt;EditText<br />         android:id=\"@+id/editText\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:text=\"Password\"<br />         android:inputType=\"textPassword\" /&gt;<br /> &lt;Button<br />     android:id=\"@+id/button\"<br />     style=\"@style/Widget.AppCompat.Button.Colored\"<br />     android:layout_width=\"wrap_content\"<br />    android:layout_height=\"0dp\"<br />     android:layout_marginTop=\"20dp\"<br />     android:layout_marginBottom=\"180dp\"<br />     android:layout_gravity=\"center_horizontal\"<br />     android:layout_weight=\"1\"<br />     android:textColor=\"@android:color/white\"<br />    android:text=\"Login\"/&gt;', 21, '2018-08-13 10:49:34', '2020-06-03 09:00:55', 'uploads/avts/33_2018/9babfedf34e91ea09e58586ac79c9dca.jpg', 304, 0, 0),
(42, 'Menu trong Android', '2', '<p><strong><u>Bài Giảng</u></strong><strong>: Menu (6.0 API 23)</strong></p>\n<ol>\n<li><strong>Menu</strong></li>\n</ol>\n<p>Menu trong Android có hai loại menu là options mennu và context menu. Options menu thường nằm góc trên bên phải giao diện cung cấp cho người các lựa chọn trong một số tình huống nhất định.  </p>\n<ol start=\"2\">\n<li><strong>Tạo menu</strong></li>\n</ol>\n<p>Tạo thư mục menu trong resource, chọn resource type là menu<br /><img src=\"../uploads/Menu/F2.jpg\" alt=\"\" width=\"628\" height=\"354\" /></p>\n<p>Trong thư mục menu chọn new Menu resource file, đặt tên file là mymenu.<br /><img src=\"../uploads/Menu/F3.jpg\" alt=\"\" width=\"628\" height=\"355\" /></p>\n<p>Cấu hình giao diện menu </p>\n<menu>\n<p><!--?xml version=\"1.0\" encoding=\"utf-8\"?--></p>\n<menu>\n<pre>&lt;menu xmlns:android=\"http://schemas.android.com/apk/res/android\"&gt;<br />    &lt;item android:id=\"@+id/Login\"<br />        android:title=\"Login\"/&gt;<br />    &lt;item android:id=\"@+id/Logout\"<br />        android:title=\"Logout\"/&gt;<br />&lt;/menu&gt;</pre>\n</menu>\n<p><br /><br />Trong class MainActivity , hàm onCreateOptionsMenu sẽ gọi giao diện menu được tạo ra ở trên</p>\n</menu>\n<p><strong>public boolean </strong>onCreateOptionsMenu(Menu menu) {<br />     <em>// Inflate the menu; this adds items to the action bar if it is present.<br />     </em>getMenuInflater().inflate(R.menu.my<strong><em>menu</em></strong>, menu);<br />     <strong>return true</strong>;<br /> } </p>\n<ol start=\"3\">\n<li><strong>Xử lý sự kiện trong menu</strong></li>\n</ol>\n<p>Khi người dùng chọn item trong menu thì kết quả sẽ được xử lý trong hàm <strong>onOptionsItemSelected </strong>của class<strong> MainActivity, hàm</strong> getItemId sẽ lấy id của item được khai báo trong giao diện XML của menu</p>\n<p><strong>public boolean onOptionsItemSelected(MenuItem item) {<br />     </strong>int id = item.getItemId();<strong><br /> </strong>    switch (id){<br />         case  R.id.Login:<br />             Toast.makeText(this, \"Login\", Toast.LENGTH_SHORT).show();<br />         return true;<br />         case  R.id.Logout:<br />             Toast.makeText(this, \"Logout\", Toast.LENGTH_SHORT).show();<br />         return true;<br />         default: return super.onOptionsItemSelected(item);<br /> <strong>    }<br /><br />     <br /> }<br /><br /></strong></p>\n<p> </p>', 21, '2018-08-20 09:39:03', '2020-06-03 07:23:16', 'uploads/avts/34_2018/3f3bb26de51b3ea798cbaf1edc724bb7.jpg', 375, 0, 0),
(43, 'Activity trong Android', '2', '<p><strong><u>Bài Giảng</u></strong><strong>: Activity (6.0 API 23)</strong></p>\n<ol>\n<li><strong>Khái niệm Activity</strong></li>\n</ol>\n<p>Activity là một class đi kèm với một layout, ứng dụng di động có ít nhất là một activity.</p>\n<ol start=\"2\">\n<li><strong>Vòng đời của Activity</strong></li>\n</ol>\n<p>onCreate(): Khởi tạo giá trị, cài đặt các hàm hướng sự kiện, chuẩn bị các thành phần của activity như giao diện.</p>\n<p>onStart(): Khi activity hiện ra trên màn hình</p>\n<p>onResume(): Khi người dùng có thể tương tác với activity.</p>\n<p>onPause(): Dừng hoạt động khi có activity hiện lên trên màn hình, chạy ngầm trên nền.</p>\n<p>onStop(): Không còn hiển thị trên màn hình.<br /><img src=\"https://www.elabvn.com/elab//uploads/Activity/activititylife.jpg\" alt=\"\" width=\"549\" height=\"679\" /></p>\n<ol start=\"3\">\n<li><strong>Thêm mới activity</strong></li>\n</ol>\n<p>Chọn thư mục app chuột phải: New &gt; Activity &gt; Empty Activity</p>\n<p> <img src=\"https://www.elabvn.com/elab//uploads/Activity/activity.jpg\" alt=\"\" width=\"626\" height=\"355\" /></p>\n<p>Đặt tên cho class là SettingActivity</p>\n<p> <img src=\"https://www.elabvn.com/elab//uploads/Activity/activity2.jpg\" /></p>\n<p> </p>\n<ol start=\"4\">\n<li><strong>Gọi SettingActivity từ class MainActivity</strong></li>\n</ol>\n<p>Sử dụng Intent<br /> <em><br />     </em>Intent preferencesIntent = <strong>new </strong>Intent(<strong>this</strong>, SettingActivity.<strong>class</strong>);<br />     startActivity(preferencesIntent);<br />    <br /> }</p>\n<ol start=\"5\">\n<li><strong>Truyền tham số cho Activity qua Intent</strong></li>\n</ol>\n<p>Khi cần truyền tham số cho activity mới sử dụng putExtra</p>\n<p>Intent main_product=<strong>new </strong>Intent(<strong>this</strong>,MainProduct.<strong>class</strong>);<br /> main_product.putExtra(<strong>\"id\"</strong>,result.<strong>id</strong>);<br /> startActivity(main_product);</p>\n<p>Trong class MainProduct để nhận giá trị “id” sử dụng getIntExtra</p>\n<p><strong>int </strong>s=getIntent().getIntExtra(<strong>\"id\"</strong>, 0);</p>\n<p> </p>\n<p> </p>\n<p> </p>', 21, '2018-09-17 08:55:04', '2020-06-03 07:38:07', 'uploads/avts/38_2018/a822052cdfbb9b4a0e39599ccf4ac80e.jpg', 374, 0, 0),
(44, 'Câu hỏi', '5', '<p><strong>Một số câu hỏi ôn tập Môn Mạng không dây và di động</strong></p>\n<ol>\n<li>Trình bày về hệ thống thông tin di động thế hệ thứ nhất 1G (AMPS).</li>\n<li>Trình bày về hệ thống thông tin di động thế hệ thứ hai 2G (GSM).</li>\n<li>Nêu nhược điểm của mạng 1G.</li>\n<li>Trình bày ưu điểm của mạng 2G.</li>\n<li>Trình bày về hệ thống thông tin di động thế hệ thứ ba 3G (CMDA).</li>\n<li>Trình bày các tính chất của sóng cực ngắn.</li>\n<li>Hiện tượng nhiễu xạ là gì, em hãy cho ví dụ minh họa.</li>\n<li>Hiện tượng tán xạ là gì, em hãy cho ví dụ minh họa.</li>\n<li>Sự truyền đa đường (fading) là gì.</li>\n<li>Trình bày phương pháp Pulse Code Modulation (PCM) số hoá tín hiệu.</li>\n<li>Trình bày kỹ thuật điều chế biên độ AM.</li>\n<li>Trình bày kỹ thuật điều chế tần số FM.</li>\n<li>Trình bày kỹ thuật đa truy nhập phân chia theo tần số FDMA.</li>\n<li>Trình bày kỹ thuật đa truy nhập phân chia theo thời gian TDMA.</li>\n<li>Trình bày kỹ thuật đa truy nhập phân chia theo mã CDMA.</li>\n<li>Trình bày các sự kiện của việc khởi hoạt máy điện thoại trong mạng AMPS.</li>\n<li>Trình bày các sự kiện của việc thiết lập cuộc gọi từ máy điện thoại trong mạng AMPS.</li>\n<li>Trình bày các sự kiện của việc thiết lập cuộc gọi đến máy điện thoại trong mạng AMPS.</li>\n<li>Trình bày các sự kiện của việc chuyển giao cuộc gọi trong mạng AMPS.</li>\n<li>Trình bày các sự kiện của việc khởi hoạt máy điện thoại trong mạng GSM.</li>\n<li>Trình bày các sự kiện của việc xác thực trong mạng GSM.</li>\n<li>Trình bày các sự kiện của việc thiết lập cuộc gọi đến máy điện thoại trong mạng GSM.</li>\n</ol>\n<p> </p>', 21, '2018-09-20 16:37:32', '2020-06-03 04:42:38', 'uploads/avts/38_2018/a131290f698369e7c540fa21549b7034.jpg', 481, 0, 0),
(45, 'Seekbar trong Android (6.0 API 23)', '2', '<p><strong><u>Bài Giảng</u></strong><strong>: Seekbar trong Android (6.0 API 23)</strong></p>\n<ol>\n<li><strong>Giao diện seekbar</strong></li>\n</ol>\n<p>Khai báo Seekbar có giá trị lớn nhất là 100 nhỏ nhất là 0 và mặc định bằng 50.</p>\n&lt;<em>SeekBar<br />     android:layout_width=\"match_parent\"<br />     android:layout_weight=\"4\"<br />     android:layout_height=\"wrap_content\"<br />     android:id=\"@+id/seekBar\"<br />     android:progress=\"50\"<br />     android:max=\"100\"<br />     /&gt;</em>\n<ol start=\"2\">\n<li><strong>Xử lý sự kiện trên seekbar</strong></li>\n</ol>\n<p>Trong Java khai báo một biến mSeekbar để tham chiếu lên đối tượng trên giao diện và lắng nghe sự kiện thay đổi trên Seekbar rồi gọi hàm ToDo xử lý giá trị của mSeekbar</p>\n<em>private SeekBar mSeekbar;<br /> private double mPrice,mTotal;<br /> private double mPercent;<br /> private EditText mEditPrice,mEditTotal;<br />/* code*/<br /></em><em>mSeekbar= findViewById(R.id.seekBar);<br /> <br /> mSeekbar.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {<br />     @Override<br />     public void onProgressChanged(SeekBar seekBar, int i, boolean b) {<br />       mPercent=i/100.00;<br />       Todo();<br />     }<br /> <br />     @Override<br />     public void onStartTrackingTouch(SeekBar seekBar) {<br /> <br />     }<br /> <br />     @Override<br />     public void onStopTrackingTouch(SeekBar seekBar) {<br /> <br />     }<br /> });</em>\n<ol start=\"3\">\n<li><strong>Hàm ToDo</strong></li>\n</ol>\n<em>private void ToDo(){<br />     mPrice=Double.parseDouble(mEditPrice.getText().toString());<br />     mTotal=mPrice*(1+mPercent);<br />     Toast.makeText(getContext(),String.valueOf(mPercent),Toast.LENGTH_LONG).show();<br />     mEditTotal.setText(String.valueOf(mTotal));<br /> }</em>\n<p> </p>\n<p><em> </em></p>\n<p> </p>', 21, '2018-10-15 08:30:39', '2020-06-03 10:19:30', 'uploads/avts/42_2018/8808dd461ce3a55dc8fe2e0f3a80d506.png', 311, 0, 0);
INSERT INTO `news` (`id`, `title`, `types_id`, `content`, `user_id`, `created_at`, `updated_at`, `avt`, `views`, `quantity`, `price`) VALUES
(46, 'SQLite (6.0 API 23)', '2', '<ol>\n<li><strong>Xây dựng lớp Database</strong></li>\n</ol>\n<p>Đoạn code sau sẽ xây dựng một cơ sở dữ liệu có tên là “Users” và có một bảng là “users” gồm 03 trường: _id kiểu integer, name kiểu text và pass kiểu text.</p>\n<p>Khai báo URI của lớp, trong đó home.student5 cần thay bằng tên của package của class, nằm ở trên cùng mỗi class.</p>\n<strong><em>public class </em></strong><em>Database <strong>extends </strong>ContentProvider {<br />     <strong>static final </strong>String <strong>Provider_name</strong>=<strong>\"home.student5.Database\"</strong>;<br />     <strong>static final </strong>String <strong>URL</strong>=<strong>\"content://\"</strong>+<strong>Provider_name</strong>+<strong>\"/users\"</strong>;<br />     <strong>static final </strong>Uri <strong>mURI</strong>= Uri.parse(<strong>URL</strong>);</em><strong><em>static final </em></strong><em>String <strong>_ID </strong>= <strong>\"_id\"</strong>;<br /> <strong>static final </strong>String <strong>NAME </strong>= <strong>\"name\"</strong>;<br /></em><strong><em>private static </em></strong><em>HashMap&lt;String, String&gt; USERS_PROJECTION_MAP;</em> <br /><strong><em>static final int USERS = 1;<br /> static final int USER_ID = 2;<br /> static final UriMatcher uriMatcher;<br /> static{<br />     uriMatcher = new UriMatcher(UriMatcher.NO_MATCH);<br />     uriMatcher.addURI(Provider_name, \"users\", USERS);<br />     uriMatcher.addURI(Provider_name, \"users /#\", USER _ID);<br /> }</em></strong><em><br />  </em>Khai báo lớp cơ sở dữ liệu <br /><strong><em>private </em></strong><em>SQLiteDatabase <strong>db</strong>;<br /> <strong>static final </strong>String <strong>DATABASE_NAME </strong>= <strong>\"Users\"</strong>;<br /> <strong>static final </strong>String <strong>TABLE_NAME </strong>= <strong>\"users\"</strong>;<br /> <strong>static final int DATABASE_VERSION </strong>= 1;<br /> <strong>static final </strong>String <strong>CREATE_DB_TABLE </strong>=<br />         <strong>\" CREATE TABLE \" </strong>+ <strong>TABLE_NAME </strong>+<br />                 <strong>\" (_id INTEGER PRIMARY KEY AUTOINCREMENT, \" </strong>+<br />                 <strong>\" name TEXT NOT NULL, \" </strong>+<br />                 <strong>\" pass TEXT NOT NULL);\"</strong>;<br /> <strong>private static class </strong>DatabaseHelper <strong>extends </strong>SQLiteOpenHelper {<br />     DatabaseHelper(Context context){<br />         <strong>super</strong>(context, <strong>DATABASE_NAME</strong>,<strong>null</strong>, <strong>DATABASE_VERSION</strong>);<br />     }<br /> <br />     @Override<br />     <strong>public void </strong>onCreate(SQLiteDatabase db) {<br />         db.execSQL(<strong>CREATE_DB_TABLE</strong>);<br />     }<br /> <br />     @Override<br />     <strong>public void </strong>onUpgrade(SQLiteDatabase db, <strong>int </strong>oldVersion, <strong>int </strong>newVersion) {<br />         db.execSQL(<strong>\"DROP TABLE IF EXISTS \" </strong>+  <strong>TABLE_NAME</strong>);<br />         onCreate(db);<br />     }<br /> }</em><em> <br /></em>Khởi tạo cơ sở dữ liệu <br /><strong><em>public boolean </em></strong><em>onCreate() {<br />     Context context = getContext();<br />     DatabaseHelper dbHelper = <strong>new </strong>DatabaseHelper(context);<br /> <br />     /**<br />      * Create a write able database which will trigger its<br />      * creation if it doesn\'t already exist.<br />      */<br /> <br />     <strong>db </strong>= dbHelper.getWritableDatabase();<br />     <strong>return </strong>(<strong>db </strong>== <strong>null</strong>)? <strong>false</strong>:<strong>true</strong>;<br /> }</em> \n<ol start=\"2\">\n<li><strong>Các hàm truy vấn cơ sở dữ liệu</strong></li>\n</ol>\n<p>Hàm chèn dữ liệu</p>\n<strong><em>public Uri insert(Uri uri, ContentValues values) {<br />     /**<br />      * Add a new record<br />      */<br />     long rowID = db.insert(    TABLE_NAME, \"\", values);<br /> <br />     /**<br />      * If record is added successfully<br />      */<br />     if (rowID &gt; 0) {<br />         Uri _uri = ContentUris.withAppendedId(CONTENT_URI, rowID);<br />         getContext().getContentResolver().notifyChange(_uri, null);<br />         return _uri;<br />     }<br /> <br />     throw new SQLException(\"Failed to add a record into \" + uri);<br /> }<br /></em></strong>Truy vấn dữ liệu<br /><strong><em>public Cursor query(Uri uri, String[] projection,<br />                     String selection, String[] selectionArgs, String sortOrder) {<br />     SQLiteQueryBuilder qb = new SQLiteQueryBuilder();<br />     qb.setTables(TABLE_NAME);<br /> <br />     switch (uriMatcher.match(uri)) {<br />         case USERS:<br />             qb.setProjectionMap(USERS_PROJECTION_MAP);<br />             Toast.makeText(getContext(),\" USERS \", Toast.LENGTH_SHORT).show();<br />             break;<br /> <br />         case USER_ID:<br />             qb.appendWhere( _ID + \"=\" + uri.getPathSegments().get(1));<br />             Toast.makeText(getContext(),\" USER_ID \", Toast.LENGTH_SHORT).show();<br />             break;<br /> <br />         default:<br />     }<br /> <br />     if (sortOrder == null || sortOrder == \"\"){<br />         /**<br />          * By default sort on student names<br />          */<br />         sortOrder = NAME;<br />     }<br /> <br />     Cursor c = qb.query(db,    projection,    selection,<br />             selectionArgs,null, null, sortOrder);<br />     /**<br />      * register to watch a content URI for changes<br />      */<br />     c.setNotificationUri(getContext().getContentResolver(), uri);<br />     return c;<br /> }</em></strong><strong><em>@Override<br /></em></strong>Hàm xóa dữ liệu<br /> <strong><br /> <em>public int delete(Uri uri, String selection, String[] selectionArgs) {<br />     int count = 0;<br />     switch (uriMatcher.match(uri)){<br />         case USERS:<br />             count = db.delete(TABLE_NAME, selection, selectionArgs);<br />             break;<br /> <br />         case USER_ID:<br />             String id = uri.getPathSegments().get(1);<br />             count = db.delete( TABLE_NAME, _ID +  \" = \" + id +<br />                     (!TextUtils.isEmpty(selection) ? \"  AND (\" + selection + \')\' : \"\"), selectionArgs);<br />             break;<br />         default:<br />             throw new IllegalArgumentException(\"Unknown URI \" + uri);<br />     }<br /> <br />     getContext().getContentResolver().notifyChange(uri, null);<br />     return count;<br /> }<br /> </em></strong>Hàm cập nhật dữ liệu<strong><br /> <em>@Override<br /> public int update(Uri uri, ContentValues values,<br />                   String selection, String[] selectionArgs) {<br />     int count = 0;<br />     switch (uriMatcher.match(uri)) {<br />         case USERS:<br />             count = db.update(TABLE_NAME, values, selection, selectionArgs);<br />             break;<br /> <br />         case USER_ID:<br />             count = db.update(TABLE_NAME, values,<br />                     _ID + \" = \" + uri.getPathSegments().get(1) +<br />                             (!TextUtils.isEmpty(selection) ? \" AND (\" +selection + \')\' : \"\"), selectionArgs);<br />             break;<br />         default:<br />             throw new IllegalArgumentException(\"Unknown URI \" + uri );<br />     }<br /> <br />     getContext().getContentResolver().notifyChange(uri, null);<br />     return count;<br /> }</em></strong>\n<p><span style=\"color: #000000;\"><span style=\"font-weight: bold;\">public </span>String getType(Uri uri) {</span><br /><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">switch </span>(<span style=\"font-weight: bold; font-style: italic;\">uriMatcher</span>.match(uri)){</span><br /><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">case </span><span style=\"font-weight: bold; font-style: italic;\">USERS</span>:</span><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">return </span><span style=\"font-weight: bold;\">\"vnd.android.cursor.dir/vnd.example.students\"</span>;</span><br /><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">case </span><span style=\"font-weight: bold; font-style: italic;\">USER_ID</span>:</span><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">return </span><span style=\"font-weight: bold;\">\"vnd.android.cursor.item/vnd.example.students\"</span>;</span><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">default</span>:</span><br /><span style=\"color: #000000;\"> <span style=\"font-weight: bold;\">throw new </span>IllegalArgumentException(<span style=\"font-weight: bold;\">\"Unsupported URI: \" </span>+ uri);</span><br /><span style=\"color: #000000;\"> }</span><br /><span style=\"color: #000000;\">}</span></p>\n<ol start=\"3\">\n<li><strong>File Manifest</strong></li>\n</ol>\n<p>Khai báo trường <strong><em>android:authorities</em></strong> trùng với <strong><em>Provider_name </em></strong>trong thẻ &lt;<strong><em>Provider&gt; </em></strong>ngay sau thẻ</p>\n<strong><strong><em>&lt;activity<br />         android:name=\".Main3Activity\"<br />         android:label=\"@string/title_activity_main3\"<br />         android:theme=\"@style/AppTheme.NoActionBar\"&gt;<br /></em></strong></strong><span style=\"color: #008000; font-weight: bold;\"><span style=\"color: #008000; font-weight: bold;\"><strong><em> </em></strong><span style=\"color: #000000;\">&lt;/activity&gt;<br /></span></span></span><strong>&lt;provider android:name=\"Database\"</strong>\n<pre>    android:authorities=\"home.student5.Database\"/<strong>&gt;</strong></pre>\n<ol start=\"4\">\n<li><strong>Tạo giao diện cơ sơ dữ liệu</strong></li>\n</ol>\n<strong><em>&lt;LinearLayout<br />         android:layout_width=\"match_parent\"<br />         android:layout_height=\"wrap_content\"<br />         android:orientation=\"vertical\"&gt;<br />         &lt;LinearLayout<br />             android:layout_width=\"match_parent\"<br />             android:layout_height=\"wrap_content\"<br />             android:orientation=\"horizontal\"&gt;<br />             &lt;TextView<br />                 android:id=\"@+id/sID\"<br />                 android:layout_width=\"wrap_content\"<br />                 android:layout_height=\"wrap_content\"<br />                 android:text=\"ID\" /&gt;<br /> <br />             &lt;EditText<br />                 android:id=\"@+id/editID\"<br />                 android:layout_width=\"wrap_content\"<br />                 android:layout_height=\"wrap_content\"<br />                 android:ems=\"10\"<br />                 android:inputType=\"textPersonName\"<br />                 android:text=\"ID\" /&gt;<br />         <br />     &lt;LinearLayout<br />         android:layout_width=\"match_parent\"<br />         android:layout_height=\"wrap_content\"<br />         android:orientation=\"horizontal\"&gt;<br />         &lt;TextView<br />             android:id=\"@+id/text2\"<br />             android:layout_width=\"wrap_content\"<br />             android:layout_height=\"wrap_content\"<br />             android:text=\"Username\" /&gt;<br /> <br />         &lt;EditText<br />             android:id=\"@+id/editUserStudent\"<br />             android:layout_width=\"wrap_content\"<br />             android:layout_height=\"wrap_content\"<br />             android:ems=\"10\"<br />             android:inputType=\"textPersonName\"<br />             android:text=\"Name\" /&gt;<br />     <br /> <br /> &lt;LinearLayout<br />     android:layout_width=\"match_parent\"<br />     android:layout_height=\"wrap_content\"<br /> <br />     android:orientation=\"horizontal\"&gt;<br />     &lt;TextView<br />         android:id=\"@+id/textView\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:text=\"Password\" /&gt;<br /> <br />     &lt;EditText<br />         android:id=\"@+id/editPassStudent\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         android:ems=\"10\"<br />         android:inputType=\"textPassword\" /&gt;<br /> <br />     &lt;LinearLayout<br />         android:layout_width=\"match_parent\"<br />         android:layout_height=\"wrap_content\"<br />         android:layout_gravity=\"center_horizontal\"<br />         android:orientation=\"horizontal\"&gt;<br />     &lt;Button<br />         android:id=\"@+id/Add\"<br />         android:layout_width=\"wrap_content\"<br />         android:layout_height=\"wrap_content\"<br />         style=\"@style/Base.Widget.AppCompat.Button.Colored\"<br />         android:text=\"Add\" /&gt;<br />         &lt;Button<br />             android:id=\"@+id/List\"<br />             android:layout_width=\"wrap_content\"<br />             android:layout_height=\"wrap_content\"<br />             style=\"@style/Base.Widget.AppCompat.Button.Colored\"<br />             android:text=\"List\" /&gt;<br /> <br />             &lt;Button<br />                 android:id=\"@+id/Update\"<br />                 android:layout_width=\"wrap_content\"<br />                 android:layout_height=\"wrap_content\"<br />                 style=\"@style/Base.Widget.AppCompat.Button.Colored\"<br />                 android:text=\"Update\" /&gt;<br />             &lt;Button<br />                 android:id=\"@+id/Delete\"<br />                 android:layout_width=\"wrap_content\"<br />                 android:layout_height=\"wrap_content\"<br />                 style=\"@style/Base.Widget.AppCompat.Button.Colored\"<br />                 android:text=\"Delete\" /&gt;<br />         <br />     </em></strong>\n<ol start=\"5\">\n<li><strong>Code trong class</strong></li>\n</ol>\n<strong><em>EditText mUserStudent,mPassStudent,mID;<br /> Button mAdd,mList,mDelete,mUpdate;<br /></em></strong><strong><em>mUserStudent= findViewById(R.id.editUserStudent);</em></strong><strong><em> <br />mPassStudent= findViewById(R.id.editPassStudent);<br />  mAdd= findViewById(R.id.Add);<br />  mList= findViewById(R.id.List);<br />  mDelete= findViewById(R.id.Delete);<br />  mUpdate= findViewById(R.id.Update);<br />  mID= findViewById(R.id.editID);<br />     mAdd.setOnClickListener(new View.OnClickListener() {<br />         @Override<br />         public void onClick(View view) {<br /> <br />             Add_Student();<br />         }<br />     });<br />     mList.setOnClickListener(new View.OnClickListener() {<br />         @Override<br />         public void onClick(View view) {<br />             List_Student();<br />         }<br />     });<br />     mDelete.setOnClickListener(new View.OnClickListener() {<br />         @Override<br />         public void onClick(View view) {<br />             Delete_Student();<br />         }<br />     });<br />     mUpdate.setOnClickListener(new View.OnClickListener() {<br />         @Override<br />         public void onClick(View view) {<br />             Update_Student();<br />         }<br />     });<br /> <br /> }<br /> void Add_Student(){<br />     ContentValues mData=new ContentValues();<br />     mData.put(Database.NAME,mUserStudent.getText().toString());<br />     mData.put(Database.PASS,mPassStudent.getText().toString());<br />  //   Context mFragContext=Main3Activity.getContextofApp();<br />     Uri uri=getContentResolver().insert(Database.mURI,mData);//getContentResolver<br />     // là hàm gắn vào đối tượng.<br /> <br /> }<br /> void Delete_Student(){<br />     String student_Uri=Database.URL+\'/\'+mID.getText().toString();<br />     int resutlt=getContentResolver().delete(Uri.parse(student_Uri),null,null);<br /> <br /> <br /> }<br /> void List_Student(){<br />     Cursor c = getContentResolver().query(Database.mURI, null, null, null, \"name\");<br /> <br />     if (c.moveToFirst()) {<br />         do{<br />             Toast.makeText(getContext(),c.getString(c.getColumnIndex(Database._ID)) +<br />                     \", \" +  c.getString(c.getColumnIndex( Database.NAME)) +<br />                     \", \" + c.getString(c.getColumnIndex( Database.PASS)),Toast.LENGTH_SHORT).show();<br />         } while (c.moveToNext());<br />     }<br /> <br /> }<br /> void Update_Student(){<br />     ContentValues mData=new ContentValues();<br />     mData.put(Database.NAME,mUserStudent.getText().toString());<br />     mData.put(Database.PASS,mPassStudent.getText().toString());<br />     String student_Uri=Database.URL+\'/\'+mID.getText().toString();<br />     int result=getContentResolver().update(Uri.parse(student_Uri),mData,null,null);<br /> </em></strong>}', 21, '2018-11-13 08:48:57', '2020-06-03 09:12:52', 'uploads/avts/46_2018/2587880b774f940e025bfb486f28acd6.png', 274, 0, 0),
(47, '1', '6', '1', 21, '2019-05-05 16:41:42', '2020-06-03 05:08:08', '', 197, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `content` varchar(1500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avt` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `results` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `owner_id`, `test_id`, `content`, `avt`, `created_at`, `updated_at`, `results`) VALUES
(14, 9, 1, 'Chào Cường', 'uploads/avts/29_2018/74ade9545bfbd31a959405d2d26ab9e1.jpg', '2018-07-16 08:50:42', '2018-07-17 10:18:29', '0,1'),
(15, 9, 1, 'Chào bạn Hùng ', 'uploads/avts/29_2018/2a022fa25024b2396ffb97912ad384e5.jpg', '2018-07-16 10:31:29', '2018-07-17 10:11:47', '0,1'),
(16, 21, 2, 'Mạng máy tính của công ty có 40 router thì bạn sẽ dùng giao thức định tuyến nào?', 'uploads/avts/43_2018/16c71e5d5cdd3f5a5142078769113b44.jpg', '2018-10-17 14:44:59', '2018-10-23 20:50:04', '3'),
(17, 21, 2, 'Giao thức OSPF định tuyến theo metric gì?', 'uploads/avts/43_2018/febc78d9741c020d46533a29cbd04dc7.jpg', '2018-10-23 20:58:41', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `question_id`, `answer`, `created_at`) VALUES
(129, 9, 1, '1', '2018-07-11 12:21:33'),
(130, 9, 3, '4', '2018-07-11 12:21:33'),
(137, 9, 1, '2', '2018-07-11 12:32:29'),
(138, 9, 3, '4', '2018-07-11 12:32:29'),
(139, 9, 1, '2', '2018-07-11 12:33:25'),
(140, 9, 3, '4', '2018-07-11 12:33:25'),
(141, 9, 1, '2', '2018-07-11 12:35:21'),
(142, 9, 3, '4', '2018-07-11 12:35:22'),
(143, 9, 1, '2', '2018-07-11 12:37:48'),
(144, 9, 3, '4', '2018-07-11 12:37:48'),
(145, 9, 1, '2', '2018-07-11 12:38:07'),
(146, 9, 3, '4', '2018-07-11 12:38:07'),
(147, 9, 1, '1', '2018-07-11 12:38:58'),
(148, 9, 3, '3', '2018-07-11 12:38:58'),
(149, 9, 1, '1', '2018-07-12 08:26:02'),
(150, 9, 1, '1', '2018-07-12 08:27:03'),
(151, 9, 3, '4', '2018-07-12 08:27:24'),
(152, 9, 1, '2', '2018-07-12 08:27:56'),
(153, 9, 3, '4', '2018-07-12 08:27:56'),
(154, 9, 1, '1', '2018-07-12 08:29:00'),
(155, 9, 3, '3', '2018-07-12 08:29:01'),
(156, 9, 10, '5', '2018-07-15 21:30:30'),
(157, 9, 10, '5', '2018-07-15 21:32:17'),
(158, 9, 11, '12', '2018-07-15 21:32:17'),
(159, 9, 13, '1,4', '2018-07-16 08:51:47'),
(160, 9, 14, '5,6', '2018-07-16 08:51:47'),
(161, 9, 14, '5', '2018-07-16 09:23:10'),
(162, 9, 14, '5', '2018-07-16 09:24:36'),
(163, 9, 14, '6', '2018-07-16 09:24:51'),
(164, 21, 16, '13', '2018-10-17 14:45:33'),
(165, 21, 16, '13,16', '2018-10-17 14:45:47'),
(166, 21, 16, '16', '2018-10-17 15:19:12'),
(167, 21, 16, '15', '2018-10-17 15:19:24'),
(168, 21, 16, '13', '2018-10-19 09:29:15'),
(169, 21, 16, '14', '2018-10-19 09:29:25'),
(170, 21, 16, '16', '2018-10-19 09:36:45'),
(171, 21, 16, '13', '2018-10-19 10:36:37'),
(172, 21, 16, '16', '2018-10-19 10:36:50'),
(173, 21, 16, '14,15', '2018-10-19 10:37:06'),
(174, 21, 16, '13', '2018-10-23 20:50:26'),
(175, 21, 16, '15', '2018-10-23 20:54:40'),
(176, 21, 16, '16', '2018-10-23 20:59:00'),
(177, 21, 17, '17', '2018-10-23 20:59:00'),
(178, 21, 16, '13', '2018-10-23 21:01:59'),
(179, 21, 17, '17', '2018-10-23 21:01:59'),
(180, 21, 16, '16', '2018-10-23 21:02:26'),
(181, 21, 17, '19', '2018-10-23 21:02:26'),
(182, 21, 16, '13', '2018-10-24 08:47:47'),
(183, 21, 17, '17', '2018-10-24 08:47:47'),
(184, 21, 16, '13', '2018-10-24 09:45:24'),
(185, 21, 17, '17', '2018-10-24 09:45:24'),
(186, 21, 16, '15', '2018-10-24 09:46:11'),
(187, 21, 17, '18', '2018-10-24 09:46:11'),
(188, 21, 16, '13', '2018-10-24 15:58:51'),
(189, 21, 17, '17', '2018-10-24 15:58:51'),
(190, 21, 16, '16', '2018-10-24 15:59:25'),
(191, 21, 17, '18', '2018-10-24 15:59:25'),
(192, 21, 16, '13', '2018-10-25 10:35:28'),
(193, 21, 17, '18', '2018-10-25 10:35:28'),
(194, 21, 16, '13', '2018-11-01 08:56:00'),
(195, 21, 17, '17', '2018-11-01 08:56:00'),
(196, 9, 16, '13', '2018-11-01 08:57:55'),
(197, 9, 17, '17', '2018-11-01 08:57:55'),
(198, 21, 16, '13', '2018-11-12 15:24:48'),
(199, 21, 17, '18', '2018-11-12 15:24:48'),
(200, 21, 16, '14', '2018-11-16 08:30:14'),
(201, 21, 17, '17', '2018-11-16 08:30:14'),
(202, 21, 16, '14', '2018-11-16 15:28:17'),
(203, 21, 17, '17', '2018-11-16 15:28:17'),
(204, 21, 16, '13,15', '2020-04-30 20:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `test_topic` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `avt` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_topic`, `owner_id`, `avt`, `created_at`, `updated_at`) VALUES
(1, 'mẫu giáo', 9, 'uploads/avts/29_2018/3489f832a88529b02dbbf04960064922.jpg', '2018-07-16 08:29:36', '0000-00-00 00:00:00'),
(2, 'Trắc nghiệm mạng máy tính', 21, 'uploads/avts/37_2018/372ec3e597ebd70d4e6ba6f1ef24472b.jpg', '2018-09-13 08:05:19', '2018-10-23 20:59:28'),
(3, 'Uwireless', 9, 'uploads/avts/37_2018/9e023cb256fd6ee36ac583a894a090c0.jpg', '2018-09-13 09:14:04', '0000-00-00 00:00:00'),
(4, 'mẫu giáo 2', 9, 'uploads/avts/37_2018/17dd7c1645695fe0ecfb155b44158cb8.jpg', '2018-09-13 09:16:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `top_slider`
--

CREATE TABLE `top_slider` (
  `id` int(11) NOT NULL,
  `avt` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `top_slider`
--

INSERT INTO `top_slider` (`id`, `avt`, `link`, `status`, `created_at`, `updated_at`) VALUES
(23, 'uploads/avts/12_2019/eff1a67011ce98f98295464a30e13ea2.jpg', 'http://elabvn.com/elab/index.php/load-stock', '1', '0000-00-00 00:00:00', '2019-03-21 11:54:48'),
(24, 'uploads/avts/12_2019/4057052cf1f1c0a1775355767945cb8c.jpg', 'http://elabvn.com/elab/index.php/trang-tin?types_id=2', '1', '0000-00-00 00:00:00', '2019-03-22 07:52:54'),
(25, 'uploads/avts/12_2019/cc258e6f7dedce4f1ecc5334b43b7123.png', 'http://elabvn.com/elab/index.php/trang-tin?types_id=1', '1', '0000-00-00 00:00:00', '2019-03-22 07:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `activated` tinyint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `top_menu` tinyint(4) DEFAULT NULL,
  `bottom_link` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `activated`, `parent_id`, `top_menu`, `bottom_link`, `type`, `order`) VALUES
(1, 'Web', '2018-01-31 00:00:00', '0000-00-00 00:00:00', 1, 0, 1, 0, 1, 0),
(2, 'Android', '2018-01-31 00:00:00', '2018-01-31 00:00:00', 1, NULL, 1, NULL, 1, NULL),
(3, 'Big Data', '2018-01-31 00:00:00', NULL, 0, NULL, 1, NULL, 1, NULL),
(4, 'Linux', '2018-01-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Wireless', '2018-09-12 00:00:00', NULL, 1, NULL, 1, NULL, 1, NULL),
(6, 'Network', '0000-00-00 00:00:00', NULL, 1, NULL, 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fb_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plots` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `skype` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `perm` tinyint(4) DEFAULT '2',
  `avt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '1',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_post` mediumint(100) DEFAULT '0',
  `posted` mediumint(100) DEFAULT '0',
  `expr_time` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `user_name`, `pwd`, `full_name`, `plots`, `email`, `phone`, `address`, `skype`, `perm`, `avt`, `activated`, `activation_code`, `ip`, `max_post`, `posted`, `expr_time`, `created_at`, `updated_at`, `lat`, `lng`) VALUES
(9, '', 'phamhung', '802dddbab919fe58ad6f1bc95ddb2e7a', NULL, NULL, 'hungp222@niem.edu.vn', '', '', '', 0, 'uploads/avts/12_2018/66fcf4cd14535c2c08fbc64c0607fb0a.jpg', 1, NULL, '14.231.82.134', 0, 0, NULL, '2017-12-14 07:58:56', '2019-01-10 09:43:14', '', ''),
(21, '', 'scorpnet', '802dddbab919fe58ad6f1bc95ddb2e7a', NULL, NULL, 'phamhungevn@gmail.com', '', '', '', 0, 'uploads/avts/39_2018/99aa9b173e502cf54c1bd0161b5c3221.JPG', 1, NULL, '::1', 0, 0, NULL, '2018-07-31 11:00:18', '2020-06-28 20:01:58', '', ''),
(22, '', 'Quanvv', '8a6e952cda6b323f67c43bd51a6449e8', NULL, NULL, 'quanvv.dav@gmail.com', '0971870493', '', '', 2, '/', 1, NULL, '103.7.36.23', 0, 0, NULL, '2018-08-23 11:59:40', NULL, '', ''),
(25, '', 'binh', '10f76534adf83e9d1bcb4d7349de491f', NULL, NULL, '', '', '', '', 2, 'uploads/avts/36_2018/5f5d334a452989469f6375d713336b60.jpg', 1, NULL, '14.231.80.217', 0, 0, NULL, '2018-09-05 08:45:04', '2018-09-05 08:45:55', '', ''),
(26, '', 'haminh2511', 'f201c92535352aed9eaee83f1fd014c3', NULL, NULL, 'haminh2511@gmail.com', '0397566387', '', '', 2, 'uploads/avts/37_2018/4501135b6a3faebaa7390327ba8615d3.jpg', 1, NULL, '14.177.130.98', 0, 0, NULL, '2018-09-16 21:54:54', NULL, '', ''),
(27, '', 'Đức Thành', '7363a0d0604902af7b70b271a0b96480', NULL, NULL, 'pantheonhaha96@gmail.com', '1682814090', '', '', 2, 'uploads/avts/38_2018/b7c86c5ed61b9b3ea694603e92f16468.jpg', 1, NULL, '27.79.162.223', 0, 0, NULL, '2018-09-18 21:06:08', NULL, '', ''),
(29, '', 'thuhabae', '8e2f42977e18daef036f1cb907ee2e5b', NULL, NULL, 'hamoon6496@gmail.com', '0961233464', '', '', 2, 'uploads/avts/39_2018/ff9d2e6495aa6dd0d5ce3684b731ae7d.JPG', 1, NULL, '42.114.30.92', 0, 0, NULL, '2018-09-28 16:33:30', '2018-11-13 22:02:00', '', ''),
(30, '', 'cuong', 'ee9f05b779b96f538988f71141febeba', NULL, NULL, 'tancuong@gmail.com', '', '', '', 2, 'uploads/avts/41_2018/d4d9d2222c2d2ecf46f7312bb75a6a4e.png', 1, NULL, '14.232.202.51', 0, 0, NULL, '2018-10-11 10:39:59', '2018-10-11 10:40:26', '', ''),
(31, '', 'trungdung891995', '079c152c53d0d0b8ba57de76feb352aa', NULL, NULL, 'ngodung891995@gmail.com', '0983728943', '', '', 2, 'uploads/avts/41_2018/3c22c86127d7597fddaeb87b0aebbd67.jpg', 1, NULL, '42.115.215.125', 0, 0, NULL, '2018-10-12 19:40:39', '2018-12-06 10:43:18', '', ''),
(32, '', 'quan', '8867d37ef5ec0e4928d74f279d4d92a8', NULL, NULL, 'info@quandao.online', 'quan', '', '', 2, 'uploads/avts/42_2018/83e1b82d9d2a5e91074381153b58ffbd.jpg', 1, NULL, '103.7.36.24', 0, 0, NULL, '2018-10-17 07:59:34', '2018-10-17 09:08:44', '', ''),
(33, '', 'dotranminh', '579646aad11fae4dd295812fb4526245', NULL, NULL, 'tranminhtd1@gmail.com', '0375355285', '', '', 2, 'uploads/avts/42_2018/757c377ee36f89e62be55b8f267ccd02.jpeg', 1, NULL, '171.241.36.74', 0, 0, NULL, '2018-10-17 08:03:28', '2018-11-09 18:43:39', '', ''),
(34, '', 'khanh', 'fd308783c6b68c348a6c33f65393b974', NULL, NULL, 'khanh.nguyenngoc.37604@gmail.com', '0978974965', '', '', 2, 'uploads/avts/42_2018/6be579a20bf36f617c135415c319f0f3.JPG', 1, NULL, '183.80.67.238', 0, 0, NULL, '2018-10-17 08:04:33', '2018-11-13 22:10:30', '', ''),
(35, '', 'manhquan01', 'c56d0e9a7ccec67b4ea131655038d604', NULL, NULL, 'manhquan1908@gmail.com', '01639080976', '', '', 2, 'uploads/avts/42_2018/0619cc25c6358122b06241a896665ea2.jpg', 1, NULL, '123.24.160.111', 0, 0, NULL, '2018-10-17 08:21:41', '2018-11-22 20:14:26', '', ''),
(36, '', 'Nguyendanhkhai', '96efc0ff175720135532da9c052e68d5', NULL, NULL, '', '0394562477', '', '', 2, 'uploads/avts/43_2018/14902e3e1f636df84291f1815a8207ac.jpeg', 1, NULL, '103.7.37.185', 0, 0, NULL, '2018-10-23 15:43:08', NULL, '', ''),
(37, '', 'haiha1302', 'bba547745f25757467dfeebf48c3bde3', NULL, NULL, 'td12a11haiha@gmail.com', '0352393790', '', '', 2, 'uploads/avts/43_2018/9fad94b6c0fd9720f628f9b7ebbd00ec.png', 1, NULL, '113.20.116.103', 0, 0, NULL, '2018-10-23 16:16:53', '2018-10-23 16:17:11', '', ''),
(38, '', 'huy2311hvq', 'f65022502857c24b0c2ce7e04ba00965', NULL, NULL, 'huy23112kgenius@gmail.com', '0853335368', '', '', 2, 'uploads/avts/43_2018/f378cab65062f1d9ff9417785be87536.jpg', 1, NULL, '1.52.124.153', 0, 0, NULL, '2018-10-23 18:22:32', '2018-10-23 18:22:48', '', ''),
(39, '', 'papazola', 'ba76dbd0c88e3b6ed44f63df4e93f8b5', NULL, NULL, 'quangduattran@gmail.com', '0866416500', '', '', 2, 'uploads/avts/43_2018/701f53c9fe4756d287624396ae5077b2.jpg', 1, NULL, '14.162.177.195', 0, 0, NULL, '2018-10-24 19:16:50', '2018-10-27 09:14:42', '', ''),
(40, '', 'Trần Dung', '40972aeadc97acac7af1e4cc7f9854e8', NULL, NULL, 'kimdung95.dt@gmail.com', '0912980112', '', '', 2, 'uploads/avts/43_2018/b9e463431bd6c156e89828ef4fae8448.jpeg', 1, NULL, '116.101.223.100', 0, 0, NULL, '2018-10-25 12:28:51', '2019-01-05 13:37:42', '', ''),
(41, '', 'Paladiner', '7f3c0279e779ca488d037efe6ed9fe16', NULL, NULL, 'phanbao38940@gmail.com', '1692610200', '', '', 2, 'uploads/avts/43_2018/1ae5183542ac833cfdb29f23441367ed.jpeg', 1, NULL, '123.24.147.63', 0, 0, NULL, '2018-10-25 19:13:11', '2018-10-25 19:13:33', '', ''),
(42, '', 'Hung', 'eb4e1bb6114ad85c1e4692ad88214d80', NULL, NULL, 'hu@gmail.com', '', '', '', 2, 'uploads/avts/02_2019/efbc35c84f27e460815563a10e6878d2.jpg', 1, NULL, '14.231.82.134', 0, 0, NULL, '2019-01-10 10:09:56', '2019-01-10 10:11:56', '', ''),
(43, '', 'quynn5', '15ff78d0745f6a0e1e188fa1950eaaa0', NULL, NULL, '', '', '', '', 2, 'uploads/avts/26_2020/e37fda86b97f3e643658c62a45e071bb.jpg', 1, NULL, '::1', 0, 0, NULL, '2020-06-28 20:26:15', NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livecodes`
--
ALTER TABLE `livecodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_slider`
--
ALTER TABLE `top_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livecodes`
--
ALTER TABLE `livecodes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `top_slider`
--
ALTER TABLE `top_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
