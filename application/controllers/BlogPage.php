<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BlogPage extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('BlogPage_model','model');

        if (!isLoggedIn()) {
            redirect(base_url('login'));
			
		    	// if($this->session->userdata('role') == '1'){
		    	// 	redirect('admin');
		    	// }
		    	// else if($this->session->userdata('role') == '2'){
		    	// 	redirect('user');
		    	// }
		    }
    }



    public function index(){
    $api_data=$this->model->listBlog();
    // echo '<pre>';print_r($api_data);die;
      $this->load->view('blogpage', array('api_data' => $api_data));
  }
}