<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login_validation($email,$password){
        $q=$this->db->where(['email'=>$email,'password'=>$password,'role'=>1])
                    ->get('registration');
            if($q->num_rows()){
                // return $q->row()->id;
                return $q->row();
            }else{
                return false;
        }
    }

    // public function getrole(){
    // $q=$this->db->select('role')
    //             ->get('admin');
    // return  $q->result_array();

    // }
}
