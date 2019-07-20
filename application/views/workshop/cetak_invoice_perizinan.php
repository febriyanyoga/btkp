<?php
class MYPDF extends TCPDF {
    //Page header
	public function Header() {
        // get the current page break margin
		$bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
        // set bacground image
        // $img_file = K_PATH_IMAGES.'back-sertif-2-2.jpg';
		$img_file = K_PATH_IMAGES.'background-kemenkeu.jpg';
		$this->Image($img_file, 0, 0, 297, 210, '', '', '', false, 0, '', false, false, 0);
        // restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BTKP');
$pdf->SetTitle('Inovice BTKP-'.$perizinan->kode_billing);
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(14, 0);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 9.5);

// add a page
$pdf->AddPage();

// Print a text
$html = 
'
<style>
	table{
		font-size : 12pt;
	}
</style>';

$html .= 
'<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
	<tr>
		<td style="width: 28%; height:24px;"></td>
		<td style="width: 25%;"></td>
		<td style="width: 25%;"></td>
		<td style="width: 22%;"></td>
	</tr>
	<tr>
		<td style="width: 28%; height:36px;"></td>
		<td style="width: 25%;"></td>
		<td style="width: 25%;"></td>
		<td style="width: 22%;"></td>
	</tr>
    <tr>
        <td></td>
        <td></td>
        <td style="height:8px;"></td>
        <td style="text-align:center; font-size:8pt; font-weight:bold; font-family: Arial, Helvetica, sans-serif; vertical-aligns:middle;"></td>
    </tr>
    <tr>
        <td></td>
       	<td></td>
       	<td></td>
        <td style="height:30px;"></td>
    </tr>
    

</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$mataUang = getSysConfig('kodeMataUang');

if($mataUang = '1'){
    $mataUang = 'IDR';
}else{
    $mataUang = 'Dollar';
}


if($invoice->bank_pos_bayar == ''){
    $postBayar = '-';
}else{ 
    $postBayar = $invoice->bank_pos_bayar;
}

if($invoice->channel_bayar == ''){
    $channelBayar = '-';
}else{ 
    $channelBayar = $invoice->channel_bayar;
}

if($invoice->tanggal_pembayaran == '0000-00-00 00:00:00'){
    $tgl_bayar = '-';
}else{ 
    $tgl_bayar      = $invoice->tanggal_pembayaran;
    $tgl_bayar      = date('Y-m-d', strtotime($tgl_bayar));
    $tgl_bayar      = longdate_indo($tgl_bayar).' '.date('H:i', strtotime($tgl_bayar));
}

if($invoice->ntb == ''){
    $ntb = '-';
}else{ 
    $ntb = $invoice->ntb;
}

if($invoice->ntpn == ''){
    $ntpn = '-';
}else{ 
    $ntpn = $invoice->ntpn;
}

if($invoice->status_pembayaran != 'sukses'){
    $status_pembayaran = 'Belum Dibayar';
}else{
    $status_pembayaran = 'Sudah Dibayar';
}

$tanggal_pembuatan      = date('Y-m-d', strtotime($invoice->tanggal_pembuatan));
$tanggal_pembuatan      = longdate_indo($tanggal_pembuatan).' '.date('H:i', strtotime($invoice->tanggal_pembuatan));

$tanggal_expired      = date('Y-m-d', strtotime($invoice->tanggal_expired));
$tanggal_expired      = longdate_indo($tanggal_expired).' '.date('H:i', strtotime($invoice->tanggal_expired));

$html2 =
'<table cellspacing="0" cellpadding="2" border="0" style="width:100%;">
	<tr>
		<td style="width: 100%; height:80px;" colspan="4"></td>
	</tr>
    <tr>
        <td style="width: 25%; height:100%;" colspan="2">Data Tagihan &nbsp; :</td>
        <td style="width: 25%; height:100%;"></td>
        <td style="width: 50%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Kode Billing</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"><strong>'.$perizinan->kode_billing.'</strong></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Tanggal Billing</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$tanggal_pembuatan.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Tanggal Kadaluarsa</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$tanggal_expired.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Tanggal Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$tgl_bayar.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Kelompok PNPB</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.getSysConfig('jenisPNPB').'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Mata Uang</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$mataUang.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Bank/Pos Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$postBayar.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Channel Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$channelBayar.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Nama Wajib Setor/Wajib Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">BENDAHARA PENERIMAAN BTKP</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Kementrian/Lembaga</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">KEMENTERIAN PERHUBUNGAN</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Unit Eselon I</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">DITJEN PERHUBUNGAN LAUT</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Satuan Kerja</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">BALAI TEKNOLOGI KESELAMATAN PELAYARAN</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Total Disetor</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.number_format($invoice->jumlah, 0,',','.').' ('.$mataUang.')</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Terbilang</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.ucwords(terbilang($invoice->jumlah)).' ('.$mataUang.')</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Status</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$status_pembayaran.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">NTB</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$ntb.'</td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">NTPN</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;">'.$ntpn.'</td>
    </tr>

    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;"></td>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 55%; height:100%;"></td>
    </tr>

    <tr>
        <td style="width: 25%; height:100%;" colspan="2">Detail Tagihan &nbsp; :</td>
        <td style="width: 25%; height:100%;"></td>
        <td style="width: 50%; height:100%;"></td>
    </tr>
</table>';
$pdf->writeHTML($html2, true, false, true, false, '');

$jenis = strtolower($perizinan->nama_jenis_izin);
if($jenis == "baru"){
    $jenis = 'Pembuatan';
}else{
    $jenis = 'Perpanjangan';
}

$tarif  =  number_format($invoice->tarif, 0,',','.');
$jumlah =  number_format($invoice->jumlah, 0,',','.');

$html3 = 
'<table cellspacing="0" cellpadding="5" border="1" style="width:100%;">
    <tr style="text-align:center; font-style: bold;">
        <td style="width: 10%; height:100%;"> Wajib Bayar</td>
        <td style="width: 29%; height:100%;"> Jenis Penerimaan</td>
        <td style="width: 15%; height:100%;"> Akun</td>
        <td style="width: 10%; height:100%;"> Tarif</td>
        <td style="width: 6%; height:100%;"> Volume</td>
        <td style="width: 10%; height:100%;"> Satuan</td>
        <td style="width: 10%; height:100%;"> Jumlah</td>
        <td style="width: 10%; height:100%;"> Keterangan</td>

    </tr>
    <tr>
        <td style="width: 10%;">'.$invoice->nama_wajib_bayar.'</td>
        <td style="width: 29%; text-align: justify;">III. JASA TRANSPORTASI LAUT - D. JASA KENAVIGASIAN - 6. Pemberian Izin Kewenangan Perusahaan yang Melakukan Perbaikan dan Perawatan Peralatan Keselamatan Pelayaran - a. '.$perizinan->nama_alat.'- 2) '.$jenis.' surat izin </td>
        <td style="width: 15%; text-align: justify;">'.getSysConfig('namaAkun').'</td>
        <td style="width: 10%; text-align: right;">'.$tarif.'</td>
        <td style="width: 6%; text-align: center;">'.$invoice->volume.'</td>
        <td style="width: 10%; text-align: center;">'.$invoice->satuan.'</td>
        <td style="width: 10%; text-align: right;">'.$jumlah.'</td>
        <td style="width: 10%; text-align: center;"> - </td>

    </tr>
</table>';

$pdf->writeHTML($html3, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('sertifikat-spk-'.$perizinan->kode_barcode.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>