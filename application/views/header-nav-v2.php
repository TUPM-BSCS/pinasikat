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
              $('#username').val("");
              $("#password").val("");
              location.reload(true);
            }
        });
      });

      $('#submit-reg-form').click(function(){
        var username = $('#username-r').val();
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();

        $.post('register',
        {
          'username': username,
          'password': password1,
          'fname': fname,
          'lname': lname,
          'permission': 1
        },
        function(result){
          if(result == 1){
            location.reload(true);
          }
          else if(result == 0){
            Materialize.toast('Username is already taken.',5000);
          }
        });
      });

      $('#clear-reg-form').click(function(){
        $('#username-r').val('');
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
  			<div class="nav-wrapper">
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