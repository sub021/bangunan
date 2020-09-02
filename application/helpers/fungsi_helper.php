<?php

function check_alredy_login(){
    $ci =& get_instance();
    $user_session= $ci->session->userdata('id_user');
    if($user_session){
        redirect('dasboard');
    }
}

function check_alredy_login_user(){
    $ci =& get_instance();
    $user_session= $ci->session->userdata('id_pelanggan');
    if($user_session){
        redirect('home');
    }
}

function check_not_login_user(){
    $ci =& get_instance();
    $user_session= $ci->session->userdata('id_pelanggan');
    if(!$user_session){
        redirect('auth/login_user');
    }
}   
function check_not_login(){
    $ci =& get_instance();
    $user_session= $ci->session->userdata('id_user');
    if(!$user_session){
        redirect('auth/login');
    }
}