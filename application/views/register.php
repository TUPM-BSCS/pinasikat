<main>
	<?php
		if(isset($has_error) && $has_error){
			echo '<div class="section red">';
			foreach($errors as $error) {
				echo '<div class="row"><div class="col s12"><span>'.$error.'</span></div></div>';
			}
			echo '</div>';
		}
	?>
	<form method="post" action="<?php echo base_url("register");?>" class="row">
		<div class="col s12">
		<div class="card-panel">
		<div class="row">
			<div class="col s10 offset-s1 input-field">
				<input type="text" id='fname' name='fname' <?php if(isset($fname)) echo 'value="'.$fname.'"';?> required length='10'>
				<label for='fname' id='fname-label'>First Name</label>
			</div>
		</div>
		<div class="row">
			<div class="col s10 offset-s1 input-field">
				<input type="text" id='lname' name='lname' <?php if(isset($lname)) echo 'value="'.$lname.'"';?> required length='15'>
				<label for='lname' id='lname-label'>Last Name</label>
			</div>
		</div>
		<div class="row">
			<div class="col s10 offset-s1 input-field">
				<input type='text' id='username-r' name='username_r' <?php if(isset($username_r)) echo 'value="'.$username_r.'"';?> required length='20'>
				<label for='username-r' id='username-label'>Username</label>
			</div>
		</div>
		<div class="row">
			<div class="col s10 offset-s1 input-field">
				<input type='password' id='password1' name='password1' <?php if(isset($password1)) echo 'value="'.$password1.'"';?> required length='20'>
				<label for='password1' id="password1-label">Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s10 offset-s1 input-field">
				<input type='password' id='password2' name='password2' <?php if(isset($password2)) echo 'value="'.$password2.'"';?> required length='20'>
				<label for='password2' id="password2-label">Repeat Password</label>
			</div>
		</div>
		<div class="row">
			<div class="col s10 offset-s1">
				<button type="reset" id="clear-reg-form" class="btn-flat right">Clear</button>
				<button type="submit" class="btn-flat right">Submit</button>
			</div>
		</div>
		</div>
		</div>
	</form>	
	<!--<script type="text/javascript" src="<?php echo base_url()?>js/registration.js"></script>-->
</main>