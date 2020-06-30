<?php
class Comments extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('comments_model'); 
		$this->load->helper('Utils');
	}

	function edit_news()
	{
		if (isset($_SESSION['user'])) {
			/*	?>
           	   <script>
                 alert("1 + 2");
                </script>

           	   <?php
           	   */
			$data['id'] = $_GET['id'];
			$data['object'] = $this->news_model->get_by_id($data['id'])[0];
			$this->render_frontend_tp('/frontends/product/edit_news', $data);
		}
	}

	function load_news()
	{
		$this->load->model('news_model');
		$types_id = $this->input->get('types_id');

		$select = 'SELECT *';
		$data['news'] = $this->news_model->get_by_types_id($types_id);

		$this->load->library('utils');
		if ($data['news'] != null) {
			$this->render_frontend_tp('frontends/product/news', $data);
		} else {
			$this->render_frontend_tp();
		}
	}

	function delete_comment()
	{
		$this->load->model('classrooms_model');
		$comment_id = $_GET['id'];
		$this->comments_model->remove_by_id($comment_id);
		$class_id = $_GET['owner_id'];
		$data['owner_id'] = $class_id;
		$this->load->model('livecodes_model');
		$data['livecodes'] = $this->livecodes_model->get_livecodes_by_id($class_id);

		$this->render_frontend_tp('/frontends/classroom/classroom_page', $data);
	}
	
	function load_comments_by_user_id()
	{
		/*
		?>
           	   <script>
                 alert("1 + 2");
                </script>

           	   <?php
           	   */
		$user_id = $_GET['user_id'];
		$data['messages'] = $this->comments_model->get_by_user_id($user_id);
		$data['owner_id'] = $user_id;

		//echo json_encode($data);
		$this->load->library('utils');
		if ($data['messages'] != null) {
			//	$this->render_frontend_tp('frontends/product/news', $data);
			$this->utils->_load_view('frontends/chat/comments', $data);
		} else {
			$this->utils->_load_view();
		}
	}

	function edit_apply()
	{
		//	if (isset($_POST['owner_id'])){		
		$room_id = $_POST['owner_id'];
		$sender_id = $_POST['sender_id'];
		$comment = $_POST['m'];
		$content = $comment;
		$avt = $_POST['avt'];

		$data_array = array(
			'room_id' => $room_id,
			'sender_id' => $sender_id,
			'content' => $content,
			'avt' => $avt
		);
		$this->comments_model->insert($data_array);
		//	}			
	}

	function upload_products()
	{
		if (!isset($_SESSION['user'])) {
			//need login to continue
			echo json_encode(array('ok' => 2));
			exit();
		}
		if (isset($_FILES['fileData']) && isset($_POST['id'])) {
			$id = $this->input->post('id');
			$dir = create_dir_upload('uploads/avts/');
			$thumb_dir = create_thumb_dir_upload($dir . '/thumbs');
			$filename = $_FILES['fileData']['name'];
			$_FILES['fileData']['name'] = rename_upload_file($filename);
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG|GIF|PNG';
			$config['max_size']	= '5000';
			$config['upload_path'] = $dir;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('fileData')) {
				/*$this->load->model('images_model');
				$data['avts']=$dir.'/'.$_FILES['fileData']['name'];
				$original_path=$data['avts'];
				$data['products_id']=$id;
				$images_id = $this->images_model->insert($data);
				$config=array(
                            "source_image" => $dir.'/'.$_FILES['fileData']['name'], //get original image
							"new_image" =>  $thumb_dir, //save as new image //need to create thumbs first
							"width" => 370,
							"height" => 342,
							'master_dim'=>'height'
							);*/
				$config = array(
					"source_image" => $dir . '/' . $_FILES['fileData']['name'], //get original image
					"new_image" =>  $dir, //save as new image //need to create thumbs first
					"width" => 370,
					"height" => 342,
					'master_dim' => 'height'
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				/*
				$image_path= $thumb_dir.'/'.$_FILES['fileData']['name'];
				$data=null;
				$data['thumb']=$image_path;*/
				$this->news_model->update(array('avt' => $dir . '/' . $_FILES['fileData']['name']), array('id' => $id));
				//$this->news_model->update(array('avt'=>$image_path), array('id'=>$id));
				//$this->images_model->update($data,array('id'=>$images_id));
				$return_data = array(
					'ok' => 1,
					'thumb' => $image_path,
					'products_id' => $id,
					'id' => $images_id,
					'avts' => $original_path
				);
				echo json_encode($return_data);
			} else {
				echo json_encode(array('ok' => 0));
			}
		}
	}
}
