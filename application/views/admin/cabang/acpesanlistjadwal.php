<!--Pendanda Status Admin Cabang-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Admin Bus <?php echo $this->session->userdata('perusahaan'); ?> Cabang
    <?php echo $this->session->userdata('terminal'); ?> -   <?php echo $this->session->userdata('kota'); ?>
  </p>
<!-- //Pendanda Status Admin Cabang-->

<!-- Button group-->
<div class="tombol">
<div class="btn-toolbar d-block mx-auto" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="<?php echo base_url('index.php/Cabang/acpesan');?>"><button type="button" class="btn btn-primary btn-lg">Pesan Tiket Bus</button></a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <a href="<?php echo base_url('index.php/Cabang/acpembelian');?>"><button type="button" class="btn btn-secondary btn-lg">Data Pembelian Tiket</button></a>
  </div>
	<div class="btn-group mr-2" role="group" aria-label="Third group">
    <a href="<?php echo base_url('index.php/Cabang/acbus');?>"><button type="button" class="btn btn-secondary btn-lg">Data Jadwal Bus</button></a>
  </div>
</div>
</div>
<!-- Button -->

<!-- Main -->
<body>
<p class='btn btn-success' style='margin-top:2%;'> Hasil Pencarian Bus tanggal berangkat <?php echo $date ?></p>

<div class="div mx-auto" style="width:80%;">
<table class="table table-inverse" style="margin-top:3%;">
  <thead>
    <tr>
      <td>Ke</td>
      <td>Jam</td>
      <td>Harga</td>
      <td>Tersedia</td>
    </tr>
  </thead>
  <tbody>
  <?php foreach($jadwal->result() as $row) {?>
    <tr>
      <td><?php echo $row->terminal_tujuan.' - '. $row->kota_tujuan; ?></td>
      <td><?php echo $row->jam; ?></td>
      <td>Rp. <?php echo $row->harga; ?></td>
	  <td>

      <a href="<?php echo base_url('index.php/Cabang/acpesankursi?id='.$row->id. '&date='.$date);?>" class="btn btn-sm btn-info">Pilih Kursi</a>
	  </td>
    </tr>
  <?php }?>

  </tbody>
</table>
</div>
<!-- Main -->
