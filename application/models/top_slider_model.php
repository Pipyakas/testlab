<?php
class top_slider_model extends CI_model
{
	function insert($data)
	{
		$this->db->insert('top_slider', $data);
		return $this->db->insert_id();
	}

	function update($data, $where)
	{
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where($where);
		return $this->db->update('top_slider', $data);
	}
	
	function get($select = "*", $array_where = false, $array_like = false, $first = false, $offset = false, $order_by = false)
	{
		//  echo "load";
		$data = array();
		if ($order_by != false) {
			$order = key($order_by);
			if ($order != null) {
				$sort = $order_by[$order];
				$this->db->order_by($order, $sort);
			}
		}

		$this->db->select($select);
		$this->db->from('top_slider');
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
			//print_r($data);
			return $data;
		} else {
			return null;
		}
	}
}
