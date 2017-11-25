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

<!-- Main -->
<body>
  <div class="div mx-auto" style="width:50%;">
  <table class="table table-inverse" style="margin-top:3%;">
    <tbody>
      <tr>
      	<td>Username</td>
      	<td><?php echo $row->username; ?></td>
      </tr>
      <tr>
      	<td>Nama</td>
      	<td><?php echo $row->nama; ?></td>
      </tr>
      <tr>
      	<td>Terminal</td>
      	<td><?php echo $row->terminal; ?></td>
      </tr>
      <tr>
        <td>Kota</td>
        <td><?php echo $row->kota; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $row->email; ?></td>
      </tr>
      <tr>
        <td>No HP</td>
        <td><?php echo $row->nohp; ?></td>
      </tr>
      <tr>
        <td>No KTP</td>
        <td><?php echo $row->noktp; ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><?php echo $row->alamat; ?></td>
      </tr>
    </tbody>
  </table>
  </div>

<!-- //Main -->
