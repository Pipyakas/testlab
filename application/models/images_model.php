<?php

/**

 *

 */

class Images_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
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
		$this->db->from('images');
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

	function total($array_where, $array_like)
	{
		$this->db->select('count(*) as total');
		$this->db->where($array_where);
		$this->db->like($array_like);
		$this->db->from('images');
		$query = $this->db->get();
		$rows = $query->result();
		$query->free_result();
		return $rows[0]->total;
	}

	function get_by_id($id)
	{
		$select = '*';
		$array_where = array('id' => $id);
		$array_like = array();
		$order_by = array();
		return $this->get($select, $array_where, $array_like, 0, 1, $order_by);
	}

	function get_by_products_id($id)
	{
		$select = '*';
		$array_where = array('products_id' => $id);
		$array_like = array();
		$order_by = array();
		return $this->get($select, $array_where, $array_like, 0, 100, $order_by);
	}

	function get_by_exact_path($path)
	{
		$select = '*';
		$array_like = array();
		$array_where = array('path' => $path);
		$order_by = array();
		return $this->get($select, $array_where, $array_like, 0, 1, $order_by);
	}

	function get_by_path($path, $first, $offset)
	{
		$select = '*';
		$array_where = array();
		$array_like = array('path' => $path);
		$order_by = array();
		return $this->get($select, $array_where, $array_like, $first, $offset, $order_by);
	}

	function get_by_path_and_diff_id($id, $path)
	{
		$select = '*';
		$array_where = array('path' => $path, 'id <>' => $id);
		$array_like = array();
		$order_by = array();
		return $this->get($select, $array_where, $array_like, 0, 1, $order_by);
	}

	function get_by_id_and_path($id, $path, $first, $offset)
	{
		$select = '*';
		$array_where = array();
		$array_like = array('path' => $path, 'id' => $id);
		$order_by = array();
		return $this->get($select, $array_where, $array_like, $first, $offset, $order_by);
	}

	function insert($data_array)
	{
		$data_array['created_at'] = date('Y-m-d H:i:s');
		$data_array['updated_at'] = date('Y-m-d H:i:s');
		$this->db->insert('images', $data_array);
		return $this->db->insert_id();
	}

	public function remove($arr_where)
	{
		$this->db->where($arr_where);
		$this->db->delete('images');
		return $this->db->affected_rows();
	}

	public function remove_by_id($id)
	{
		$array_where = array('id' => $id);
		return $this->remove($array_where);
	}

	function update($data_array, $array_where)
	{
		$this->db->where($array_where);
		$this->db->update('images', $data_array);
	}
}
