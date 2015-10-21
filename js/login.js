$(document).ready(function(){

$('#reset').click(function(){
  $('#username').val("");
  $("#password").val("");
});

$('#submit').click(function(){

  var username = $('#username').val();
  var password = $('#password').val();

  $.post(
    "http://localhost/pinasikat/login",
    {
      'username': username,
      'password': password
    }, 
    function(result){
      if(Number(result) == 0){
        Materialize.toast('Username or password is incorrect!',500);
      }
      else if(Number(result) == 1){
        $('#username').val("");
        $("#password").val("");
        location.reload(true);
      }
  });
});  

});
