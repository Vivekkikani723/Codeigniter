<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Techcrunch extends CI_Controller {
    
    public function index(){
        
        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://techcrunch.com/wp-json/wp/v2/posts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,

          ));
          
          $response = curl_exec($curl);
          curl_close($curl);

        $allData= json_decode($response,true);
        $data['id'] = $allData;

      $this->load->view('techcrunch',$data);
  } 
}