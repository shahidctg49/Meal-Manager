<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error_page extends CI_Controller {
	public function page_missing()
	{
		$this->load->view('error/404');
	}
}
