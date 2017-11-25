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

			    <form action="<?php echo base_url('index.php/Tratrans/pencarianbus');?>" method="post">


            <select name="kota_asal">
            <option value="" disabled selected>Kota Asal</option>
              <?php
              foreach($asal->result() as $row){
                echo '<option value='.$row->kota_asal.'>'.$row->kota_asal.'</option>';
              }
              ?>
            </select>

						<div class="clear"> </div>

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
