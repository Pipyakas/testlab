<?php
class Users extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('users_model'); // tải hàm model
    $this->load->helper('Utils');
  }
  function logout()
  {
    if (isset($_SESSION['user'])) {  //nếu đã đăng nhập thì về trang chủ
      unset($_SESSION['user']);
      //redirect(base_url());
      $this->render_frontend_tp('/frontends/product/index', null);
    }
  }
  function update()
  {
    if ((isset($_POST['user_name']))) {
      $user_name = $_POST['user_name'];
      $pwd = $_POST['pwd'];
      $user_id = $_SESSION['user'][0]->id;
      if (!empty($_FILES['avt']['tmp_name'])) {
        $filename = $_FILES['avt']['name'];
        $_FILES['avt']['name'] = rename_upload_file($filename);
        $dir = create_dir_upload('uploads/avts/');
        $config['allowed_types'] = 'JPEG|jpg|JPG|png';
        $config['max_size'] = '10000';
        $config['width']     = 800;
        $config['height']   = 800;
        $config['upload_path'] = $dir;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('avt')) {
          $this->session->set_flashdata('msg_failed', $this->upload->display_errors());
        } else {
          $config = array();
          $config = array(
            "source_image" => $dir . '/' . $_FILES['avt']['name'], //get original image
            "new_image" =>  $dir, //save as new image //need to create thumbs first
            "width" => 800,
            "height" => 800,
            'master_dim' => 'height'
          );
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
        }
        $this->users_model->update(array('avt' => $dir . '/' . $_FILES['avt']['name']), array('id' => $user_id));
      }
      if (!empty($pwd)) {
        $this->users_model->update(array('pwd' => encrypt_pwd($pwd)), array('id' => $user_id));
      }
    } else {
      $user_id = $_SESSION['user'][0]->id;
      $data['user'] = $this->users_model->get_by_user_id($user_id);
      $this->render_frontend_tp('frontends/users/update', $data);
    }
  }
  function register()
  {
    if ((isset($_POST['user_name'])) && (isset($_POST['pwd'])) && (isset($_POST['pwd2']))) {
      $this->form_validation->set_rules('user_name', $this->lang->line('msg_user_name'), 'trim|required|xss_clean');
      $this->form_validation->set_rules('pwd', $this->lang->line('msg_pwd'), 'trim|required|xss_clean');
      if ($this->form_validation->run() != false) {
        $user_name = $_POST['user_name'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if (!empty($_FILES['avt']['tmp_name'])) {
          $filename = $_FILES['avt']['name'];
          $_FILES['avt']['name'] = rename_upload_file($filename);
          $dir = create_dir_upload('uploads/avts/');
          $config['allowed_types'] = 'JPEG|jpg|JPG|png';
          $config['max_size'] = '10000';
          $config['width']     = 800;
          $config['height']   = 800;
          $config['upload_path'] = $dir;
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('avt')) {
            $this->session->set_flashdata('msg_failed', $this->upload->display_errors());
            //  redirect(base_url().'ho-so');
          } else {
            /*
             if($user->avt!=null){
               try {
                 unlink($user->avt);
               } catch (Exception $e) {
               echo $e;
               }
             }*/
            $config = array();
            $config = array(
              "source_image" => $dir . '/' . $_FILES['avt']['name'], //get original image
              "new_image" =>  $dir, //save as new image //need to create thumbs first
              "width" => 800,
              "height" => 800,
              'master_dim' => 'height'
            );
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //      $this->newsfeed_model->update(array('avt'=>$dir.'/'.$_FILES['avt']['name']), array('id'=>$insert_id     ));
          }
        }
        $data = $this->users_model->get_by_username_and_pwd($user_name, encrypt_pwd($pwd));
        if ($data == null) {
          $insert_data = array('user_name' => $user_name, 'pwd' => encrypt_pwd($pwd), 'email' => $email, 'phone' => $phone, 'ip' => $_SERVER['REMOTE_ADDR'], 'avt' => $dir . '/' . $_FILES['avt']['name']);
          $result = $this->users_model->insert($insert_data); //cập nhật dữ liệu vào MYSQL
        }
      }
    }
    $this->render_frontend_tp('/frontends/users/register');
  }
  function login()
  {
    if (isset($_SESSION['user'])) {  //nếu đã đăng nhập thì về trang chủ
      redirect(base_url());
    } else { //chưa login

      if ((isset($_POST['user_name'])) && (isset($_POST['pwd']))) {

        $this->form_validation->set_rules('user_name', $this->lang->line('msg_user_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('pwd', $this->lang->line('msg_pwd'), 'trim|required|xss_clean');
        if ($this->form_validation->run() != false) {
          $user_name = $_POST['user_name'];
          $pwd = $_POST['pwd'];
?>
          <?php
          $data = $this->users_model->get_by_username_and_pwd($user_name, encrypt_pwd($pwd)); //kiểm tra thuê bao tồn tại trong MYSQL
          if ($data != null) {
          ?>
          <?php
            $_SESSION['user'] = $data;
            $updated_data = array(
              'updated_at' => date('Y-m-d H:i:s', time()),
              'ip' => $_SERVER['REMOTE_ADDR']
            );
            $this->users_model->update($updated_data, array('id' => $data[0]->id)); //cập nhật dữ liệu vào MYSQL
            redirect(base_url());
          } else {
          ?>
            <script>
              alert("User does not exist");
            </script>
<?php
            //  redirect(base_url());
            $this->render_frontend_tp('frontends/product/index');
          }
        }
      }
    }
  }
  function add_news()
  {

    if (isset($_SESSION['user'])) {  //nếu đã đăng nhập thì đăng tin

      $user = $_SESSION['user'][0];
      if (isset($_POST['title'])) { // đã cập nhật và submit dữ liệu
        /* ?>
           	   <script>
                 alert("1 + 2");
                </script>

           	   <?php*/
        $user = $_SESSION['user'][0];
        $this->load->model('news_model');
        $this->form_validation->set_rules('title', $this->lang->line('msg_title'), 'required');
        $this->form_validation->set_rules('content_main', $this->lang->line('msg_content'), 'required');
        if ($this->form_validation->run() != false) {
          $data['title'] = $_POST['title'];
          $data['content'] = $_POST['content_main'];
          $data['user_id'] = $user->id;
          if (isset($_POST['types'])) {
            $types_array = array();
            $types = $_POST['types'];
            foreach ($types as $id) {
              array_push($types_array, $id);
            }
            $types_string = implode(',', $types_array);
          }
          $data['types_id'] = $types_string;
          $insert_id = $this->news_model->insert($data);
          if (!empty($_FILES['pic']['tmp_name'])) {
            $filename = $_FILES['pic']['name'];
            $_FILES['pic']['name'] = rename_upload_file($filename);
            $dir = create_dir_upload('uploads/avts/');
            $config['allowed_types'] = 'JPEG|jpg|JPG|png';
            $config['max_size'] = '10000';
            $config['width']     = 800;
            $config['height']   = 800;
            $config['upload_path'] = $dir;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('pic')) {
              $this->session->set_flashdata('msg_failed', $this->upload->display_errors());
              //redirect(base_url().'ho-so');
            } else {
              // if($user->avt!=null){
              //  try {
              //      unlink($user->avt);
              //  } catch (Exception $e) {
              //       echo $e;
              //  }
              // }
              $config = array();
              $config = array(
                "source_image" => $dir . '/' . $_FILES['pic']['name'], //get original image
                "new_image" =>  $dir, //save as new image //need to create thumbs first
                "width" => 800,
                "height" => 800,
                'master_dim' => 'height'
              );
              $this->load->library('image_lib', $config);
              $this->image_lib->resize();
              $this->news_model->update(array('avt' => $dir . '/' . $_FILES['pic']['name']), array('id' => $insert_id));
            }
          }
        }
      }
      $this->render_frontend_tp('/frontends/users/add_news');
      //$this->render_frontend_tp('/frontends/products/news');
    } else { // chưa đăng nhập thì quay về trang chủ
      redirect(base_url());
    }
  }
  function news()
  {

    $this->load->model('news_model');
    $id = $this->input->get('id');

    $data['object'] = $this->news_model->get_by_id($id)[0];
    $views = $data['object']->views + 1;
    $this->news_model->update(array('views' => $views), array('id' => $id));
    $this->render_frontend_tp('frontends/product/detailed_news', $data);
  }
  function load_news()
  {
    // echo "tets";
    $this->load->model('news_model');
    $types_id = $this->input->get('types_id');

    $select = 'SELECT *';
    $data['news'] = $this->news_model->get_by_types_id($types_id);
    //  echo "tets 2";
    //	print_r($data['news']);
    $this->load->library('utils');
    if ($data['news'] != null) {
      $this->utils->_load_view('frontends/product/news', $data);
    } else {
      $this->utils->_load_view();
    }
  }
  function order()
  {
    $this->load->model('order_model');
    if (isset($_POST['order_quantity'])) {
      $data['quantity'] = $_POST['order_quantity'];
      $data['ipaddress'] = $_SERVER['REMOTE_ADDR'];
      $data['product_id'] = $_POST['product_id'];
      $this->order_model->insert($data);
      $data['order'] = $this->order_model->get_by_ip($_SERVER['REMOTE_ADDR']);
      //   print_r($data['order']);
      $this->render_frontend_tp('frontends/product/order', $data);
    }
  }
  function newsapp()
  {
    $this->load->model('news_model');
    $id = $this->input->get('id');
    $data['object'] = $this->news_model->get_by_id($id)[0];
    $this->utils->_load_view('frontends/product/detailed_news', $data);
  }
}
?>