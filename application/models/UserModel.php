<?php

class UserModel extends CI_Model {
    
    public $tbl_name = "tUser";

    public $tbl_key = "user_id";

    public function save($data) {

        $set = array(
            'forename' => $data['forename'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'administrator' => $data['administrator']
        );

        $this->db->select('*');

        $this->db->from($this->tbl_name);

        $this->db->where('email', $data['email']);

        $this->db->where($this->tbl_key." !=", $data['user_id']);
        
        if ($this->db->count_all_results() > 0 ) {

            return FALSE;

        } else {

            $this->db->set($set);

            $this->db->where(array($this->tbl_key => $data['user_id']));

            $this->db->update($this->tbl_name);

            return TRUE;

        }

    }

    public function getUser($user_id = NULL) {

        if ($user_id === NULL) {

            return array();

        } else {

            $where = array(
                $this->tbl_key => $user_id  
            );

            return $this->db->get_where($this->tbl_name, $where, 1)->row_array();

        }

    }

    public function getUsers() {

        return $this->db->get($this->tbl_name)->result_array();

    }

    public function delete( $user_id = NULL ) {

        if ($user_id === NULL) {

            return FALSE;

        } else {

            $where = array(
                "user_id" => $user_id
            );

            return $this->db->delete($this->tbl_name, $where);

        }

    }

    public function getUserWhere( $where = NULL ) {

        if ($where === NULL) {

            return FALSE;

        } else {

            $query = $this->db->get_where($tbl_name, $where, 1);

            return $query->row_array();

        }

    }

    public function login($email = NULL, $password = NULL) {

        $where = array(
            "email" => $email
        );

        $query = $this->db->get_where($this->tbl_name, $where, 1);

        if ($query->num_rows() === 1) {
            
            $user = $query->row_array();

            if (password_verify($password, $user['hash'])) {

                $set = array(
                    "last_logged_in" => date('Y-m-d H:i:s')
                );

                $this->db->set($set);

                $where = array(
                    $this->tbl_key => $user[$this->tbl_key]
                );

                $this->db->where($where);

                $this->db->update($this->tbl_name);

                $data = array(
                    $this->tbl_key => $user[$this->tbl_key],
                    'forename' => $user['forename'],
                    'surname' => $user['surname'],
                    'email' => $user['email'],
                    'isAdmin' => ($user['administrator'] === '1') ? TRUE : FALSE,
                    'users' => $this->getUsers()
                );

                $this->session->set_userdata('user', $data);
                
                return TRUE;

            } else {

                return FALSE;

            }

        } else {

            return FALSE;

        }

    }

}
