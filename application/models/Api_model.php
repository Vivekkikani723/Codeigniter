<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function getBlog($api_key)
    {
        $query = $this->db->get("blogs");
        return $query->result();

    }

    public function search($search='',$tag = '', $page = 1)
    {
        $this->db->select('*');
        $this->db->from('blogs');

        if ($search !== NULL) {
            $this->db->like('title', $search)
                     ->or_like('content', $search);
        }
        
        if ($tag !== NULL) {
            $this->db->where('tag', $tag);
        }
        
        $limit = 10; // number of records to display per page
        $offset = ($page - 1) * $limit;
        
        if ($page !== NULL) {
            $this->db->limit($limit, $offset);
        }
        
        
        $query = $this->db->get();
        return $query->result_array();

    }

    public function addBlog($document,$data){  

        $q=array(
                "date"=>$data['date'],
                "title"=>$data['title'],
                "content"=>$data['content'],
                "img"=>base_url($document),
                "canonical_url"=>$data['canonical_url'],
                "slug"=>$data['slug'],
                "tag"=>$data['tag'],
                "guid"=>$data['guid'],
                "status"=>0,
        );
        return $this->db->insert('blogs',$q);
    }

    public function editBlog($id){
        $q=$this->db->where('id',$id)
                    ->get('blogs');
        return  $q->row();
    }

    public function find_pic(){
        $q=$this->db->select('img');
        return $this->db->get('blogs')->row_array();
    }


    public function updateblog($document,$id,$data){  

        $array = [
            "date"=>$data['date'],
            "title"=>$data['title'],
            "content"=>$data['content'],
            "img"=>base_url($document),
            "canonical_url"=>$data['canonical_url'],
            "slug"=>$data['slug'],
            "tag"=>$data['tag'],
            "guid"=>$data['guid'],
            "status"=>0,
        ];
        return  $this->db->where('id',$id)
                        ->update('blogs',$array);
    }

    public function deleteBlog($id,$status)
    {
        $data = array(
            'status' => $status
        );
        return  $this->db->where('id', $id)
                         ->update('blogs', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('blogs', ['id' => $id]);
    }
}