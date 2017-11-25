<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct (){
	parent::__construct();

	//load model yg digunakan
	//$this->load->model('m_spk');
	$this->load->helper('url_helper');
}

	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('coba');
		$this->load->view('components/footer');
	}
}
