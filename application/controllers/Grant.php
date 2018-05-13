<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grant extends CI_Controller {

	public function Grant() {

		Parent::__construct();

	}

	public function index() {

		$data['grants'] = NULL;//$this->GrantModel->getGrants();

		$this->template->load('seccure-tpl', 'grant/index', $data);
		
	}

}
