<?php 
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

if ( ! function_exists('admin_access')){
    function admin_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '1'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout_admin');
        }
    }
}

if ( ! function_exists('tu_access')){
    function tu_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '2'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout_admin');
        }
    }
}

if ( ! function_exists('kasie_access')){
    function kasie_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '3'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout_admin');
        }
    }
}

if ( ! function_exists('pimpinan_access')){
    function pimpinan_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != '4'){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout_admin');
        }
    }
}

if ( ! function_exists('workshop_access')){
    function workshop_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') < 5 || $ci->session->userdata('id_jabatan') == 10 ){
            $ci->session->set_flashdata('error','Anda harus Login terlebih dahulu');
            redirect('logout');
        }
    }
}

if ( ! function_exists('workshop_access2')){
    function workshop_access2(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != 5){
            $ci->session->set_flashdata('error','Maaf. Anda tidak memiliki akses menu ini');
            redirect_back();
        }
    }
}

if ( ! function_exists('pusditjen_access')){
    function pusditjen_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') != 10){
            $ci->session->set_flashdata('error','Maaf. Anda tidak memiliki akses menu ini');
            redirect_back();
        }
    }
}

if ( ! function_exists('bukan_workshop_access')){
    function bukan_workshop_access(){
        $ci=& get_instance();
        if($ci->session->userdata('id_jabatan') == '5'){
            $ci->session->set_flashdata('error','Maaf. Anda tidak memiliki akses menu ini');
            redirect_back();
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

function getSysConfig($sysKey){
    $CI =& get_instance();
    $CI->db->select('sysValue');
    $CI->db->from('sysconfig');
    $CI->db->where('sysKey', $sysKey);
    $query = $CI->db->get()->row()->sysValue;
    return $query;
}


// terbilang
function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }           
    return $hasil;
}



