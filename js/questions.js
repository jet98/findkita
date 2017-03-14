$(function(){
  loadUserQuestions();
  loadProfileQuestions();
  $('#user_profile_save_button').click(saveUserQuestions);
  // $('#giftfind_profile_save_button').click(loadProfileQuestions);
});

function loadUserQuestions(){
  $.ajax({
    url: '../php/questions.php?cmd=loadUserQuestions',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      var addHtml = "";
      for(var i = 0; i < json.length; i+=2){
        addHtml += "<div class=\"form-group\">" +
               "<label id=\"" + i + "\"class=\"col-md-3 control-label\">" + json[i].question + "</label>" +
               "<div class=\"col-md-8 select_option\">" +
                 "<div class=\"ui-select\">" +
                   "<select id=\"user-select-option\" class=\"form-control\">" + json[i+1] +
                   "</select>" +
                 "</div>" +
               "</div>" +
            "</div>";
      }
      $('#user_form').html(addHtml);
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
      var addHtml = "";
      for(var i = 0; i < json.length; i+=2){
        addHtml += "<div class=\"form-group\">" +
               "<label class=\"col-md-3 control-label\">" + json[i].question + "</label>" +
               "<div class=\"col-md-8 select_option\">" +
                 "<div class=\"ui-select\">" +
                   "<select class=\"form-control\">" + json[i+1] +
                   "</select>" +
                 "</div>" +
               "</div>" +
            "</div>";
      }
      $('#giftfind_form').html(addHtml);
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}

function saveUserQuestions(){
  // var options = {};
  var index = 0;
  var data = new FormData($('#user_form')[0]);
  $('option:selected').each(function(){
    // options[$('#' + index).text()] = $(this).val();
    data.append($('#' + index).text().replace(/\s/g, ''), $(this).val());
    index += 2;
  });
  // for(option in options){
  //   console.log(option);
  //   console.log(options[option]);
  //   console.log();
  //   data.append(option, options[option]);
  // }

  // for (var pair of data.entries()){
  //   console.log(pair[0]+ ', '+ pair[1]);
  // }

  $.ajax({
    url: '../php/questions.php?cmd=saveUserQuestions',
    type: 'POST',
    data: data,
    contentType: false,
    processData: false,
    success: function(json){
      console.log(json);
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}
