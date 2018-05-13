<?php

class GrantModel extends CI_Model {

	public $tbl_name = "grant";

	public $tbl_key = "grant_id";

	public function __construct() {

		$this->load->database();

	}

	public function getGrants() {

		$this->db->select('*');

		$this->db->from($this->tbl_name);

		$this->db->order_by($this->tbl_key." DESC");

		return $this->db->get()->result();

	}

}