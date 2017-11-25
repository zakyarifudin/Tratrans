<!-- footer -->
<div class="footer-w3l">
	<p>&copy; 2017 Tratrans. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
<!-- //footer -->

    	<!-- js-scripts-->
  		<script type="text/javascript" src="<?php echo base_url()."assets/";?>js/jquery-2.1.4.min.js"></script>
  		<!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
  	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

      <!-- Time -->
      <!--script type="text/javascript" src="<?php echo base_url()."assets/";?>js/wickedpicker.js"></script>
        <script type="text/javascript">
          $('.timepicker').wickedpicker({twentyFour: true});
					//$('.timepicker').wickedpicker({format: 'HH:mm::ss'});
        </script-->
      <!-- //Time -->

        <!-- Calendar -->
          <script src="<?php echo base_url()."assets/";?>js/jquery-ui.js"></script>
            <script>
                $(function() {
                	$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
								});
            </script>
        <!-- //Calendar -->

        <!-- Daftar -->

        <script>
          function member(){
            document.getElementById("admin").style.display="none";
            document.getElementById("member").style.display="block";
          }
          function admin(){
            document.getElementById("admin").style.display="block";
            document.getElementById("member").style.display="none";
          }
        </script>
				<script>
					var password = document.getElementById("password")
						, checkpassword = document.getElementById("checkpassword");

					function validatePassword(){
						if(password.value != checkpassword.value){
							checkpassword.setCustomValidity("Password tidak sama");
						}
						else {
							checkpassword.setCustomValidity('');
						}
					}

					password.onchange = validatePassword;
					checkpassword.onkeyup = validatePassword;
				</script>
        <!-- //Daftar -->
    <!-- //js-scripts-->

  </body>
</html>
