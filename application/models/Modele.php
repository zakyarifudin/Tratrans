<?php

class Modele extends CI_Model {
	//nama tabel dalam database
	protected $tablejadwal = 'jadwal';
	protected $tableuser = 'user';
	protected $tabletiket = 'tiket';


	public function kotaAsal(){
		$this->db->select('DISTINCT(kota_asal)');
		$this->db->from($this->tablejadwal);
		return $this->db->get();
	}

	public function kotaTujuan(){
		$this->db->select('DISTINCT(kota_tujuan)');
		$this->db->from($this->tablejadwal);
		return $this->db->get();
	}

	public function kotaTujuanPerusahaan($perusahaan, $terminal_asal, $kota_asal){
		$this->db->select('DISTINCT(kota_tujuan)');
		$this->db->where('perusahaan',$perusahaan);
		$this->db->where('terminal_asal',$terminal_asal);
		$this->db->where('kota_asal',$kota_asal);
		$this->db->from($this->tablejadwal);
		return $this->db->get();
	}

	//pecarian dari member
  public function pencarian($asal,$tujuan,$time){
		$this->db->select("id ,perusahaan, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, TIME_FORMAT(waktu,'%H:%i') as jam ,harga");
		$this->db->where('kota_asal', $asal);
		$this->db->where('kota_tujuan', $tujuan);
		$this->db->where('waktu >=', $time);
		$this->db->from($this->tablejadwal);
		$this->db->order_by("waktu", "asc");
		return  $this->db->get();
  }

	//pecarian kursi bus
	public function kursiBus($id){
		$this->db->select("id ,perusahaan, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, TIME_FORMAT(waktu,'%H:%i') as jam ,harga");
		$this->db->where('id', $id);
		$this->db->from($this->tablejadwal);
		return  $this->db->get();
	}

	public function simpanTiket($data){
		$this->db->insert($this->tabletiket,$data);
	}

	public function riwayatBeliTiket($pemesan){
		$this->db->select("id, pemesan, DATE_FORMAT(tanggal_pesan, '%d-%m-%Y') as tglpesan,
		 DATE_FORMAT(tanggal_berangkat, '%d-%m-%Y') as tglberangkat,
		 TIME_FORMAT(waktu,'%H:%i') as jam, jenis, status, perusahaan,
		 admin, jml_kursi, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, biaya, bukti");
		$this->db->where('pemesan', $pemesan);
		$this->db->where('admin', '');
		$this->db->from($this->tabletiket);
		$this->db->order_by("id", "desc");
		return  $this->db->get();
  }

	public function buktiPembayaran($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->tabletiket, $data);
	}

	public function lihatBukti($id){
		$this->db->where('id',$id);
		$this->db->from($this->tabletiket);
		return  $this->db->get();
	}






	//Admin cabang
	// luru jam soko cabange dhewe
	public function acPencarianJam($perusahaan,$kota_asal,$terminal_asal,$tujuan,$time){
		$this->db->select("id ,perusahaan, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, TIME_FORMAT(waktu,'%H:%i') as jam ,harga");
		$this->db->where('perusahaan', $perusahaan);
		$this->db->where('kota_asal', $kota_asal);
		$this->db->where('terminal_asal', $terminal_asal);
		$this->db->where('kota_tujuan', $tujuan);
		$this->db->where('waktu >=', $time);
		$this->db->from($this->tablejadwal);
		$this->db->order_by("waktu", "asc");
		return  $this->db->get();
	}

	//jadwal bus dari admin cabang
	public function AcBusPencarian($perusahaan,$terminal,$kota){
		$this->db->select("id, terminal_tujuan, kota_tujuan, TIME_FORMAT(waktu,'%H:%i') as jam ,harga");
		$this->db->where('perusahaan', $perusahaan);
		$this->db->where('terminal_asal', $terminal);
		$this->db->where('kota_asal', $kota);
		$this->db->from($this->tablejadwal);
		$this->db->order_by("waktu", "asc");
		return  $this->db->get();
  }
	// cari data user
	public function prosesLogin($user,$pass){
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('user')->row();
	}

	//fungsi simpan/insert ke database user
	public function simpanDaftar($data) {
		$this->db->insert($this->tableuser,$data);
	}

	//fungsi buat select email
	public function checkEmail($data){
		$this->db->where('email',$data);
		return $this->db->get('user')->row();
	}

	//fungsi buat select username
	public function checkUser($data){
		$this->db->where('username',$data);
		return $this->db->get('user')->row();
	}

	public function acHapusJadwal($data){
		$this->db->where($data);
		$this->db->delete($this->tablejadwal);
	}

