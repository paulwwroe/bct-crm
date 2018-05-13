<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('iconfiy')) { 

	function iconify($page) {

		if (!empty($page)) {

			$CI =& get_instance();
			$icons = $CI->config->item('icons');

			if (count($icons)>0) {

				if (array_key_exists($page, $icons)) {

					return $icons[$page];

				}

			}
		}

	}

}