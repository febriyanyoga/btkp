<?php 
if ( ! function_exists('admin_access')){
    function admin_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '1'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}

if ( ! function_exists('tu_access')){
    function tu_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '2'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}

if ( ! function_exists('kasie_access')){
    function kasie_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '3'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}

if ( ! function_exists('pimpinan_access')){
    function pimpinan_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '4'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}

if ( ! function_exists('workshop_access')){
    function workshop_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '5'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}

if ( ! function_exists('in_access')){
    function in_access(){
        $ci=& get_instance();
        if($ci->session->userdata('logged_in') != TRUE){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}


if ( ! function_exists('redirect_back')){
    function redirect_back(){
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}
