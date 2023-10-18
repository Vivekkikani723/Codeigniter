<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class Api extends RestController{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model','model');
        $this->load->library('form_validation');
    }

    public function index_post(){

        /*--------------------------KEY Validation----------------------------------------------*/
        $key = $this->input->post('key');
        $api_key = $this->input->post('key', TRUE);

        if (!is_valid_api($api_key)) {
            // Return an error response
            $error_response = array(
                    'message' => array(
                    'Key' => 'API_KEY_MISSING',
                    'status'=>'Not Active Your Account',
                    'errors' => 'No api_key was supplied. Get one at http://localhost/blog/registration'
                )
            );
            $this->output
                 ->set_status_header(400) // Set the HTTP status code to 400 Bad Request
                 ->set_content_type('application/json')
                 ->set_output(json_encode($error_response));
            // exit();
            return;
        }

        $search = $this->input->post('search');
        $page =$this->input->post('page');
        $tag =$this->input->post('tag');
        $config = array(
            array(
                'field' => 'page',
                'label' => 'page Parameter',
                'rules' => 'greater_than[0]'
            )
        );
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules($config);
        $this->form_validation->set_data($_POST);

        if ($this->form_validation->run() === FALSE) {  
            $errors = array('error' => validation_errors());
            $error_message = str_replace('<p>', '', validation_errors());
            $error_message = str_replace('</p>', '', $error_message);
                           echo json_encode(explode("\n",$error_message));
                            
            // $this->output
            //     ->set_status_header(400)
            //     ->set_content_type('application/json')
            //     ->set_output(json_encode($errors));
            exit;
       
        }
        $results = $this->model->search($search,$tag,$page);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($results));
            return;
    }



    public function storedata_post()
    {
        $blog = new Api_model;
        $data =$this->input->post();
        $key = $this->input->post('key');
        $api_key = $this->input->post('key', TRUE);

        if (!is_valid_api($api_key)) {
            // Return an error response
            $error_response = array(
                    'message' => array(
                    'Key' => 'API_KEY_MISSING',
                    'status'=>'Not Active Your Account',
                    'errors' => 'No api_key was supplied. Get one at http://localhost/blog/registration'
                )
            );
            $this->output
                 ->set_status_header(400) // Set the HTTP status code to 400 Bad Request
                 ->set_content_type('application/json')
                 ->set_output(json_encode($error_response));
            exit();
            // return;
        }
        $config=[
            'upload_path'=> './asset/blogimg/',
            'allowedExts'=>'pdf|doc|docx'
        ];
        $this->load->library('upload',$config);

        $filename =time() . '_' . $_FILES['img']["name"];
        $tempname =$_FILES['img']["tmp_name"];
        $folder ='./asset/blogimg/'.$filename;

        if(move_uploaded_file($tempname, $folder)){
            $document='./asset/blogimg/'.$filename;
            $blog = $blog->addBlog($document,$data);
        }
        if($blog > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'NEW BLOG ADD'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO ADD NEW BLOG'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }


    
    public function viewBlog_post($id)
    {
        $key = $this->input->post('key');
        $api_key = $this->input->post('key', TRUE);

        if (!is_valid_api($api_key)) {
            // Return an error response
            $error_response = array(
                    'message' => array(
                    'Key' => 'API_KEY_MISSING',
                    'status'=>'Not Active Your Account',
                    'errors' => 'No api_key was supplied. Get one at http://localhost/blog/registration'
                )
            );
            $this->output
                 ->set_status_header(400) // Set the HTTP status code to 400 Bad Request
                 ->set_content_type('application/json')
                 ->set_output(json_encode($error_response));
            // exit();
            return;
        }
        $blog = new Api_model;
        $blog = $blog->editBlog($id);
        $this->response($blog, 200);
    }


    
    public function updateBlog_post($id)
    {
        $key = $this->input->post('key');
        $api_key = $this->input->post('key', TRUE);

        if (!is_valid_api($api_key)) {
            // Return an error response
            $error_response = array(
                    'message' => array(
                    'Key' => 'API_KEY_MISSING',
                    'status'=>'Not Active Your Account',
                    'errors' => 'No api_key was supplied. Get one at http://localhost/blog/registration'
                )
            );
            $this->output
                 ->set_status_header(400) // Set the HTTP status code to 400 Bad Request
                 ->set_content_type('application/json')
                 ->set_output(json_encode($error_response));
            // exit();
            return;
        }

        $blog = new Api_model;
        $data = $this->input->post();
        $config=[
            'upload_path'=>'./asset/blogimg/',
            'allowed'=>'jpg|jpeg|png'
        ];

        $this->load->library('upload',$config);
        $img=$this->model->find_pic();
        // print_r($img);
        // die;
        $filename =$_FILES["img"]["name"];
        $tempname =$_FILES["img"]["tmp_name"];  
        $folder = './asset/blogimg/'.$filename;
        if(move_uploaded_file($tempname, $folder)){
            $document='./asset/blogimg/'.$filename;
            if($blog = $blog->updateblog($document,$id, $data)){
               if(file_exists($img['img'])){
                    unlink($img['img']);
               }
            }
        if($blog > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'UPDATE BLOG'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO  UPDATE BLOG'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}


    public function deleteBlog_post($id)
    {
        $key = $this->input->post('key');
        $api_key = $this->input->post('key', TRUE);

        if (!is_valid_api($api_key)) {
            // Return an error response
            $error_response = array(
                    'message' => array(
                    'Key' => 'API_KEY_MISSING',
                    'status'=>'Not Active Your Account',
                    'errors' => 'No api_key was supplied. Get one at http://localhost/blog/registration'
                )
            );
            $this->output
                 ->set_status_header(400) // Set the HTTP status code to 400 Bad Request
                 ->set_content_type('application/json')
                 ->set_output(json_encode($error_response));
            // exit();
            return;
        }
        $blog = new Api_model;
        if($status=$this->input->post('active')) {
            $status= '1';
        }else{
            $status= '0';
        };

        $result = $blog->deleteBlog($id,$status);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'BLOG DELETED'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO DELETE BLOG'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function delete_post($id)
    {
        $key = $this->input->post('key');
        $api_key = $this->input->post('key', TRUE);

        if (!is_valid_api($api_key)) {
            // Return an error response
            $error_response = array(
                    'message' => array(
                    'Key' => 'API_KEY_MISSING',
                    'status'=>'Not Active Your Account',
                    'errors' => 'No api_key was supplied. Get one at http://localhost/blog/registration'
                )
            );
            $this->output
                 ->set_status_header(400) // Set the HTTP status code to 400 Bad Request
                 ->set_content_type('application/json')
                 ->set_output(json_encode($error_response));
            // exit();
            return;
        }

        $blog = new Api_model;
        $result = $blog->delete($id);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'BLOG DELETED'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO BLOG MEDICINE'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}