<!DOCTYPE html>
<html>
  <head>
    <title>PINASikat</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("css/materialize.css");?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("css/style.css");?>"  media="screen,projection"/>
    <link rel="stylesheet" href="<?php echo base_url("material-icons");?>"/>
    <link rel="stylesheet" href="http://localhost/material"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  </head>
<body>

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

  <header>
	  <nav class="blue-grey lighten-1">
			<div class="nav-wrapper headerz">
			  <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
        <form method="get" action="<?php echo base_url("search");?>" style="width:80%;margin:0px auto;">
          <div class="input-field">
            <input id="page" name="page" value="1" type="hidden">
            <input id="search" type="search" name="item" required>
            <label for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
			  <!--<a href="<?php echo base_url();?>" class="brand-logo right"><img src="<?php echo base_url();?>images/logo2.png" alt="Pinasikat" id="logo"></a>-->
			  <ul class="side-nav fixed collapsible collapsible-accordion" id="mobile-demo">
          <li class="no-padding" style="margin-top:62px">
            <a class="collapsible-header">ACCOUNT</a>
            <ul class='collapsible-body'>
              <?php
                if(!isset($_SESSION['username']))
                  echo '
                  <li><a href="#login-modal" class="modal-trigger">LOGIN</a></li>
                  <li>'.anchor('registration', 'REGISTER').'</li>
                  ';
                else{
                  echo '<li>'.anchor('dashboard', $_SESSION['fname']).'</li>';
                  echo '<li>'.anchor('article/new', 'CREATE').'</li>';
                  echo '<li>'.anchor('logout', 'LOGOUT').'</li>';
                }
              ?>
            </ul>
          </li>
          <li><a href="<?php echo base_url();?>">HOME</a></li>
  				<li class="no-padding">
            <a href="<?php echo base_url("restaurants/1");?>" class="collapsible-header">RESTAURANTS</a>
          </li>
  				<li class="no-padding">
            <a href="<?php echo base_url("resorts/1");?>" class="collapsible-header">POOLS AND BEACH</a>
          </li>
  				<li class="no-padding">
            <a href="<?php echo base_url("themeparks/1");?>" class="collapsible-header">THEME PARKS</a>
          </li>
  				<li class="no-padding">
            <a href="<?php echo base_url("nature/1");?>" class="collapsible-header">NATURE</a>
          </li>
          <?php if(isset($_SESSION['admin'])) echo '<li><a href="'.base_url("admin").'">ADMIN</a></li>';?>
  			</ul>
			</div>
	  </nav>
	</header>