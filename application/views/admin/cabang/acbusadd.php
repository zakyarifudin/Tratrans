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

<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom">
		<div class="w3l_about_bottom_right two">
			<div id="admin">
				<h2 class="tittle"><span>TAMBAH JADWAL BUS</span></h2>
				<div class="book-form">

				    <form action="<?php echo base_url('index.php/Cabang/acbussimpanjadwal/'); ?>" method="post">
							<input type="text" name="terminal_tujuan" placeholder="Terminal Tujuan">

							<div class="clear"> </div>

              <input type="text" name="kota_tujuan" placeholder="Kota Tujuan">

							<div class="clear"> </div>

              <input type="time" name="jam" placeholder="Jam">

              <div class="clear"> </div>

							<input type="text" name="harga" placeholder="Harga">

							<div class="clear"> </div>

						<div class="make">
							  <input type="submit" value="SIMPAN">
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
<!-- //Main -->
