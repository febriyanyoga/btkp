<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class WorkshopC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        workshop_access();
        $this->load->model(['LoginM','GeneralM','WorkshopM','TatausahaM']);
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['data_inspeksi']     = $this->WorkshopM->get_inspeksi_by_id_pengguna($id_pengguna)->result();
        $this->data['data_pengujian'] = $this->WorkshopM->get_pengujian($id_pengguna)->result();
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id_pengguna($id_pengguna)->result();
        $data['isi'] = $this->load->view('workshop/Home_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function data_perizinan()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');

        if($this->session->userdata('id_jabatan') == 5){
            $data['title'] = 'BTKP - Data Perizinan';
        }else{
            $data['title'] = 'BTKP - Data Pengujian';
        }
        $this->data['pengujian']    = $this->WorkshopM->get_pengujian($id_pengguna)->result();
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id_pengguna($id_pengguna)->result();
        $this->data['izin_tolak']   = $this->WorkshopM->get_perizinan_ditolak($id_pengguna)->result();
        $data['isi'] = $this->load->view('workshop/dataperizinan_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }


    public function detailperizinan($id_perizinan)
    {
        $data['detail_perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $data['title'] = 'BTKP - Surat Pelimpahan Kewenangan';
        $data['isi'] = $this->load->view('workshop/detailperizinan_v', $data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function print_perizinan($id_perizinan){
        $this->data['title'] = "BTKP - Surat Pelimpahan Kewenangan";
        $this->data['detail_perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $this->load->view('workshop/print_perizinan_v', $this->data);
    }

    public function type_approval($id_pengguna = null)
    {
        bukan_workshop_access();
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_pengujian_by_id($id_pengguna)->num_rows() > 0){//ada pengujian yang belum selesai
            $id_pengujian = $this->WorkshopM->get_pengujian_by_id($id_pengguna)->row()->id_pengujian; //ambil id nya
            if($this->WorkshopM->get_pengujian_by_id($id_pengguna)->row()->id_jenis_alat != ""){//kalo jenis alat blm diisi
                $id_pengujian = $this->WorkshopM->get_pengujian_by_id($id_pengguna)->row()->id_pengujian; //ambil id nya
                redirect('type_approval2/'.$id_pengujian); // ke tab 2
            }elseif ($this->WorkshopM->get_pengujian_by_id($id_pengguna)->tipe != '') {
                redirect('type_approval3/'.$id_pengujian);
            }
        }else{
            if($this->WorkshopM->get_data_pengguna_by_id($id_pengguna)->row()->nama_perusahaan == ""){

                $data['title'] = 'BTKP - Type Approval';
                $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
                $this->data['pengguna'] = $this->GeneralM->get_pengguna($id_pengguna)->row();
                $data['isi'] = $this->load->view('workshop/Typeapproval_v', $this->data, true);
                $this->load->view('workshop/Layout', $data);
            }else{
                redirect('type_approval22/'."");
            }
        }
    }

    public function perizinan_baru_1($id_pengguna = null)
    {
        workshop_access2();
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->num_rows() > 0){ //ada perizinan yg belum selesai
            $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan; //ambil id nya
            if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_jenis_alat  != ""){ //kalo jenis alat blm disii
                $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan;
                redirect('izin_baru2/'.$id_perizinan); //ke tab 2
            }elseif ($this->WorkshopM->get_berkas_by_id($id_perizinan)->num_rows() > 0 ){
                redirect('izin_baru3/'.$id_perizinan);
            }
        }else{
            if($this->WorkshopM->get_data_pengguna_by_id($id_pengguna)->row()->nama_perusahaan == ""){
                $data['title'] = 'BTKP - Perizinan Baru';
                $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
                $data['isi'] = $this->load->view('workshop/Perizinanbaru_v1', $this->data, true);
                $this->load->view('workshop/Layout', $data);
            }else{
                redirect('izin_baru22/'."");
            }
        }
    }

    public function type_approval2($id_pengujian="")
    {
        bukan_workshop_access();
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_pengujian_by_id($id_pengguna)->num_rows() > 0){
            $id_pengujian = $this->WorkshopM->get_pengujian_by_id($id_pengguna)->row()->id_pengujian;
            if($this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row()->tipe != ''){
                redirect('type_approval3/'.$id_pengujian);
            }
        }else{
            $data['title'] = 'BTKP - Type Approval';
            $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
            $this->data['pengguna'] = $this->GeneralM->get_pengguna($id_pengguna)->row();
            $this->data['alat']     = $this->WorkshopM->get_all_alat($id_pengguna)->result();
            $data['isi'] = $this->load->view('workshop/Typeapproval_v2', $this->data, true);
            $this->load->view('workshop/Layout', $data);
        }
    }

    public function perizinan_baru_2($id_perizinan="")
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->num_rows() > 0){
            $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan;
            if($this->WorkshopM->get_berkas_by_id($id_perizinan)->num_rows() > 0 ){
                redirect('izin_baru3/'.$id_perizinan);
            }
        }else{
            $data['title'] = 'BTKP - Perizinan Baru';
            $this->data['berkas']       = $this->WorkshopM->get_berkas_all()->result();
            $this->data['jenis_alat']   = $this->GeneralM->get_jenis_alat()->result();
            $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
            $data['isi'] = $this->load->view('workshop/Perizinanbaru_v2', $this->data, true);
            $this->load->view('workshop/Layout', $data);
        }
    }

    public function type_approval3($id_pengujian= null)
    {
        bukan_workshop_access();
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['data_pengujian'] = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row();
        $this->data['pengguna']     = $this->GeneralM->get_pengguna($id_pengguna)->row();
        $this->data['alat']         = $this->WorkshopM->get_all_alat($id_pengguna)->result();
        $data['title']              = 'BTKP - Type Approval';
        $data['isi']                = $this->load->view('workshop/Typeapproval_v3', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function perizinan_baru_3($id_perizinan = null)
    {
        $this->data['id_perizinan'] = $id_perizinan;
        $data['title']              = 'BTKP - Perizinan Baru';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->result();
        $data['isi']                = $this->load->view('workshop/Perizinanbaru_v3', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function perizinan_perpanjang($id_perizinan, $id_jenis_alat)
    {
        $data['title']  = 'BTKP - Perizinan Perpanjang';

        $this->data['berkas']       = $this->WorkshopM->get_berkas_all_by_id($id_perizinan, $id_jenis_alat)->result();
        $this->data['jenis_alat']   = $this->GeneralM->get_jenis_alat()->result();
        $this->data['berkas_perpanjang']       = $this->WorkshopM->get_berkas_all_p()->result();
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $data['isi']    = $this->load->view('workshop/Perizinanperpanjang_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function perizinan_perpanjang_tidak($id_perizinan, $id_jenis_alat)
    {
        $data['title']  = 'BTKP - Perizinan Perpanjang';

        $this->data['berkas']       = $this->WorkshopM->get_berkas_all_by_id($id_perizinan, $id_jenis_alat)->result();
        $this->data['jenis_alat']   = $this->GeneralM->get_jenis_alat()->result();
        $this->data['berkas_perpanjang']       = $this->WorkshopM->get_berkas_all_p()->result();
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $data['isi']    = $this->load->view('workshop/Perizinanperpanjang_tidak_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }


    public function profile()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Profile';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['profil'] = $this->GeneralM->get_pengguna($id_pengguna)->row();
        $data['isi'] = $this->load->view('workshop/profile_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function feedbackemail()
    {
        $this->load->view('user/feedbackemail_v');
    }

    // alamat
    public function get_kabupaten_kota(){
        $postData = $this->input->post();
        $data = $this->GeneralM->get_kabupaten_kota($postData);
        echo json_encode($data);
    }

    public function get_kecamatan(){
        $postData = $this->input->post();
        $data = $this->GeneralM->get_kecamatan($postData);
        echo json_encode($data);
    }

    public function get_kelurahan(){
        $postData = $this->input->post();
        $data = $this->GeneralM->get_kelurahan($postData);
        echo json_encode($data);
    }

    // post
    public function post_type_approval1(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telfon');
        $this->form_validation->set_rules('kelurahan_pt', 'Kelurahan Perusahaan', 'required');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan');
        $this->form_validation->set_rules('fax', 'Fax','required');
        // $this->form_validation->set_rules('jabatan_pemohon', 'Jabatan Pemohon','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $data = array(
                'id_pengguna'               => $this->session->userdata('id_pengguna'),
                'nama_perusahaan'           => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan'         => $this->input->post('alamat_perusahaan'),
                'no_tlp'                    => $this->input->post('no_tlp'),
                'id_kel_perusahaan'         => $this->input->post('kelurahan_pt'),
                'email_perusahaan'          => $this->input->post('email_perusahaan'),
                'fax'                       => $this->input->post('fax'),
                // 'jabatan'                   => $this->input->post('jabatan_pemohon')
            );
            if($insert_id = $this->WorkshopM->insert_perusahaan($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect('type_approval22');
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_pengujian(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_jenis_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk Alat', 'required');
        $this->form_validation->set_rules('negara_asal', 'Negara Pembuat','required');
        $this->form_validation->set_rules('pabrikan', 'Pabrikan Pembuat','required');
        $this->form_validation->set_rules('alamat_pabrikan', 'Alamat Pabrikan Pembuat','required');
        $this->form_validation->set_rules('kelurahan_pt', 'ID Kelurahan Pabrikan','required');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon','required');
        $this->form_validation->set_rules('email', 'Email Pabrikan','required');
        $this->form_validation->set_rules('catatan', 'Catatan','required');
        $this->form_validation->set_rules('fax_pabrikan', 'Fax Pabrikan','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $data_pengujian = array(
                'id_pengguna'       => $this->input->post('id_pengguna'),
                'id_jenis_alat'     => $this->input->post('id_jenis_alat'),
                'tipe'              => $this->input->post('tipe'),
                'merk'              => $this->input->post('merk'),
                'negara_asal'       => $this->input->post('negara_asal'),
                'pabrikan'          => $this->input->post('pabrikan'),
                'alamat_pabrikan'   => $this->input->post('alamat_pabrikan'),
                'id_kel_pabrikan'   => $this->input->post('kelurahan_pt'),
                'telepon'           => $this->input->post('no_tlp'),
                'email_pabrikan'    => $this->input->post('email'),
                'catatan'           => $this->input->post('catatan'),
                'fax_pabrikan'      => $this->input->post('fax_pabrikan'),
            );
            if($id_pengujian = $this->WorkshopM->insert_pengujian($data_pengujian)){
                $this->session->set_flashdata('sukses','Data berhasil disimpan');
                redirect('type_approval3/'.$id_pengujian);
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }

        }
    }

    public function post_izin_baru1(){
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');
        $this->form_validation->set_rules('kelurahan_pt', 'Kelurahan Perusahaan', 'required');
        $this->form_validation->set_rules('kelurahan_ws', 'Kelurahan Workshop','required');
        $this->form_validation->set_rules('alamat_workshop', 'Alamat Workshop','required');
        $this->form_validation->set_rules('akta_perusahaan', 'Akta Perusahaan','required');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan');
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan','required');
        $this->form_validation->set_rules('npwp', 'NPWP','required');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telfon');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $data = array(
                'id_pengguna'               => $this->session->userdata('id_pengguna'),
                'nama_perusahaan'           => $this->input->post('nama_perusahaan'),
                'alamat_perusahaan'         => $this->input->post('alamat_perusahaan'),
                'id_kel_perusahaan'         => $this->input->post('kelurahan_pt'),
                'alamat_workshop'           => $this->input->post('alamat_workshop'),
                'id_kel_workshop'           => $this->input->post('kelurahan_ws'),
                'akta_perusahaan'           => $this->input->post('akta_perusahaan'),
                'email_perusahaan'          => $this->input->post('email_perusahaan'),
                'nama_pimpinan'             => $this->input->post('nama_pimpinan'),
                'npwp'                      => $this->input->post('npwp'),
                'no_tlp'                    => $this->input->post('no_tlp')
            );
            if($insert_id = $this->WorkshopM->insert_perusahaan($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect('izin_baru22');
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_berkas(){
        $jumlah_file = $this->WorkshopM->get_berkas_all()->num_rows();
        $data_izin = array(
            'id_jenis_alat'         =>  $this->input->post('jenis_alat'),
            'id_pengguna'           =>  $this->session->userdata('id_pengguna'),
            'id_jenis_perizinan'    =>  $this->input->post('jenis_perizinan')
        );
        if($id_perizinan = $this->WorkshopM->insert_perizinan($data_izin)){
            for ($i=1; $i <= $jumlah_file; $i++){
                $input_name     = 'files'.$i;
                $id_berkas_perizinan = 'id_berkas_perizinan'.$i;
                $namaFile   = $this->upload_file($input_name);
                if($namaFile['result'] == 'success'){
                    $data = array(
                        'id_perizinan'          => $id_perizinan,
                        'id_berkas_perizinan'   => $this->input->post($id_berkas_perizinan),
                        'nama_file'             => $namaFile['file_name'],
                        'ukuran_berkas'         => $namaFile['file_size'],
                    );
                    if($this->WorkshopM->insert_detail_berkas($data)){
                        $this->session->set_flashdata('sukses','Data berhasil diupload');
                    }else{
                        $this->session->set_flashdata('error','Gagal diupload');
                    }
                }
            }
            redirect('izin_baru3/'.$id_perizinan);
        }
    }

    public function post_file_survey(){
        $id_perizinan = $this->input->post('id_perizinan');
        $namaFile   = $this->upload_file('file_hasil_survey');
        if($namaFile['result'] == 'success'){
            $data = array(
                'file_hasil_survey'             => $namaFile['file_name'],
            );
            if($this->WorkshopM->selesai($id_perizinan, $data)){
                $this->session->set_flashdata('sukses','Data berhasil diupload');
            }else{
                $this->session->set_flashdata('error','Gagal diupload');
            }
        }
        redirect_back();
    }

    public function post_berkas_perpanjang(){
        $satu           = $this->WorkshopM->get_berkas_all()->num_rows();
        $perpanjang     = $this->WorkshopM->get_berkas_all_p()->num_rows();

        $jumlah_file    = $perpanjang + $satu;
        $data_izin = array(
            'id_jenis_alat'         =>  $this->input->post('id_jenis_alat'),
            'id_pengguna'           =>  $this->session->userdata('id_pengguna'),
            'id_jenis_perizinan'    =>  $this->input->post('jenis_perizinan')
        );
        if($id_perizinan = $this->WorkshopM->insert_perizinan($data_izin)){
            for ($i=1; $i <= $jumlah_file; $i++){
                $input_name             = 'files'.$i;
                $id_berkas_perizinan    = 'id_berkas_perizinan'.$i;
                $namaFile   = $this->upload_file($input_name);
                if($namaFile['result'] == 'success'){
                    $data = array(
                        'id_perizinan'          => $id_perizinan,
                        'id_berkas_perizinan'   => $this->input->post($id_berkas_perizinan),
                        'nama_file'             => $namaFile['file_name'],
                        'ukuran_berkas'         => $namaFile['file_size'],
                    );
                    if($this->WorkshopM->insert_detail_berkas($data)){
                        $this->session->set_flashdata('sukses','Data berhasil diupload');
                    }else{
                        $this->session->set_flashdata('error','Data gagal diupload');
                    }
                }else{
                }
            }
            redirect('izin_baru3/'.$id_perizinan);
        }
    }

    public function post_berkas_perpanjang_tidak(){
        $satu           = $this->WorkshopM->get_berkas_all()->num_rows();
        $jumlah_file    = $this->WorkshopM->get_berkas_all_p()->num_rows() + $satu;
        $data_izin = array(
            'id_jenis_alat'         =>  $this->input->post('id_jenis_alat'),
            'id_pengguna'           =>  $this->session->userdata('id_pengguna'),
            'id_jenis_perizinan'    =>  $this->input->post('jenis_perizinan')
        );
        if($id_perizinan = $this->WorkshopM->insert_perizinan($data_izin)){
            for ($i=1; $i <= $satu; $i++){
                // $input_name     = 'files'.$i;
                $nama_file              = 'nama_file'.$i;
                $ukuran_berkas          = 'ukuran_berkas'.$i;
                $id_berkas_perizinan    = 'id_berkas_perizinan'.$i;

                $id_berkas_perizinan    = $this->input->post($id_berkas_perizinan);
                $nama_file              = $this->input->post($nama_file);
                $ukuran_berkas          = $this->input->post($ukuran_berkas);
                // $namaFile   = $this->upload_file($input_name);
                $data = array(
                    'id_perizinan'          => $id_perizinan,
                    'id_berkas_perizinan'   => $id_berkas_perizinan,
                    'nama_file'             => $nama_file,
                    'ukuran_berkas'         => $ukuran_berkas,
                );

                if($this->WorkshopM->insert_detail_berkas($data)){
                    $this->session->set_flashdata('sukses','Data berhasil diupload');
                }else{
                    $this->session->set_flashdata('error','Gagal diupload');
                }
            }
            // $perpanjang = $this->WorkshopM->get_berkas_all_p()->num_rows();
            for($j=$i; $j<=$jumlah_file; $j++){
                $input_name     = 'files'.$j;
                $id_berkas_perizinan = 'id_berkas_perizinan'.$j;
                $namaFile   = $this->upload_file($input_name);
                if($namaFile['result'] == 'success'){
                    $data = array(
                        'id_perizinan'          => $id_perizinan,
                        'id_berkas_perizinan'   => $this->input->post($id_berkas_perizinan),
                        'nama_file'             => $namaFile['file_name'],
                        'ukuran_berkas'         => $namaFile['file_size'],
                    );
                    if($this->WorkshopM->insert_detail_berkas($data)){
                        $this->session->set_flashdata('sukses','Data berhasil diupload');
                    }else{
                        $this->session->set_flashdata('error','Gagal diupload 2');
                    }
                }
            }
            $this->session->set_flashdata('sukses','Data berhasil diupload');
            redirect('izin_baru3/'.$id_perizinan);
        }
    }

    public function konfirmasi_pembayaran(){
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else {
            $upload = $this->upload_file('foto_bukti_trf');
            if($upload['result'] == 'success'){
                $data = array(
                    'nama_bank'      => $this->input->post('nama_bank'),
                    'atas_nama'      => $this->input->post('atas_nama'),
                    'foto_bukti_trf' => $upload['file_name'],
                );
                $id_perizinan = $this->input->post('id_perizinan');
                if($this->WorkshopM->selesai($id_perizinan, $data)) {
                    $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil diunggah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah');
                redirect_back();
            }
        }
    }

    public function konfirmasi_pembayaran_1(){
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else {
            $upload = $this->upload_file('foto_bukti_trf');
            if($upload['result'] == 'success'){
                $data = array(
                    'nama_bank_1'      => $this->input->post('nama_bank'),
                    'atas_nama_1'      => $this->input->post('atas_nama'),
                    'foto_bukti_trf_1' => $upload['file_name'],
                );
                $id_pengujian = $this->input->post('id_pengujian');
                if($this->WorkshopM->selesai_p($id_pengujian, $data)) {
                    $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil diunggah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah 1');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah 2');
                redirect_back();
            }
        }
    }

    public function konfirmasi_pembayaran_2(){
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else {
            $upload = $this->upload_file('foto_bukti_trf');
            if($upload['result'] == 'success'){
                $data = array(
                    'nama_bank_2'      => $this->input->post('nama_bank'),
                    'atas_nama_2'      => $this->input->post('atas_nama'),
                    'foto_bukti_trf_2' => $upload['file_name'],
                );
                $id_pengujian = $this->input->post('id_pengujian');
                if($this->WorkshopM->selesai_p($id_pengujian, $data)) {
                    $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil diunggah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah 1');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah 2');
                redirect_back();
            }
        }
    }

    public function post_update_password(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|matches[konfirmasi_password_baru]');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','konfirmasi kata sandi baru tidak cocok');
            redirect_back();
        }else{
            $email_pengguna     = $this->input->post('email_pengguna');
            $password           = $this->input->post('password_lama');
            $this->db->select('*');
            $this->db->from('pengguna P');
            $this->db->where('email_pengguna', $email_pengguna);
            $this->db->where('password',  md5($password));
            $user = $this->db->get();

            if($user->num_rows() > 0){
                $data_update_password = array(
                    'password' => md5($this->input->post('password_baru')),
                );
                $id_pengguna = $this->input->post('id_pengguna');
                if($this->GeneralM->update_pengguna($id_pengguna, $data_update_password)){
                    $this->session->set_flashdata('sukses', 'Password berhasil diubah');
                    redirect_back();
                }else{
                    $this->session->set_flashdata('error', 'Password tidak berhasil diubah');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error','Password lama tidak sesuai');
                redirect_back();
            }

        }
    }

    public function post_update_perusahaan(){
        $this->form_validation->set_rules('id_perusahaan', 'ID Perusahaan', 'required');
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan','required');
        $this->form_validation->set_rules('no_tlp', 'No Telpon Perusahaan','required');
        $this->form_validation->set_rules('alamat_perusahaan_p', 'Alamat Perusahaan');
        $this->form_validation->set_rules('kelurahan_pt', 'Kelurahan Perusahaan');
        $this->form_validation->set_rules('alamat_workshop_p', 'Alamat Workshop');
        $this->form_validation->set_rules('kelurahan_ws', 'Kelurahan Workshhop');
        $this->form_validation->set_rules('id_kel_workshop', 'Kelurahan Workshhop');
        $this->form_validation->set_rules('id_kel_perusahaan', 'Kelurahan Perusahaan');

        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data tidak berhasil disimpan, Cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            if($this->input->post('kelurahan_pt') == 0 || $this->input->post('kelurahan_pt') == '0'){
                $kelurahan_pt = $this->input->post('id_kel_perusahaan');
            }else{
                $kelurahan_pt = $this->input->post('kelurahan_pt');
            }

            if($this->input->post('kelurahan_ws')  == 0 || $this->input->post('kelurahan_ws') == '0'){
                $kelurahan_ws = $this->input->post('id_kel_workshop');
            }else{
                $kelurahan_ws = $this->input->post('kelurahan_ws') ;
            }
            $data = array(
                'email_perusahaan'      => $this->input->post('email_perusahaan'),
                'no_tlp'                => $this->input->post('no_tlp'),
                'alamat_perusahaan'     => $this->input->post('alamat_perusahaan_p'),
                'id_kel_perusahaan'     => $kelurahan_pt,
                'alamat_workshop'       => $this->input->post('alamat_workshop_p'),
                'id_kel_workshop'       => $kelurahan_ws,
            );
            $id_perusahaan = $this->input->post('id_perusahaan');
            if($this->GeneralM->update_perusahaan($id_perusahaan, $data)){
                $this->session->set_flashdata('sukses', 'Data berhasil diubah');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data tidak berhasil diubah, Cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function upload_file($input_name){
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx|png';
        $config['max_size'] = '5000'; // max_size in kb
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if(!empty($_FILES[$input_name]['name'])){
            if($this->upload->do_upload($input_name)){
                $gbr = $this->upload->data();
                $return = array('result' => 'success', 'file_name' => $gbr['file_name'], 'file_size' => $gbr['file_size'], 'error' => '');
                return $return;
            }
        }else{
            $return = array('result' => 'Error', 'file_name' => 'no file', 'error' => '');
            return $return;
            echo "Data yang diupload kosong";
        }
    }

    public function selesai($id_perizinan){
        $data = array('status_pengajuan' => 'selesai');
        if($this->WorkshopM->selesai($id_perizinan, $data)){
            $this->session->set_flashdata('sukses', 'Permohonan perizinan berhasil disimpan');
            redirect('workshop');
        }else{
            $this->session->set_flashdata('error', 'Gagal menyelesaikan Permohonan perizinan');
            redirect_back();
        }
    }

    public function selesai_p($id_pengujian){
        $data = array('status_pengajuan' => 'selesai');
        if($this->WorkshopM->selesai_p($id_pengujian, $data)){
            $this->session->set_flashdata('sukses', 'Permohonan Pengujian dan sertifikasi berhasil disimpan');
            redirect('workshop');
        }else{
            $this->session->set_flashdata('error', 'Gagal menyelesaikan Permohonan Pengujian dan sertifikasi');
            redirect_back();
        }
    }
    public function cetak_produk($id_perizinan){
        $this->data['perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $this->load->view('workshop/invoice_v',$this->data);
    }

    public function cetak_invoice_ujian($id_pengujian){
        $this->data['pengujian'] = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row();
        $this->load->view('workshop/invoice_v_pengujian',$this->data);
    }

    public function cetak_invoice_ujian2($id_pengujian){
        $this->data['pengujian'] = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row();
        $this->load->view('workshop/invoice_v_pengujian2',$this->data);
    }

    public function print_surat($id_perizinan){
        $this->data['perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $this->load->view('workshop/print_surat',$this->data);
    }

    public function print_sertifikat_pengujian($id_pengujian){
        $this->data['pengujian'] = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row();
        $this->load->view('workshop/print_surat_pengujian',$this->data);
    }

    public function print_label($id_pengujian){
        $this->data['pengujian'] = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row();
        $this->load->view('workshop/print_label',$this->data);
    }

    public function cetak_ins($id_inspeksi){
        $this->data['inspeksi'] = $this->WorkshopM->get_inspeksi_all_by_id_inspeksi($id_inspeksi)->row();
        $this->load->view('workshop/print_ins',$this->data);
    }

    // Reinspeksi
    public function data_reinspeksi()
    {
        workshop_access2();
        $id_pengguna   = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Data Reinspeksi';
        $this->data['alat']     = $this->WorkshopM->get_all_alat($id_pengguna)->result();
        $this->data['data_inspeksi']     = $this->WorkshopM->get_inspeksi_by_id_pengguna($id_pengguna)->result();
        $data['isi'] = $this->load->view('workshop/reinspeksi/datareinspeksi_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function pilihworkshop1()
    {
        workshop_access2();
        $data['title'] = 'BTKP - Pilih Workshop';
        $data['isi'] = $this->load->view('workshop/reinspeksi/pilihworkshop1_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }
    public function pilihworkshop2()
    {
        workshop_access2();
        $data['title'] = 'BTKP - Pilih Workshop';
        $data['isi'] = $this->load->view('workshop/reinspeksi/pilihworkshop2_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }
    public function pilihworkshop3()
    {
        workshop_access2();
        $data['title'] = 'BTKP - Pilih Workshop';
        $data['isi'] = $this->load->view('workshop/reinspeksi/pilihworkshop3_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function post_inspeksi(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('nama_kapal', 'Nama Kapal', 'required');
        $this->form_validation->set_rules('flag', 'Flag', 'required');
        $this->form_validation->set_rules('imo', 'Imo number', 'required');
        $this->form_validation->set_rules('telp_kapal', 'Telepon Kapal','required');
        $this->form_validation->set_rules('id_jenis_alat', 'Alat','required');
        $this->form_validation->set_rules('jumlah_alat', 'Jumlah alat','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $upload = $this->upload_file('file_permohonan');
            if($upload['result'] == 'success'){
                $data_inspeksi = array(
                    'id_pengguna'       => $this->input->post('id_pengguna'),
                    'nama_kapal'        => $this->input->post('nama_kapal'),
                    'flag'              => $this->input->post('flag'),
                    'imo'               => $this->input->post('imo'),
                    'telp_kapal'        => $this->input->post('telp_kapal'),
                    'id_jenis_alat'     => $this->input->post('id_jenis_alat'),
                    'jumlah_alat'       => $this->input->post('jumlah_alat'),
                    'file_permohonan'   => $upload['file_name'],
                );

                if($id_pengujian = $this->WorkshopM->insert_inspeksi($data_inspeksi)){
                    $this->session->set_flashdata('sukses','Data berhasil disimpan');
                    redirect_back();
                }else{
                    $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_proses_reinspeksi(){
        $this->form_validation->set_rules('id_inspeksi', 'ID Inspeksi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');

        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $upload = $this->upload_file('file_hasil_survey');
            if($upload['result'] == 'success'){
                $data_inspeksi = array(
                    'status_reinspeksi' => $this->input->post('status'),
                    'catatan'           => $this->input->post('catatan'),
                    'file_hasil_survey' => $upload['file_name'],
                );

                $id_inspeksi = $this->input->post('id_inspeksi');

                if($id_pengujian = $this->WorkshopM->selesai_i($id_inspeksi, $data_inspeksi)){
                    $this->session->set_flashdata('sukses','Data berhasil disimpan');
                    redirect_back();
                }else{
                    $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }
    public function konfirmasi_ins(){
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else {
            $upload = $this->upload_file('foto_bukti_trf');
            if($upload['result'] == 'success'){
                $data = array(
                    'nama_bank'      => $this->input->post('nama_bank'),
                    'atas_nama'      => $this->input->post('atas_nama'),
                    'foto_bukti_trf' => $upload['file_name'],
                );
                $id_inspeksi = $this->input->post('id_inspeksi');
                if($this->WorkshopM->selesai_i($id_inspeksi, $data)) {
                    $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil diunggah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error', 'Konfirmasi pembayaran tidak berhasil diunggah');
                redirect_back();
            }
        }
    }
}