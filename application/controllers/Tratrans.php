<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tratrans extends CI_Controller {

	function __construct (){
		parent::__construct();

		//load model yg digunakan
		$this->load->library('session');
		$this->load->model('Modele');
		$this->load->helper('url_helper');
		$this->load->helper('date');
	}

	public function index()
	{

		$data['asal'] = $this->Modele->kotaAsal();
		$data['tujuan'] = $this->Modele->kotaTujuan();

		if($this->session->userdata('jenis')=='pusat'){
			redirect(base_url('index.php/Pusat'));
		}
		else if($this->session->userdata('jenis')=='cabang'){
			redirect(base_url('index.php/Cabang'));
		}
		else if($this->session->userdata('jenis')=='member'){
				$this->load->view('components/headerLoginUser');
				$this->load->view('navbar/home',$data);
				$this->load->view('components/footer');
		}
		else{
			$this->load->view('components/header');
			$this->load->view('navbar/home',$data);
			$this->load->view('components/footer');
		}

	}

	public function carabayar()
	{
		if($this->session->userdata('jenis')=='member'){
			$this->load->view('components/headerLoginUser');
		}
		else if($this->session->userdata('jenis')=='cabang' || $this->session->userdata('jenis')=='pusat'){
			$this->load->view('components/headerLogin');
		}
		else{
			$this->load->view('components/header');
		}
		$this->load->view('navbar/carabayar');
		$this->load->view('components/footer');
	}

	public function tentang()
	{
		if($this->session->userdata('jenis')=='member'){
			$this->load->view('components/headerLoginUser');
		}
		else if($this->session->userdata('jenis')=='cabang' || $this->session->userdata('jenis')=='pusat'){
			$this->load->view('components/headerLogin');
		}
		else{
			$this->load->view('components/header');
		}
		$this->load->view('navbar/tentang');
		$this->load->view('components/footer');
	}

	public function login()
	{
		$this->load->view('components/header');
		$this->load->view('navbar/login');
		$this->load->view('components/footer');
	}

	public function ceklogin()
	{
			$user=$this->input->post('username',true);
			$pass=$this->input->post('password',true);
			$cek=$this->Modele->prosesLogin($user,$pass);
			$hasil=count($cek);
			echo $hasil;

			if($hasil==1){
				$pelogin=$this->db->get_where('user',array('username' => $user, 'password' => $pass))->row();
				$level=$pelogin->jenis;
				$data_session =array('username' => $pelogin->username , 'perusahaan' => $pelogin->perusahaan,
				'terminal' => $pelogin->terminal, 'kota' => $pelogin->kota , 'jenis' => $pelogin->jenis);
				$this->session->set_userdata($data_session);

				if($level=='pusat'){
					redirect(base_url('index.php/Pusat/appembelian'));
				}
				else if($level=='cabang'){
					redirect(base_url('index.php/Cabang/acpembelian'));
				}
				else if($level=='member'){
					redirect(base_url('index.php/Tratrans/index'));
				}
			}
			else{
				redirect(base_url('index.php/Tratrans/login?war=1'));
			}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/Tratrans/login'));
	}


	public function daftar()
	{
		$this->load->view('components/header');
		$this->load->view('navbar/daftar/member');
		$this->load->view('components/footer');
	}

	public function pendaftaranMember(){
		$email= $this->input->post('email');
		$user = $this->input->post('username');

		$checkemail = $this->Modele->checkEmail($email);
		$checkuser = $this->Modele->checkUser($user);

		if($checkemail>0){
			redirect(base_url('index.php/Tratrans/daftar?war=1'));
		}
		else if($checkuser>0){
			redirect(base_url('index.php/Tratrans/daftar?war=2'));
		}
		else{
			$data = array (
							'email' => $this->input->post('email'),
							'username' => $this->input->post('username'),
							'nama' => $this->input->post('name'),
							'jenis' => 'member',
							'password' => $this->input->post('password'),
							'nohp' => $this->input->post('nohp'),
							'alamat' => $this->input->post('alamat')
			);
			$this->Modele->simpanDaftar($data);
			redirect(base_url('index.php/Tratrans/login?war=2'));
		}
	}

	public function daftaradmin()
	{
		$this->load->view('components/header');
		$this->load->view('navbar/daftar/admin');
		$this->load->view('components/footer');
	}

	public function pendaftaranAdmin(){
		$email= $this->input->post('email');
		$user = $this->input->post('username');

		$checkemail = $this->Modele->checkEmail($email);
		$checkuser = $this->Modele->checkUser($user);

		if($checkemail>0){
			redirect(base_url('index.php/Tratrans/daftaradmin?war=1'));
		}
		else if($checkuser>0){
			redirect(base_url('index.php/Tratrans/daftaradmin?war=2'));
		}
		else{
			$data = array (
							'perusahaan' => $this->input->post('perusahaan'),
							'email' => $this->input->post('email'),
							'username' => $this->input->post('username'),
							'nama' => $this->input->post('name'),
							'password' => $this->input->post('password'),
							'jenis' => $this->input->post('jenis'),
							'terminal' => $this->input->post('terminal'),
							'kota' => $this->input->post('kota'),
							'noktp' => $this->input->post('noktp'),
							'nohp' => $this->input->post('nohp'),
							'alamat' => $this->input->post('alamat')
			);
			$this->Modele->simpanDaftar($data);
			redirect(base_url('index.php/Tratrans/login?war=3'));
		}
	}


	//daftar pencarian
	public function pencarianbus()
	{
		$asal=$this->input->post('kota_asal',true);
		$tujuan=$this->input->post('kota_tujuan',true);
		$date=$this->input->post('date',true);
		$time=$this->input->post('time',true);

		$data['jadwal'] = $this->Modele->pencarian($asal,$tujuan,$time);
		$data['date'] = $date;

		if($data['jadwal']->num_rows()==0){
			redirect(base_url('?war=1'));
		}
		else{
			if($this->session->userdata('jenis')=='member'){
				$this->load->view('components/headerLoginUser');
			}
			else{
				$this->load->view('components/header');
			}
			$this->load->view('pemesanan/listjadwal',$data);
			$this->load->view('components/footer');
		}
	}

	//pilih Kursi
	public function pilihkursi()
	{
		$id=$this->input->get('id',true);
		$date=$this->input->get('date',true);

		$data['jadwal'] = $this->Modele->kursiBus($id)->row();
		$data['date'] = $date;

		if($this->session->userdata('jenis')=='member'){
			$this->load->view('components/headerLoginUser',$data);
		}
		else{
			$this->load->view('components/header',$data);
		}

		$this->load->view('pemesanan/kursi');

	//	$this->load->view('components/footer');
	}


	//klik beli
	public function belitiket()
	{
		if($this->session->userdata('jenis')=='member'){
			$id=$this->input->post('id',true);
			$kursi=$this->input->post('kursi',true);
			$biaya=$this->input->post('biaya',true);
			$tglberangkat=$this->input->post('date',true);
			$tglpesan=date('y-m-d');

			$jadwal = $this->Modele->kursiBus($id)->row();
			$datane = array (
							'pemesan' => $this->session->userdata('username'),
							'tanggal_pesan' => $tglpesan,
							'tanggal_berangkat' => $tglberangkat,
							'waktu' => $jadwal->jam,
							'jenis' => 'online',
							'status' => 'belum dibayar',
							'perusahaan' => $jadwal->perusahaan,
							'jml_kursi' => $kursi,
							'terminal_asal' => $jadwal->terminal_asal,
							'kota_asal' => $jadwal->kota_asal,
							'terminal_tujuan' => $jadwal->terminal_tujuan,
							'kota_tujuan' => $jadwal->kota_tujuan,
							'biaya' => $biaya,
			);
			$this->Modele->simpanTiket($datane);
			redirect(base_url('index.php/Tratrans/riwayat'));
		}
		else{
			redirect(base_url('index.php/Tratrans/login?war=4'));
		}
	}

	public function riwayat()
	{
		if($this->session->userdata('jenis')=='member'){
			$pemesan = $this->session->userdata('username');
			$data['tiket'] = $this->Modele->riwayatBeliTiket($pemesan);

			$this->load->view('components/headerLoginUser',$data);
			$this->load->view('pemesanan/infotiket');
			$this->load->view('components/footer');
		}
	}

	public function bayar()
	{
		if($this->session->userdata('jenis')=='member'){
			$data['idne']=$this->input->get('id',true);

			$this->load->view('components/headerLoginUser',$data);
			$this->load->view('pemesanan/pembayaran');
			$this->load->view('components/footer');
		}
	}

	public function buktipembayaran()
	{
		if($this->session->userdata('jenis')=='member'){
			$id=$this->input->get('id',true);
			//move_uploaded_file($gambar,"assets/images/bukti/");
			//kanggo mindah file uploadan ng image/bukti/
	    if (isset($_FILES['bukti'])) {
	        $file_name = $_FILES["bukti"]["name"];
					$file_tmp = $_FILES["bukti"]["tmp_name"];
					$uploads_dir = 'assets/images/bukti/';
	        //$name = basename($_FILES["bukti"]["name"]);
					move_uploaded_file($file_tmp, $uploads_dir.$file_name);
					$path_gambar = $uploads_dir.$file_name;
	    }

			$data = array (
							'bukti' => $path_gambar,
			);
			$this->Modele->buktiPembayaran($id,$data);
			redirect(base_url('index.php/Tratrans/riwayat?war=1'));
		}

	}

	public function lihatbukti()
	{
		if($this->session->userdata('jenis')=='member'){
			$id=$this->input->get('id',true);

			$data['pemesan']=$this->Modele->lihatBukti($id)->row();

			$this->load->view('components/headerLoginUser',$data);
			$this->load->view('pemesanan/bukti');
			$this->load->view('components/footer');
		}

	}

}
?>
