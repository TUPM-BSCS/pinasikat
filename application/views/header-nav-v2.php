<!DOCTYPE html>
<html>
  <head>
    <title>PINASikat</title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
<body class="grey lighten-5">
  
  <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/materialize.min.js"></script>
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
        login();
      });

      $('#submit-reg-form').click(function(){
        register();
      });


      $('#clear-reg-form').click(function(){
        $('#username').val('');
        $('#password1').val('');
        $('#password2').val('');
        $('#fname').val('');
        $('#lname').val('');
      });
    });

  </script>
  
  <header>
    <div class="navbar-fixed">
      <nav class="black">
        <div class="nav-wrapper tool-bar">
          <div class="row">
            <div class="col s1 m1 hide-on-large-only">
              <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
            </div>
            <div class="col s7 m7 l8">
              <form>
                <div class="input-field">
                  <input id="search" type="search" required>
                  <label for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
            <div class="col s4 m4 l4">
              <a href="<?php echo base_url();?>" class="center-text"><img src="<?php echo base_url();?>images/logo.png" class="responsive-img"></a>
            </div>
          </div>
          <ul class="side-nav fixed collapsible collapsible-accordion black-text" id="mobile-demo">
              <?php
                if(!isset($_SESSION['username']))
                  echo 
                  '
                    <li style="height:100px" class="center dropdown-button" data-activates="account-options">
                      <a href="#">
                        <img src="'.base_url().'images/account_circle_2.png" class="responsive-img circle">
                      </a>
                  ';
                else
                  echo
                  '
                    <li class="dropdown-button" data-activates="account-options">
                      <a href="#"><img src="'.base_url().'images/account_circle_1.png" style="height:61px" class="responsive-img circle left"><span class="left">'.$_SESSION['username'].'</span></a>
                  '
                  ;
              ?>
              <ul class="dropdown-content" id="account-options">
                <?php
                  if(!isset($_SESSION['username'])){
                    echo 
                    '
                      <li><a href="#login-modal" class="modal-trigger">Login</a></li>
                      <li><a href="registration">Register</a></li>
                    ';
                  }
                  else
                  {
                    echo 
                    '
                      <li><a href="profile/'.$_SESSION['username'].'">Profile</a></li>
                      <li><a href="logout">Logout</a></li>
                    ';
                  }
                ?>
              </ul>
            </li>
            <li><div class="divider"></div></li>
            <li><a href="#">RESTAURANTS</a></li>
            <li><a href="#">POOL AND BEACH</a></li>
            <li><a href="#">THEME PARK</a></li>
            <li><a href="#">NATURE</a></li>
          </ul>
        </div>
      </nav>
    </div>