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
		$img_file = K_PATH_IMAGES.'bg-label-1.jpg';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
		$this->setPageMark();
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BTKP');
$pdf->SetTitle('Label Reinspeksi');
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
'<style>
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
		<td style="width: 100%; height:24px;" colspan="4"></td>
	</tr>
    <tr>
        <td style="width: 100%; height:1px; text-align:center; font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:11pt;" colspan="4">
		</td>
    </tr>
    <tr>
        <td style="width: 100%; height:1px; text-align:center; font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:11pt;" colspan="4">
		</td>
    </tr>
    <tr>
        <td style="width: 100%; height:1px; text-align:center; font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:11pt;" colspan="4">
		</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:8pt; font-weight:bold; font-family: Arial, Helvetica, sans-serif;  "></td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman;"></td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;"></td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:14pt; font-weight:bold; font-family: Times New Roman;  text-transform: capitalize; text-decoration: underline;"></td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:14pt; font-weight:bold; font-family: Times New Roman; text-transform: capitalize; text-decoration: underline; height:36px;"></td>
    </tr>
</table>';
    $pdf->writeHTML($html2, true, false, true, false, '');



    $alamat_pt_detail = $this->WorkshopM->detail_alamat($inspeksi->id_kel_perusahaan)->row();
    $tgl_expired  = date('Y-m-d', strtotime($inspeksi->tgl_expired));
    $tgl_terbit = date('Y-m-d', strtotime($inspeksi->tgl_terbit));

    $html3 = '<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;"><br><span style="font-style:italic;font-size:8pt;"></span></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:24%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:18%;"><br><span style="font-style:italic;font-size:8pt;"></span></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:23%;"></td>
        <td style="width:6%;"></td>
    </tr>
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;"><br><span style="font-style:italic;font-size:8pt;"></span></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:24%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:18%;"><br><span style="font-style:italic;font-size:8pt;"></span></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:23%;"></td>
        <td style="width:6%;"></td>
    </tr>
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:21%; font-style:italic;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:24%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:20%; font-style:italic;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:23%;"></td>
        <td style="width:6%;"></td>
    </tr>
    <tr>
        <td style="width:6%; height:180px;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:44%; font-style:italic;">
        </td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:42%;">
        </td>
        <td style="width:6%;"></td>
    </tr>
    <tr>
        <td style="width:17.5%; height:53px;"></td>
        <td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:22%; color:white;">'.$inspeksi->no_spk.'/'.$inspeksi->id_perusahaan.'/'.date('dmY', strtotime($inspeksi->tgl_expired)).'<br><span style="font-style: italic; font-size: 7pt;">Approved by BTKP</span>
        </td>
        <td style="text-align:center; font-size:12pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:21.5%; "></td>
        <td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:22.5%;color:#26255e;">'.$inspeksi->no_spk.'/'.$inspeksi->id_perusahaan.'/'.date('dmY', strtotime($inspeksi->tgl_expired)).'<br><span style="font-style: italic; font-size: 7pt;">Approved by BTKP</span>
        </td>
        <td style="width:17%;"></td>
    </tr>
    <tr>
        <td style="width:10%; height:40px;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:35%; font-style:italic;">
        </td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:10%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:34%;">
        </td>
        <td style="width:11%;"></td>
    </tr>
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;"></td>
        <td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:10%;"></td>
        <td colspan="4" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:59%;"></td>
    </tr>
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;"></td>
        <td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td colspan="4" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:67%;"></td>
    </tr>
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:24%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:18%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:23%;"></td>
        <td style="width:6%;"></td>
    </tr>
    <tr>
        <td style="width:6%;"></td>
        <td colspan="5" style="text-align:center; font-size:10pt; font-family: Times New Roman;  text-transform: capitalize; width:88%; font-weight:bold;"></td>
        <td style="width:6%;"></td>
    </tr>
    </table>';
    $pdf->writeHTML($html3, true, false, true, false, '');
    $html4 = '<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:46%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:46%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr >
    	<td style="width:20%;"></td>
		<td rowspan="2" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:30%; height: 10px;">
		</td>
    	<td style="width:11%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:37%; font-weight:bold;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:20%; height:52px;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize;height: 10px;">
		</td>
		<td style="width:25%; text-align:center; vertical-aligns:middle; font-size:17pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; color:gray;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 10px;">
		</td>
		<td style="text-align:center; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
</table>';
$pdf->writeHTML($html4, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('sertifikat-label-'.$inspeksi->kode_barcode.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>