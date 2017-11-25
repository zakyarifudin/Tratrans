<!--Pendanda Status Admin Cabang-->
<p class='btn btn-sm btn-danger' style='margin-top:2%;'>Admin Bus <?php echo $this->session->userdata('perusahaan'); ?> Cabang
    <?php echo $this->session->userdata('terminal'); ?> -   <?php echo $this->session->userdata('kota'); ?>
  </p>
<!-- //Pendanda Status Admin Cabang-->

<!-- Button group-->
<div class="tombol">
<div class="btn-toolbar d-block mx-auto" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="<?php echo base_url('index.php/Cabang/acpesan');?>"><button type="button" class="btn btn-primary btn-lg">Pesan Tiket Bus</button></a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <a href="<?php echo base_url('index.php/Cabang/acpembelian');?>"><button type="button" class="btn btn-secondary btn-lg">Data Pembelian Tiket</button></a>
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
		echo "<p class='btn btn-sm btn-danger' style='margin-top:2%;'>
    Rute atau Jadwal yang anda cari tidak tersedia! </p>";
	}
}
?>


<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom">
		<div class="w3l_about_bottom_right two">
			<h2 class="tittle"><img src="images/bus.png" alt=""><span>PESAN TIKET</span></h2>
			<div class="book-form">

			    <form action="<?php echo base_url('index.php/Cabang/acpesancari');?>" method="post">

            <select name="kota_tujuan" placeholder="Kota Tujuan">
              <option value="" disabled selected>Kota Tujuan</option>
              <?php
              foreach($tujuan->result() as $row){
                echo '<option value='.$row->kota_tujuan.'>'.$row->kota_tujuan.'</option>';
              }
              ?>
            </select>

						<div class="clear"> </div>

						<input  id="date" name="date" type="date"  value="Tanggal Berangkat" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tanggal Berangkat';}" required="">

						<div class="clear"> </div>

						<input type="time" id="timepicker" name="time" class="timepicker form-control-time" value="Jam">

						<div class="clear"> </div>

					<div class="make">
						  <input type="submit" value="Cari">
					</div>
					</center>
				</form>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>

<!-- //Main -->
