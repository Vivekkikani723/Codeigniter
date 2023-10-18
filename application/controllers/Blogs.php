<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Blogs_model','model');
    }
    public function index(){
      $this->load->view('blogs');
  }

    
    public function devBlog(){
 
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
        return $allData;
        $this->load->view('dev',$data);

    }   


    public function playstationBlog(){
        
        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://blog.playstation.com/wp-json/wp/v2/posts',
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
        return $allData;
        $this->load->view('playstation',$data);

    }


    public function techcrunchBlog(){
        
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
        return $allData;
        $this->load->view('techcrunch',$data);

    } 


    public function techcrunchViewBlog(){
        
        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.technologyreview.com/wp-json/wp/v2/posts',
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
        return $allData;
        $this->load->view('techcrunchView',$data);

    } 

    public function wiredBlog(){

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
        return $allData;
      $this->load->view('wired',$data);

    } 

    public function allBlog(){

    /*--------------------------wiredBlog----------------------------------------------*/
      $wiredArr=array();
      $wired= $this->wiredBlog();
      
        foreach($wired as $row):
          $wiredTag=array(
            'date'=>$row['date'],
            'guid'=>$row['id'],
            'slug'=>$row['slug'],
            'title'=>$row['title']['rendered'],
            'content'=>substr(strip_tags($row['content']['rendered']),0,50,),
            'canonical_url'=>$row['link'],
            "status"=>1,
          );
          $guid = $wiredTag['guid'];
          array_push($wiredArr ,$wiredTag);
        endforeach;
      $this->model->wiredBlog($wiredArr,$guid);
        

    /*--------------------------playstationBlog----------------------------------------------*/
      $playstationArr=array();
      $playstation= $this->playstationBlog();
        foreach($playstation as $row):
          $blogTag=array(
            'date'=>$row['date'],
            'guid'=>$row['guid']['rendered'],
            'slug'=>$row['slug'],
            'title'=>$row['title']['rendered'],
            'content'=>substr(strip_tags($row['content']['rendered']),0,50,),
            'canonical_url'=>$row['link'],
            "status"=>1
          );
          $guid = $blogTag['guid'];
          array_push($playstationArr ,$blogTag);
        endforeach;
      $this->model->playstationBlog($playstationArr,$guid);


    /*--------------------------techcrunchViewBlog----------------------------------------------*/
      $techcrunchViewBlogArr=array();
      $techcrunch= $this->techcrunchViewBlog();
        foreach($techcrunch as $row):
          $techcrunchTag=array(
            'date'=>$row['date'],
            'guid'=>$row['id'],
            'slug'=>$row['slug'],
            'title'=>$row['title']['rendered'],
            'content'=>substr(strip_tags($row['content']['rendered']),0,50,),
            'img'=>$row['jetpack_featured_media_url'],
            'canonical_url'=>$row['link'],
            "status"=>1
          );
          $guid = $techcrunchTag['guid'];
          array_push($techcrunchViewBlogArr ,$techcrunchTag);
        endforeach;
      $this->model->techcrunchViewBlog($techcrunchViewBlogArr,$guid);


    /*--------------------------techcrunchBlog----------------------------------------------*/
      $techcrunchBlogArr=array();
      $techcrunchBlog= $this->techcrunchBlog();
        foreach($techcrunchBlog as $row):
          $techcrunchBlogTag=array(
            'date'=>$row['date'],
            'guid'=>$row['id'],
            'slug'=>$row['slug'],
            'title'=>$row['title']['rendered'],
            'content'=>substr(strip_tags($row['content']['rendered']),0,50,),
            'img'=>$row['jetpack_featured_media_url'],
            'canonical_url'=>$row['link'],
            "status"=>1
          );
          $guid = $techcrunchBlogTag['guid'];
          array_push($techcrunchBlogArr ,$techcrunchBlogTag);
        endforeach;
      $this->model->techcrunchBlog($techcrunchBlogArr,$guid);


    /*--------------------------devBlog----------------------------------------------*/
      $devBlogArr=array();
      $devBlog= $this->devBlog();
        foreach($devBlog as $row):
          $devBlogTag=array(
            'date'=>$row['created_at'],
            'slug'=>$row['slug'],
            'guid'=>$row['id'],
            'title'=>$row['title'],
            'content'=>substr(strip_tags($row['description']),0,50,),
            'img'=>$row['social_image'],
            'canonical_url'=>$row['canonical_url'],
            "status"=>1
          );
          $guid = $devBlogTag['guid'];
          array_push($devBlogArr ,$devBlogTag);
        endforeach;
      $this->model->devBlog($devBlogArr,$guid);
    }

    public function allBlogList(){
      $data['blog']=$this->model->listBlog();
      $this->load->view('blogList',$data);
    }

    public function edit($id){
      $data['blog']=$this->model->findBlog($id);
      $this->load->view('admin/blogEdit',$data);
    }

    public function updateBlog(){
      $data=$this->input->post();
      if($status=$this->input->post('active')) {
          $status= '1';
      }else{
          $status= '0';
      };

      if($this->model->blogUpdate($data,$status)){
          $this->session->set_flashdata('failed','Your Data Edit successfully !!');
          return redirect('blogs/allBlogList');
      }else{
          $this->session->set_flashdata('failed','Your Data Not Edit  !!');
          return redirect('blogs/blogEdit');
          };
    }

    public function delete($id) {
      if($status=$this->input->post('active')) {
          $status= '1';
      }else{
          $status= '0';
      };
        $this->model->deleteBlog($id,$status);
        $this->session->set_flashdata('failed','Your Data No Delete !!');
        redirect('blogs/allBlogList');
    }
}