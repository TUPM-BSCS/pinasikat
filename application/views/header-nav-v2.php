<!DOCTYPE html>
<html>
  <head>
    <title>PINASikat</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
<body class="grey lighten-5">
  
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/materialize.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/scripts.js"></script>
  
  <script type="text/javascript">
  $(document).ready(function(){
    <?php
      if( isset($_SESSION['msg']) && isset($_SESSION['notified']) ){
        if(!$_SESSION['notified']){
          echo "Materialize.toast('".$_SESSION['msg']."',3000);";
          $_SESSION['notified'] = TRUE;
        }
        unset($_SESSION['msg']);                
      }
    ?>
  });
  </script>

	<header>

    <ul id="account-options" class="dropdown-content">
      <?php
        if(!isset($_SESSION['username']))
          echo '
          <li><a href="#login-modal" class="modal-trigger hide-on-small-only">Login</a></li>
          <li><a href="registration" class="hide-on-small-only">Register</a></li>
          ';
        else
          echo '<li><a href="logout" class="">Logout</a></li>';
      ?>
    </ul>

		<div class="navbar-fixed">
		  <nav class="black">
  			<div class="nav-wrapper">
          <ul class="right">
            <li><a class="dropdown-button" data-activates="account-options"><i class='material-icons'>account_circle</i></a></li>
          </ul>
  			  <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
  			  <a href="<?php echo base_url();?>" class="brand-logo center"><img src="<?php echo base_url();?>images/logo.png" class="responsive-img"></a>
  			  <ul class="side-nav collapsible collapsible-accordion" id="mobile-demo">
    				<li style="margin-top:62px"></li>
    				<li><a href="#">RESTAURANTS</a></li>
    				<li><a href="#">POOL AND BEACH</a></li>
    				<li><a href="#">THEME PARK</a></li>
    				<li><a href="#">NATURE</a></li>
    			</ul>
          <ul class="left-side-nav collapsible collapsible-accordion hide-on-med-and-down">
            <li><a href="#">RESTAURANTS</a></li>
            <li><a href="#">POOL AND BEACH</a></li>
            <li><a href="#">THEME PARK</a></li>
            <li><a href="#">NATURE</a></li>
          </ul>
  			</div>
		  </nav>
		</div>
	</header>