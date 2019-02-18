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
		// $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF('landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('BTKP');
$pdf->SetAuthor('BTKP');
$pdf->SetTitle('laporan-pengujian');
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
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

// Print a text
$html1 = 
'<style>
    .h_tengah {text-align: center;}
    .h_kiri {text-align: left;}
    .h_kanan {text-align: right;}
    .txt_judul {font-size: 15pt; font-weight: bold; padding-bottom: 12px;}
    .header_kolom { text-align: center; font-weight: bold;}
</style>';
$html1 .= 
'<span class="txt_judul"> <br></span>
<table width="100%" cellspacing="0" cellpadding="3" border="0" nobr="true" style="margin-top:30px;">
    <thead>
        <tr class="header_kolom">
            <th style="font-size: 14pt;">Laporan Pengujian dan Sertifikasi</th>
        </tr>
    </thead>
</table>';


$pdf->writeHTML($html1, true, false, true, false, '');

$html = '<style>
            .h_tengah {text-align: center;}
            .h_kiri {text-align: left;}
            .h_kanan {text-align: right;}
            .txt_judul {font-size: 15pt; font-weight: bold; padding-bottom: 12px;}
            .header_kolom { text-align: center; font-weight: bold;}
        </style>';
$html .= 
'<table width="100%" cellspacing="0" cellpadding="3" border="1" nobr="true" style="margin-top:30px;">
	<thead>
        <tr class="header_kolom">
            <th style="width:10%;">No. Permohonan</th>
            <th style="width:13%;">No. Sertifikat</th>
            <th style="width:12%;">Tgl Pengajuan</th>
            <th style="width:15%;">Nama Alat</th>
            <th style="width:10%;">Merk</th>
            <th style="width:10%;">Tipe</th>
            <th style="width:15%;">Instansi</th>
            <th style="width:15%;">Masa Berlaku</th>
        </tr>
    </thead>';

$no=0;
foreach ($pengujian as $ujian) {
    if($ujian->status_pembayaran_1 == "paid" && $ujian->status_pembayaran_2 == 'paid'){
        $no++;
        $tgl_pengajuan  = date('Y-m-d', strtotime($ujian->created_at_ujian));
        $tgl_terbit     = date('Y-m-d', strtotime($ujian->tgl_terbit));
        $tgl_expired    = date('Y-m-d', strtotime($ujian->tgl_expired));
            $html .= 
            '<tr class="h_tengah">
                <th style="width:10%;" class="h_tengah">SDP'.$ujian->id_pengujian.$ujian->kode_alat.'</th>
                <th style="width:13%;">'.$ujian->kode_alat.'/BTKP/'.$ujian->no_spk.'</th>
                <th style="width:12%;">'.date_indo($tgl_pengajuan).'</th>
                <th style="width:15%;">'.$ujian->nama_alat.'</th>
                <th style="width:10%;">'.$ujian->merk.'</th>
                <th style="width:10%;">'.$ujian->tipe.'</th>
                <th style="width:15%;">'.$ujian->nama_perusahaan.'</th>
                <th class="h_tengah" style="width:15%;">'.date_indo($tgl_terbit).' <br><b>Sampai</b><br> '.date_indo($tgl_expired).'</th>
            </tr>';
    }
}

$html .= '</table>';


$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporan-pengujian'.date('Y-m-d').'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>