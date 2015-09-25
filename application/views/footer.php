<footer>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.parallax').parallax();
			$('.modal-trigger').leanModal({
				dismissible: true, // Modal can be dismissed by clicking outside of the modal
				opacity: .5, // Opacity of modal background
				in_duration: 300, // Transition in duration
				out_duration: 200, // Transition out duration
			});
			$(".button-collapse").sideNav();
			<?php
			if( isset($_SESSION['msg']) && isset($_SESSION['notified']) ){
				if(!$_SESSION['notified']){
					echo "Materialize.toast('".$_SESSION['msg']."',5000);";
					$_SESSION['notified'] = TRUE;
				}
				unset($_SESSION['msg']); 	              
			}?>
			$('.dropdown-button').dropdown({
				inDuration: 300,
				outDuration: 225,
				constrain_width: true, // Does not change width of dropdown to that of the activator
				hover: true, // Activate on hover
				gutter: 0, // Spacing from edge
				belowOrigin: true, // Displays dropdown below the button
				alignment: 'left' // Displays dropdown with edge aligned to the left of button
			});

			$('#reset').click(function(){
				$('#username').val("");
				$("#password").val("");
			});

			$('#submit').click(function(){
				var username = $('#username').val();
				var password = $('#password').val();
				$.post(
					"login",
					{
						'username': username,
						'password': password
					}, 
					function(result){
						if(result == 0){
							Materialize.toast('Username or password is incorrect!',5000);
						}
						else{
							window.location.href="<?php echo base_url();?>";
						}
				});
			});
		});
	</script>
</footer>
</body>
</html>