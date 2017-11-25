<!--Pendanda Status Admin Cabang-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Admin Bus <?php echo $this->session->userdata('perusahaan'); ?> Cabang
    <?php echo $this->session->userdata('terminal'); ?> -   <?php echo $this->session->userdata('kota'); ?>
  </p>
<!-- //Pendanda Status Admin Cabang-->

<!-- Button group-->
<div class="tombol">
<div class="btn-toolbar d-block mx-auto" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="<?php echo base_url('index.php/Cabang/acpesan');?>"><button type="button" class="btn btn-secondary btn-lg">Pesan Tiket Bus</button></a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <a href="<?php echo base_url('index.php/Cabang/acpembelian');?>"><button type="button" class="btn btn-secondary btn-lg">Data Pembelian Tiket</button></a>
  </div>
	<div class="btn-group mr-2" role="group" aria-label="Third group">
    <a href="<?php echo base_url('index.php/Cabang/acbus');?>"><button type="button" class="btn btn-primary btn-lg">Data Jadwal Bus</button></a>
  </div>
</div>
</div>
<!-- Button -->
<!-- Untuk Penanda jika berhasil menambahkan admin cabang baru -->
<?php
if (!empty($_GET['war'])){

  if ($_GET['war']==1){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'> Jadwal telah berhasil diedit </p>";
	}
  else if ($_GET['war']==2){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'> Jadwal baru telah berhasil ditambahkan </p>";
	}
  else if ($_GET['war']==3){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'> Jadwal telah berhasil dihapus </p>";
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
        <td>Terminal Tujuan</td>
        <td>Kota Tujuan</td>
        <td>Jam</td>
        <td>Harga</td>
        <td>
        <a href="<?php echo base_url('index.php/Cabang/acbustambahjadwal/'); ?>" class="btn btn-sm btn-info">Tambah Jadwal</a>
      </td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($jadwal->result() as $row) {?>
      <tr>
        <td><?php echo $row->terminal_tujuan; ?></td>
        <td><?php echo $row->kota_tujuan; ?></td>
        <td><?php echo $row->jam; ?></td>
        <td>Rp. <?php echo $row->harga; ?></td>
  	  <td>
        <a href="<?php echo base_url('index.php/Cabang/acbuseditjadwal/'. $row->id); ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?php echo base_url('index.php/Cabang/acbushapusjadwal/'. $row->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
  	  </td>
      </tr>
    <?php }?>

    </tbody>
  </table>
  </div>

<!-- //Main -->
