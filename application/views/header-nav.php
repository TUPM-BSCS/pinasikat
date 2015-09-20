<!DOCTYPE html>
<html>
<body>
<header>
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

      <nav class="black">
          <div class="nav-wrapper">
          <a href="#" data-activates="mobile-demo" class="button-collapse white-text"><i class="material-icons">menu</i></a>
          <a href="#" class="brand-logo center"><img src="images/logo2.png" class="responsive-img" alt="logo"></a>

          <?php

          if(!isset($_SESSION['username'])){
            echo 
            '
            <ul class="right hide-on-med-and-down">
            <li><a href="#modal2" class="waves-effect waves-light modal-trigger white-text">Sign In</a></li>
            <li><a href="#modal1" class="waves-effect waves-light modal-trigger white-text">Sign Up</a></li>
            </ul> 
            ';
          }

          ?>
                   
          <ul class="side-nav fixed black-text collapsible collapsible-accordion">
            <li><a href="#">SEARCH</a></li>

            <?php 
            if(isset($_SESSION['username'])){
              echo '
                <li class="no-padding">
                  <a class="collapsible-header">'.$_SESSION['username'].'</a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="'.$_SESSION['username'].'">Profile</a></li>
                      <li><a href="logout">Logout</a></li>
                    </ul>
                  </div>
                </li>
              ';
            }
            ?>
            
            <li><a href="#">RESTAURANTS</a></li>
            <li><a href="#">POOL AND BEACH</a></li>
            <li><a href="#">THEME PARK</a></li>
            <li><a href="#">NATURE</a></li>
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <!-- dynamic controls here -->
            <li><a href="#modal1" class="waves-effect waves-light modal-trigger blue-text">Sign Up</a></li>
            <li><a href="#modal2" class="waves-effect waves-light modal-trigger blue-text">Sign In</a></li>
            <li><a href="#">SEARCH</a></li>
            <li><a href="#">ACCOUNT</a></li>
            <li><a href="#">RESTAURANTS</a></li>
            <li><a href="#">POOL AND BEACH</a></li>
            <li><a href="#">THEME PARK</a></li>
            <li><a href="#">NATURE</a></li>
          </ul>
          </div>
      </nav>

      <script>
        $(document).ready(function(){
           $('.modal-trigger').leanModal({
              dismissible: true, // Modal can be dismissed by clicking outside of the modal
              opacity: .5, // Opacity of modal background
              in_duration: 300, // Transition in duration
              out_duration: 200, // Transition out duration
            }
          );
          $(".button-collapse").sideNav();
          <?php
            if( isset($_SESSION['msg']) && isset($_SESSION['notified']) ){
              if(!$_SESSION['notified']){
                echo "Materialize.toast('".$_SESSION['msg']."',5000,'rounded');";
                $_SESSION['notified'] = TRUE;
              }              
            }

          ?>
        });
      </script>
</header>
</body>
</html>