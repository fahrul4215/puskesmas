<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintNomor extends CI_Controller {

	public function index()
	{
		// echoexec('LOL' > '\Microsoft Print To PDF');
		// shell_exec('print LOL');
		// definisikan nama printernya dibawah
		// $handle= printer_open("USB Thermal Printer");
		// printer_set_option($handle, PRINTER_MODE, "RAW");
		// printer_start_doc($handle, "Menggunakan Printer PHP");
		// printer_start_page($handle);
		// //tuliskan huruf yang akan dicetak disini
		// $cetak = "Testing Printer dengan PHP";
		// printer_write( $handle , $cetak);
		// printer_end_page($handle);
		// printer_end_doc($handle);
		// printer_close($handle);

		// $TextToBePrinted = "LOL";
		// system("(echo ".$TextToBePrinted.") >\\\\127.0.0.1\\USB Thermal Printer");
		$this->load->view('print');
	}

}

/* End of file print.php */
/* Location: ./application/controllers/print.php */