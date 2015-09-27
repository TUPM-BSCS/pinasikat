function login(){
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
          window.location.href='http://localhost/pinasikat';
          $('#username').val("");
          $("#password").val("");
        }
    });
}

function register(){

}

function validate(){
	
}