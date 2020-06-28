<?php 
class Stocks extends MY_Controller{
	function __construct(){
		parent::__construct();
     	$this->load->helper('Utils');
	}
	
    function add_stock(){

    	if (isset($_POST['symbol'])){
    		$data['symbol']=$_POST['symbol'];
    		$data['area']=$_POST['area'];
    		$data['revenue']=$_POST['revenue'];
    		$debt=$_POST['debt'];
    		$data['debt']=$debt;
    		$stock=$_POST['stock'];
    		$data['stock']=$stock;
    		$data['price']=$_POST['price'];
    		$data['revenue']=$_POST['revenue'];
    		$short_pro=$_POST['short_pro'];
    		$data['short_pro']=$short_pro;
    		$data['profit']=$_POST['profit'];
    		$price=$_POST['price'];
    		$data['price']=$price;
    		$dividend=$_POST['dividend'];
    		$data['dividend']=$dividend;
    		$beta=$_POST['beta'];
    		$data['beta']=$beta;
            $data['user_id']=$_SESSION['user'][0]->id;
    		$data['kpi']=($dividend/($price/10))*(($short_pro-$debt)/($stock*$price))*$beta;
    		$data['value']=(($short_pro-$debt)/$stock)/$price;
    		$link=$_POST['link'];
            $data['link']=$link;
    		$this->load->model('stock_model');
    		$this->stock_model->insert($data);
    		$this->render_frontend_tp('frontends/stock/add_stock');
    		
    	}elseif ((isset($_SESSION['user']))&&($_SESSION['user'][0]->perm=='0')){

			$this->render_frontend_tp('frontends/stock/add_stock');

    	}
    	
    }
    function load_stocks(){
		$this->load->model('stock_model');
             
		$select='*';
		$order_by=array("kpi"=>"DESC");
		$array_where=array();
        $array_like=array();
        
		//$data['stocks']=$this->stock_model->get($select,$array_where, $order_by);
		$data['stocks']=$this->stock_model->get($select,$array_where, $array_like,0,1000,$order_by);
		$this->load->library('utils');
		if($data['stocks']!=null){
		   $this->render_frontend_tp('frontends/stock/stocks', $data);
	    }
	    else{
		  $this->render_frontend_tp('frontends/product/empty_page');
	    }
        
	}
	function delete_stock(){
        $this->load->model('stock_model');
        if ((isset($_SESSION['user']))&&($_SESSION['user'][0]->perm=='0')){
            $id=$_GET['id'];
            $this->stock_model->delete($id);
            $select='*';
            $order_by=array("kpi"=>"DESC");
            $array_where=array();
            $array_like=array();
            $data['stocks']=$this->stock_model->get($select,$array_where, $array_like,0,1000,$order_by);
            $this->load->library('utils');
            if($data['stocks']!=null){
                  $this->render_frontend_tp('frontends/stock/stocks', $data);
            }
            else{
                   $this->render_frontend_tp('frontends/product/empty_page');
            }
        }

    }
    function update_stock(){
        $this->load->model('stock_model');
        if (isset($_POST['symbol'])){
            $data['symbol']=$_POST['symbol'];
            $data['area']=$_POST['area'];
            $data['revenue']=$_POST['revenue'];
            $debt=$_POST['debt'];
            $data['debt']=$debt;
            $stock=$_POST['stock'];
            $data['stock']=$stock;
            $data['price']=$_POST['price'];
            $data['revenue']=$_POST['revenue'];
            $short_pro=$_POST['short_pro'];
            $data['short_pro']=$short_pro;
            $data['profit']=$_POST['profit'];
            $price=$_POST['price'];
            $data['price']=$price;
            $dividend=$_POST['dividend'];
            $data['dividend']=$dividend;
            $beta=$_POST['beta'];
            $data['beta']=$beta;
            $data['kpi']=($dividend/($price/10))*(($short_pro-$debt)/($stock*$price))*$beta;
            $data['value']=(($short_pro-$debt)/$stock)/$price;
            $link=$_POST['link'];
            $data['link']=$link;
            $id=$_POST['id'];
            $array_where=array("id"=>$id);
            $this->stock_model->update($data,$array_where);

        }
        else
        {
            $data['id']=$_GET['id'];
            $data['object']=$this->stock_model->get_by_id($data['id']);
            $this->render_frontend_tp('frontends/stock/update_stock',$data);
        }
        
    }
}
?>