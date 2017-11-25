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


<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom">
		<div class="w3l_about_bottom_right two">
			<div id="admin">
				<h2 class="tittle"><span>TAMBAH PEGAWAI ADMIN CABANG</span></h2>
				<div class="book-form">

				    <form action="<?php echo base_url('index.php/Pusat/appegawaitambahsimpan'); ?>" method="post">

							<input type="email" name="email" placeholder="Email Anda" required="">

							<div class="clear"> </div>

              <input type="text" name="username" placeholder="Username Anda" required="">

              <div class="clear"> </div>

							<input type="text" name="name" placeholder="Nama Lengkap Anda" required="">

							<div class="clear"> </div>

							<input type="password" id="password" name="password" placeholder="Password Anda" required="">

							<div class="clear"> </div>

							<input type="password" id="checkpassword" name="checkpassword" placeholder="Ulangi Password Anda!" required="">

							<div class="clear"> </div>

							<input type="text" name="terminal" placeholder="Terminal" required="">

							<div class="clear"> </div>

							<input type="text" name="kota" placeholder="Kota" required="">

							<div class="clear"> </div>

							<input type="text" name="noktp" placeholder="Nomor KTP" required="">

							<div class="clear"> </div>

							<input type="text" name="nohp" placeholder="Nomor HP" required="">

							<div class="clear"> </div>

							<input type="text" name="alamat" placeholder="Alamat Admin" required="">

							<div class="clear"> </div>

						<div class="make">
							  <input type="submit" value="DAFTARKAN">
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
<!-- //Main -->
