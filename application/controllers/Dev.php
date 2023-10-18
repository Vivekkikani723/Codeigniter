<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dev extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        
        $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dev.to/api/articles',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
            CURLOPT_HTTPHEADER => array(
              'Cookie: _Devto_Forem_Session=ed5d9c5afbe1c249f234f1e335fb36fc'
            ),
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $allData= json_decode($response,true);
        $data['title'] = $allData;

    $this->load->view('dev',$data);
  }   
}
                        
                        