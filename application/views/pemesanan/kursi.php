

<p class='btn btn-success' style='margin-top:2%;'>Tiket Bus <?php echo $jadwal->perusahaan ?>
	dari <?php echo $jadwal->terminal_asal.'-'.$jadwal->kota_asal ?> ke <?php echo $jadwal->terminal_tujuan .'-'.$jadwal->kota_tujuan ?>
	tanggal <?php echo $date ?> jam <?php echo  $jadwal->jam?></p>
	<div class="main" style="width:45%; margin-top:2%;">
		<h2>Pilih kursi yang anda inginkan</h2>
		<div class="wrapper">
			<div id="seat-map">
				<div class="front-indicator"><h3>Depan</h3></div>
			</div>
			<div class="booking-details">
				<div id="legend"></div>

						<form action="<?php echo base_url('index.php/Tratrans/belitiket'); ?>" method="post">

							<h3> Kursi yang dipilih (<span id="counter">0</span>):</h3>

							<input type="number" name="kursi" id="kursi" style="display:none" required="" value="">

							<input type="date" name="date" id="date" style="display:none" required="" value="<?php echo $date ?>">

							<input type="number" name="id" id="id"  style="display:none" required="" value="<?php echo $jadwal->id; ?>">

							<ul id="selected-seats" class="scrollbar scrollbar1"></ul>

							Total: <b>Rp <span id="total">0</span></b>

							<input type="number" name="biaya" id="biaya" style="display:none" required="" value="">

							<input class="checkout-button mx-auto" type="submit" value="BELI">

						</form>

			</div>
			<div class="clear"></div>
		</div>

		<script>

				var firstSeatLabel = 1;

				$(document).ready(function() {
					var $cart = $('#selected-seats'),
						$counter = $('#counter'),
						$total = $('#total'),
						sc = $('#seat-map').seatCharts({
						map: [
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'___ee',
							'ee_ee',
							'eeeee',
						],
						seats: {
							e: {
								price   : <?php echo $jadwal->harga; ?>
							}

						},
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return firstSeatLabel++;
							},
						},
						legend : {
							node : $('#legend'),
							items : [
								[ 'e', 'available',   'Kosong'],
								[ 'f', 'unavailable', 'Sudah Dipesan']
							]
						},
						click: function () {

							if (this.status() == 'available') {

								//let's create a new <li> which we'll add to the cart items
								$('<li>Kursi no '+this.settings.label+': <b>Rp '+this.data().price+'</b> <a href="#" class="cancel-cart-item">Batalkan</a></li>')
									.attr('id', 'cart-item-'+this.settings.id)
									.data('seatId', this.settings.id)
									.appendTo($cart);

								/*
								 * Lets update the counter and total
								 *
								 * .find function will not find the current seat, because it will change its stauts only after return
								 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
								 */
								//$counter.text(sc.find('selected').length+1);
								$counter.text(sc.find('selected').length+1);
								$total.text(recalculateTotal(sc)+this.data().price);
								inputmasuk();
								return 'selected';
							}
							else if (this.status() == 'selected') {
								//update the counter
								$counter.text(sc.find('selected').length-1);
								//and total
								$total.text(recalculateTotal(sc)-this.data().price);
								//remove the item from our cart
								$('#cart-item-'+this.settings.id).remove();

								inputmasuk();
								//seat has been vacated
								return 'available';
							}
							else if (this.status() == 'unavailable') {
								inputmasuk();
								//seat has been already booked
								return 'unavailable';
							}
							else {
								return this.style();
								inputmasuk();
							}


						}
					});

					//this will handle "[cancel]" link clicks
					$('#selected-seats').on('click', '.cancel-cart-item', function () {
						//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
						sc.get($(this).parents('li:first').data('seatId')).click();
					});

					//let's pretend some seats have already been booked
					sc.get(['1_2','4_1', '7_1', '7_2']).status('unavailable');

			});

			function recalculateTotal(sc) {
				var total = 0;

				//basically find every selected seat and sum its price
				sc.find('selected').each(function () {
					total += this.data().price;
				});

				//document.getElementById("biaya").value=total;

				return total;
			}

			function inputmasuk(){
				var x = document.getElementById("counter").innerText;
				var y = parseInt(x); //kanggo ngonvert soko string ng integer
    		document.getElementById("kursi").value = y;

				var a = document.getElementById("total").innerText;
				var b = parseInt(a);
				document.getElementById("biaya").value = b;

			}

		</script>



	</div>
	<p class="copy_rights">&copy; 2016 Bus Ticket Reservation Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>
<!--/div-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
