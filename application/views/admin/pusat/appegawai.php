<!--Penanda StatusAdmin-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Admin Bus <?php echo $this->session->userdata('perusahaan'); ?> Pusat </p>
<!--Penanda StatusAdmin-->

<!-- Button group-->
<div class="tombol">
<div class="btn-toolbar d-block mx-auto" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="<?php echo base_url('index.php/Pusat/appegawai');?>"><button type="button" class="btn btn-primary btn-lg">Data Pegawai Cabang</button></a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <a href="<?php echo base_url('index.php/Pusat/appembelian');?>"><button type="button" class="btn btn-secondary btn-lg">Data Pembelian Tiket</button></a>
  </div>
	<div class="btn-group mr-2" role="group" aria-label="Third group">
    <a href="<?php echo base_url('index.php/Pusat/apbus');?>"><button type="button" class="btn btn-secondary btn-lg">Data Jadwal Bus</button></a>
  </div>
</div>
</div>
<!-- Button -->

<!-- Untuk Penanda jika berhasil menambahkan admin cabang baru -->
<?php
if (!empty($_GET['war'])){

	if ($_GET['war']==1){
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'> Email yang telah didaftarkan, coba Email lain! </p>";
	}
  else if ($_GET['war']==2){
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'> Username yang telah didaftarkan, coba Username lain! </p>";
	}
  else if ($_GET['war']==3){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'> Pegawai Admin Cabang baru telah berhasil didaftarkan </p>";
	}
  else if ($_GET['war']==4){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'> Pegawai Admin Cabang telah berhasil dihapus </p>";
	}
}
?>
<!-- Untuk Penanda jika berhasil menambahkan admin cabang baru -->

<!-- Main -->
<body>
  <div class="div mx-auto" style="width:80%;">
  <table class="table table-inverse" style="margin-top:3%;">
    <thead>
      <tr>
        <td>Username</td>
        <td>Nama</td>
        <td>Terminal</td>
        <td>Kota</td>
        <td>Email</td>
        <td>No HP</td>
        <td>
        <a href="<?php echo base_url('index.php/Pusat/appegawaitambah/'); ?>" class="btn btn-sm btn-info">Tambah Pegawai</a>
      </td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($user->result() as $row) {?>
      <tr>
        <td><?php echo $row->username; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td><?php echo $row->terminal; ?></td>
        <td><?php echo $row->kota; ?></td>
        <td><?php echo $row->email; ?></td>
        <td><?php echo $row->nohp; ?></td>
  	  <td>
        <a href="<?php echo base_url('index.php/Pusat/appegawaidetail/'. $row->id); ?>" class="btn btn-sm btn-warning">Detail</a>
        <a href="<?php echo base_url('index.php/Pusat/appegawaihapus/'. $row->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
  	  </td>
      </tr>
    <?php }?>

    </tbody>
  </table>
  </div>

<!-- //Main -->
