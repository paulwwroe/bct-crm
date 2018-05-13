<?php

class SearchModel extends CI_Model {

	public function __construct() {

		$this->load->database();

	}

	public function getSuggestions($query) {

		$this->db->select('client_id, forename, surname');

		$this->db->from('tClient');

		$this->db->where("CONCAT(forename, surname) LIKE '%".$query."%'");
		
		$this->db->limit(10);

		return $this->db->get()->result();

	}

}