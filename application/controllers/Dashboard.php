<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();


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
        $this->load->view('admin/dashboard');
    }
}
?>