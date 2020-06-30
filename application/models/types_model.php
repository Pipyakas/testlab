<?php
class Types_model extends CI_model
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
		$this->db->from('types');
		if ($where != false) {
			$this->db->where($where);
		}
		if ($like != false) {
			$this->db->like($like);
		}

		if ($offset != false) {
			$this->db->limit($offset, $first);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) { /*num_rows la ham cua mysqli  */
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			$query->free_result();
			return $data;
		} else {
			return null;
		}
	}

	function get_by_top()
	{
		$select = "*";
		$where = array('top_menu' => 1, 'activated' => 1);
		$like = array();
		$order_by = array('order' => 'ASC');
		return $this->get($select, $where, $like, 0, 1000, $order_by);
	}
}
