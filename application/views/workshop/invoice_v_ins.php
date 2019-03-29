<style>
/*! Invoice Templates @author: Invoicebus @email: info@invoicebus.com @web: https://invoicebus.com @version: 1.0.0 @updated: 2015-03-09 09:03:07 @license: Invoicebus */
/* Reset styles */
@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}
.clearfix {
  display: block;
  clear: both;
}

.hidden {
  display: none;
}

b, strong, .bold {
  font-weight: bold;
}

#container {
  font: normal 13px/1.4em 'Open Sans', Sans-serif;
  margin: 0 auto;
  padding: 20px 20px;
}

#memo .company-name {
  background: #fff url("../img/arrows.png") 560px center no-repeat;
  background-size: 100px auto;
  padding: 10px 20px;
  position: relative;
  margin-bottom: 15px;
}
#memo .company-name span {
  color: white;
  display: inline-block;
  min-width: 20px;
  font-size: 24px;
  font-weight: bold;
  line-height: 1em;
}
#memo .company-name .right-arrow {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100px;
  background: url("../img/right-arrow.png") right center no-repeat;
  background-size: auto 60px;
}
#memo .logo {
  float: left;
  clear: left;
  margin-left: 20px;
}
#memo .logo img {
  width: 150px;
  height: 100px;
}
#memo .company-info {
  margin-left: 135px;
  float: left;
  font-size: 12px;
  color: #555;
}
#memo .company-info div {
  margin-bottom: 3px;
  min-width: 20px;
}
#memo .company-info span {
  display: inline-block;
  min-width: 20px;
}
#memo:after {
  content: '';
  display: block;
  clear: both;
}

#invoice-info {
  float: left;
  margin: 10px 0 0 -20px;
}
#invoice-info > div {
  float: left;
}
#invoice-info > div > span {
  display: block;
  min-width: 20px;
  min-height: 18px;
  margin-bottom: 3px;
}
#invoice-info > div:last-child {
  margin-left: 20px;
}
#invoice-info:after {
  content: '';
  display: block;
  clear: both;
}

#client-info {
  float: right;
  margin: 5px 20px 0 0;
  min-width: 220px;
  text-align: right;
}
#client-info > div {
  margin-bottom: 3px;
  min-width: 20px;
}
#client-info span {
  display: block;
  min-width: 20px;
}

#invoice-title-number {
  text-align: left;
  margin: 20px 0;
}
#invoice-title-number span {
  display: inline-block;
  min-width: 20px;
}
#invoice-title-number #title {
  margin-right: 15px;
  text-align: right;
  font-size: 20px;
  font-weight: bold;
}
#invoice-title-number #number {
  font-size: 15px;
  text-align: left;
}

table {
  table-layout: fixed;
}
table th, table td {
  vertical-align: top;
  word-break: keep-all;
  word-wrap: break-word;
}

#items {
  margin: 20px 0 35px 0;
}
#items .first-cell, #items table th:first-child, #items table td:first-child {
  width: 30%;
  text-align: right;
}
#items table {
  border-collapse: separate;
  width: 100%;
}
#items table th {
  padding: 12px 10px;
  text-align: right;
  background: #E6E7E7;
  border-bottom: 4px solid #487774;
}
#items table th:nth-child(2) {
  width: 30%;
  text-align: left;
}
#items table th:last-child {
  text-align: right;
  padding-right: 20px !important;
}
#items table td {
  padding: 15px 10px;
  text-align: right;
  border-right: 1px solid #CCCCCF;
}
#items table td:first-child {
  text-align: left;
  border-right: 0 !important;
}
#items table td:nth-child(2) {
  text-align: left;
}
#items table td:last-child {
  border-right: 0 !important;
  padding-right: 20px !important;
}

.currency {
  border-bottom: 4px solid #487774;
  padding: 0 20px;
}
.currency span {
  font-size: 11px;
  font-style: italic;
  color: #8b8b8b;
  display: inline-block;
  min-width: 20px;
}

