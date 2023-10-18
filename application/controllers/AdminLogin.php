<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdminLogin_model','model');
        $this->load->library('form_validation');

        // if (isLoggedIn()) {
        //     redirect(base_url('blogpage'));
        // }

        // prd($this->session->userdata);
    }

    public function index(){
        $this->load->view('admin/login');
    }

    public function login(){
        $this->form_validation->set_rules('email','email','trim|required');
        $this->form_validation->set_rules('password','pasword','required');

        if($this->form_validation->run()){
            $email=$this->input->post('email');
            $password=md5($this->input->post('password'));
            $result=$this->model->login_validation($email,$password);
            if($result != ''){
                $this->session->set_userdata('id', $result->id);
                $this->session->set_userdata('email', $result->email);
                $this->session->set_userdata('username', $result->username);
                $this->session->set_userdata('role', $result->role);
                $this->session->set_userdata('is_logged_in',1);
                return redirect('dashboard');
            }else{
                $this->session->set_flashdata('failed','Invalida password');
                redirect('AdminLogin');
            }
            }else{
                $this->load->view('admin/login');
                // echo validation_errors();
        }
    }

    public function logout(){
        $this->session->sess_destroy('id');
        redirect('AdminLogin');
    }
}
    