<?php

class TaskModel extends CI_Model {

	public $tbl_name = "task";

	public $tbl_key = "task_id";

	public function TaskModel() {

		$this->load->database();

	}

}