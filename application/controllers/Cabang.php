<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	function __construct (){
		parent::__construct();

		//load model yg digunakan
		$this->load->library('session');
		$this->load->model('Modele');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->acpembelian();
	}




	public function acpesan()
	{
		$perusahaan = $this->session->userdata('perusahaan');
		$terminal_asal = $this->session->userdata('terminal');
		$kota_asal = $this->session->userdata('kota');
		$data['tujuan'] = $this->Modele->kotaTujuanPerusahaan($perusahaan,$terminal_asal,$kota_asal);
		if($this->session->userdata('jenis')=='cabang'){
			$this->load->view('components/headerLogin');
			$this->load->view('admin/cabang/acpesan',$data);
			$this->load->view('components/footer');
		}
	}

	//pencarian jadwal bus saat penumpang datang ke kantor cabang
	public function acpesancari()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$perusahaan=$this->session->userdata('perusahaan');
			$kota_asal=$this->session->userdata('kota');
			$terminal_asal=$this->session->userdata('terminal');
			$tujuan=$this->input->post('kota_tujuan',true);
			$date=$this->input->post('date',true);
			$time=$this->input->post('time',true);

			$data['jadwal'] = $this->Modele->acPencarianJam($perusahaan,$kota_asal,
												$terminal_asal,$tujuan,$time);
			$data['date'] = $date;

			$this->load->view('components/headerLogin');

			if($data['jadwal']->num_rows()==0){
				redirect(base_url('index.php/Cabang/acpesan?war=1'));
			}
			else{
				$this->load->view('admin/cabang/acpesanlistjadwal',$data);
			}
			$this->load->view('components/footer');
		}
	}

	public function acpesankursi()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$id=$this->input->get('id',true);
			$date=$this->input->get('date',true);

			$data['jadwal'] = $this->Modele->kursiBus($id)->row();
			$data['date'] = $date;

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/cabang/acpesanpilihkursi');
		}
	}

	//beli tiket
	//klik beli
	public function acbelitiket()
	{

		$id=$this->input->post('id',true);
		$pemesan=$this->input->post('pemesan',true);
		$kursi=$this->input->post('kursi',true);
		$biaya=$this->input->post('biaya',true);
		$tglberangkat=$this->input->post('date',true);
		$tglpesan=date('y-m-d');

		$jadwal = $this->Modele->kursiBus($id)->row();
		$datane = array (
						'pemesan' => $pemesan,
						'tanggal_pesan' => $tglpesan,
						'tanggal_berangkat' => $tglberangkat,
						'waktu' => $jadwal->jam,
						'jenis' => 'offline',
						'status' => 'dibayar',
						'perusahaan' => $jadwal->perusahaan,
						'admin'=> $this->session->userdata('username'),
						'jml_kursi' => $kursi,
						'terminal_asal' => $jadwal->terminal_asal,
						'kota_asal' => $jadwal->kota_asal,
						'terminal_tujuan' => $jadwal->terminal_tujuan,
						'kota_tujuan' => $jadwal->kota_tujuan,
						'biaya' => $biaya,
		);
		$this->Modele->simpanTiket($datane);
		redirect(base_url('index.php/Cabang/acpembelian?war=1'));
	}


	// data pembelian tiket
	public function acpembelian()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$perusahaan = $this->session->userdata('perusahaan');
			$terminal = $this->session->userdata('terminal');
			$kota = $this->session->userdata('kota');
			$user = $this->session->userdata('username');

			$data['tiket'] = $this->Modele->AcPembelianTiket($perusahaan,$terminal,$kota,$user);

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/cabang/acpembelian');
			$this->load->view('components/footer');
		}
	}

	public function lihatbukti()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$id=$this->input->get('id',true);

			$data['pemesan']=$this->Modele->lihatBukti($id)->row();

			$this->load->view('components/headerLogin',$data);
			$this->load->view('admin/cabang/acbukti');
			$this->load->view('components/footer');
		}

	}
	public function ubahstatus()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$id=$this->input->get('id',true);
			$data = array('status' => 'dibayar', 'admin' => $this->session->userdata('username'));
			$this->Modele->ubahStatus($id,$data);

			redirect(base_url('index.php/Cabang/acpembelian?war=2'));
		}

	}

	//ke halaman acbus
	public function acbus()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$perusahaan = $this->session->userdata('perusahaan');
			$terminal = $this->session->userdata('terminal');
			$kota = $this->session->userdata('kota');

			$data['jadwal'] = $this->Modele->AcBusPencarian($perusahaan,$terminal,$kota);

			$this->load->view('components/headerLogin');
			$this->load->view('admin/cabang/acbus',$data);
			$this->load->view('components/footer');
		}
	}

	//ke halaman acbus edit jadwal
	public function acbuseditjadwal($id)
	{
		if($this->session->userdata('jenis')=='cabang'){
			$data['jadwal'] = $this->Modele->editJadwal($id)->row();

			$this->load->view('components/headerLogin');
			$this->load->view('admin/cabang/acbusedit',$data);
			$this->load->view('components/footer');
		}
	}

	//update data jadwal di database
	public function acbusupdatejadwal($id)
	{
		if($this->session->userdata('jenis')=='cabang'){
			$data = array (
							'terminal_tujuan' => $this->input->post('terminal_tujuan'),
							'kota_tujuan' => $this->input->post('kota_tujuan'),
							'waktu' => $this->input->post('jam'),
							'harga' => $this->input->post('harga')
			);

			$this->Modele->updateJadwal($id,$data);
			redirect(base_url('index.php/Cabang/acbus?war=1'));
		}
	}

	//ke halaman tambah jadwal
	public function acbustambahjadwal()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$this->load->view('components/headerLogin');
			$this->load->view('admin/cabang/acbusadd');
			$this->load->view('components/footer');
		}
	}

	// simpan jadwal
	public function acbussimpanjadwal()
	{
		if($this->session->userdata('jenis')=='cabang'){
			$data = array (
							'perusahaan' => $this->session->userdata('perusahaan'),
							'terminal_asal' => $this->session->userdata('terminal'),
							'kota_asal' => $this->session->userdata('kota'),
							'terminal_tujuan' => $this->input->post('terminal_tujuan'),
							'kota_tujuan' => $this->input->post('kota_tujuan'),
							'waktu' => $this->input->post('jam'),
							'harga' => $this->input->post('harga')
			);

			$this->Modele->simpanJadwal($data);
			redirect(base_url('index.php/Cabang/acbus?war=2'));
		}
	}

	public function acbushapusjadwal($id)
	{
		$data = array('id' => $id);
		$this->Modele->acHapusJadwal($data);
		redirect(base_url('index.php/Cabang/acbus?war=3'));
	}
}
?>