#sums {
  float: right;
  background: #e6e7e7;
  background-size: auto 100px;
  color: white;
}
#sums table tr th, #sums table tr td {
  min-width: 100px;
  padding: 8px 20px 8px 35px;
  text-align: right;
  font-weight: 600;
}
#sums table tr th {
  text-align: left;
  padding-right: 25px;
}
#sums table tr.amount-total th {
  text-transform: uppercase;
}
#sums table tr.amount-total th, #sums table tr.amount-total td {
  font-size: 16px;
  font-weight: bold;
}
#sums table tr:last-child th {
  text-transform: uppercase;
}
#sums table tr:last-child th, #sums table tr:last-child td {
  font-size: 16px;
  font-weight: bold;
  padding-top: 10px !important;
  padding-bottom: 10px !important;
}

#terms {
  margin: 50px 20px 10px 20px;
}
#terms > span {
  display: inline-block;
  min-width: 20px;
  font-weight: bold;
}
#terms > div {
  margin-top: 10px;
  min-height: 50px;
  min-width: 50px;
}

.payment-info {
  margin: 0 20px;
}
.payment-info div {
  font-size: 12px;
  color: #8b8b8b;
  display: inline-block;
  min-width: 20px;
}

.ib_bottom_row_commands {
  margin: 10px 0 0 20px !important;
}

.ibcl_tax_value:before {
  color: white !important;
}

/**
 * If the printed invoice is not looking as expected you may tune up
 * the print styles (you can use !important to override styles)
 */
 @media print {
  /* Here goes your print styles */
}
</style>


<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BTKP - Invoice</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="Invoicebus Invoice Template">
  <meta name="author" content="Invoicebus">

  <meta name="template-hash" content="f3142bbb0a1696d5caa932ecab0fc530">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/app/img/favicon-16x16.png">

