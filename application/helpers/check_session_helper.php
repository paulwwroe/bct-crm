<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('check_session')) { 

	function check_session() {

		$CI =& get_instance();
		
		$user_id = $CI->session->userdata('user')['user_id'];

		if (empty($user_id)) {

			$CI->session->sess_destroy();

			redirect(base_url());
			
			exit;

		}

	}

}