<?php
class Friends extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('users_model');// tải hàm model
    $this->load->model('friends_model');
    $this->load->model('livecodes_model');
    $this->load->helper('Utils');
	}
 
	function add_news(){
		
		if(isset($_SESSION['user'])){  //nếu đã đăng nhập thì đăng tin
			    
		   $user=$_SESSION['user'][0];
           if (isset($_POST['title'])){// đã cập nhật và submit dữ liệu
           	  /* ?>
           	   <script>
                 alert("1 + 2");
                </script>

           	   <?php*/
           	   $user=$_SESSION['user'][0];
           	   $this->load->model('news_model');
           	   $this->form_validation->set_rules('title',$this->lang->line('msg_title'),'required');
           	   $this->form_validation->set_rules('content_main',$this->lang->line('msg_content'),'required');
           	   if($this->form_validation->run()!=false){
           	   	$data['title']=$_POST['title'];
           	   	$data['content']=$_POST['content_main'];
           	   	$data['user_id']=$user->id;
                if(isset($_POST['types'])){
                   $types_array=array();
                   $types=$_POST['types'];
                   foreach ($types as $id) {
                     array_push($types_array,$id);
                   }
                   $types_string=implode(',',$types_array);
                }
                $data['types_id']=$types_string;
                $insert_id=$this->news_model->insert($data);
                if(!empty($_FILES['pic']['tmp_name'])) {
                  $filename=$_FILES['pic']['name'];
                  $_FILES['pic']['name']=rename_upload_file($filename);
                  $dir=create_dir_upload('uploads/avts/');
                  $config['allowed_types'] = 'JPEG|jpg|JPG|png';
                  $config['max_size'] = '1000';
                  $config['width']     = 800;
                  $config['height']   = 800;
                  $config['upload_path'] = $dir;
                  $this->load->library('upload',$config);
                   if (!$this->upload->do_upload('pic')){
                       $this->session->set_flashdata('msg_failed',$this->upload->display_errors());
                       //redirect(base_url().'ho-so');
                   }else{
                     if($user->avt!=null){
                      try {
                          unlink($user->avt);
                      } catch (Exception $e) {
                           echo $e;
                      }
                     }
                     $config=array();
                     $config=array(
                       "source_image" => $dir.'/'.$_FILES['pic']['name'], //get original image
                       "new_image" =>  $dir, //save as new image //need to create thumbs first
                       "width" => 800,
                       "height" => 800,
                       'master_dim'=>'height'
                     );
                     $this->load->library('image_lib',$config);
                     $this->image_lib->resize();
                     $this->news_model->update(array('avt'=>$dir.'/'.$_FILES['pic']['name']), array('id'=>$insert_id));
                   }
                }
            
           	   }

           }
			$this->render_frontend_tp('/frontends/users/add_news');
           //$this->render_frontend_tp('/frontends/products/news');
		}
		else{// chưa đăng nhập thì quay về trang chủ
			redirect(base_url());
		}
	}
  function chat_room(){
     $id=1;
     $data['livecodes']=$this->livecodes_model->get_livecodes_by_id($id);
    $this->render_frontend_tp('frontends/chat/chatroom',$data);
  }
	function load_friends(){
		if (isset($_SESSION['user'])){
       $owner_name=$_SESSION['user'][0]->user_name;
   	   $select='*';
		   $data['friends']=$this->friends_model->get_by_username($owner_name);
       $this -> render_frontend_tp('frontends/chat/friends',$data); 
    }
    /*
		
		$this->load->library('utils');
		if($data['news']!=null){
		   $this->utils->_load_view('frontends/product/news', $data);
	    }
	    else{
		  $this->utils->_load_view();
	    }
    */
	}
  
  function edit_apply(){
    if (isset($_POST['id'])){
       
      $id=$_POST['id'];
      $codes=$_POST['livecodes'];
      $data_array=array(
          'codes'=>$codes
        );
      $this->livecodes_model->update($data_array,array('id'=>$id));
      $data['livecodes']=$codes;
      $this->load->library('utils');
      $this->utils->_load_view('frontends/classroom/result_frame',$data);
     // echo json_encode(array('ok'=>1));
    
    }  
  }
  function load_messages(){
    $id=$_GET['id'];
    $this->load->model('messages_model');
    $data['messages']=$this->messages_model->get_messages_by_id($id);
    $this -> render_frontend_tp('frontends/chat/messages',$data); 

  }
  function newsapp(){
    $this->load->model('news_model');
    $id=$this->input->get('id');
    $data['object']=$this->news_model->get_by_id($id)[0];
    $this->utils->_load_view('frontends/product/detailed_news',$data);
  }

} 
?>