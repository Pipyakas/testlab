<?php
class News_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('news', $data);
		return $this->db->insert_id();
	}

	function update($data_array, $array_where)
	{
		$data_array['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where($array_where);
		return $this->db->update('news', $data_array);
	}

	function search($key)
	{
		$select = '*';
		$like = array('title' => $key);
		$where = array();
		$order_by = array();
		return $this->get($select, $where, $like, $order_by);
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
		//echo $types_id;
		//$where = array('types_id'=>$types_id);
		if ($types_id != 000) {
			//	echo "long";
			$where['FIND_IN_SET(' . $types_id . ',types_id)<>'] = 0;
			$order_by = array();
			return $this->get($select, $where, $like, $order_by);
		} else {
			$array_where = array();
			$order_by = array();
			return $this->get($select, $array_where, $like, $order_by);
		}
	}

	function get_by_user_id($id)
	{
		$select = '*';
		$array_where = array('user_id' => $id); // array('classrooms.user_id' => $id);
		$array_like = array();
		$order_by = array();
		return $this->get($select, $array_where, $array_like, $order_by);
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
		$this->db->from('news');
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
	
	function total_count($like, $where)
	{
		$select = '*';
		$order_by = array();
		$query = $this->get($select, $where, $like, $order_by);

		//$row = mysql_fetch_array($query);
		$rows = count($query);

		return $rows;
	}
}
