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
		$img_file = K_PATH_IMAGES.'back-sertif-2.jpg';
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
$pdf->SetTitle('Sertifikat');
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
        <td style="text-align:center; font-size:8pt; font-weight:bold; font-family: Arial, Helvetica, sans-serif; vertical-aligns:middle;">'.$perizinan->no_spk.'</td>
    </tr>
    <tr>
        <td></td>
       	<td></td>
       	<td></td>
        <td style="height:30px;"></td>
    </tr>
    

</table>';


$pdf->writeHTML($html, true, false, true, false, '');

$tgl_berlaku   = date('Y-m-d', strtotime($perizinan->created_at_izin));
$tgl_berakhir  = date('Y-m-d', strtotime($perizinan->tgl_expired));
$tgl_terbit  = date('Y-m-d', strtotime($perizinan->tgl_terbit));
$sekarang		= date('Y-m-d');
$alamat_pt_detail = $this->WorkshopM->detail_alamat($perizinan->id_kel_perusahaan)->row();
$alamat = $perizinan->alamat_perusahaan.'<br>'.ucfirst(strtolower($alamat_pt_detail->nama_kelurahan)).', '.strtolower($alamat_pt_detail->nama_kecamatan).', '.strtolower($alamat_pt_detail->nama_kabupaten_kota).', '.$alamat_pt_detail->nama_propinsi;
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
       	<td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman;">SURAT PERSETUJUAN KEWENANGAN PERAWATAN DAN PERBAIKAN</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:12pt; font-weight:bold; text-decoration: underline; font-family:Times New Roman; text-transform: capitalize; font-style:italic;">'.strtoupper($perizinan->nama_alat).'('.$perizinan->kode_alat.')</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:9pt; font-weight:bold; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; font-style: italic;">
       		Berdasarkan UU No.17 Tahun 2008, PP No. 15 Tahun 2016 dan KM. 67 Tahun 2002, Resolusi IMO A.761 (18) dengan <br>Amandemen IMO MSC.55 (66), SOLAS 1974 Amandemen Manila 2010
		</td>
    </tr>
    <tr>
       	<td colspan="4" style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  height:20px;">
       	Nomor : '.$perizinan->kode_alat.'/'.$perizinan->no_spk.'/'.date("y").'
		</td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td colspan="3" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:96%; height:53px;">Berdasarkan surat permohonan Saudara Nomor : 058/SS/Ext-HRD/X/2018 Tanggal <b>'.date_indo($tgl_berlaku).'</b> dan pemenuhan persyaratan administrasi serta teknis, maka diberikan perpanjangan izin Surat Persetujuan Kewenangan Perawatan dan Perbaikan '.$perizinan->nama_alat.' kepada :
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:38%;">Nama Perusahaan
		</td>
		<td style="width:2%; font-weight: bold; vertical-align:middle;">:</td>
		<td style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:56%;">'.$perizinan->nama_perusahaan.'
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:38%;">Alamat Kantor Perusahaan
		</td>
		<td style="width:2%; font-weight: bold; vertical-align:middle;">:</td>
		<td style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:56%;">'.$perizinan->alamat_perusahaan.', '.ucwords(strtolower($alamat_pt_detail->nama_kelurahan)).', '.ucwords(strtolower($alamat_pt_detail->nama_kecamatan)).', '.ucwords(strtolower($alamat_pt_detail->nama_kabupaten_kota)).', '.$alamat_pt_detail->nama_propinsi.'
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:38%;">Akte Pendirian Perusahaan
		</td>
		<td style="width:2%; font-weight: bold; vertical-align:middle;">:</td>
		<td style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:56%;">'.$perizinan->akta_perusahaan.'
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:38%;">Akte Pemimpin/Penanggung Jawab
		</td>
		<td style="width:2%; font-weight: bold; vertical-align:middle;">:</td>
		<td style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:56%;">'.$perizinan->nama_pimpinan.'
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:38%;">Nomor Pokok Wajib Pajak
		</td>
		<td style="width:2%; font-weight: bold; vertical-align:middle;">:</td>
		<td style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:56%;">'.$perizinan->npwp.'
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:38%;">Wilayah 
		</td>
		<td style="width:2%; font-weight: bold; vertical-align:middle;">:</td>
		<td style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:56%;">Timur
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td colspan="3" style="text-align:justify; font-weight:bold; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:96%;">Kewajiban pemegang Surat Persetujuan Kewenangan Perawatan dan Perbaikan '.$perizinan->nama_alat.':
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">1.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Pelaksanaan perawatan dan perbaikan '.$perizinan->nama_alat.' memperhatikan ketentuan Balai Teknologi Keselamatan Pelayaran Direktorat Jenderal Perhubungan Laut;
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">2.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Mengutamakan kebersihan ruangan bengkel dan peralatan penguji / peralatan kerja serta melaksanakan ketentuan-ketentuan yang menyangkut keselamatan dan kesehatan kerja;
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">3.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Pekerjaan perawatan dan perbaikan '.$perizinan->nama_alat.' dilakukan oleh tenaga ahli yang memiliki sertifikat dari pabrik pembuat yang masih berlaku; 
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">4.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Pekerjaan perawatan dan perbaikan setiap unit alat keselamatan dilakukan di dalam service station yang dibuktikan dengan berita acara dan dokumentasi;
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">5.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Penggunaan suku cadang ataupun perlengkapan isi '.$perizinan->nama_alat.' dengan memperhatikan masa berlakunya;
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">6.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Menghadirkan Pejabat Pemeriksa Keselamatan Kapal (PPKK) dari Kantor Kesyahbandaran Utama, Kantor Kesyahbandaran dan Otoritas Pelabuhan (KSOP), Kantor Pelabuhan atau Kantor Unit Penyelenggara Pelabuhan (UPP) setempat untuk melakukan Pengawasan kegiatan perawatan dan perbaikan '.$perizinan->nama_alat.' sebelum dan setelah '.$perizinan->nama_alat.' ditutup, dituangkan dalam bentuk Berita Acara yang ditandatangani Pejabat Pemeriksa Keselamatan Kapal (PPKK);
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
       	<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:4%;">7.
		</td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:92%;">Mengajukan permohonan perpanjangan SPK 1 (satu) bulan sebelum berakhirnya masa berlaku.
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td colspan="3" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:96%;">Surat Persetujuan Kewenangan Perawatan dan Perbaikan '.$perizinan->nama_alat.' ini dapat dicabut apabila terjadi Pelanggaran Kewajiban-kewajiban.
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td colspan="3" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:96%;">Surat Persetujuan Kewenangan Perawatan dan Perbaikan '.$perizinan->nama_alat.' ini berlaku sejak tanggal dikeluarkan, sampai dengan tanggal :<span style="padding-right: 5px; padding-left:5px; background-color:white; postition: absolute; border: 1px; font-weight: bold">   '.date_indo($tgl_berakhir).'   </span>
		</td>
    	<td style="width:2%;"></td>
    </tr>    
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:46%; height: 5px;">Dikeluarkan di	: J A K A R T A
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 5px;">
		</td>
    	<td style="width:2%;"></td>

		<td style="text-align:justify; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:46%; height: 5px;">Pada Tanggal : '.date_indo($tgl_terbit).'
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr >
    	<td style="width:20%;"></td>
		<td rowspan="2" style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:30%; height: 10px;"><img style="witdh:78px; height:78px; align:center;" src="'.base_url('assets/img/qrcode/'.$perizinan->kode_barcode.'.png').'">
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
		<td style="text-align:justify; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize;">
		</td>
    	<td style="width:2%;"></td>
    </tr>
    <tr>
    	<td style="width:2%;"></td>
		<td style="text-align:center; font-size:10pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%; height: 10px;">'.$perizinan->kode_barcode.'
		</td>
		<td style="text-align:center; font-size:9pt; font-family: Arial, Helvetica, sans-serif;  text-transform: capitalize; width:48%;"><span style="font-weight:bold; text-decoration:underline;">BINARI, SE, MS.</span><br>Pembina Tk. I (IV/b)<br>NIP.19610927 198302 1 001

		</td>
    	<td style="width:2%;"></td>
    </tr>
</table>';
$pdf->writeHTML($html2, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>