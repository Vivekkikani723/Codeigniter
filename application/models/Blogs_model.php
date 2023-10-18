<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function wiredBlog($wiredArr,$guid){  
        $this->db->where('guid', $guid);
        $query = $this->db->get('blogs');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                $this->db->insert_batch('blogs',$wiredArr);
            }
    }


    public function playstationBlog($playstationdArr,$guid){  
        $this->db->where('guid', $guid);
        $query = $this->db->get('blogs');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                $this->db->insert_batch('blogs',$playstationdArr);
            }
    }


    public function techcrunchViewBlog($techcrunchViewBlogArr,$guid){  
        $this->db->where('guid', $guid);
        $query = $this->db->get('blogs');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                $this->db->insert_batch('blogs',$techcrunchViewBlogArr);
            }
    }


    public function techcrunchBlog($techcrunchBlogArr,$guid){  
        $this->db->where('guid', $guid);
        $query = $this->db->get('blogs');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                $this->db->insert_batch('blogs',$techcrunchBlogArr);
            }
            return true;
    }


    public function devBlog($devBlogArr,$guid){  
        $this->db->where('guid', $guid);
        $query = $this->db->get('blogs');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                $this->db->insert_batch('blogs',$devBlogArr);
            }
    }


    public function listBlog(){
        return $this->db->get('blogs')->result_array();
    }


    public function findBlog($id){
        $q=$this->db->select()
                    ->where('id',$id)
                    ->get('blogs');
        return  $q->row_array();
    }


    public function blogUpdate($data,$status){
        $array = array(
            'date'=>$data['date'],
            'slug'=>$data['slug'],
            'title'=>$data['title'],
            'content'=>$data['content'],
            'tag'=>$data['tag'],
            'status' =>$status
    );
        return  $this->db->where('id',$data['id'])
                        ->update('blogs',$array);
    }

    
    public function deleteBlog($id,$status){
        $data = array(
            'status' => $status
        );
        return  $this->db->where('id', $id)
                         ->update('blogs', $data);
    }

}