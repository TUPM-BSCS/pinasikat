<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/js/materialize.min.js"></script>
       	<nav>
		    <div class="nav-wrapper">
		      <a href="home" class="brand-logo">Logo</a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		      	<?php
		      		if(isset($_SESSION['username'])){
		      			$link1 = $_SESSION['username'];
		      			$link2 = 'Logout';
		      		}
		      		else{
		      			$link1 = 'Login';
		      			$link2 = 'Register';
		      		}
		      	?>
		        <li><a href="<?php echo strtolower($link1); ?>"><?php echo $link1; ?></a></li>
		        <li><a href="<?php echo strtolower($link2); ?>"><?php echo $link2; ?></a></li>
		      </ul>
		    </div>
  		</nav>
    </body>
  </html>