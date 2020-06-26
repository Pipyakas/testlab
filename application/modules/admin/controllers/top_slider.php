<?php 
include_once(APPPATH . 'core/Backend_Controller.php');
Class top_slider extends Backend_Controller{
	function __construct(){
		parent::__construct();
	//	$this->load->model('users_model');// tải hàm model
    $this->load->helper('Utils');
	}
	function index(){
		parent::authentication_backend();
		$this->load->model('top_slider_model');
		$data['list']=$this->top_slider_model->get();
		$this->render_backend_tp('backends/slider/slider',$data);
	}
	function add(){
		parent::authentication_backend();
		$this->load->model('top_slider_model');
		if (isset($_POST['link'])){
			if(isset($_SESSION['user'])&&($_SESSION['user'][0]->perm==0)){
				echo "du dieu kien";
				$this->load->model('top_slider_model');
				$this->form_validation->set_rules('link','link','required');
           	//    $this->form_validation->set_rules('pic','pic','required');
           	    if($this->form_validation->run()!=false){
           	    	echo "chuan bi chen";
           	   		$data['link']=$_POST['link'];
           	   		$data['status']=$_POST['status'];
           	   		$insert_id=$this->top_slider_model->insert($data);
           	   		echo "da chen";
                if(!empty($_FILES['pic']['tmp_name'])) {
                	echo "chuan bi up anh";
                  $filename=$_FILES['pic']['name'];
                  $_FILES['pic']['name']=rename_upload_file($filename);
                  $dir=create_dir_upload('uploads/avts/');
                  $config['allowed_types'] = 'JPEG|jpg|JPG|png';
                  $config['max_size'] = '10000';
                  $config['width']     = 1000;
                  $config['height']   = 1000;
                  $config['upload_path'] = $dir;
                  $this->load->library('upload',$config);
                   if (!$this->upload->do_upload('pic')){
                       $this->session->set_flashdata('msg_failed',$this->upload->display_errors());
                       echo " up anh that bai";
                       //redirect(base_url().'ho-so');
                   }else{
                     // if($user->avt!=null){
                     //  try {
                     //      unlink($user->avt);
                     //  } catch (Exception $e) {
                     //       echo $e;
                     //  }
                     // }
                   	echo "da upload";
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
                     $this->top_slider_model->update(array('avt'=>$dir.'/'.$_FILES['pic']['name']), array('id'=>$insert_id));
                      	echo "da ghi vao du lieu";
                   }
           	   }// het up anh
           	   else{
           	   	echo "khong co tmpfile(oid)";
           	   }
			}// ko con loi du lieu
            
		}// du tham quyen user
	}
		else{
			$this->render_backend_tp('backends/slider/add');
		}
	}

}
?>