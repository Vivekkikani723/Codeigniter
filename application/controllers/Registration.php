<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Registration_model','model');
        $this->load->library('form_validation');
        $this->load->helper('string');
    }



    public function index(){

      $this->load->view('registration');
    }

    public function registration(){
        
        $this->form_validation->set_rules('fullname','Fullname','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('username','User name','trim|required');
        $this->form_validation->set_rules('profilepic','Profile pic','trim|required');
        $this->form_validation->set_rules('password','Password','required');
        $data = $this->input->post();
        $password= $this->input->post();
        $userkey= random_bytes(32);
        $random_key = bin2hex($userkey);

        if($this->form_validation->run())
        {
            // validation failed, reload the form with errors
            $this->load->view('registration');
        }
        else
        {
            $config=[
                'upload_path'=> './asset/upload/',
                'allowedExts'=>'pdf|doc|docx'
            ];
            $this->load->library('upload',$config);

            $filename =time() . '_' . $_FILES['profilepic']["name"];
            $tempname =$_FILES['profilepic']["tmp_name"];
            $folder ='./asset/upload/'.$filename;

            if(move_uploaded_file($tempname, $folder)){
                $document='./asset/upload/'.$filename;
                $resp=$this->model->registration($document,$random_key,$data);
                if($resp)
                    {
                    $email =$this->input->post('email');
                    $password= $this->input->post('password');
                    $this->email($email,$password);
                    $this->session->set_flashdata('Good',"Your registration Success 🤑!!");
                    return redirect('registration');
                }else{
                    $this->session->set_flashdata('failed',"Your Not registration 😔!!");
                    return redirect('registration');
                };
            }
        }
        $this->load->view('registration');  
    }

    public function email($email,$password){
        // $this->load->config('email');
        $get=$this->model->data();
        // prd($password);

        $from = 'no-reply@myapp.com';
	    $to = $email;
        $message="Your API Key:-".implode(',', $get). " " .
                "Your Passwword:-". $password. " " .
                "Your Email Id:-".$email;
        // prd($message);
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject('Password');
        $this->email->message($message);
        if(!$this->email->send())
        {
            show_error($this->email->print_debugger());
            echo 'Email Not Send !!😔😔';
        }else{
            echo 'Email has been send !! 🙂🙂';
            $this->load->view('registration');

        }
    }
}