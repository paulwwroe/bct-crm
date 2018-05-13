<?php

class Search extends CI_Controller {
        
        private $scripts = array(
                'assets/js/search/main.js'
        );

        public function __construct() {

                Parent::__construct();

        }

        public function index() {

                $data['scripts'] = $this->scripts;

                $this->template->load('seccure-tpl', 'search/index', $data);
                
        }

        public function suggest( $query = NULL ) {

                if( $query === NULL ) {

                        echo json_encode(array());

                        exit;

                }

                echo json_encode($this->SearchModel->getSuggestions($query));

        }

}