</head>
<body>
<!--  <?php
 print_r($perizinan);
 ?> -->
 <div id="container">
  <section id="memo">
    <div class="company-info">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9x53YKSU8UMKkk-Y9duGKfflBGI-rjbNUNAMmBax-b2-UJOxC" style="max-width: 100px; position: absolute; left: 35px; top: 15px;">
      <div style="font-size: 20px; font-weight: bold;">
        <span>Balai Teknologi Keselamatan Pelayaran<hr>
          <span style="text-align: right; right: 30px; position: absolute; font-size: 12pt;">#TG<?php echo $inspeksi->kode_billing;?>/INV</span>
        </div>
        <div>
          <span>Jl. Raya Ancol Baru No. 1, Tanjung Priok</span><br>
          <span>Jakarta Utara, Indonesia 14310</span><br>
          <span>Telp: (021) 4356767</span> <span>Email: btkp.perhubungan@gmail.com</span>
        </div>
      </div>
    </section>

    <section id="items" style="margin-top: 20px;">
      <p style="font-size: 12pt; margin-top: 60px;"><br> Mohon segera lakukan pembayaran sebelum :</p><br>
      <table >
        <tr> <th style="background-color: #e6e7e7; border-bottom: 0px solid; text-align: center; font-size:16px; font-weight: bold; color:#555;">
          <?php 
          $tgl_berlaku   = date('Y-m-d', strtotime($inspeksi->masa_berlaku_billing));
          echo longdate_indo($tgl_berlaku).' Pukul '.date('H:i', strtotime($inspeksi->masa_berlaku_billing));
          ?>
        </th></tr>
      </table>
    </section>

    <section id="items">
      <table style="margin-top: -45px;" >
        <tr> <th style="background-color: #fff; border-bottom: 0px solid; text-align: center; font-size: 14px;">Lakukan Pembayaran Sebesar :</th></tr>
        <tr> <th style="background-color: #fff; border-bottom: 0px solid; text-align: center; font-size:18px; font-weight: bold; color:#555;"><?php echo "Rp".number_format($inspeksi->jumlah_tagihan, 0,',','.').",-";?></th></tr>
      </table>
    </section>


   <!--  <section id="items">
      <table style="margin-top: -45px;">
        <?php
        $bank = $this->WorkshopM->cek_bank_btkp($inspeksi->id_bank_btkp)->row();
        ?>
        <tr> <th style="background-color: #fff; border-bottom: 0px solid; text-align: center; font-size: 14px;">Transfer dapat dilakukan ke nomor rekening Account <?php echo $bank->nama_bank?> berikut ini :</th></tr>
        <tr><th style="background-color: #fff; border-bottom: 0px solid; text-align: center; font-size:18px; font-weight: bold; color:#555;">8608121710958300</th></tr>
      </table>
    </section> -->
    <div class="clearfix"></div>

    <section id="items">
      <table style="margin-top: -45px;" >
        <tr> <th style="background-color: #fff; border-bottom: 0px solid; text-align: center; font-size: 14px;">Dengan Kode NTPN  :</th></tr>
        <tr> <th style="background-color: #fff; border-bottom: 0px solid; text-align: center; font-size:18px; font-weight: bold; color:#555;"><?php echo $inspeksi->kode_billing?></th></tr>
      </table>
    </section>

    <section id="invoice-title-number">
      <span id="number">Berikut adalah rincian tagihan pembayaran <b>Jasa Penerbitan Sertifikat Inspeksi</b> : </span>
    </section>

    <div class="clearfix"></div>
    <section id="items">
      <table cellpadding="0" cellspacing="0" style="font-size: 14px;">
        <tr>
          <th  style="text-align: left;">Nama Perusahaan</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->nama_perusahaan?></th>
        </tr>
        <tr>
          <th  style="text-align: left;">Nama Kapal</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->nama_kapal?></th>
        </tr>
        <tr>
          <th  style="text-align: left;">Flag</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->flag?></th>
        </tr>
        <tr>
          <th  style="text-align: left;">IMO Number</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->imo?></th>
        </tr>
        <tr>
          <th  style="text-align: left;">Nama Alat</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->nama_alat?></th>
        </tr>
        <tr>
          <th  style="text-align: left;">Jumlah Alat</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->jumlah_alat?></th>
        </tr>
        <tr>
          <th  style="text-align: left;">Hasil Inspeksi</th>
          <th  style="text-align: left; width: 40px;">:</th>
          <th  style="text-align: left;"><?php echo $inspeksi->hasil_inspeksi?></th>
        </tr>
       <!--  <tr>
          <td  style="text-align: center;">Adminis</td>
          <td  style="text-align: center;">2</td>
        </tr> -->

      </table>
    </section>
    <!-- <section id="sums">
      <table cellpadding="0" cellspacing="0">
        <tr class="amount-total">
          <th>Grand Total</th>
          <td>20000</td>
        </tr>
      </table>
    </section> -->
    <!-- <div class="clearfix"></div> -->
    <section><br><br>
      <div class="company-info">
        <p style="font-size: 14px;">Setelah melakukan pembayaran, silahkan melakukan konfirmasi pembayaran. Jika kamu menghadapi kendala mengenai pembayaran, silakan langsung Hubungi BTKP.</p>
      </div>
    </section><br><hr>
    <section id="invoice-info" style="font-size: 14px;">
      <div>
        <span>Copyright © <?php echo date('Y')?> Balai Teknologi Keselamatan Pelayaran.</span>

      </div>
    </section>

    <?php
    if($inspeksi->status_pembayaran == 'paid'){
      ?>
      <img style="max-width: 265px; margin-top: -315px; margin-left: 600px;"  src="<?php echo base_url()?>assets/img/lunas.png">
      <?php
    }
    ?>

    <script>
      window.print();
    </script>
  </body>
  </html>