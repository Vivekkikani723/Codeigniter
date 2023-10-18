<?php

function isLoggedIn(){
    $CI = & get_instance();
    if ($CI->session->userdata('id','is_logged_in')) {
        // prd($CI->session->userdata());
        return true;
    }
        return false;
}
?>