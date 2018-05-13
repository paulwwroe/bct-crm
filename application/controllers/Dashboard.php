<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $scripts = array(
		'assets/js/dashboard/main.js'
	);

	public function index() {

		$data['scripts'] = $this->scripts;

		$this->template->load('seccure-tpl', 'dashboard/index', $data);
		
	}

}
