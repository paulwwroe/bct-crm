<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('load_scripts')) { 

	function load_scripts($scripts = NULL) {

		$CI =& get_instance();

		if ($scripts !== NULL) {

			foreach ($scripts as $script) {

				if (file_exists($script)) {

					echo "<script src='".base_url($script)."'></script>";

				} else {

					echo "<!-- WARNING: Unable to load ".base_url($script)." -->";
					
				}

			}

		}

	}

}