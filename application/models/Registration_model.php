<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {


    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function registration($document,$random_key,$data){  

        $q=array(
                "fullname"=>$data['fullname'],
                "email"=>$data['email'],
                "username"=>$data['username'],
                "profilepic"=>$document,
                "password"=>md5($data['password']),
                "status"=>0,
                "role"=>2,
                "key"=>$random_key
        );
        return $this->db->insert('registration',$q);
    }

    public function data(){
        $last_id=$this->db->insert_id();
        $query = $this->db->select('key')
                            ->get_where('registration', array('id' => $last_id));
        return $result = $query->row_array();
    }

}