<?php

/**

 *

 */

class friends_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get($select = "*", $where = false, $like = false, $first = false, $offset = false, $order_by = false)
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
		$this->db->from('friends');
		if ($where != false)
			$this->db->where($where);
		if ($like != false)
			$this->db->like($like);
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

	function update($data_array, $where)
	{
		$this->db->where($where);
		$data_array['updated_at'] = date('Y-m-d H:i:s');
		return $this->db->update('users', $data_array);
	}

	function insert($data_array)
	{

		$data_array['created_at'] = date('Y-m-d H:i:s');
		$data_array['activated'] = 0;
		return $this->db->insert('users', $data_array);
	}

	function get_by_username_and_pwd($username, $pwd)
	{
		$select = '*';
		$like = array();
		$where = array('pwd' => $pwd, 'user_name' => $username, 'activated' => 1);
		$order_by = array();
		return $this->get($select, $where, $like, 0, 1, $order_by);   //đọc bằng hàm get ở trên
	}
	/*function total($like,$where){
		$select = '*';
		$order_by = array();
		$where = array();

		return $this -> get($select, $where, $like,$order_by);
	}*/

	function get_by_username($owner_name)
	{
		$select = '*';
		$like = array();
		$where = array('owner_name' => $owner_name);
		$order_by = array();
		return $this->get($select, $where, $like, $order_by);
	}

	function get_messages_by_id($room_id)
	{
		$select = '*';
		$like = array();
		$where = array('room_id' => $room_id);
		$order_by = array();
		return $this->get($select, $where, $like, $order_by);
	}

	function total($where, $like)
	{
		$this->db->select('count(*) as total');
		$this->db->where($where);
		$this->db->like($like);
		$this->db->from('users');
		$query = $this->db->get();
		$rows = $query->result();
		$query->free_result();
		return $rows[0]->total;
	}
}
