<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function index() {

		$this->template->load('seccure-tpl', 'task/index', NULL);
		
	}

}
