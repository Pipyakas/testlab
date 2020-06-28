<?php class stock_model extends CI_model{
	function __construct(){
		parent::__construct();
	}
    function insert($data){
    	$data['created_at']=date('Y-m-d H:i:s');
    	$this->db->insert('stocks',$data);
    	return $this->db->insert_id();

    }
    function delete($id){
    	$array_where=array('id'=>$id);
    	$this -> db -> where($array_where);
		return $this -> db -> delete('stocks', $array_where);
    }
    function update($data_array, $array_where) {
		$data_array['updated_at']=date('Y-m-d H:i:s');
		$this -> db -> where($array_where);
		return $this -> db -> update('stocks', $data_array);
	}
    function get_by_id($id){
    	$select="*";
    	$array_where=array("id"=>$id);
    	$array_like=array();
    	return $this->get($select,$array_where,$array_like,0,1,0);

    }
    function get($select = "*", $array_where = false, $array_like = false, $first = false, $offset = false, $order_by = false) {
		$data = array();
		if( $order_by != false){
			$order = key($order_by);
			if ($order != null) {
				$sort = $order_by[$order];
				$this -> db -> order_by($order, $sort);
			}
		}

		$this -> db -> select($select);
		$this -> db -> from('stocks');
		if($array_where != false)
			$this -> db -> where($array_where);
		if($array_like != false)
			$this -> db -> like($array_like);
		if($offset != false){
			$this -> db -> limit($offset, $first);
		}

		$query = $this -> db -> get();
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			$query -> free_result();
			return $data;
		} else {
			return null;
		}
	}
	}?>