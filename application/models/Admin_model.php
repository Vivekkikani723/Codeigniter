<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function listUser(){
        return $this->db->get('registration')->result_array();
    }

    public function status($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('registration');
        return  $q->row_array();
    }

    public function statusUpdate($status,$data){
        $array = array(
            'status' =>$status
    );
        return  $this->db->where('id',$data['id'])
                        ->update('registration',$array);
    }
}