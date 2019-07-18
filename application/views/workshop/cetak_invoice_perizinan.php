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
		$img_file = K_PATH_IMAGES.'Kementrian Keuangan RI-p-1.jpg';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF('portrait', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BTKP');
$pdf->SetTitle('Inovice BTKP');
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

$html2 =
'<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
	<tr>
		<td style="width: 100%; height:180px;" colspan="4"></td>
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
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Tanggal Billing</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Tanggal Kadaluarsa</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Tanggal Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Kelompok PNPB</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Mata Uang</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Bank/Pos Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Channel Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Nama Wajib Setor/Wajib Bayar</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Kementrian/Lembaga</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Unit Eselon I</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Satuan Kerja</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Total Disetor</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Terbilang</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">Status</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">NTB</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
    </tr>
    <tr>
        <td style="width: 5%; height:100%;"></td>
        <td style="width: 35%; height:100%;">NTPN</td>
        <td style="width: 5%; height:100%;">:</td>
        <td style="width: 55%; height:100%;"></td>
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


$html3 = 
'<table cellspacing="0" cellpadding="0" border="1" style="width:100%;">
    <tr>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
        <td style="width: 12,5%; height:100%;"></td>
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