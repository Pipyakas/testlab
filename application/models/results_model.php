<?php
class Results_model extends CI_model
{

	function insert($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('results', $data);
		return $this->db->insert_id();
	}

	function get_by_user_and_question($user_id, $question_id)
	{
		$where = array('user_id' => $user_id, 'question_id' => $question_id);
		$select = "*";
		$order_by = array('id' => 'DESC');
		$result = $this->get($select, $where, 0, 1, $order_by);
		if ($result != null) {
			return $result[0]->answer;
		} else return null;
	}

	function get($select = "*", $array_where = false, $first = false, $offset = false, $order_by = false)
	{
		if ($order_by != false) {
			$order = key($order_by);
			if ($order != null) {
				$sort = $order_by[$order];
				$this->db->order_by($order, $sort);
			}
		}
		$this->db->select($select);
		$this->db->from('results');
		if ($array_where != false) {
			$this->db->where($array_where);
		}
		if ($offset != false) {
			$this->db->limit($offset, $first);
		};
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $rows) {
				$data[] = $rows;
			}
			$query->free_result();
			return $data;
		} else
			return null;
	}
}
