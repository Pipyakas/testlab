<?php 
class home extends MY_Controller { /* class MY_Controller nắm trong thư mục \XAMPP\htdocs\testlab\application\core*/
	function __construct(){
		parent::__construct();
	}
	function index(){
		if (isset($_SESSION['user'])){ //user đã đăng nhập
			
			$this->render_frontend_tp('frontends/product/index_logined',null);

		}
		else{ //user chưa đăng nhập
			$this->render_frontend_tp('/frontends/product/index',null);/*trỏ sang file index.php tại \XAMPP\htdocs\testlab\application\themes\testlab\views\frontends\product*/
		}
	}
	function intro(){
	    $this->load->model('top_slider_model');
		$select = '*';
		$array_where =array();// array('classrooms.user_id' => $id);
		$array_like = array();
		$order_by = array();

		$data['slide']=$this->top_slider_model->get($select, $array_where, $array_like, $order_by,$array_like,$order_by);
		if($data['slide']!=null){
			$this->render_frontend_tp('frontends/users/intro',$data);
		}
	}
	function android(){
		$data['types_id']="2";
		$this->render_frontend_tp('frontends/product/index_logined',$data);
	}
	function web(){
		$data['types_id']="1";
		$this->render_frontend_tp('frontends/product/index_logined',$data);
	}
}
