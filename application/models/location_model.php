<?php
class Location_model extends CI_model
{
	function update($data_array, $array_where)
	{
		$data_array['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where($array_where);
		return $this->db->update('news', $data_array);
	}
	function insert($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('location', $data);
		return $this->db->insert_id();
	}
}