	//untuk menampilkan data yg akan diedit
	public function editJadwal($id){
		$this->db->select("id, perusahaan, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, TIME_FORMAT(waktu,'%H:%i') as jam ,harga");
		$this->db->where('id', $id);
		$this->db->from($this->tablejadwal);
		return  $this->db->get();
	}

	//update database
	function updateJadwal($id, $data){
		$this->db->where('id',$id);  //yang mana yg mau diubah
		$this->db->update($this->tablejadwal, $data);
	}


	//fungsi simpan/insert ke database jadwal
	public function simpanJadwal($data) {
		$this->db->insert($this->tablejadwal,$data);
	}

	//update status pembayaran
	function ubahStatus($id, $data){
		$this->db->where('id',$id);  //yang mana yg mau diubah
		$this->db->update($this->tabletiket, $data);
	}

	// lihat data pembelian pada admin cabang
	public function AcPembelianTiket($perusahaan,$terminal,$kota,$user){
		$this->db->select("id, pemesan, DATE_FORMAT(tanggal_pesan, '%d-%m-%Y') as tglpesan,
		 DATE_FORMAT(tanggal_berangkat, '%d-%m-%Y') as tglberangkat,
		 TIME_FORMAT(waktu,'%H:%i') as jam, jenis, status, perusahaan,
		 admin, jml_kursi, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, biaya, bukti");
		$this->db->where('perusahaan', $perusahaan);
		$this->db->where('terminal_asal', $terminal);
		$this->db->where('kota_asal', $kota);
		$this->db->from($this->tabletiket);
		$this->db->order_by("id", "desc");
		return  $this->db->get();
	}




	//Admin pusat
	// data pegawai
	public function ApPegawaiList($perusahaan){
		$this->db->select("*");
		$this->db->where('perusahaan', $perusahaan);
		$this->db->where('jenis', 'cabang');
		$this->db->from($this->tableuser);
		$this->db->order_by("kota", "asc");
		return  $this->db->get();
	}

	// data detail seorang pegawai
	function ApPegawaiDetailed($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from($this->tableuser);
		return  $this->db->get();
	}

	public function ApHapusPegawai($data){
		$this->db->where($data);
		$this->db->delete($this->tableuser);
	}
	//Pembelian Tiket
	// lihat data pembelian pada admin pusat
	public function ApPembelianTiketDetail($perusahaan,$terminal,$kota){
		$this->db->select("id, pemesan, DATE_FORMAT(tanggal_pesan, '%d-%m-%Y') as tglpesan,
		 DATE_FORMAT(tanggal_berangkat, '%d-%m-%Y') as tglberangkat,
		 TIME_FORMAT(waktu,'%H:%i') as jam, jenis, status, perusahaan,
		 admin, jml_kursi, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, biaya, bukti");
		$this->db->where('perusahaan', $perusahaan);
		$this->db->where('terminal_asal', $terminal);
		$this->db->where('status','dibayar');
		$this->db->where('kota_asal', $kota);
		$this->db->from($this->tabletiket);
		//$this->db->order_by("kota_asal", "asc");
		return  $this->db->get();
	}

	// lihat data pembelian pada admin pusat
	public function ApPembelianTiket($perusahaan){
		$this->db->select("terminal_asal,kota_asal,sum(biaya) as total,,sum(jml_kursi) as tiket");
		$this->db->where('status','dibayar');
		$this->db->where('perusahaan', $perusahaan);
		$this->db->from($this->tabletiket);
		//$this->db->order_by("kota_asal", "asc");
		return  $this->db->get();
	}

	//jadwal bus dari admin pusat
	public function ApBusJadwal($perusahaan){
		$this->db->select('distinct(terminal_asal),kota_asal');
		$this->db->where('perusahaan', $perusahaan);
		$this->db->from($this->tablejadwal);
		$this->db->order_by("kota_asal", "asc");
		return  $this->db->get();
	}

	public function ApBusDetailJadwal($perusahaan,$terminal,$kota){
		$this->db->select("id, perusahaan, terminal_asal, kota_asal, terminal_tujuan, kota_tujuan, TIME_FORMAT(waktu,'%H:%i') as jam ,harga");
		$this->db->where('perusahaan', $perusahaan);
		$this->db->where('terminal_asal', $terminal);
		$this->db->where('kota_asal', $kota);
		$this->db->from($this->tablejadwal);
		$this->db->order_by("kota_tujuan", "asc");
		return  $this->db->get();
	}



/*
	function daftar(){
		return $this->db->get($this->table);	//sama dgn kita melakukan select * from mahasiswa
	}


	*/
}
?>
