<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	private $tbl_name = 'tUser';

	private $tbl_key = 'user_id';

	private $scripts = array(
		'assets/js/user/main.js'
	);

	public function __construct() {

		parent::__construct();

	}

	public function index() {

		$data['scripts'] = $this->scripts;

		$this->template->load('login-tpl','login/index', $data);        

	}

	public function login() {

		$validation = array(

			array(
				'field' => 'email',
				'label' => 'Email Address',
				'rules' => 'required'
			),

			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)

		);

		$this->form_validation->set_rules($validation);

		if ($this->form_validation->run() === FALSE) {

			http_response_code(500);

			echo validation_errors();

		} else {

			$email = $this->input->post('email');

			$password = $this->input->post('password');

			if ($this->UserModel->login($email, $password) === TRUE) {
				
				http_response_code(200);

			} else {
					
				http_response_code(500);

				echo "An unexpected error has occurred, please try again.";

			}

		}

	}

	public function logout() {

		$this->session->sess_destroy();

		redirect($this->config->item('after_log_out_url'));

	}

	public function getUsers() {

		return $this->UserModel->getUsers();

	}

}
