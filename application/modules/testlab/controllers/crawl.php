<?php
include("MyCrawler.php"); 
Class Crawl extends MY_Controller 
{ 
   function crawl_stock(){
  	 $this->load->model('stock_model');
   	 $result=$this->stock_model->get();
  	 // print_r($result);
  	 foreach ($result as $key){
   		  
   			  $crawler=new MyCrawler();
     
   			  $crawler->crawl_stock($key);
   			  $this->update_price($key->id,$key->price,$crawler->change);

    	}
    $select='*';
	$order_by=array("kpi"=>"DESC");
	$array_where=array();
    $array_like=array();
     
		//$data['stocks']=$this->stock_model->get($select,$array_where, $order_by);
	$data['stocks']=$this->stock_model->get($select,$array_where, $array_like,0,1000,$order_by);
    $this->render_frontend_tp('frontends/stock/stocks',$data);
	}
	function update_price($stock_id,$price,$change){
    $this->load->model('stock_model');
    $newprice=round($price*(1+0.01*$change),1);
   // echo $newprice;
    $data['price']=$newprice;
    $data_where=array("id"=>$stock_id);
    $this->stock_model->update($data, $data_where);

  }
};