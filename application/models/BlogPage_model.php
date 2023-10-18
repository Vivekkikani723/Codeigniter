<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogPage_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function listBlog(){
        return $this->db->get('blogs')->result_array();
    }
}