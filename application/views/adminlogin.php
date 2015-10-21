<!DOCTYPE html>
<html>
<head>
	<title>ADMIN Login</title>
	<meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("css/materialize.css");?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("css/style.css");?>"  media="screen,projection"/>
    <link href="<?php echo base_url("material-icons");?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/materialize.min.js"></script>
	<form method="post" action="<?php echo base_url("adminlogin");?>">
		<div class="row">
			<div class="col s12 m6 offset-m3 l4 offset-l4 white-text">Admin Login</div>
			<div class="col s12 m6 offset-m3 l4 offset-l4 input-field">
				<input type="text" name="admin-name" id="admin-name">
				<label for="admin-username">Admin Name</label>
			</div>
			<div class="col s12 m6 offset-m3 l4 offset-l4 input-field">
				<input type="password" name="admin-password" id="admin-password">
				<label for="admin-password">Password</label>
			</div>
			<div class="col s12 m6 offset-m3 l4 offset-l4 center">
				<button type="submit" class="btn btn-large">Login</button>
			</div>
		</div>	
	</form>
</body>
</html>