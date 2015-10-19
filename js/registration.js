$(document).ready(function(){

$("#username-r").keydown(function(){
  var username = $('#username-r').val();
  var flag = 0;

  $("#username-label").text("Username");

  if(username.length < 5){
    $("#username-label").text("Username must be at least 5 characters.");
    flag = 1;
  }
  if(username.length > 20){
    $("#username-label").text("Username can not exceed 20 characters.");
    flag = 1;
  }
});

$('#submit-reg-form').click(function(){

  var username = $('#username-r').val();
  var password1 = $('#password1').val();
  var password2 = $('#password2').val();
  var fname = $('#fname').val();
  var lname = $('#lname').val();

  //Start of Form Validation -----------------------------------------------------
  
  //var con = /^[A-Za-z]+$/;
  //var flag = 0;

  //if(con.test(username) == false){
  //  flag = 1;
  //}
  

  /*if((con.test(fname) == false) || (fname.length > 10)){
    //$('#fname').val('');
    //Materialize.toast('Invalid first name!', 3000)
    flag = 1; 
  } else{
    fname = fname.toUpperCase();
  }

  if((con.test(lname) == false) || (lname.length > 10)){
    //$('#lname').val('');
    //Materialize.toast('Invalid last name!', 3000)
    flag = 1;
  } else{
    lname = lname.toUpperCase();
  }

  if ((password1 !== password2) || (password1.length > 20)){
    $('#password1').val('');
    $('#password2').val('');
    flag = 1;
    //Materialize.toast('Invalid password!', 3000)
  }

  //End of Form Validation ---------------------------------------------------------
  if (flag != 1) {*/

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
        Materialize.toast('Username is already taken.',500);
      }
    });
    // End of post

  //}
});

$('#clear-reg-form').click(function(){
  $('#username-r').val('');
  $('#password1').val('');
  $('#password2').val('');
  $('#fname').val('');
  $('#lname').val('');
});

});