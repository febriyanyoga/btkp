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
		$img_file = K_PATH_IMAGES.'sertif4-1.jpg';
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
$pdf->SetTitle('Sertifikat Inspeksi');
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
$alamat_pt_detail = $this->WorkshopM->detail_alamat($inspeksi->id_kel_workshop)->row();
$tgl_expired  = date('Y-m-d', strtotime($inspeksi->tgl_expired));
$tgl_terbit = date('Y-m-d', strtotime($inspeksi->tgl_terbit));
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
       	<td colspan="4" style="text-align:center; font-size:14pt; font-weight:bold; font-family: Times New Roman;  text-transform: capitalize; text-decoration: underline;">CERTIFICATE OF INSPECTION</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:26.6px;"></td>
    </tr>
    <tr>
        <td colspan="" style="width:2.5%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;">
            
        </td>
        <td colspan="" style="width:20%;text-align:center; font-size:9pt;font-family: Arial; text-transform: capitalize;height:38px;">
        Date<br><span style="font-size:10pt;">'.date_indo($tgl_terbit).'</span></td>

        <td colspan="" style="width:1%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize; height:38px;"></td>


        <td colspan="" style="width:27%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize;height:38px;">Type and name of ship/unit:<br><span style="font-size:10pt;">'.$inspeksi->nama_kapal.'</span></td>

        <td colspan="" style="width:1%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;"></td>

        <td colspan="" style="width:13%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize;height:38px;">Flag:<br><span style="font-size:10pt;">'.$inspeksi->flag.'</span></td>

        <td colspan="" style="width:1%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;"></td>

        <td colspan="" style="width:12.5%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize;height:38px;">IMO No:<br><span style="font-size:10pt;">'.$inspeksi->imo.'</span></td>

        <td colspan="" style="width:1.5%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;"></td>

        <td colspan="" style="width:18%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize;height:38px;">Certificate No:<br><span style="font-size:10pt;">'.$inspeksi->kode_alat.' '.$inspeksi->no_spk.'/'.date('Y', strtotime($inspeksi->tgl_terbit)).'</span></td>
    </tr>
    <tr>
        <td colspan="" style="width:2.5%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;"></td>
        <td colspan="" style="width:20%;text-align:center; font-size:8.5pt;font-family:Arial; text-transform: capitalize;height:38px;">Place of service:<br><span style="font-size:8pt;">'.$alamat_pt_detail->nama_kabupaten_kota.'</span></td>

        <td colspan="" style="width:1%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;"></td>

        <td colspan="" style="width:41%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize;height:38px;">Classification Society:
            <br><span style="font-size:10pt;">'.$inspeksi->klasifikasi.'</span>
        </td>

        <td colspan="" style="width:1%;text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;height:38px;"></td>

        <td colspan="" style="width:32%;text-align:center; font-size:9pt;font-family:Arial; text-transform: capitalize;height:38px;">Order No:<br><span style="font-size:10pt;">'.$inspeksi->id_inspeksi.'/'.date('Ymd', strtotime($inspeksi->created_at_inspeksi)).'</span></td>
    </tr>
    
</table>';

    $pdf->writeHTML($html2, true, false, true, false, '');
   

    $html4 = '<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:center; font-size:10pt; font-family: Times New Roman; font-style:italic;  text-transform: capitalize; width:96%; height: 58px;">We Hereby That The Systems And Equipment Specified Before Have Been<br> Inspected, Serviced, Refilled<br>
            In Our Service Station / On Board Vessel<br>
            And Tested According To Requirement From IMO Regulations, SOLAS And Manufacturer.<br>
            The Quality Of Equipment And Working Code Enclosed In Service Report Back Of This Page.
        </td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 30px;">
		</td>
    	<td style="width:2%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:46%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
        <td style="width:2%;"></td>
        <td style="text-align:center; font-size:16pt; font-family: Times New Roman;  text-transform: capitalize; width:96%; height: 38px; font-weight:bold;">
        '.$inspeksi->nama_alat.'
        </td>
        <td style="width:2%;"></td>
    </tr>
    <tr>
        <td style="width:2%;"></td>
        <td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 200px;">
        </td>
        <td style="width:2%;"></td>

        <td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:46%; height: 5px;">
        </td>
        <td style="width:2%;"></td>
    </tr>
    <tr >
    	<td style="width:20%;"></td>
		<td rowspan="2" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:30%; height: 10px;"><img style="witdh:78px; height:78px; align:center;" src="'.base_url('assets/img/qrcode/'.$inspeksi->kode_barcode.'.png').'">
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
		<td style="width:25%; text-align:center; vertical-aligns:middle; font-size:17pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; color:gray;">Tanda <br>Tangan
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 10px;">'.$inspeksi->kode_barcode.'
		</td>
		<td style="text-align:center; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%;"><span style="font-weight:bold; text-decoration:underline;">BINARI, SE, MS.</span><br>Pembina Tk. I (IV/b)<br>NIP.19610927 198302 1 001

		</td>
    	<td style="width:2%;"></td>
    </tr>
</table>';
$pdf->writeHTML($html4, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('sertifikat-inspeksi-'.$inspeksi->kode_barcode.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>