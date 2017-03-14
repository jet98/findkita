$(function(){
  $('#user_profile_save_button').click(loadUserQuestions);
  $('#giftfind_profile_save_button').click(loadProfileQuestions);
});

function loadUserQuestions(){
  $.ajax({
    url: '../php/questions.php?cmd=loadUserQuestions',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      console.log(json);
      var addHtml = "";
      // for(var i = 0; i < json.length; i++){
      //   addHtml += "<div class=\"form-group\">" +
      //          "<label class=\"col-md-3 control-label\">" + " $question['question'] " + "</label>" +
      //          "<div class=\"col-md-8 select_option\">" +
      //            "<div class=\"ui-select\">" +
      //              "<select class=\"form-control\">" + " maybe a forloop here " +
      //              "</select>" +
      //            "</div>" +
      //          "</div>" +
      //       "</div>";
      // }
      // $('#user_form').html(addHtml);
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}

function loadProfileQuestions(){
  $.ajax({
    url: '../php/questions.php?cmd=loadProfileQuestions',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      console.log(json);
      // var addHtml = "";
      // for(var i = 0; i < json.length; i++){
      //   addHtml += "<div class=\"form-group\">" +
      //          "<label class=\"col-md-3 control-label\">" + " $question['question'] " + "</label>" +
      //          "<div class=\"col-md-8 select_option\">" +
      //            "<div class=\"ui-select\">" +
      //              "<select class=\"form-control\">" + " maybe a forloop here " +
      //              "</select>" +
      //            "</div>" +
      //          "</div>" +
      //       "</div>";
      // }
      // $('#giftfind_form').html(addHtml);
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}
