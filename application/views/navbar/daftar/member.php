<?php
if (!empty($_GET['war'])){

	if ($_GET['war']==1){
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'> Email sudah ada, coba email yang lain! </p>";
	}
	else if ($_GET['war']==2){
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'> Username sudah ada, coba username yang lain! </p>";
	}

}
?>

<!-- Button group-->
<div class="tombol">
<div class="btn-toolbar d-block mx-auto" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="<?php echo base_url('index.php/Tratrans/daftar');?>"><button type="button" class="btn btn-primary btn-lg">MEMBER</button>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
     <a href="<?php echo base_url('index.php/Tratrans/daftaradmin');?>"><button type="button" class="btn btn-secondary btn-lg">ADMIN BUS</button></a>
  </div>
</div>
</div>
<!-- Button -->

<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom">
		<div class="w3l_about_bottom_right two">
			<div id="member">
				<h2 class="tittle"><span>DAFTAR MEMBER</span></h2>
				<div class="book-form">

				    <form action="<?php echo base_url('index.php/Tratrans/pendaftaranMember'); ?>" method="post">

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

							<input type="text" name="nohp" placeholder="Nomor HP" required="">

							<div class="clear"> </div>

							<input type="text" name="alamat" placeholder="Alamat" required="">

							<div class="clear"> </div>

						<div class="make">
							  <input type="submit" value="DAFTAR">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
<!-- //Main -->
