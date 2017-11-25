<!--Penanda StatusAdmin-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Admin Bus <?php echo $this->session->userdata('perusahaan'); ?> Pusat </p>
<!--Penanda StatusAdmin-->

<!-- Button group-->
<div class="tombol">
<div class="btn-toolbar d-block mx-auto" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="<?php echo base_url('index.php/Pusat/appegawai');?>"><button type="button" class="btn btn-secondary btn-lg">Data Pegawai Cabang</button></a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <a href="<?php echo base_url('index.php/Pusat/appembelian');?>"><button type="button" class="btn btn-secondary btn-lg">Data Pembelian Tiket</button></a>
  </div>
	<div class="btn-group mr-2" role="group" aria-label="Third group">
    <a href="<?php echo base_url('index.php/Pusat/apbus');?>"><button type="button" class="btn btn-primary btn-lg">Data Jadwal Bus</button></a>
  </div>
</div>
</div>
<!-- Button -->

<!--Penanda StatusAdmin-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'><?php echo 'Dari Terminal '. $asal->terminal_asal . ' - '. $asal->kota_asal ?> </p>
<!--Penanda StatusAdmin-->

<!-- Main -->
<body>
  <div class="div mx-auto" style="width:50%;">
  <table class="table table-inverse" style="margin-top:3%;">
    <thead>
      <tr>
        <td>Terminal Tujuan</td>
        <td>Kota Tujuan</td>
        <td>Jam</td>
        <td>Harga </td>
        <!--td>
        <a href="<?php echo base_url('index.php/Pusat/apbustambahjadwal/'); ?>" class="btn btn-sm btn-info">Tambah Jadwal</a>
      </td-->
      </tr>
    </thead>
    <tbody>
    <?php foreach($jadwal->result() as $row) {?>
      <tr>
        <td><?php echo $row->terminal_tujuan; ?></td>
        <td><?php echo $row->kota_tujuan; ?></td>
        <td><?php echo $row->jam; ?></td>
        <td>Rp. <?php echo $row->harga; ?></td>
  	  <!--td>
        <a href="<?php echo base_url('index.php/Pusat/apbusdetailjadwal?terminal=/'. $row->terminal_asal.'&kota='.$row->kota_asal); ?>" class="btn btn-sm btn-warning">Detail Rute</a>
  	  </td-->
      </tr>
    <?php }?>

    </tbody>
  </table>
  </div>

<!-- //Main -->
