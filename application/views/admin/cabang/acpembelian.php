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
    <a href="<?php echo base_url('index.php/Cabang/acpembelian');?>"><button type="button" class="btn btn-primary btn-lg">Data Pembelian Tiket</button></a>
  </div>
	<div class="btn-group mr-2" role="group" aria-label="Third group">
    <a href="<?php echo base_url('index.php/Cabang/acbus');?>"><button type="button" class="btn btn-secondary btn-lg">Data Jadwal Bus</button></a>
  </div>
</div>
</div>
<!-- Button -->

<!-- Main -->
<?php
if (!empty($_GET['war'])){
  if ($_GET['war']==1){
		echo "<p class='btn btn-success' style='margin-top:2%;'>
    Pembelian Tiket Berhasil! </p>";
	}
  else if ($_GET['war']==2){
		echo "<p class='btn btn-success' style='margin-top:2%;'>
    Pengubahan Status Menjadi Sudah Dibayar Berhasil! </p>";
	}
}
?>

<!-- Main -->
<body>
  <div class="div mx-auto" style="width:95%;">
  <table class="table table-inverse" style="margin-top:3%;">
    <thead>
      <tr>
        <td>Admin</td>
        <td>Pemesan</td>
        <td>Tanggal Pesan</td>
        <td>Tanggal Berangkat</td>
        <td>Jam</td>
        <td>Jenis</td>
        <td>Terminal Tujuan</td>
        <td>Kota Tujuan</td>
        <td>Jumlah Kursi</td>
        <td>Total Biaya</td>
        <td>Status</td>
        <td>Pembayaran</td>
        <!--td>
        <a href="<?php echo base_url('index.php/Cabang/acbustambahjadwal/'); ?>" class="btn btn-sm btn-info">Tambah Jadwal</a>
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
        <td>
					<?php if($row->status=="belum dibayar" AND $row->bukti==''){?>
						   	<a href="" class="btn btn-sm btn-danger">Belum Dibayar</a>
					<?php }
						else if($row->status=="belum dibayar" AND $row->bukti!=''){?>
								<a href="" class="btn btn-sm btn-warning">Sedang diproses</a>
					<?php }
						else {?>
								<a href="" class="btn btn-sm btn-success">Sudah dibayar</a>
					<?php }?>
			  </td>
        <td>
  				<?php
  					if($row->status=="belum dibayar" AND $row->bukti!=''){?>
  							<a href="<?php echo base_url('index.php/Cabang/ubahstatus?id='. $row->id);?>" class="btn btn-sm btn-success">Ubah Status</a>
  							<a href="<?php echo base_url('index.php/Cabang/lihatbukti?id='. $row->id); ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
  				<?php }
  					else if($row->status=="dibayar"){?>
  							<a href="<?php echo base_url('index.php/Cabang/lihatbukti?id='. $row->id); ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
  				<?php }?>
  		 </td>
      </tr>
    <?php }?>

    </tbody>
  </table>
  </div>

<!-- //Main -->
