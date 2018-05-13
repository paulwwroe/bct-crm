<?php

class Note extends CI_Controller {

	private $scripts = array(
		'assets/js/note/main.js',
		'assets/js/classes/Note.js'
	);

	private $note_types = array();

	private $retro_dates = array();

	public function __construct() {

		Parent::__construct();

		$this->note_types = $this->NoteModel->getNoteTypes();

		$this->retro_dates = $this->getRetroDates();

	}

	public function index() {

		$data['scripts'] = $this->scripts;

		$data['notes'] = $this->NoteModel->getNotes();

		$data['note_types'] = $this->note_types;

		$data['retro_dates'] = $this->retro_dates;

		$this->template->load('seccure-tpl', 'note/index', $data);
		
	}

	public function write() {
		
		$data['scripts'] = array(
			'assets/js/note/write.js',	
		);

		$data['retro_dates'] = $this->retro_dates;

		$data['note_types'] = $this->note_types;

		$data['users'] = $this->session->userdata('user')['users'];
		
		$this->template->load('seccure-tpl', 'note/write', $data);

	}

	public function delete($note_id = NULL) {

		if ($note_id === NULL) {

			http_response_code(500);

			die("note_id is NULL");

		} else {

			$isAdmin = $this->session->userdata('user')['isAdmin'];

			$user_id = $this->session->userdata('user')['user_id'];

			$note = $this->NoteModel->getNote($note_id);

			if ($note['user_id'] === $user_id || $isAdmin) {
				
				if ($this->NoteModel->delete($note_id)) {

					http_response_code(200);
			
					$message = urlencode("The note has been successfully deleted.");

					redirect(base_url().'note/?success='.$message);

				} else {

					http_response_code(500);

					$message = urlencode("An unexpected error has occurred, please try again.");

					redirect(base_url().'/edit/'.$note_id.'/?error='.$message);

				}


			} else {

				$message = urlencode("Sorry, you don't have permission to delete this note.");

				redirect(base_url().'/edit/'.$note_id.'/?error='.$message);

			}

		}

	}

	/**
	 * When the user visits /note/edit/{note_id}
	 * this function retreives the data for a single
	 * note and loads the 'edit note' template.
	 */
	public function edit($note_id = NULL) {
		
		if ($note_id === NULL) {
			
			http_response_code(500);
			
			die('note_id is NULL');

		//	Check if note can be edited by current user
		} else if (true) {

			$note = $this->NoteModel->getNote($note_id);

			if (!empty($note)) {
				
				$data['users'] = $this->session->userdata('user')['users'];

				$data['retro_dates'] = $this->retro_dates;
				
				$data['note_types'] = $this->note_types;
				
				$data['note'] = $note;

				$this->template->load('seccure-tpl', 'note/edit', $data);

			} else {

				die('An unexpected error has occurred.');

			}

		} else {

			die('You do not have permission to edit this note.');

		}

	}

	public function getRetroDates() {

		$dates = array();

		$date = new DateTime();

		for ($i=0; $i<=365; $i++) {
			
			$date->modify("-$i day");

			array_push($dates, array(
				"label" => $date->format('l dS \o\f F Y'),
				"date" => $date->format('Y-m-d H:i:s')
			));

		}

		return $dates;

	}

	public function getNotes() {

		$user_id = $this->session->userdata('user')['user_id'];

		$isAdmin = $this->session->userdata('user')['isAdmin'];

		$notes = $this->NoteModel->getNotes();

		$str = "";

		foreach ($notes as $note) {

			$created = new DateTime($note['created']);

			$str .= "<div
				class='well note'
				data-note-id='".$note['note_id']."'
				data-date='".$note['created']."'
				data-user_id='".$note['user_id']."'
				data-type='".$note['type']."'
				data-client_id='".$note['client_id']."'
				data-search='".$note['forename']." ".$note['surname']."'>
	     
	        	<h2>
	        		<a href='#'>
	        			<i class='fa fa-user'></i>
	        			<span class='client-name'> ".$note['forename'].' '.$note['surname']."</span>
	        		</a>
	        	</h2>
	        	
	        	<ul>
	        		<li class='text-muted'>
	        			<i class='fa fa-calendar'></i> ".$created->format('d/m/Y')."
	        		</li>
	        		<li class='text-muted'>
	        			<i class='fa fa-clock-o'></i>".$created->format('H:i')."
	        		</li>
	        		<li class='text-muted'>
	        			<i class='fa fa-user'></i>
	        			<span class='sr-only'>written by</span> ".$note['user_forename']."
	        		</li>
	        	</ul>

	        	<p class='details'>".$note['details']."</p>

			    <div class='container-fluid'>
			    	<div class='pull-right'>
			        	<div class='input-group input-group-lg'>";
			        		
			        	if ($isAdmin || $user_id === $note['user_id']) {

			        		$str .= "<a href='".base_url('note/edit/'.$note['note_id'])."' data-note-id='".$note['note_id']."' class='btn btn-success'>
			        			<i class='fa fa-edit'></i> Edit
			        		</a>";

			        	}

			        	$str .= "</div>
			        </div>
			    </div>
	        </div>";

		}

		echo $str;

	}

	public function create() {

		$data = $this->input->post();

		print_r($data);

		die();

		$errors = array();

		if (empty($data)) {

			http_response_code(500);

			echo json_encode(array(
				"error" => "No data."
			));

			return;

		}

		$required = array(
			"details",
			"type",
			"report",
			"created"
		);

		foreach($required as $field) {

			if (!isset($data[$field])) {

				array_push($errors, $field);

			}

		}

		if ($data["type"] === "Client" && !isset($data["client_id"])) {

			http_response_code(500);

			echo json_encode(array(
				"error" => "A 'Client' type note must be associated with a valid Client ID."
			));

			return;

		}

		if (count($errors) > 0) {

			http_response_code(500);

			echo json_encode($errors);

			return;

		}

		if (!$this->NoteModel->create($data)) {

			http_response_code(500);

			echo json_encode(array(
				"error" => "Unable to insert new note."
			));

			return;

		} else {

			http_response_code(200);
			
		}

	}

	public function setReportStatus() {

		$note_id = $this->input->post("note_id");

		$status = $this->input->post("status");

		if (!is_null($note_id) && !is_null($status)) {

			if ($this->NoteModel->setReportStatus($note_id, $status)) {
				
				http_response_code(200);

			} else {
					
				http_response_code(500);

			}

		} else {

			http_response_code(500);

		}

	}

	public function save() {

		$validation = array(
			
			array(
				'field' => 'note_id',
				'label' => 'Note ID',
				'rules' => 'required'
			),

			array(
				'field' => 'user_id',
				'label' => 'User ID',
				'rules' => 'required'
			),

			array(
				'field' => 'type',
				'label' => 'Type',
				'rules' => 'required'
			),

			array(
				'field' => 'created',
				'label' => 'Date',
				'rules' => 'required'
			),

			array(
				'field' => 'details',
				'label' => 'Details',
				'rules' => 'required'
			)

		);

		$this->form_validation->set_rules($validation);

		if ($this->form_validation->run() === FALSE) {

			http_response_code(500);

			echo json_encode(form_errors());

		} else {



		}

	}


}
