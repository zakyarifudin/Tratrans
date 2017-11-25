<?php
if (!empty($_GET['war'])){

	if ($_GET['war']==1){
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Username atau password yang anda masukkan salah! </p>";
	}
	else if ($_GET['war']==2){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'>Anda Berhasil Mendaftar sebagai member, Silahkan untuk Login! </p>";
	}
	else if ($_GET['war']==3){
		echo "<p class='btn btn-sm btn-success' style='margin-top:2%;'>Anda Berhasil Mendaftar sebagai Admin, Silahkan untuk Login! </p>";
	}
	else if ($_GET['war']==4){
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Anda harus Login untuk melakukan pembelian tiket bus! </p>";
	}
}
?>

<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom">
		<div class="w3l_about_bottom_right two">
			<h2 class="tittle"><span>Login</span></h2>
			<div class="book-form">

			    <!--form action="<?php ?>" method="post"-->
					<?php echo form_open(base_url('index.php/Tratrans/ceklogin')) ?>
						<input type="text" name="username" placeholder="Username Anda" required="">

						<div class="clear"> </div>

						<input type="password" name="password" placeholder="Password Anda" required="">

						<div class="clear"> </div>

					<div class="make">
						  <input type="submit" name="login "value="Login">
					</div>
					</center>
				<!--/form-->
				<?php echo form_close() ?>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
<!-- //Main -->
