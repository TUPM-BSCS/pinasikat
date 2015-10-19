<!DOCTYPE html>
<html>
  <head>
    <title>PINASikat</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/dropzone.css"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/scripts.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/login.js"></script>
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
    
  </head>
<body>

	<header>
	  <nav>
			<div class="nav-wrapper">
        
			  <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
			  <a href="<?php echo base_url();?>" class="brand-logo center"><img src="<?php echo base_url();?>images/logo.png" class="responsive-img"></a>
        </ul>
			  <ul class="side-nav fixed collapsible collapsible-accordion" id="mobile-demo">
          <li class="no-padding" style="margin-top:62px">
            <a class="collapsible-header">ACCOUNT</a>
            <ul class='collapsible-body'>
              <?php
                if(!isset($_SESSION['username']))
                  echo '
                  <li><a href="#login-modal" class="modal-trigger hide-on-small-only">LOGIN</a></li>
                  <li>'.anchor('registration', 'REGISTER').'</li>
                  ';
                else{
                  echo '<li>'.anchor('profile/'.$_SESSION['username'], $_SESSION['fname']).'</li>';
                  echo '<li>'.anchor('uploadform', 'CREATE').'</li>';
                  echo '<li>'.anchor('logout', 'LOGOUT').'</li>';
                }
              ?>
            </ul>
          </li>
          <li><a href="">TOP 10</a></li>
  				<li class="no-padding">
            <a href="#" class="collapsible-header">RESTAURANTS</a>
            <ul class="collapsible-body">
              <li><a href="">CATEGORY 1</a></li>
              <li><a href="">CATEGORY 2</a></li>
              <li><a href="">CATEGORY 3</a></li>
            </ul>
          </li>
  				<li class="no-padding">
            <a href="#" class="collapsible-header">POOLS AND BEACH</a>
            <ul class="collapsible-body">
              <li><a href="">CATEGORY 1</a></li>
              <li><a href="">CATEGORY 2</a></li>
              <li><a href="">CATEGORY 3</a></li>
            </ul>
          </li>
  				<li class="no-padding">
            <a href="#" class="collapsible-header">THEME PARKS</a>
            <ul class="collapsible-body">
              <li><a href="">CATEGORY 1</a></li>
              <li><a href="">CATEGORY 2</a></li>
              <li><a href="">CATEGORY 3</a></li>
            </ul>
          </li>
  				<li class="no-padding">
            <a href="#" class="collapsible-header">NATURE</a>
            <ul class="collapsible-body">
              <li><a href="">CATEGORY 1</a></li>
              <li><a href="">CATEGORY 2</a></li>
              <li><a href="">CATEGORY 3</a></li>
            </ul>
          </li>
  			</ul>
			</div>
	  </nav>
	</header>