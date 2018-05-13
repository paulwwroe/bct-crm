<?php

class ReferralModel extends CI_Model {

	public $tbl_name = "referral";

	public $tbl_key = "referral_id";

	public function __construct() {

		$this->load->database();

	}

}