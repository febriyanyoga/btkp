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
$pdf->SetTitle('laporan-reinspeksi');
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
            <th style="font-size: 14pt;">Laporan Rainspeksi</th>
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
            <th style="width:5%;">No.</th>
            <th style="width:20%;">Tanggal Permohonan</th>
            <th style="width:20%;">Workshop</th>
            <th style="width:20%;">Alat</th>
            <th style="width:20%;">Kapal</th>
            <th style="width:15%;">Status</th>
        </tr>
    </thead>';

$no=0;
foreach ($data_inspeksi as $ins) {
    if($ins->foto_bukti_trf != "" && $ins->status_pembayaran == 'paid'){
        $no++;
            $tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
        
            if($ins->pengesahan == "sah"){
                $status = 'Diterbitkan';
            }else{
                $status = 'Menunggu Pengesahan';
            }
            $html .= 
            '<tr class="h_tengah">
                <th style="width:5%;" class="h_tengah">'.$no.'</th>
                <th style="width:20%;">'.date_indo($tgl_pengajuan).'</th>
                <th style="width:20%;">'.$ins->nama_perusahaan.'</th>
                <th style="width:20%;">'.$ins->nama_alat.'</th>
                <th style="width:20%;">'.$ins->nama_kapal.'</th>
                <th style="width:15%;">'.$status.'</th>
            </tr>';
    }
}

$html .= '</table>';


$pdf->writeHTML($html, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporan-reinspeksi'.date('Y-m-d').'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>