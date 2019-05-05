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
		$img_file = K_PATH_IMAGES.'back-sertif-3.jpg';
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
$pdf->SetTitle('sertifikat Label');
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
        <td style="width: 100%; height:1px; text-align:center; font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:11pt;" colspan="4">KEMENTERIAN PERHUBUNGAN
		</td>
    </tr>
    <tr>
        <td style="width: 100%; height:1px; text-align:center; font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:11pt;" colspan="4">DIREKTORAT JENDERAL PERHUBUNGAN LAUT
		</td>
    </tr>
    <tr>
        <td style="width: 100%; height:1px; text-align:center; font-family: Arial, Helvetica, sans-serif; font-weight:bold; font-size:11pt;" colspan="4">BALAI TEKNOLOGI KESELAMATAN PELAYARAN
		</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:8pt; font-weight:bold; font-family: Arial, Helvetica, sans-serif;  ">Jl. Raya Ancol Baru No.1 Tanjung Priok Jakarta Utara 14310 Telp : 021-4356767 Telex : 44227 DJPL 1A Telefax : 43911350</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman;"></td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;"></td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:14pt; font-weight:bold; font-family: Times New Roman;  text-transform: capitalize; text-decoration: underline;">LABEL</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:14pt; font-weight:bold; font-family: Times New Roman; text-transform: capitalize; text-decoration: underline; height:36px;">NOMOR : '.$pengujian->kode_alat.'/BTKP/'.$pengujian->no_spk.'</td>
    </tr>
</table>';
    $pdf->writeHTML($html2, true, false, true, false, '');



    $alamat_pt_detail = $this->WorkshopM->detail_alamat($pengujian->id_kel_perusahaan)->row();
    $tgl_expired  = date('Y-m-d', strtotime($pengujian->tgl_expired));
    $tgl_terbit = date('Y-m-d', strtotime($pengujian->tgl_terbit));

    $html3 = '<table cellspacing="0" cellpadding="0" border="1" style="width:100%;">
    <tr>
        <td style="width:6%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;">Nomor Awal<br><span style="font-style:italic;font-size:8pt;">Start Number</span></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;">:</td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:24%;">'.$pengujian->no_awal.'</td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:18%;">Nomor Akhir<br><span style="font-style:italic;font-size:8pt;">End Number</span></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;">:</td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:23%;">'.$pengujian->no_akhir.'</td>
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
        <td style="width:6%; height:193px;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:44%; font-style:italic;">
        </td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:2%;"></td>
        <td style="text-align:left; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:42%;">
        </td>
        <td style="width:6%;"></td>
    </tr>
    <tr>
        <td style="width:16.5%; height:53px;"></td>
        <td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:22%; color:white;">
            '.$pengujian->id_pengujian.'/BTKP/'.date('Y', strtotime($pengujian->tgl_terbit)).'<br>'.$pengujian->no_spk.'/'.$pengujian->kode_alat.'/'.$pengujian->id_pengujian.'/'.date('Y', strtotime($pengujian->tgl_terbit)).'
        </td>
        <td style="text-align:center; font-size:13pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:24%; "></td>
        <td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:22%;color:#26255e;">
            '.$pengujian->id_pengujian.'/BTKP/'.date('Y', strtotime($pengujian->tgl_terbit)).'<br>'.$pengujian->no_spk.'/'.$pengujian->kode_alat.'/'.$pengujian->id_pengujian.'/'.date('Y', strtotime($pengujian->tgl_terbit)).'<span style="font-style: italic; font-size: 7pt;"></span>
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
        <td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:19%;">Label Perangkat<br><span style="font-style:italic;font-size:8pt;">Label of Equipment</span></td>
        <td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:10%;">:</td>
        <td colspan="4" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:59%;">'.$pengujian->no_awal.'-'.$pengujian->no_akhir.' '.$pengujian->kode_alat. $pengujian->no_spk.'</td>
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
        <td colspan="5" style="text-align:center; font-size:10pt; font-family: Times New Roman;  text-transform: capitalize; width:88%; font-weight:bold;">A.N DIREKTUR JENDERAL PERHUBUNGAN LAUT<br>KEPALA BALAI TEKNOLOGI KESELAMATAN PELAYARAN</td>
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
		<td rowspan="2" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:30%; height: 10px;"><img style="witdh:78px; height:78px; align:center;" src="'.base_url('assets/img/qrcode/'.$pengujian->kode_barcode.'.png').'">
		</td>
    	<td style="width:11%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:37%; font-weight:bold;">KEPALA BALAI  TEKNOLOGI<br>KESELAMATAN PELAYARAN

		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:20%; height:52px;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize;height: 10px;">
		</td>
		<td style="width:25%; text-align:center; vertical-aligns:middle; font-size:17pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; color:gray;"><img style="height:52px;align:center;" src="'.base_url('assets/ttd/'.$ttd->nama_file_ttd).'">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 10px;">'.$pengujian->kode_barcode.'
		</td>
		<td style="text-align:center; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%;"><span style="font-weight:bold; text-decoration:underline;">BINARI, SE, MS.</span><br>Pembina Tk. I (IV/b)<br>NIP.19610927 198302 1 001

		</td>
    	<td style="width:2%;"></td>
    </tr>
</table>';
$pdf->writeHTML($html4, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('sertifikat-label-'.$pengujian->kode_barcode.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>