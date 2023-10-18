<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model','model');

        if (!isLoggedIn()) {
            redirect(base_url('AdminLogin'));
			
		    	// if($this->session->userdata('role') == '1'){
		    	// 	redirect('admin');
		    	// }
		    	// else if($this->session->userdata('role') == '2'){
		    	// 	redirect('user');
		    	// }
		    }
    }

    public function index(){
        $data['registration']=$this->model->listUser();
        $this->load->view('admin/listUser',$data);
      }

      public function edit($id){
        $data['registration']=$this->model->status($id);
        $this->load->view('admin/statusEdit',$data);
      }

      public function update(){

        $data=$this->input->post();
            if($status=$this->input->post('active')) {
                $status= '1';
            }else{
                $status= '0';
            };

            if($this->model->statusUpdate($status, $data)){
                $this->session->set_flashdata('Good','Status Active 😃 !!');
                return redirect('Admin');
            }else{
                $this->session->set_flashdata('failed','Status InActive 🧐 !!');
                return redirect('Admin');
                };
      }

}