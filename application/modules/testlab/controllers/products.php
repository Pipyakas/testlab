<?php
class Products extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper('Utils');
		$this->load->library('pagination');
		$this->load->helper('url');
	}

	function edit_news()
	{
		if (isset($_SESSION['user'])) {
			$data['id'] = $_GET['id'];
			$data['object'] = $this->news_model->get_by_id($data['id'])[0];
			$this->render_frontend_tp('/frontends/product/edit_news', $data);
		}
	}

	function search()
	{
		$key = $_GET['key'];
		$this->load->model('news_model');
		$data['news'] = $this->news_model->search($key);
		//$this->load->library('utils');
		if ($data['news'] != null) {
			$this->render_frontend_tp('frontends/product/news', $data);
		} else {
			$this->render_frontend_tp('frontends/product/empty_page');
		}
	}

	function load_news()
	{
		$this->load->model('news_model');
		$types_id = $_GET['types_id'];

		$page = $this->uri->segment(2);
		if (!is_numeric($page) || $page <= 0) {
			$page = 1;
		}
		$pg_per_page = 3;
		$first = ($page - 1) * $pg_per_page;

		// build paging links

		$where = array('types_id' => $types_id);
		$total_rows = $this->news_model->total_count(array(), $where);

		$select = 'SELECT *';
		//$data['news']=$this->news_model->get_by_types_id($types_id);
		$data['news'] = $this->news_model->get("*", $where, array(), $first, $pg_per_page, array('views' => 'DESC'));
		$config['base_url'] = base_url() . 'index.php/trang-tin/';
		if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		$config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $pg_per_page;
		$config['reuse_query_string'] = true;
		$config["uri_segment"] = 2;

		$this->pagination->initialize($config);
		// build paging links
		$data['page_link'] = $this->pagination->create_links();
		$this->load->library('utils');
		if ($data['news'] != null) {
			$this->render_frontend_tp('frontends/product/news', $data);
		} else {
			$this->render_frontend_tp('frontends/product/empty_page');
		}
	}

	function load_news_by_user_id()
	{
		$user_id = $_GET['user_id'];
		$data['news'] = $this->news_model->get_by_user_id($user_id);
		$this->load->library('utils');
		if ($data['news'] != null) {
			$this->utils->_load_view('frontends/product/newslite', $data);
		} else {
			$this->utils->_load_view();
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
				alert("Edit".<?php echo $content; ?>);
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
				$config['max_size'] = '1000';
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