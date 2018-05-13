<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	private $scripts = array();

	public function __construct() {

		parent::__construct();

	}

	public function getSuggestions() {

		$fields = $this->input->get("fields");

		$query = $this->input->get("query");

		echo json_encode($this->ClientModel->getSuggestions($query, $fields));
		
	}

	public function index() {

		$data = NULL;

		$this->template->load('seccure-tpl', 'client/index', $data);
		
	}

}
