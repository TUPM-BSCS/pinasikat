<!DOCTYPE html>
<html>
<head>
  <title>PINASikat</title>
  <meta charset="utf-8">
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <header>
    <div class="navbar-fixed">
      <nav class="black">
        <div class="nav-wrapper">
          <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
          <ul class="side-nav fixed black-text collapsible collapsible-accordion">
            <li><a href="#">RESTAURANTS</a></li>
            <li><a href="#">POOL AND BEACH</a></li>
            <li><a href="#">THEME PARK</a></li>
            <li><a href="#">NATURE</a></li>
          </ul>
          <ul class="side-nav collapsible collapsible-accordion" id="mobile-demo">
            <li><a href="#">RESTAURANTS</a></li>
            <li><a href="#">POOL AND BEACH</a></li>
            <li><a href="#">THEME PARK</a></li>
            <li><a href="#">NATURE</a></li>
          </ul>
          <?php
              if(!isset($_SESSION['username'])){
                echo 
                '
                  <ul class="right">
                    <li><a class="modal-trigger" href="#modal2">Login</a></li>
                    <li><a class="modal-trigger" href="#modal1">Register</a></li>
                  </ul>
                ';
              }
              else
                echo 
                '
                ';
          ?>
        </div>
      </nav>
    </div>

<div class="col s12 m6 l6 modal" id="modal2"> <br> <br>
<div class="container model-content">
<div class="row">
<div class="col s10"><h4 class="blue-text" >SIGN IN</h4></div>
<div class="col s2"><a class="darken-1 modal-close">CANCEL</a></div>
<div class="col s12"><p class="blue-text" >Please input the necessary information. </p></div>
</div>
<div class="row blue-text">
<form class="col s12 " method="POST" action="signin">
<div class="row left-align ">
<div class="row left-align">
<div class="input-field col s12">
<input id="username" type="text" class="validate black-text" name="username">
<label for="username" class="blue-text">Username</label>
</div>
<div class="input-field col s12">
<input id="password" type="password" class="validate black-text" name="password">
<label for="password" class="blue-text">Password</label>
</div>
</div>
<div class="row left-align" id="buttons">
<button class="btn  waves-effect waves-light blue darken-1 white-text" type="submit">ENTER</button>
<button class="btn waves-effect waves-light blue darken-1 white-text" type="reset">clear</button>
</div>
</div>
</form>
</div>
</div>
</div>

<div class="col s12 m6 l6 modal" id="modal1">
<div class="container model-content"> <br> <br>
<div class="row">
<div class="col s10"><h4 class="blue-text" >SIGN UP</h4></div>
<div class="col s2"><a class="darken-1 modal-close">CANCEL</a></div>
<div class="col s12"><p class="blue-text">Please input the necessary information. </p></div>
</div>
<div class="row blue-text">
<form class="col s12" method="POST" action="signup">
<div class="row left-align ">
<div class="row left-align">
<div class="input-field  col s12">
<input id="username" type="text" class="validate blue-text" name="username">
<label for="username" class="blue-text">Username</label>
</div>
<div class="input-field col s12">
<input id="password" type="password" class="validate blue-text" name="password">
<label for="password" class="blue-text">Password</label>
</div>
<div class="input-field col s12">
<input id="password" type="password" class="validate blue-text">
<label for="password" class="blue-text">Re-enter Password</label>
</div>
</div>
<div class="row left-align" id="buttons">
<button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit">ENTER</button>
<button class="btn waves-effect waves-light blue darken-1 white-text" type="reset">clear</button>
</div>
</div>
</form>
</div>
</div>
</div>

  </header>
</body>
</html>