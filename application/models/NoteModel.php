
<?php

class NoteModel extends CI_Model {

	public $tbl_name = "tNote";

	public $tbl_key = "note_id";

	public $errors = array();

	public function __construct() {

		$this->load->database();

	}

	/* 
	 * getNote
	 * Retreives data for a single note
	 */
	public function getNote($note_id = NULL) {

		if ($note_id === NULL) {

			return array();

		}

		$query = $this->db->select('*')
			->from("vNote")
			->where(array($this->tbl_key => $note_id))
			->get();

		return $query->result_array()[0];

	}

	public function getNoteTypes() {

		$query = $this->db->select('*')
			->from('tNoteType')
			->get();

		return $query->result_array();

	}

	public function create($data) {

		return $this->db->insert($this->tbl_name, $data);

	}

	public function delete($note_id = NULL) {

		if ($note_id === NULL) {

			return FALSE;

		}

		$data = array(
			$this->tbl_key => $note_id
		);

		return $this->db->delete($this->tbl_name, $data);

	}

	public function getNotes() {

		$query = $this->db->select("*")
		->from("vNote")
		->limit(500)
		->get();

		return $query->result_array();

	}

	public function setReportStatus($note_id = null, $status = null) {

		if (!is_null($note_id) && !is_null($status)) {

			$query = $this->db->set("report", $status)
				->where($this->tbl_key, $note_id)
				->update($this->tbl_name);

			return $query;

		} else {

			return FALSE;

		}

	}

}