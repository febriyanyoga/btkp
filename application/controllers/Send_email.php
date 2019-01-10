<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
      // Konfigurasi email
      $config = [
       'mailtype'  => 'html',
       'charset'   => 'utf-8',
       'protocol'  => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'dtedi.svugm@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'Yogyakarta2018',                // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "rn",
               'newline'   => "rn"
             ];

        // Load library email dan konfigurasinya
             $this->load->library('email', $config);

        // Email dan nama pengirim
             $this->email->from('no-reply@masrud.com', 'MasRud.com | M. Rudianto');

        // Email penerima
        $this->email->to('febriyanyoga@gmail.com'); // Ganti dengan email tujuan kamu

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail | MasRud.com');

        // Isi email
        $this->email->message("Ini adalah contoh email CodeIgniter yang dikirim menggunakan SMTP email Google (Gmail).<br><br> Klik <strong><a href='https://masrud.com/post/kirim-email-dengan-smtp-gmail' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
          echo 'Sukses! email berhasil dikirim.';
        } else {
          echo 'Error! email tidak dapat dikirim.';
        }
      }

      public function send()  
      {  
       $config = Array(  
        'protocol' => 'smtp',  
        'smtp_host' => 'ssl://smtp.googlemail.com',  
        'smtp_port' => 465,  
        'smtp_user' => 'aplikasibtkp@gmail.com',   
        'smtp_pass' => 'Btkp2018',   
        'mailtype' => 'html',   
        'charset' => 'iso-8859-1'  
      );  
       $this->load->library('email', $config);  
       $this->email->set_newline("\r\n");  
       $this->email->from('recodeku@gmail.com', 'Admin Re:Code');   
       $this->email->to('febriyanyoga@gmail.com');   
       $this->email->subject('Percobaan email');   
       $data = 1;
       $isi = $this->load->view('email/Konfirmasi_email2', $data, TRUE);

       $this->email->message($isi);  
       if (!$this->email->send()) {  
        show_error($this->email->print_debugger());   
      }else{  
        echo 'Success to send email';   
      }  
    }  
  }  