<?php
class classrooms extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('classrooms_model'); // tải hàm model
		$this->load->model('users_model');
		$this->load->model('livecodes_model');
		$this->load->helper('Utils');
	}

	function delete_test()
	{
		$test_id = $_GET['id'];
		$this->load->model('tests_model');
		$this->tests_model->remove_by_id($test_id);
		$owner_id = $_SESSION['user'][0]->id;
		$data['owner_id'] = $owner_id;
		$data['test_topic'] = $this->tests_model->get_by_owner_id($owner_id);
		$this->render_frontend_tp('frontends/classroom/tests', $data);
	}

	function delete_question()
	{
		$question_id = $_GET['id'];
		$test_id = $_GET['test_id'];
		$this->load->model('answer_model');
		$this->answer_model->remove_by_question_id($question_id);
		$this->load->model('questions_model');
		$this->questions_model->remove_by_id($question_id);
		$owner_id = $_SESSION['user'][0]->id;
		$this->load->model('tests_topic_model');
		$data['question_id'] = $this->tests_topic_model->get_by_id($test_id);
		$data['test_id'] = $test_id;
		$data['owner_id'] = $owner_id;
		$this->render_frontend_tp('frontends/classroom/test_topic', $data);
	}

	function add_test()
	{
		if (isset($_POST['test_topic'])) {
			$this->load->model('tests_model');
			$data['test_topic'] = $_POST['test_topic'];
			$data['owner_id'] = $_SESSION['user'][0]->id;
			//	$id=$this->tests_model->insert($data);
			if (!empty($_FILES['pic']['tmp_name'])) {
				$filename = $_FILES['pic']['name'];
				$_FILES['pic']['name'] = rename_upload_file($filename);
				$dir = create_dir_upload('uploads/avts/');
				$config['allowed_types'] = 'JPEG|jpg|JPG|PNG';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['max_size'] = '10000';
				$config['upload_path'] = $dir;
				$this->load->library('upload', $config);
				$this->upload->do_upload('pic');
				$config = array();
				$config = array(
					'source_image' => $dir . '/' . $_FILES['pic']['name'],
					'new_image' => $dir,
					'width' => '100',
					'height' => '200',
					'master_dim' => 'height'
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//	$this->tests_model->update(array('avt'=>$dir.'/'.$_FILES['pic']['name']),array('id'=>$id));
				$data['avt'] = $dir . '/' . $_FILES['pic']['name'];
				//	echo "add";

			}
			$this->tests_model->insert($data);
			$this->render_frontend_tp('frontends/classroom/add_test', $data);
		} else {
			$owner_id = $_GET['id'];
			$data['owner_id'] = $owner_id;
			$this->render_frontend_tp('frontends/classroom/add_test', $data);
		};
	}

	function add_question()
	{
		if (isset($_POST['content'])) {
			//print_r($_POST['option']);
			$test_id = $_POST['test_id'];
			$owner_id = $_POST['owner_id'];
			$content = $_POST['content'];
			$results = $_POST['selection'];

			$results_string = implode(',', $results);
			$data = array(
				'owner_id' => $owner_id,
				'test_id' => $test_id,
				'content' => $content,
				'results' => $results_string
			);
			if (!empty($_FILES['pic']['tmp_name'])) {
				$filename = $_FILES['pic']['name'];
				$_FILES['pic']['name'] = rename_upload_file($filename);
				$dir = create_dir_upload('uploads/avts/');
				$config['allowed_types'] = 'JPEG|jpg|JPG|PNG';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['max_size'] = '10000';
				$config['upload_path'] = $dir;
				$this->load->library('upload', $config);
				$this->upload->do_upload('pic');
				$config = array();
				$config = array(
					'source_image' => $dir . '/' . $_FILES['pic']['name'],
					'new_image' => $dir,
					'width' => '800',
					'height' => '800',
					'master_dim' => 'height'
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//	$this->tests_model->update(array('avt'=>$dir.'/'.$_FILES['pic']['name']),array('id'=>$id));
				$data['avt'] = $dir . '/' . $_FILES['pic']['name'];
				//	echo "add";

			}
			$this->load->model('questions_model');
			$this->load->model('answer_model');
			$question_id = $this->questions_model->insert($data);
			for ($i = 0; $i <= 3; $i++) {
				$data = array(
					'question_id' => $question_id,
					'selection' => $_POST['option'][$i],
					'recommend' => $_POST['recommend'][$i]
				);
				$this->answer_model->insert($data);
			}
			$data['owner_id'] = $owner_id;
			$data['test_id'] = $test_id;
			$this->render_frontend_tp('frontends/classroom/add_question', $data);
		} else {
			$test_id = $_GET['id'];
			$owner_id = $_GET['owner_id'];
			$data['owner_id'] = $owner_id;
			$data['test_id'] = $test_id;
			$this->render_frontend_tp('frontends/classroom/add_question', $data);
		}
	}

	function edit_question()
	{
		if (!isset($_POST['content'])) {
			$question_id = $_GET['id'];
			$test_id = $_GET['test_id'];
			$data['owner_id'] = $_SESSION['user'][0]->id;
			$data['question_id'] = $question_id;
			$this->load->model('questions_model');
			$data['question'] = $this->questions_model->get_by_id($question_id);
			$this->load->model('answer_model');
			$data['answer'] = $this->answer_model->get_by_id($question_id);
			$data['test_id'] = $test_id;
			$this->render_frontend_tp('frontends/classroom/edit_question', $data);
		} else {
			//print_r($_POST['option']);
			$test_id = $_POST['test_id'];
			$owner_id = $_POST['owner_id'];
			$content = $_POST['content'];
			$results = $_POST['selection'];
			$question_id = $_POST['question_id'];

			$results_string = implode(',', $results);
			$data = array(
				'owner_id' => $owner_id,
				'test_id' => $test_id,
				'content' => $content,
				'results' => $results_string
			);
			if (!empty($_FILES['pic']['tmp_name'])) {
				$filename = $_FILES['pic']['name'];
				$_FILES['pic']['name'] = rename_upload_file($filename);
				$dir = create_dir_upload('uploads/avts/');
				$config['allowed_types'] = 'JPEG|jpg|JPG|PNG';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['max_size'] = '10000';
				$config['upload_path'] = $dir;
				$this->load->library('upload', $config);
				$this->upload->do_upload('pic');
				$config = array();
				$config = array(
					'source_image' => $dir . '/' . $_FILES['pic']['name'],
					'new_image' => $dir,
					'width' => '800',
					'height' => '800',
					'master_dim' => 'height'
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//	$this->tests_model->update(array('avt'=>$dir.'/'.$_FILES['pic']['name']),array('id'=>$id));
				$data['avt'] = $dir . '/' . $_FILES['pic']['name'];
				//	echo "add";

			}
			$this->load->model('questions_model');
			$this->load->model('answer_model');
			$this->questions_model->update($data, array("id" => $question_id));
			for ($i = 0; $i <= 3; $i++) {
				$data = array(
					'question_id' => $question_id,
					'selection' => $_POST['option'][$i],
					'recommend' => $_POST['recommend'][$i]
				);
				$answer_id = array("id" => $_POST['answer_id'][$i]);
				$this->answer_model->update($data, $answer_id);
			}
			$data['owner_id'] = $owner_id;
			$data['test_id'] = $test_id;
			$this->load->model('tests_topic_model');
			$data['question_id'] = $this->tests_topic_model->get_by_id($test_id);
			$this->render_frontend_tp('frontends/classroom/test_topic', $data);
		}
	}

	function edit_test()
	{
		$this->load->model('tests_model');
		if (isset($_POST['test_topic'])) {
			//echo "lan dau";
			$this->load->model('tests_model');
			$test_id = $_POST['test_id'];
			$data['test_topic'] = $_POST['test_topic'];
			$data['owner_id'] = $_SESSION['user'][0]->id;
			//	$id=$this->tests_model->insert($data);
			if (!empty($_FILES['pic']['tmp_name'])) {
				$filename = $_FILES['pic']['name'];
				$_FILES['pic']['name'] = rename_upload_file($filename);
				$dir = create_dir_upload('uploads/avts/');
				$config['allowed_types'] = 'JPEG|jpg|JPG|PNG';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['max_size'] = '10000';
				$config['upload_path'] = $dir;
				$this->load->library('upload', $config);
				$this->upload->do_upload('pic');
				$config = array();
				$config = array(
					'source_image' => $dir . '/' . $_FILES['pic']['name'],
					'new_image' => $dir,
					'width' => '100',
					'height' => '200',
					'master_dim' => 'height'
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//	$this->tests_model->update(array('avt'=>$dir.'/'.$_FILES['pic']['name']),array('id'=>$id));
				$data['avt'] = $dir . '/' . $_FILES['pic']['name'];
				//	echo "add";

			}
			$this->tests_model->update($data, array('id' => $test_id));
			$data['test_topic'] = $this->tests_model->get_by_owner_id($_SESSION['user'][0]->id);
			$data['owner_id'] = $_SESSION['user'][0]->id;
			$this->render_frontend_tp('frontends/classroom/tests', $data);
		} else {
			$test_id = $_GET['id'];
			$data['owner_id'] = $_SESSION['user'][0]->id;
			$data['test_id'] = $test_id;
			$data['test_topic'] = $this->tests_model->get_by_id($test_id);
			$this->render_frontend_tp('frontends/classroom/edit_test', $data);
		};
	}

	function test()
	{
		$this->load->model('tests_model');
		$owner_id = $_GET['id'];
		$data['test_topic'] = $this->tests_model->get_by_owner_id($owner_id);
		$data['owner_id'] = $owner_id;
		$this->render_frontend_tp('frontends/classroom/tests', $data);
	}

	function test_topic()
	{
		$this->load->model('tests_topic_model');
		$test_id = $_GET['id'];
		$owner_id = $_GET['owner_id'];

		$data['question_id'] = $this->tests_topic_model->get_by_id($test_id);
		$data['test_id'] = $test_id;
		$data['owner_id'] = $owner_id;
		$this->render_frontend_tp('frontends/classroom/test_topic', $data);
	}

	function test_result()
	{
		$this->load->model('results_model');
		$test_id = $_POST['test_id'];
		$user_id = $_SESSION['user'][0]->id;
		$total = $_POST['total'];
		$question_id = array();
		$question_id = $_POST['question'];
		// foreach ($question_id as $key){
		// 	array_push()
		// }
		//   echo $total;
		//  print_r($question_id);  	

		if ($total > 0) {
			for ($i = 0; $i < $total; $i++) {
				$answer = array();
				if (isset($_POST[$question_id[$i]])) {
					$answer = $_POST[$question_id[$i]];
					$answer_string = implode(',', $answer);
					//  print_r($answer_string);
					$data = array(
						'user_id' => $user_id,
						'question_id' => $question_id[$i],
						'answer' => $answer_string
					);
					$this->results_model->insert($data);
				};
			}
		}
		$this->load->model('tests_topic_model');
		$data['user_id'] = $user_id;
		$data['question_id'] = $this->tests_topic_model->get_by_id($test_id);
		$this->render_frontend_tp('frontends/classroom/test_result', $data);
	}

	function class_page()
	{
		$class_id = $_GET['id'];
		$data['owner_id'] = $class_id;
		$data['livecodes'] = $this->livecodes_model->get_livecodes_by_id($class_id);

		$this->render_frontend_tp('/frontends/classroom/classroom_page', $data);
	}

	function web_class()
	{
		$class_id = $_GET['id'];
		$data['owner_id'] = $class_id;
		$data['livecodes'] = $this->livecodes_model->get_livecodes_by_id($class_id);
		$this->render_frontend_tp('/frontends/classroom/webclass_page', $data);
	}

	function add_class()
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
				// $this->load->model('news_model');
				$this->form_validation->set_rules('title', $this->lang->line('msg_title'), 'required');
				$this->form_validation->set_rules('content_main', $this->lang->line('msg_content'), 'required');
				if ($this->form_validation->run() != false) {
					$data['title'] = $_POST['title'];
					$data['content'] = $_POST['content_main'];
					$data['user_id'] = $user->id;
					$insert_id = $this->classrooms_model->insert($data);
					$data2['room_id'] = $user->id;
					$insert_id2 = $this->livecodes_model->insert($data2);
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
							if ($user->avt != null) {
								try {
									unlink($user->avt);
								} catch (Exception $e) {
									echo $e;
								}
							}
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
							$this->classrooms_model->update(array('avt' => $dir . '/' . $_FILES['pic']['name']), array('id' => $insert_id));
						}
					}
				}
			}
			$this->render_frontend_tp('/frontends/classroom/add_class');
			//$this->render_frontend_tp('/frontends/products/news');
		} else { // chưa đăng nhập thì quay về trang chủ
			redirect(base_url());
		}
	}

	function edit_news()
	{
		if (isset($_SESSION['user'])) {  //nếu đã đăng nhập thì sua du lieu
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

	function edit_apply()
	{
		if (isset($_POST['id'])) {

			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content_main'];
			?>
			<script>
				alert("Hung".<?php echo $content; ?>);
			</script>

<?php
			$data_array = array(
				'title' => $title,
				'content' => $content
			);

			if (isset($_POST['types'])) {
				$types_array = array();
				$types = $_POST['types'];
				foreach ($types as $id2) {
					array_push($types_array, $id2);
				}
				$types_string = implode(',', $types_array);
				$data_array['types_id'] = $types_string;
			}
			$this->news_model->update($data_array, array('id' => $id));

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
					if ($user->avt != null) {
						try {
							unlink($user->avt);
						} catch (Exception $e) {
							echo $e;
						}
					}
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
					$this->news_model->update(array('avt' => $dir . '/' . $_FILES['pic']['name']), array('id' => $id));
				}
			}
			echo json_encode(array('ok' => 1));
		} else {
			echo json_encode(array('ok' => 0));
		}
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
?>