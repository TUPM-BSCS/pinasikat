$(document).ready(function(){

  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );

  $('.parallax').parallax();

  $('.modal-trigger').leanModal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: .5, // Opacity of modal background
    in_duration: 300, // Transition in duration
    out_duration: 200, // Transition out duration
  });

  $(".button-collapse").sideNav();
  
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
        if(Number(result) == 0){
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

    //Start of Form Validation -----------------------------------------------------
    
    var con = /^[A-Za-z]+$/;
    var flag = 0; 

    if((con.test(username) == false) || (username.length > 20)){
      $('#username-r').val('');
      Materialize.toast('Invalid username!', 3000)
      flag = 1; 
    }

    if((con.test(fname) == false) || (fname.length > 10)){
      $('#fname').val('');
      Materialize.toast('Invalid first name!', 3000)
      flag = 1; 
    } else{
      fname = fname.toUpperCase();
    }

    if((con.test(lname) == false) || (lname.length > 10)){
      $('#lname').val('');
      Materialize.toast('Invalid last name!', 3000)
      flag = 1;
    } else{
      lname = lname.toUpperCase();
    }

    if ((password1 !== password2) || (password1.length > 20)){
      $('#password1').val('');
      $('#password2').val('');
      flag = 1; 
      Materialize.toast('Invalid password!', 3000)
    }

    //End of Form Validation ---------------------------------------------------------
    if (flag !== 1) {

      // Start of post
      $.post('register',
      {
        'username': username,
        'password': password1,
        'fname': fname,
        'lname': lname,
        'permission': 1
      },
      function(result){
        var int_result = Number(result);
        if(int_result == 1){
          location.reload(true);
        }
        else if(int_result == 0){
          Materialize.toast('Username is already taken.',5000);
        }
      });
      flag = 0;
      // End of post

    }
  });

  $('#clear-reg-form').click(function(){
    $('#username-r').val('');
    $('#password1').val('');
    $('#password2').val('');
    $('#fname').val('');
    $('#lname').val('');
  });

  $("#upload-notif")

});