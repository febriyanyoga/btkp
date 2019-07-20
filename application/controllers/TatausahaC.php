<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class TatausahaC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        tu_access();
        $this->load->model(['LoginM', 'TatausahaM', 'WorkshopM', 'GeneralM']);
    }

    public function index()
    {
        $kode_billing = $this->checkingKodeBilling();
        // print_r($kode_billing);
        if(count($kode_billing) != 0){
            foreach ($kode_billing as $kode=>$value) {
                $this->cekKodeBilling($value);
                // print_r($value);
            }
        }
        // die();
        $data['title'] = 'BTKP - Home';
        $this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['user'] = $this->GeneralM->get_jumlah_workshop()->result();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['perizinan'] = $this->GeneralM->get_jumlah_perizinan()->result();
        $this->data['jumlah_kapal'] = $this->GeneralM->get_jumlah_kapal()->num_rows();
        $this->data['kapal'] = $this->GeneralM->get_jumlah_kapal()->result();
        $this->data['jumlah_pengujian'] = $this->GeneralM->get_jumlah_pengujian()->num_rows();
        $this->data['jumlah_inspeksi'] = $this->GeneralM->get_jumlah_inspeksi()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
        $this->data['produk'] = $this->GeneralM->get_jumlah_produk()->result();
        $data['isi'] = $this->load->view('admintu/dashboard_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function perizinan()
    {
        $data['title'] = 'BTKP - Data Perizinan';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['perizinan'] = $this->TatausahaM->get_all_perizinan_by_id_pengguna()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['izin_tolak']   = $this->WorkshopM->get_perizinan_ditolak($id_pengguna)->result();
        $data['isi'] = $this->load->view('admintu/dataperizinan_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function verifikasi($id_perizinan)
    {
        $data['title'] = 'BTKP - verifikasi';
        $this->data['id_perizinan'] = $id_perizinan;
        $this->data['detail_perizinan'] = $this->TatausahaM->get_all_perizinan_by_id($id_perizinan)->result();
        $data['isi'] = $this->load->view('admintu/verifikasi_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function profile()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Profil';
        $this->data['provinsi'] = $this->GeneralM->get_all_provinsi();
        $this->data['profil'] = $this->GeneralM->get_pengguna_only($id_pengguna)->row();
        $data['isi'] = $this->load->view('admintu/profile_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    // post
    public function post_update_password()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|matches[konfirmasi_password_baru]');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'konfirmasi kata sandi baru tidak cocok');
            redirect_back();
        } else {
            $email_pengguna = $this->input->post('email_pengguna');
            $password = $this->input->post('password_lama');
            $this->db->select('*');
            $this->db->from('pengguna P');
            $this->db->where('email_pengguna', $email_pengguna);
            $this->db->where('password', md5($password));
            $user = $this->db->get();

            if ($user->num_rows() > 0) {
                $data_update_password = array(
                    'password' => md5($this->input->post('password_baru')),
                );
                $id_pengguna = $this->input->post('id_pengguna');
                if ($this->GeneralM->update_pengguna($id_pengguna, $data_update_password)) {
                    $this->session->set_flashdata('sukses', 'Password berhasil diubah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Password tidak berhasil diubah');
                    redirect_back();
                }
            } else {
                $this->session->set_flashdata('error', 'Password lama tidak sesuai');
                redirect_back();
            }
        }
    }

    public function persetujuan_tolak()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $keterangan = $this->input->post('keterangan');
            $ket = '';
            $i = 1;
            foreach ($keterangan as $ket1) {
                if ($ket1 != '') {
                    $nama = $this->TatausahaM->get_berkas_by_id2($i)->row()->nama_berkas;
                    $ket .= $nama.' : '.$ket1.'<br>';
                }
                ++$i;
            }

            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'id_perizinan' => $this->input->post('id_perizinan'),
                'keterangan' => $ket,
                'status' => $this->input->post('status'),
            );

            if ($this->GeneralM->insert_persetujuan($data)) {
                // $data_email = array(
                //     'nama'                  => $this->input->post('nama_pengguna'),
                //     'nomor'                 => $this->input->post('nomor'),
                // );
                // $subject    = 'Pemberitahuan';
                // $to         = $this->input->post('email_pengguna');
                // $isi        = $this->load->view('email/Notifikasi_email', $data_email, TRUE);

                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Mohon maaf. . .',
                    'isi'                   => '<b>Ditolak</b> oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melihat detail permohonan.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_verifikasi', $data_email, TRUE);

                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                $this->session->set_flashdata('sukses', 'Verifikasi berhasil');
                redirect('perizinan');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function persetujuan()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_pengguna'   => $this->input->post('id_pengguna'),
                'id_perizinan'  => $this->input->post('id_perizinan'),
                'keterangan'    => $keterangan,
                'status'        => $this->input->post('status'),
            );

            if ($this->GeneralM->insert_persetujuan($data)) {
                if($this->input->post('status') == 'diterima'){
                    $data_email = array(
                        'nama'                  => $this->input->post('nama_pengguna'),
                        'nomor'                 => $this->input->post('nomor'),
                    );
                    $subject    = 'Pemberitahuan';
                    $to         = $this->input->post('email_pengguna');
                    $isi        = $this->load->view('email/Notifikasi_email', $data_email, TRUE);

                    $this->GeneralM->send_email($subject, $to, $isi);
                    $this->GeneralM->send_email_2($subject, $to, $isi);
                    $this->session->set_flashdata('sukses', 'Permohonan di proses ketahap selanjutnya.');
                }else{
                    $this->session->set_flashdata('sukses', 'Anda telah menolak permohonan ini.');
                }
                redirect('perizinan');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function verifikasi_1_tolak()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Anda tidak dapat menolak permohonan ini, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'id_pengujian' => $this->input->post('id_pengujian'),
                'keterangan' => $keterangan,
                'status' => $this->input->post('status'),
            );

            $data_email = array(
                'nama'                  => $this->input->post('nama_pengguna'),
                'nomor'                 => $this->input->post('nomor'),
                'salam'                 => 'Mohon maaf. . .',
                'isi'                   => '<b>Belum berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP) Silahkan masuk ke aplikasi untuk melihat detail permohonan.<br> Terimakasih.',
            );
            $subject    = 'Pemberitahuan';
            $to         = $this->input->post('email_pengguna');
            $isi        = $this->load->view('email/Notifikasi_verifikasi', $data_email, TRUE);

            if ($this->GeneralM->insert_persetujuan_pengujian($data)) {
                 // kirim email
                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                // end kirim email
                $this->session->set_flashdata('sukses', 'Anda telah menolak permohonan  ini.');
                redirect('pengujian');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Anda tidak dapat menolak permohonan ini.');
                redirect_back();
            }
        }
    }

    public function verifikasi_1_terima()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_rules('kode_billing', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing', 'Masa Berlaku Billing', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Permohonan tidak dapat di proses ketahap selanjutnya, cek kembali data yang anda masukkan.');
            redirect_back();
        } else {
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'id_pengujian' => $this->input->post('id_pengujian'),
                'keterangan' => $keterangan,
                'status' => $this->input->post('status'),
            );

            $id_pengujian = $this->input->post('id_pengujian');
            $data_billing = array(
                'kode_billing_1' => $this->input->post('kode_billing'),
                'id_bank_btkp_1' => $this->input->post('id_bank_btkp'),
                'jumlah_tagihan_1' => $this->input->post('jumlah_tagihan'),
                'masa_berlaku_billing_1' => $this->input->post('masa_berlaku_billing'),
            );

            $data_email = array(
                'nama'                  => $this->input->post('nama_pengguna'),
                'nomor'                 => $this->input->post('nomor'),
                'salam'                 => 'Selamat . . .',
                'isi'                   => '<b>Telah berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melakukan tahapan selanjutnya yaitu pembayaran dan konfirmasi pembayaran.<br> Terimakasih.',
            );
            $subject    = 'Pemberitahuan';
            $to         = $this->input->post('email_pengguna');
            $isi        = $this->load->view('email/Notifikasi_verifikasi', $data_email, TRUE);

            if ($this->GeneralM->insert_persetujuan_pengujian($data)) {
                $this->TatausahaM->insert_billing_ujian($id_pengujian, $data_billing);
                $this->session->set_flashdata('sukses', 'Permohonan di proses ketahap selanjutnya.');
                 // kirim email
                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                // end kirim email
                redirect('pengujian');
            } else {
                $this->session->set_flashdata('error', 'Maaf, Permohonan tidak dapat di proses ketahap selanjutnya.');
                redirect_back();
            }
        }
    }

    public function kode_billing_2(){
        $this->form_validation->set_rules('kode_billing_2', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp_2', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan_2', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing_2', 'Masa Berlaku Billing', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Tagihan tidak berhasil dimasukkan, cek kembali data yang anda masukkan');
            redirect_back();
        }else{

            $id_pengujian = $this->input->post('id_pengujian');
            $data_billing = array(
                'kode_billing_2'          => $this->input->post('kode_billing_2'),
                'id_bank_btkp_2'          => $this->input->post('id_bank_btkp_2'),
                'jumlah_tagihan_2'        => $this->input->post('jumlah_tagihan_2'),
                'masa_berlaku_billing_2'  => $this->input->post('masa_berlaku_billing_2'),
            );

            if ($this->TatausahaM->insert_billing_ujian($id_pengujian, $data_billing)) {
                $this->session->set_flashdata('sukses', 'Tagihan berhasil dimasukkan.');
                redirect('pengujian');
            } else {
                $this->session->set_flashdata('error', 'Tagihan tidak berhasil dimasukkan, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function kode_billing_inspeksi(){
        $this->form_validation->set_rules('kode_billing', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing', 'Masa Berlaku Billing', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
            redirect_back();
        }else{

            $id_inspeksi = $this->input->post('id_inspeksi');
            $data_billing = array(
                'kode_billing'          => $this->input->post('kode_billing'),
                'id_bank_btkp'          => $this->input->post('id_bank_btkp'),
                'jumlah_tagihan'        => $this->input->post('jumlah_tagihan'),
                'masa_berlaku_billing'  => $this->input->post('masa_berlaku_billing'),
            );

            if ($this->WorkshopM->selesai_i($id_inspeksi, $data_billing)) {
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                redirect('reinspeksi');
            } else {
                $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function validasi_1(){
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian','required');
        $this->form_validation->set_rules('status_pembayaran_1', 'Status Pembayaran','required');
        $this->form_validation->set_rules('ket_pembayaran_1', 'keterangan Pembayaran');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Validasi pembayaran gagal, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $id_pengujian           = $this->input->post('id_pengujian');
            $status_pembayaran_1    = $this->input->post('status_pembayaran_1');
            if($status_pembayaran_1 == 'paid'){
                 //email notifikasi
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing_1'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Selamat . . .',
                    'isi'                   => '<b>Telah berhasil</b> di verifikasi dan diterbitkan oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melakukan tahapan selanjutnya.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'status_pembayaran_1' => $status_pembayaran_1,
                    'ket_pembayaran_1'    => '',
                );
            }elseif ($status_pembayaran_1 == 'unpaid'){
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing_1'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Mohon maaf. . .',
                    'isi'                   => '<b>Belum berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP) Silahkan masuk ke aplikasi untuk melakukan konfirmasi ulang.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'status_pembayaran_1'   => $status_pembayaran_1,
                    'ket_pembayaran_1'      => $this->input->post('ket_pembayaran_1'),
                    'foto_bukti_trf_1'      => '',
                );
            }
            if ($this->WorkshopM->selesai_p($id_pengujian, $data)) {
                if($status_pembayaran_1 == 'paid'){
                    $this->session->set_flashdata('sukses', 'Pembayaran sukses, silahkan lakukan pengujian lab.');
                }else{
                    $this->session->set_flashdata('sukses', 'Anda menolak bukti pembayaran.');
                }
                  // kirim email
                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                // end kirim email
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Validasi pembayaran gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function post_kode_billing()
    {
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan', 'required');
        $this->form_validation->set_rules('kode_billing', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing', 'Masa Berlaku Billing', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $id_perizinan = $this->input->post('id_perizinan');
            $data = array(
                'kode_billing' => $this->input->post('kode_billing'),
                'id_bank_btkp' => $this->input->post('id_bank_btkp'),
                'jumlah_tagihan' => $this->input->post('jumlah_tagihan'),
                'masa_berlaku_billing' => $this->input->post('masa_berlaku_billing'),
            );

            if ($this->TatausahaM->insert_billing($id_perizinan, $data)) {
                $this->session->set_flashdata('sukses', 'Tagihan berhasil di input');
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Tagihan tidak berhasil di input, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function validasi_2(){
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian','required');
        $this->form_validation->set_rules('status_pembayaran_2', 'Status Pembayaran','required');
        if($this->input->post('status_pembayaran_2') != 'paid'){
            // $this->form_validation->set_rules('tgl_terbit', 'Tanggal Terbit','required');
            // $this->form_validation->set_rules('tgl_expired', 'Tanggal Expired','required');
            // $this->form_validation->set_rules('no_awal', 'No Label Awal','required');
            // $this->form_validation->set_rules('no_akhir', 'No Label Akhir','required');
            $this->form_validation->set_rules('ket_pembayaran_2', 'Keterangan Pembayaran','required');
        }

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Validasi Gagal, cek kembali data yang anda masukkan.');
            redirect_back();
        }else{
            $id_pengujian = $this->input->post('id_pengujian');
            $th = date('Y');//th sekarang
            $tgl = $th.'12'.'31'; //tgl bandingin
            if($this->TatausahaM->get_last_ujian_terbit($tgl)->num_rows() > 0){
                $nomor_sblm = $this->TatausahaM->get_last_ujian_terbit($tgl)->row()->no_spk;
                $no_spk = $nomor_sblm+1;
            }else{
                $no_spk = 1;
            }

            $kode_alat = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row()->kode_alat;
            if($no_spk < 10){
                $no_spk = '000'.$no_spk;
            }elseif($no_spk <= 100){
                $no_spk ='00'.$no_spk;
            }elseif($no_spk < 1000){
                $no_spk = '0'.$no_spk;
            }elseif($no_spk >= 1000) {
                $no_spk = $no_spk;
            }

            // $no_awal    = $this->input->post('no_awal');
            // $no_akhir   = $this->input->post('no_akhir');

            // if($no_awal < 10){
            //     $no_awal = '000'.$no_awal;
            // }elseif($no_awal <= 100){
            //     $no_awal ='00'.$no_spk;
            // }elseif($no_awal < 1000){
            //     $no_awal = '0'.$no_awal;
            // }elseif($no_awal >= 1000) {
            //     $no_awal = $no_awal;
            // }

            // if($no_akhir < 10){
            //     $no_akhir = '000'.$no_akhir;
            // }elseif($no_akhir <= 100){
            //     $no_akhir ='00'.$no_akhir;
            // }elseif($no_akhir < 1000){
            //     $no_akhir = '0'.$no_akhir;
            // }elseif($no_akhir >= 1000) {
            //     $no_akhir = $no_akhir;
            // }

            $barcode = $kode_alat.$no_spk.date('y');
            $status_pembayaran_2    = $this->input->post('status_pembayaran_2');
            $ket_pembayaran_2       = $this->input->post('ket_pembayaran_2');

            if($status_pembayaran_2 == 'paid'){

                //email notifikasi
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing_2'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Selamat . . .',
                    'isi'                   => '<b>Telah berhasil</b> di verifikasi dan diterbitkan oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melihat detail permohonandan lainnya.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'status_pembayaran_2'   => $status_pembayaran_2, 
                    'kode_barcode'          => $barcode, 
                    'no_spk'                => $no_spk, 
                    // 'tgl_terbit'            => $this->input->post('tgl_terbit'), 
                    // 'tgl_expired'           => $this->input->post('tgl_expired'), 
                    // 'no_awal'               => $no_awal, 
                    // 'no_akhir'              => $no_akhir, 
                );
            }else{
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing_2'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Mohon maaf. . .',
                    'isi'                   => '<b>Belum berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP) Silahkan masuk ke aplikasi untuk melakukan konfirmasi ulang.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'status_pembayaran_2'   => $status_pembayaran_2, 
                    'kode_barcode'          => '', 
                    'no_spk'                => '', 
                    // 'tgl_terbit'            => '', 
                    // 'tgl_expired'           => '', 
                    // 'no_awal'               => '', 
                    // 'no_akhir'              => '', 
                    'foto_bukti_trf_2'      => '', 
                    'ket_pembayaran_2'      => $ket_pembayaran_2, 
                );
            }

            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './application/cache/'; //string, the default is application/cache/
            $config['errorlog']     = './application/logs/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name=$barcode.'.png'; //buat name dari qr code sesuai dengan nim
            $params['data'] = $barcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            if($this->WorkshopM->selesai_p($id_pengujian, $data)){
                if($status_pembayaran_2 == 'paid'){
                    $this->session->set_flashdata('sukses', 'Sertifikat telah diterbitkan.');
                }else{
                    $this->session->set_flashdata('sukses', 'Anda menolak bukti pembayaran.');
                }
                    // kirim email
                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                // end kirim email
                redirect_back();
            }else{
                $this->session->set_flashdata('error', 'Sertifikat tidak berhasil diterbitkan, cek kembali data yang anda masukkan.');
                redirect_back();
            }
        }
    }

    public function penerbitan(){
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian','required');
        $this->form_validation->set_rules('tgl_terbit', 'Tanggal Terbit','required');
        $this->form_validation->set_rules('tgl_expired', 'Tanggal Expired','required');
        $this->form_validation->set_rules('no_awal', 'No Label Awal','required');
        $this->form_validation->set_rules('no_akhir', 'No Label Akhir','required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Sertifikat tidak berhasil diterbitkan, cek kembali data yang anda masukkan.');
            redirect_back();
        }else{

            $no_awal    = $this->input->post('no_awal');
            $no_akhir   = $this->input->post('no_akhir');

            if($no_awal < 10){
                $no_awal = '000'.$no_awal;
            }elseif($no_awal <= 100){
                $no_awal ='00'.$no_spk;
            }elseif($no_awal < 1000){
                $no_awal = '0'.$no_awal;
            }elseif($no_awal >= 1000) {
                $no_awal = $no_awal;
            }

            if($no_akhir < 10){
                $no_akhir = '000'.$no_akhir;
            }elseif($no_akhir <= 100){
                $no_akhir ='00'.$no_akhir;
            }elseif($no_akhir < 1000){
                $no_akhir = '0'.$no_akhir;
            }elseif($no_akhir >= 1000) {
                $no_akhir = $no_akhir;
            }
            $id_pengujian = $this->input->post('id_pengujian');

            $data = array(
                'tgl_terbit'            => $this->input->post('tgl_terbit'), 
                'tgl_expired'           => $this->input->post('tgl_expired'), 
                'no_awal'               => $no_awal, 
                'no_akhir'              => $no_akhir, 
            );

            if($this->WorkshopM->selesai_p($id_pengujian, $data)){
                $this->session->set_flashdata('sukses', 'Sertifikat telah diterbitkan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error', 'Sertifikat tidak berhasil diterbitkan, cek kembali data yang anda masukkan.');
                redirect_back();
            }
        }
    }

    public function post_penerbitan()
    {
        // $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran','required');
        // $this->form_validation->set_rules('nomor_spk', 'Nomor SPK', 'required');
        $this->form_validation->set_rules('tgl_terbit', 'Tanggal Terbit' , 'required');
        $this->form_validation->set_rules('tgl_expired', 'Tanggal Expired', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data Penerbitan tidak berhasil dimasukkan, cek kembali data yang anda masukkan.');
            redirect_back();
        } else {
            $id_perizinan = $this->input->post('id_perizinan');
            $th = date('Y'); //th sekarang
            $tgl = $th.'12'.'31'; //tgl bandingin

            if ($this->TatausahaM->get_last_izin_terbit($tgl)->num_rows() > 0) {
                $nomor_sblm = $this->TatausahaM->get_last_izin_terbit($tgl)->row()->no_spk;
                $no_spk = $nomor_sblm + 1;
            } else {
                $no_spk = 1;
            }

            $kode_alat = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row()->kode_alat;
            if ($no_spk < 10) {
                $no_spk = '000'.$no_spk;
            } elseif ($no_spk >= 10) {
                $no_spk = '00'.$no_spk;
            } elseif ($no_spk >= 100) {
                $no_spk = '0'.$no_spk;
            } elseif ($no_spk >= 1000) {
                $no_spk = $no_spk;
            }
            $barcode = $kode_alat.$no_spk.date('y');

            // if($this->input->post('status_pembayaran') == 'unpaid'){
            //     //email notifikasi
            //     $data_email = array(
            //         'nama'                  => $this->input->post('nama_pengguna'),
            //         'kode_billing'          => $this->input->post('kode_billing'),
            //         'nomor'                 => $this->input->post('nomor'),
            //         'salam'                 => 'Mohon maaf. . .',
            //         'isi'                   => '<b>Belum berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP) Silahkan masuk ke aplikasi untuk melakukan konfirmasi ulang.<br> Terimakasih.',
            //     );
            //     $subject    = 'Pemberitahuan';
            //     $to         = $this->input->post('email_pengguna');
            //     $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

            //     $data = array(
            //         'status_pembayaran' => $this->input->post('status_pembayaran'),
            //         'no_spk'            => $no_spk,
            //         'kode_barcode'      => $barcode,
            //         'tgl_terbit'        => $this->input->post('tgl_terbit'),
            //         'tgl_expired'       => $this->input->post('tgl_expired'),
            //         'ket_pembayaran'    => $this->input->post('ket_pembayaran'),
            //         'foto_bukti_trf'    => '',
            //     );  
            // }elseif($this->input->post('status_pembayaran') == 'paid'){
                //email notifikasi
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Selamat . . .',
                    'isi'                   => '<b>Telah berhasil</b> di verifikasi dan diterbitkan oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melihat mencetak sertifikat dan lainnya.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'no_spk'            => $no_spk,
                    'kode_barcode'      => $barcode,
                    'tgl_terbit'        => $this->input->post('tgl_terbit'),
                    'tgl_expired'       => $this->input->post('tgl_expired'),
                );
            // }


            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $config['cacheable'] = true; //boolean, the default is true
            $config['cachedir'] = './application/cache/'; //string, the default is application/cache/
            $config['errorlog'] = './application/logs/'; //string, the default is application/logs/
            $config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
            $config['quality'] = true; //boolean, the default is true
            $config['size'] = '1024'; //interger, the default is 1024
            $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name = $barcode.'.png'; //buat name dari qr code sesuai dengan nim
            $params['data'] = $barcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            if ($this->WorkshopM->selesai($id_perizinan, $data)) {
                if($this->input->post('status_pembayaran') == 'unpaid'){
                    $this->session->set_flashdata('sukses', 'Anda menolak bukti pembayaran.');
                }else{
                    $this->session->set_flashdata('sukses', 'Data Penerbitan berhasil dimasukkan, SPK telah diterbitkan.');
                }
                // kirim email
                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                // end kirim email
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Data Penerbitan tidak berhasil dimasukkan, cek kembali data yang anda masukkan.');
                redirect_back();
            }
        }
    }

    public function reinspeksi()
    {
        $data['title'] = 'BTKP - Reinspeksi';
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['data_inspeksi']     = $this->WorkshopM->get_inspeksi_all()->result();
        $data['isi'] = $this->load->view('admintu/reinspeksi/datareinspeksi_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function verifikasiawalinspeksi($id_inspeksi)
    {
        $data['title'] = 'BTKP - reinspeksion';
        $this->data['ins']     = $this->WorkshopM->get_inspeksi_all_by_id_inspeksi($id_inspeksi)->row();
        $data['isi'] = $this->load->view('admintu/reinspeksi/verifikasiawal_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function pengujian()
    {
        $data['title'] = 'BTKP - Sertifikasi';
        $this->data['pengujian'] = $this->TatausahaM->get_all_pengujian()->result();
        $this->data['pengujian_tolak'] = $this->TatausahaM->get_all_pengujian_with_status()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $data['isi'] = $this->load->view('admintu/pengujian/pengujian_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function verifikasiawal_pengujian($id_pengujian)
    {
        $data['title'] = 'BTKP - Verifikasi Permohonan Perizinan';
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['pengujian'] = $this->TatausahaM->get_pengujian_by_id($id_pengujian)->row();
        $data['isi'] = $this->load->view('admintu/pengujian/verifikasiawal_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function hasil_uji()
    {
        $upload = $this->upload_file('hasil_pengujian');
        if ($upload['result'] == 'success') {
            $data = array(
                'file_hasil_pengujian' => $upload['file_name'],
            );
            $id_pengujian = $this->input->post('id_pengujian');
            if ($this->WorkshopM->selesai_p($id_pengujian, $data)) {
                $this->session->set_flashdata('sukses', 'Dokumen hasil pengujian berhasil diunggah');
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Dokumen hasil pengujian tidak berhasil diunggah');
                redirect_back();
            }
        } else {
            $this->session->set_flashdata('error', 'Dokumen hasil pengujian tidak berhasil diunggah');
            redirect_back();
        }
    }

    public function upload_file($input_name)
    {
        $config['upload_path'] = './assets/img/hasil_uji/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx|png';
        $config['max_size'] = '5000'; // max_size in kb
        $config['encrypt_name'] = true; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES[$input_name]['name'])) {
            if ($this->upload->do_upload($input_name)) {
                $gbr = $this->upload->data();
                $return = array('result' => 'success', 'file_name' => $gbr['file_name'], 'file_size' => $gbr['file_size'], 'error' => '');

                return $return;
            }
        } else {
            $return = array('result' => 'Error', 'file_name' => 'no file', 'error' => '');

            return $return;
            echo 'Data yang diupload kosong';
        }
    }

    public function post_verif_ins(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_inspeksi', 'ID Inspeksi','required');
        $this->form_validation->set_rules('keterangan', 'keterangan','required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $keterangan = $this->input->post('keterangan');
            $data = array(
                'id_pengguna'   => $this->input->post('id_pengguna'),
                'id_inspeksi'   => $this->input->post('id_inspeksi'),
                'keterangan'    => $keterangan,
                'status'        => $this->input->post('status'),
            );

            if ($this->GeneralM->insert_persetujuan_inspeksi($data)) {
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'nomor'                 => $this->input->post('nomor'),
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_email', $data_email, TRUE);

                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                $this->session->set_flashdata('sukses', 'Verifikasi berhasil dilakukan');
                redirect('reinspeksi');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function validasi_ins(){
        $this->form_validation->set_rules('id_inspeksi', 'ID Pengujian','required');
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran','required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Validasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $id_inspeksi        = $this->input->post('id_inspeksi');
            $status_pembayaran  = $this->input->post('status_pembayaran');
            if($status_pembayaran == 'paid'){
                 //email notifikasi
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Selamat . . .',
                    'isi'                   => '<b>Telah berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melihat progress selanjutnya.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'status_pembayaran' => $this->input->post('status_pembayaran'),
                    'ket_pembayaran'    => $this->input->post('ket_pembayaran'),
                );
            }else{
                 //email notifikasi
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'kode_billing'          => $this->input->post('kode_billing'),
                    'nomor'                 => $this->input->post('nomor'),
                    'salam'                 => 'Mohon maaf. . .',
                    'isi'                   => '<b>Belum berhasil</b> di verifikasi oleh Admin Balai Teknologi Keselamatan Pelayaran (BTKP) Silahkan masuk ke aplikasi untuk melakukan konfirmasi ulang.<br> Terimakasih.',
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_pembayaran', $data_email, TRUE);

                $data = array(
                    'status_pembayaran' => $this->input->post('status_pembayaran'),
                    'ket_pembayaran'    => $this->input->post('ket_pembayaran'),
                    'foto_bukti_trf'    => '',
                );              
            }
            if ($this->WorkshopM->selesai_i($id_inspeksi, $data)) {
                $this->session->set_flashdata('sukses', 'Validasi berhasil');
                  // kirim email
                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                // end kirim email
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Validasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function post_penerbitan_ins()
    {
        $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required');
        $this->form_validation->set_rules('tgl_terbit', 'Tanggal Terbit', 'required');
        $this->form_validation->set_rules('tgl_expired', 'Tanggal Expired', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data Penerbitan berhasil dimasukkan, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $id_inspeksi = $this->input->post('id_inspeksi');
            $th = date('Y'); //th sekarang
            $tgl = $th.'12'.'31'; //tgl bandingin

            if ($this->TatausahaM->get_last_ins_terbit($tgl)->num_rows() > 0) {
                $nomor_sblm = $this->TatausahaM->get_last_ins_terbit($tgl)->row()->no_spk;
                $no_spk = $nomor_sblm + 1;
            } else {
                $no_spk = 20;
            }

            $kode_alat = $this->WorkshopM->get_inspeksi_all_by_id_inspeksi($id_inspeksi)->row()->kode_alat;
            if ($no_spk < 10) {
                $no_spk = '000'.$no_spk;
            } elseif ($no_spk >= 10) {
                $no_spk = '00'.$no_spk;
            } elseif ($no_spk >= 100) {
                $no_spk = '0'.$no_spk;
            } elseif ($no_spk >= 1000) {
                $no_spk = $no_spk;
            }
            $barcode = $kode_alat.$no_spk.date('y');

            $data = array(
                'no_spk'        => $no_spk,
                'kode_barcode'  => $barcode,
                'klasifikasi'   => $this->input->post('klasifikasi'),
                'tgl_terbit'    => $this->input->post('tgl_terbit'),
                'tgl_expired'   => $this->input->post('tgl_expired'),
            );
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $config['cacheable'] = true; //boolean, the default is true
            $config['cachedir'] = './application/cache/'; //string, the default is application/cache/
            $config['errorlog'] = './application/logs/'; //string, the default is application/logs/
            $config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
            $config['quality'] = true; //boolean, the default is true
            $config['size'] = '1024'; //interger, the default is 1024
            $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name = $barcode.'.png'; //buat name dari qr code sesuai dengan nim
            $params['data'] = $barcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            if ($this->WorkshopM->selesai_i($id_inspeksi, $data)) {
                $this->session->set_flashdata('sukses', 'Data Penerbitan berhasil dimasukkan');
                $data_email = array(
                    'nama'                  => $this->input->post('nama_pengguna'),
                    'nomor'                 => $this->input->post('nomor'),
                );
                $subject    = 'Pemberitahuan';
                $to         = $this->input->post('email_pengguna');
                $isi        = $this->load->view('email/Notifikasi_email', $data_email, TRUE);

                $this->GeneralM->send_email($subject, $to, $isi);
                $this->GeneralM->send_email_2($subject, $to, $isi);
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Data Penerbitan berhasil dimasukkan, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function formkodebillingperizinan($id_perizinan)
    {
      $data['title'] = 'BTKP - Pembuatan Kode Billing';

      $data_perizinan = $this->TatausahaM->get_perizinan_by_id_perizinan($id_perizinan);
      if($data_perizinan['id_jenis_perizinan'] == '1'){
        $jenis_penerimaan = 'baru';
    }elseif ($data_perizinan['id_jenis_perizinan'] == '2') {
        $jenis_penerimaan = 'perpanjang';
    }

    $data_tarif = $this->TatausahaM->get_data_tarif($data_perizinan['id_jenis_alat'], $jenis_penerimaan);


    $tarif = array(
        'jenis_penerimaan'  => $data_tarif['jenis_penerimaan'],
        'satuan'            => $data_tarif['satuan'],
        'tarif'             => $data_tarif['tarif']
    );

    $tarif_perizinan = array_merge($data_perizinan,$tarif);

    $this->data['data_perizinan'] = $tarif_perizinan;
    $this->data['data_invoice'] = array('data' => array('tanggal_pembuatan' => ''));


    $data['isi'] = $this->load->view('admintu/kodebilperizinan_v',$this->data, true);
    $this->load->view('admintu/Layout', $data);
}

public function kodebillingperizinan()
{
  $data['title'] = 'BTKP - verifikasi';
  $data['isi'] = $this->load->view('admintu/kodeBilling_v', $this->data, true);
  $this->load->view('admintu/Layout', $data);
}

public function checkingKodeBilling(){
    $data = $this->db->get('perizinan')->result();
    $data_perizinan = array();

    foreach ($data as $dat) {
        if($dat->status_pembayaran == 'unpaid' && $dat->kode_billing != ''){
            array_push($data_perizinan, $dat->kode_billing);
        }
    }

    return $data_perizinan;
    // print_r($data_perizinan);
    // // print_r($data);
}


    // ====================================API REQUEST====================================
public function reqKodeBilling($data = null){
    $tanggal = date('Y-m-d H:i:s');
    $tanggal = strtotime($tanggal);

    $invoiceNo                  = 'BTKP-INVOICE-'.$tanggal;
    $trxID                      = 'BTKP-TRX-'.$tanggal;
    $totalNominalBilling        = $this->input->post('tarif');
    $namaWajibBayar             = $this->input->post('nama_wajib_bayar');
    $tarifPNPB                  = $this->input->post('tarif');
    $volume                     = $this->input->post('volume');
    $totalTarifPerRecord        = $this->input->post('jumlah');

    $tanggal = date('Y-m-d H:i:s');
    $datetime = new DateTime($tanggal);
    $datetime->modify('+7 days');
    $expired_date = $datetime->format('Y-m-d H:i:s');

    $data = array(
        'appID'                 => getSysConfig('appID'),
        'invoiceNo'             => $invoiceNo,
        'routeID'               => getSysConfig('routeID'),
        'trxID'                 => $trxID,
        'userID'                => getSysConfig('userID'),
        'password'              => getSysConfig('password'),
        'expDate'               => $expired_date,
        'dateSent'              => $tanggal,
        'kodeKL'                => getSysConfig('kodeKL'),
        'kodeEselon1'           => getSysConfig('kodeEselon1'),
        'kodeSatker'            => getSysConfig('kodeSatker'),
        'jenisPNPB'             => getSysConfig('jenisPNPB'),
        'kodeMataUang'          => getSysConfig('kodeMataUang'),
        'totalNominalBilling'   => $totalNominalBilling,
        'namaWajibBayar'        => $namaWajibBayar,
        'detNamaWajibBayar'     => $namaWajibBayar,
        'kodeTarifSimponi'      => getSysConfig('kodeTarifSimponi'),
        'kodePPSimponi'         => getSysConfig('kodePPSimponi'),
        'kodeAkun'              => getSysConfig('kodeAkun'),
        'tarifPNPB'             => $tarifPNPB,
        'volume'                => $volume,
        'satuan'                => 'per surat ijin',
        'totalTarifPerRecord'   => $totalTarifPerRecord
    );


    $request = $this->TatausahaM->reqKodeBilling($data);
    // echo "<pre>";
    // print_r($request);
    // echo "</pre>";
    // die();
    $response = $request['soapenvBody']['NS1PaymentResponse']['NS1response']['code'];
    if($response == '00'){
        $data = array(
            'trxID'                     => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentHeader']['TrxId'],
            'invoiceNO'                 => $request['soapenvBody']['NS1PaymentResponse']['invoiceNo'],
            'kodeBilling'               => $request['soapenvBody']['NS1PaymentResponse']['NS1response']['NS1simponiData']['KodeBillingSimponi'],
            'nama_wajib_bayar'          => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentHeader']['NamaWajibBayar'],
            'jumlah'                    => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentDetails']['PaymentDetail']['TotalTarifPerRecord'],
            'satuan'                    => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentDetails']['PaymentDetail']['Satuan'],
            'tarif'                     => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentDetails']['PaymentDetail']['TarifPNBP'],
            'volume'                    => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentDetails']['PaymentDetail']['Volume'],
            'jenis_penerimaan'          => $this->input->post('jenis_penerimaan'),
            'jenis_alat_keselematan'    => $this->input->post('jenis_alat_keselamatan'),
            'keterangan'                => $this->input->post('keterangan'),
            'tanggal_pembuatan'         => $request['soapenvBody']['NS1PaymentResponse']['NS1response']['NS1simponiData']['Date'],
            'tanggal_expired'           => $request['soapenvBody']['NS1PaymentResponse']['NS1response']['NS1simponiData']['ExpiredDate']
        );

        $insert = $this->TatausahaM->insertToInvoice($data);
        if($insert > 0){
            $id_perizinan = $this->input->post('id_perizinan');
            $data_billing = array(
                'kode_billing'          => $request['soapenvBody']['NS1PaymentResponse']['NS1response']['NS1simponiData']['KodeBillingSimponi'],
                'jumlah_tagihan'        => $request['soapenvBody']['NS1PaymentResponse']['data']['PaymentDetails']['PaymentDetail']['TotalTarifPerRecord'],
                'masa_berlaku_billing'  => $request['soapenvBody']['NS1PaymentResponse']['NS1response']['NS1simponiData']['ExpiredDate'],
                'komentar'              => $this->input->post('keterangan')
            );
            $update_perizinan = $this->TatausahaM->insert_billing($id_perizinan, $data_billing);
            if($update_perizinan){

                $data['title'] = 'BTKP - Invoice';
                $this->data['data_invoice'] = array(
                    'data' => $data,
                    'data_billing' => $data_billing
                );


                $data_perizinan = $this->TatausahaM->get_perizinan_by_id_perizinan($id_perizinan);
                if($data_perizinan['id_jenis_perizinan'] == '1'){
                    $jenis_penerimaan = 'baru';
                }elseif ($data_perizinan['id_jenis_perizinan'] == '2') {
                    $jenis_penerimaan = 'perpanjang';
                }

                $data_tarif = $this->TatausahaM->get_data_tarif($data_perizinan['id_jenis_alat'], $jenis_penerimaan);


                $tarif = array(
                    'jenis_penerimaan'  => $data_tarif['jenis_penerimaan'],
                    'satuan'            => $data_tarif['satuan'],
                    'tarif'             => $data_tarif['tarif']
                );

                $tarif_perizinan = array_merge($data_perizinan,$tarif);

                $this->data['data_perizinan'] = $tarif_perizinan;

                $data['isi'] = $this->load->view('admintu/kodebilperizinan_v', $this->data, true);
                $this->session->set_flashdata('sukses', 'Berhasil generate kode billing');
                $this->load->view('admintu/Layout', $data);
            }else{
                $this->session->set_flashdata('error', 'Gagal generate kode billing');
                redirect_back();
            }
        }else{
            $this->session->set_flashdata('error', 'Gagal generate kode billing');
            redirect_back();
        }
    }else{
        $this->session->set_flashdata('error', 'Gagal generate kode billing');
        redirect_back();
    }
}

public function cekKodeBilling($kode_billing =null){
    // $kode_billing = '820190719465802';
    $invoice = $this->TatausahaM->get_invoice_by_kode_billing($kode_billing)->row();
    $tanggal = date('Y-m-d H:i:s');
    $tanggal = strtotime($tanggal);

    $invoiceNo                  = $invoice->invoiceNO;
    $trxID                      = $invoice->trxID;
    $kodeBilling                = $invoice->kodeBilling;

    $data = array(
        'appID'                 => getSysConfig('appID'),
        'invoiceNo'             => $invoiceNo,
        'routeID'               => getSysConfig('routeID'),
        'trxID'                 => $trxID,
        'userID'                => getSysConfig('userID'),
        'password'              => getSysConfig('password'),
        'kodeBilling'           => $kodeBilling,
        'kodeKL'                => getSysConfig('kodeKL'),
        'kodeEselon1'           => getSysConfig('kodeEselon1'),
        'kodeSatker'            => getSysConfig('kodeSatker')
    );

    $request = $this->TatausahaM->cekKodeBilling($data);

    $NTB                    = $request['soapenvBody']['outBillingStatusResponse']['ResponseData']['NTB'];
    $NTPN                   = $request['soapenvBody']['outBillingStatusResponse']['ResponseData']['NTPN'];
    $TrxDate                = $request['soapenvBody']['outBillingStatusResponse']['ResponseData']['TrxDate'];
    $BankPersepsi           = $request['soapenvBody']['outBillingStatusResponse']['ResponseData']['BankPersepsi'];
    $ChannelPembayaran      = $request['soapenvBody']['outBillingStatusResponse']['ResponseData']['ChannelPembayaran'];

    if(count($NTB) != 0){
        $this->db->trans_start();
        $data_perizinan = array('status_pembayaran' => 'paid');
        $data_invoice   = array(
            'ntb'                   => $NTB,
            'ntpn'                  => $NTPN,
            'tanggal_pembayaran'    => $TrxDate,
            'bank_pos_bayar'        => $BankPersepsi,
            'channel_bayar'         => $ChannelPembayaran
        );

        $this->db->where('kode_billing', $kode_billing);
        $this->db->update('perizinan', $data_perizinan);

        $this->db->where('kodeBilling', $kode_billing);
        $this->db->update('invoice', $data_invoice);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error','Mohon maaf data gagal disimpan.');
            // redirect_back();
            return FALSE;
        } else {
            $this->db->trans_complete();
            $this->session->set_flashdata('sukses','Selamat, Data berhasil disimpan.');
            // redirect_back();
            return TRUE;
        }
    }else{
        // echo 'tidak ada kode billing yang sudah dibayar';
        $id_pengguna    = $this->session->userdata('id_pengguna');
        $nama           = $this->session->userdata('nama');
        log_message('error', 'USER: '.$nama.', ID: '.$id_pengguna.'. Kode billing : '.$kode_billing.' Belum dibayar');
        // redirect_back();
        return FALSE;
    }
    //  perizinan -> status_pembayaran
    //  invoice -> ntb, ntpn, tanggal_pembayaran, bank_pos_bayar, channel_pembayaran
    echo "<pre>";
    print_r($request);
    echo "</pre>";
    // die();

    // redirect_back();
    return true;
}
    // ====================================API REQUEST====================================
}
