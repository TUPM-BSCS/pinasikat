<main>
	<div class="row">
		<div class="col s10 offset-s1 input-field">
			<input type=text id='fname' name='fname' required length='10'>
			<label for='fname' id='fname-label'>First Name</label>
		</div>
	</div>
	<div class="row">
		<div class="col s10 offset-s1 input-field">
			<input type=text id='lname' name='lname' required length='15'>
			<label for='lname' id='lname-label'>Last Name</label>
		</div>
	</div>
	<div class="row">
		<div class="col s10 offset-s1 input-field">
			<input type='text' id='username-r' name='username-r' required length='20'>
			<label for='username-r' id='username-label'>Username</label>
		</div>
	</div>
	<div class="row">
		<div class="col s10 offset-s1 input-field">
			<input type='password' id='password1' name='password1' required length='20'>
			<label for='password1' id="password1-label">Password</label>
		</div>
	</div>
	<div class="row">
		<div class="col s10 offset-s1 input-field">
			<input type='password' id='password2' name='password2' required length='20'>
			<label for='password2' id="password2-label">Repeat Password</label>
		</div>
	</div>
	<div class="row">
		<div class="col s10 offset-s1">
			<a href="#" id="clear-reg-form" class="btn-flat black-text waves-effect waves-grey right">Clear</a>
			<a href="#" id="submit-reg-form" class="btn-flat black-text waves-effect waves-grey right">Submit</a>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url()?>js/registration.js"></script>
</main>