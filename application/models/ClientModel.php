<?php

class ClientModel extends CI_Model {

	public $tbl_name = "tClient";

	public $tbl_key = "client_id";

	public function __construct() {

		$this->load->database();

	}

	public function getSuggestions($query = "", $fields = NULL) {

		if ($fields === NULL) {
			$fields = "client_id, forename, surname";
		}

		$query = $this->db->select($fields)
			->from($this->tbl_name)
			->where("CONCAT(forename, ' ', surname) LIKE '%".$query."%'")
			->order_by('surname')
			->limit(10)
			->get();

		return $query->result_array();

	}

}