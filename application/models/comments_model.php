<?php
class Comments_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('comments', $data);
		return $this->db->insert_id();
	}

	function update($data_array, $array_where)
	{
		$data_array['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where($array_where);
		return $this->db->update('news', $data_array);
	}

	function remove_by_id($id)
	{
		$array_where = array("id" => $id);
		$this->db->where($array_where);
		$this->db->delete('comments');
		$this->db->affected_rows();
	}

	function get_by_id($id)
	{
		$select = '*';
		$array_where = array('news.id' => $id);
		$array_like = array();
		$order_by = array();
		return $this->get($select, $array_where, $array_like, 0, 1, $order_by);
	}

	function get_by_types_id($types_id)
	{
		$select = '*';
		$like = array();
		//$where = array('types_id'=>$types_id);
		$where['FIND_IN_SET(' . $types_id . ',types_id)<>'] = 0;
		$order_by = array();
		return $this->get($select, $where, $like, $order_by);
	}

	function get_by_user_id($id)
	{
		$select = '*';
		$array_where = array(); //array('room_id' => $id);
		$array_like = array();
		$order_by = array('id' => 'ASC');

		$query = $this->get($select, $array_where, $array_like, $order_by);
		if ($order_by != false) {
			$order = key($order_by);
			if ($order != null) {
				$sort = $order_by[$order];
				$this->db->order_by($order, $sort);
			}
		}
		$select = "*";
		$this->db->select($select);
		$this->db->from('comments');
		$num_rows = count($query);
		if ($num_rows > 10) {
			$limit = 10;
			$offset = $num_rows - 10;
			//echo $offset;
			$this->db->limit($limit, $offset);
			//return $this -> get($select, $array_where, $array_like,1,$offset, $order_by);
		};
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			$query->free_result();
			return $data;
		} else {
			return null;
		}
	}

	function get($select = "*", $array_where = false, $array_like = false, $first = false, $offset = false, $order_by = false)
	{
		$data = array();
		if ($order_by != false) {
			$order = key($order_by);
			if ($order != null) {
				$sort = $order_by[$order];
				$this->db->order_by($order, $sort);
			}
		}
		$this->db->select($select);
		$this->db->from('comments');
		if ($array_where != false)
			$this->db->where($array_where);
		if ($array_like != false)
			$this->db->like($array_like);
		if ($offset != false) {
			$this->db->limit($offset, $first);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			$query->free_result();
			return $data;
		} else {
			return null;
		}
	}

	function total($like, $where)
	{
		$select = '*';
		$order_by = array();
		return $this->get($select, $where, $like, $order_by);
	}
}
