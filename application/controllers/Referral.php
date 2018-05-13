<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referral extends CI_Controller {

	public function index() {

		$this->template->load('seccure-tpl', 'referral/index', NULL);
		
	}

}
