<?php
require APPPATH.'/libraries/REST_Controller.php';// thư mục trong application
class app_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('news_model');
		$this->load->helper('utils');
	}
	function login_post(){
		$username=$this->post('user_name');
		$pwd=$this->post('pwd');
		if($username!=null && $pwd!=null){ 
			
				$data=$this->users_model->get_by_username_and_pwd($username,encrypt_pwd($pwd));
				if($data!=null){
					$_SESSION['user']=$data;
					$this->response($data);
					
				}else{
					$this->response(array('empty'=>'empty_data'));
				
			    }
		}else{
			$this->response(array('empty'=>'empty_data'));
		}
	}
	function newsload_post(){
		$this->load->model('news_model');
		if(isset($_SESSION['user'])){
           $user=$_SESSION['user'][0];
        }
		$id=$this->post('id');
		if ($id==0){
		$select='SELECT * FROM news  ';
		$data =$this->news_model->get();
	    }
	    else{
        $data=$this->news_model->get_by_id($id);
	    };
		if($data!=null){
					$this->response($data);
				}else{
					$this->response(array('empty'=>'empty_data'));
				
			    }

	}
	function insert_post(){
		$this->load->model('location_model');
		//if(isset($_SESSION['user'])){
			$data['user_id']=$this->post('user_id');
			$data['lat']=$this->post('lat');
			$data['lng']=$this->post('lng');
			$this->location_model->insert($data);
	//	};

	}
	function getnewsbyid_post() {
		$select = '*';
		$id=$this->post('id');
		$where = array('id' => $id);
		$like = array();
		$order_by = array();
		return $this -> get($select, $where, $like, 0, 1, $order_by);
	}


}
?>