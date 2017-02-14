$(function(){
  $('.login-submit-button').click(loginUser);
  $('.register-submit-button').click(registerUser);
  $('#home-logout-button').click(logoutUser);
  getItems("../php/amazon/search.php?cmd=searchItems", "feature items", "#feature_items");
  $.ajax({
    url: '../php/index.php?cmd=currentSession',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      if(json[0].removed == 0){
        $('#home-login-buttons').hide();
        $('#home-logout-button').show();
        $('#user-home-link').show();
        console.log("user active");
      }
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
});

function loginUser(){
  $.ajax({
    url: '../php/index.php?cmd=loginUser',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'username': $('.username').val(),
      'password': $('.password').val()
    },
    success: function(json){
      if(json[0].removed == 0){
        $('#home-login-buttons').hide();
        $('#home-logout-button').show();
        $('.login_error').hide();
        $('#user-home-link').show();
        console.log(json);
        window.location.assign('/seniorproject/view/user_home.html.php');
      }
      else{
        $('.login_error').show();
        $('.login_error').html("Username and/or password incorrect");
      }
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
}

function registerUser(){
  $.ajax({
    url: '../php/index.php?cmd=registerUser',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'firstname': $('.firstname').val(),
      'lastname': $('.lastname').val(),
      'username': $('.new-username').val(),
      'email': $('.email').val(),
      'password': $('.new-password').val()
    },
    success: function(json){
      if(json.length > 0){
        $('#home-login-buttons').hide();
        $('#home-logout-button').show();
        $('#user-home-link').show();
        console.log(json);
        window.location.assign('/seniorproject/view/user_home.html.php');
      }
      else if(!json){
        $('.login_error').show();
        $('.login_error').html("User already exists");
      }
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
}

function logoutUser(){
  $.ajax({
    url: '../php/index.php?cmd=logoutUser',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      $('#home-login-buttons').show();
      $('#home-logout-button').hide();
      $('#user-home-link').hide();
      console.log(json);
      window.location.assign('/seniorproject/view/index.html.php');
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
}

// function sendMessage(){
//   var data = new FormData();
//   data.append('name', $('#contact-name').val());
//   data.append('email', $('#contact-email').val());
//   data.append('subject', $('#contact-subject').val());
//   data.append('message', $('#contact-message').val());
//
//   $.ajax({
//     url: '../php/contact.php?sendMessage',
//     type: 'POST',
//     contentType: false,
//     processData: false,
//     data: data,
//     success: function(json){
//       console.log(json + " message sent");
//     },
//     error: function(request, status, error) {
//       console.log("error " + request.responseText);
//     }
//   });
// }
