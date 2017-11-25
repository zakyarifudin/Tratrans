<?php
if (!empty($_GET['war'])){

	if ($_GET['war']==1){
		echo "<p class='btn btn-sm btn-warning' style='margin-top:2%;'> Tunggu konfirmasi dari Kami jika Berhasil maka status tiket berubah menjadi Sudah Dibayar </p>";
	}
}
?>
<!-- Main -->
<body>
  <br>
  <p class='btn btn-success' style='margin-top:2%;'> Riwayat Pembelian Tiket</p>

  <div class="div mx-auto" style="width:85%;">
  <table class="table table-inverse" style="margin-top:3%;">
    <thead>
      <tr>
        <td>Tanggal Berangkat</td>
        <td>Jam</td>
        <td>Dari</td>
        <td>Ke</td>
        <td>Bus</td>
        <td>Jumlah Kursi</td>
        <td>Total Biaya</td>
        <td>Status Tiket</td>
				<td>Bukti Bayar </td>
        <td>
      </td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($tiket->result() as $row) {?>
      <tr>
        <td><?php echo $row->tglberangkat; ?></td>
        <td><?php echo $row->jam; ?></td>
        <td><?php echo $row->terminal_asal . ' - ' . $row->kota_asal; ?></td>
        <td><?php echo $row->terminal_tujuan . ' - ' . $row->kota_tujuan; ?></td>
        <td><?php echo $row->perusahaan; ?></td>
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
				<?php if($row->status=="belum dibayar" AND $row->bukti==''){?>
					   	<a href="<?php echo base_url('index.php/Tratrans/bayar?id='. $row->id);?>" class="btn btn-sm btn-success">Upload</a>
				<?php }
					else if($row->status=="belum dibayar" AND $row->bukti!=''){?>
							<a href="<?php echo base_url('index.php/Tratrans/bayar?id='. $row->id);?>" class="btn btn-sm btn-success">Upload</a>
							<a href="<?php echo base_url('index.php/Tratrans/lihatbukti?id='. $row->id); ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
				<?php }
					else {?>
							<a href="<?php echo base_url('index.php/Tratrans/lihatbukti?id='. $row->id); ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
				<?php }?>
		 </td>
      </tr>
    <?php }?>

    </tbody>
  </table>
  </div>
<!-- //Main -->
