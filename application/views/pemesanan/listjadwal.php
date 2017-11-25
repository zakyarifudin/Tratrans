<body>
<p class='btn btn-success' style='margin-top:2%;'> Hasil Pencarian Bus tanggal berangkat <?php echo $date ?></p>

<div class="div mx-auto" style="width:80%;">
<table class="table table-inverse" style="margin-top:3%;">
  <thead>
    <tr>
      <td>Bus</td>
      <td>Dari</td>
      <td>Ke</td>
      <td>Jam</td>
      <td>Harga</td>
      <td>Tersedia</td>
    </tr>
  </thead>
  <tbody>
  <?php foreach($jadwal->result() as $row) {?>
    <tr>
      <td><?php echo $row->perusahaan; ?></th>
      <td><?php echo $row->terminal_asal.' - '.$row->kota_asal; ?></td>
      <td><?php echo $row->terminal_tujuan.' - '. $row->kota_tujuan; ?></td>
      <td><?php echo $row->jam; ?></td>
      <td>Rp. <?php echo $row->harga; ?></td>
	  <td>

      <a href="<?php echo base_url('index.php/Tratrans/pilihkursi?id='.$row->id. '&date='.$date);?>" class="btn btn-sm btn-info">Pilih Kursi</a>
	  </td>
    </tr>
  <?php }?>

  </tbody>
</table>
</div>
