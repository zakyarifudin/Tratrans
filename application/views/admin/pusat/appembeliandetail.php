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
    <a href="<?php echo base_url('index.php/Pusat/appembelian');?>"><button type="button" class="btn btn-primary btn-lg">Data Pembelian Tiket</button></a>
  </div>
	<div class="btn-group mr-2" role="group" aria-label="Third group">
    <a href="<?php echo base_url('index.php/Pusat/apbus');?>"><button type="button" class="btn btn-secondary btn-lg">Data Jadwal Bus</button></a>
  </div>
</div>
</div>
<!-- Button -->

<!--Penanda StatusAdmin-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'><?php echo 'Dari Terminal '. $asal->terminal_asal . ' - '. $asal->kota_asal ?> </p>
<!--Penanda StatusAdmin-->

<!-- Main -->
<body>
  <div class="div mx-auto" style="width:97%;">
  <table class="table table-inverse" style="margin-top:3%;">
    <thead>
      <tr>
        <td>Admin</td>
        <td>Pemesan</td>
        <td>Tanggal Pesan</td>
        <td>Tanggal Berangkat</td>
        <td>Jam Berangkat</td>
        <td>Jenis</td>
        <td>Terminal Tujuan</td>
        <td>Kota Tujuan</td>
        <td>Jumlah Kursi</td>
        <td>Total Biaya</td>
        <!--td>
        <a href="<?php echo base_url('index.php/Pusat/acbustambahjadwal/'); ?>" class="btn btn-sm btn-info">Tambah Jadwal</a>
      </td-->
      </tr>
    </thead>
    <tbody>
    <?php foreach($tiket->result() as $row) {?>
      <tr>
        <td><?php echo $row->admin; ?></td>
        <td><?php echo $row->pemesan; ?></td>
        <td><?php echo $row->tglpesan; ?></td>
        <td><?php echo $row->tglberangkat; ?></td>
        <td><?php echo $row->jam; ?></td>
        <td><?php echo $row->jenis; ?></td>
        <td><?php echo $row->terminal_tujuan; ?></td>
        <td><?php echo $row->kota_tujuan; ?></td>
        <td><?php echo $row->jml_kursi; ?></td>
        <td>Rp. <?php echo $row->biaya; ?></td>
  	  <!--td>
        <a href="<?php echo base_url('index.php/Pusat/acbuseditjadwal/'. $row->id); ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?php echo base_url('index.php/Pusat/acbushapusjadwal/'. $row->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
  	  </td-->
      </tr>
    <?php }?>

    </tbody>
  </table>
  </div>

<!-- //Main -->
