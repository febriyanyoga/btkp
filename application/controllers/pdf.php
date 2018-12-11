<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pdf extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	public function index()
	{ 
		//load mPDF library
		$this->load->library('m_pdf');
		$this->load->model('WorkshopM');
		//load mPDF library


		//now pass the data//
        $this->data['detail_perizinan'] = $this->WorkshopM->get_all_perizinan_by_id('1')->row();
		$this->data['title']="MY PDF TITLE 1.";
		$this->data['description']="";
		// $this->data['description']=$this->official_copies;
		 //now pass the data //

		
		$html=$this->load->view('workshop/print_surat',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

		//this the the PDF filename that user will get to download
		$pdfFilePath ="mypdfName-".time()."-download.pdf";

		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
	}
}
