<?php

function pr($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/*
Pre-format text and then die
$array : Array -> Required => Array to be pre formatted 
*/
function prd($array){
     echo "<pre>";
     print_r($array);
     echo "</pre>";
     die;
}

// function getKey($selectFields= array()){
//     $CI = & get_instance();
//     $CI->db->get('registration');

//     if($CI->db->select($selectFields)){
//         return true;
//     }
//         return false;
// }

function is_valid_api($key) {
    $CI =& get_instance();
    $CI->load->database();

    $CI->db->where('key', $key);
    $CI->db->where('status', 1);
    
    $query = $CI->db->get('registration');
    // Check if the API key is valid
    if ($query->num_rows() === 1) {
        return true;
    } else {
        return false;
    }
}

function lq(){
    $CI = & get_instance();
    echo $CI->db->last_query();
}