<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pusat extends CI_Controller {

	function __construct (){
		parent::__construct();

		//load model yg digunakan
		$this->load->library('session');
		$this->load->model('Modele');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->appembelian();
	}

	//Admin Bus Pusat
	//melihat data pegawai
	public function appegawai()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$perusahaan = $this->session->userdata('perusahaan');
			$data['user'] = $this->Modele->ApPegawaiList($perusahaan);

			$this->load->view('components/headerLogin');
			$this->load->view('admin/pusat/appegawai',$data);
			$this->load->view('components/footer');
		}
	}

	//melihat pegawai secara detail
	public function appegawaidetail($id)
	{
		if($this->session->userdata('jenis')=='pusat'){
			$data['row'] = $this->Modele->ApPegawaiDetailed($id)->row();

			$this->load->view('components/headerLogin');
			$this->load->view('admin/pusat/appegawaidetail',$data);
			$this->load->view('components/footer');
		}
	}

	//ke halaman tambah data pegawai
	public function appegawaitambah()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$this->load->view('components/headerLogin');
			$this->load->view('admin/pusat/appegawaiadd');
			$this->load->view('components/footer');
		}
	}

	//Menyimpan data pegawai
	public function appegawaitambahsimpan()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$email= $this->input->post('email');
			$user = $this->input->post('username');

			$checkemail = $this->Modele->checkEmail($email);
			$checkuser = $this->Modele->checkUser($user);

			if($checkemail>0){
				redirect(base_url('index.php/Pusat/appegawai?war=1'));
			}
			else if($checkuser>0){
				redirect(base_url('index.php/Pusat/appegawai?war=2'));
			}
			else{
				$data = array (
								'perusahaan' => $this->session->userdata('perusahaan'),
								'email' => $this->input->post('email'),
								'username' => $this->input->post('username'),
								'nama' => $this->input->post('name'),
								'password' => $this->input->post('password'),
								'jenis' => 'cabang',
								'terminal' => $this->input->post('terminal'),
								'kota' => $this->input->post('kota'),
								'noktp' => $this->input->post('noktp'),
								'nohp' => $this->input->post('nohp'),
								'alamat' => $this->input->post('alamat')
				);
				$this->Modele->simpanDaftar($data);
				redirect(base_url('index.php/Pusat/appegawai?war=3'));
			}
		}
	}


	public function appegawaihapus($id)
	{
		$data = array('id' => $id);
		$this->Modele->ApHapusPegawai($data);
		redirect(base_url('index.php/Pusat/appegawai?war=4'));
	}



	public function appembelian()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$perusahaan = $this->session->userdata('perusahaan');
			$data['tiket'] = $this->Modele->ApPembelianTiket($perusahaan);

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/pusat/appembelian');
			$this->load->view('components/footer');
		}
	}

	public function appembeliandetail()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$perusahaan = $this->session->userdata('perusahaan');
			$terminal = $this->input->get('terminal',TRUE);
			$kota = $this->input->get('kota',TRUE);

			$data['asal'] = $this->Modele->ApPembelianTiketDetail($perusahaan,$terminal,$kota)->row();
			$data['tiket'] = $this->Modele->ApPembelianTiketDetail($perusahaan,$terminal,$kota);

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/pusat/appembeliandetail');
			$this->load->view('components/footer');
		}
	}
	//Jadwal Bus dari admin pusat
	public function apbus()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$perusahaan = $this->session->userdata('perusahaan');
			$data['jadwal'] = $this->Modele->ApBusJadwal($perusahaan);

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/pusat/apbus');
			$this->load->view('components/footer');
		}
	}

	public function apbusdetailjadwal()
	{
		if($this->session->userdata('jenis')=='pusat'){
			$perusahaan = $this->session->userdata('perusahaan');
			$terminal = $this->input->get('terminal',TRUE);
			$kota = $this->input->get('kota',TRUE);

			$data['asal'] = $this->Modele->ApBusDetailJadwal($perusahaan,$terminal,$kota)->row();
			$data['jadwal'] = $this->Modele->ApBusDetailJadwal($perusahaan,$terminal,$kota);

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/pusat/apbusdetail');
			$this->load->view('components/footer');
		}
	}

}
?>
