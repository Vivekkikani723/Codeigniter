<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wired extends CI_Controller {
    
    public function index(){

        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.wired.com/wp-json/wp/v2/posts/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Cookie: CN_geo_country_code=IN; verso_bucket=485'
            ),
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
          ));
        
          $response = curl_exec($curl);
          curl_close($curl);

        $allData= json_decode($response,true);
        $data['title'] = $allData;
        echo '<pre>'; print_r($allData);die;
      $this->load->view('wired',$data);
  } 
}