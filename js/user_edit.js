$(function(){
  $('#save-edit-button').click(saveEditProfile);
  $('.change-password-submit-button').click(changePassword);
});

function saveEditProfile(){
  $.ajax({
    url: '../php/userEdit.php?cmd=saveEditProfile',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'about_me': $('#about_me').val()
    },
    success: function(json){
        window.location.assign('/findkita/view/user_home.html.php');
        console.log("about me updated");
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
  updateUserQuestions();
}

function changePassword(){
  $.ajax({
    url: '../php/userEdit.php?cmd=changePassword',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'password': $('#enter-new-password').val(),
      'confirmPassword': $('#confirm-new-password').val()
    },
    success: function(json){
      if(json == $('#current-password').val()){
        if($('#enter-new-password').val() == $('#confirm-new-password').val()){
          window.location.assign('/findkita/view/user_home.html.php');
        }
        else{
          window.alert("New password does not match");
        }
      }
      else{
        window.alert("Current password incorrect");
      }
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
}

// Keypress on enter for edit user about me
$(document).on('keypress', '.edit-user-about-me', function(event){
  if(event.keyCode === 13){
    saveEditProfile();
  }
});

// Keypress on enter for change password modal
$(document).on('keypress', '.change-password', function(event){
  if(event.keyCode === 13){
    changePassword();
  }
});
