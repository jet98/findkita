$(function(){
  loadUserQuestions();
  loadProfileQuestions();
  $('#user_profile_save_button').click(saveUserQuestions);
  // $('#giftfind_profile_save_button').click(loadProfileQuestions);
  $.ajax({
    url: '../php/userEdit.php?cmd=getSearchOptions',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      console.log(json);
      var index = 0;
      $('select#user-select-option').each(function(){
        console.log("option#" + json[index].listed_answer.replace(" ", ""));
        var id = "option#" + json[index].listed_answer.replace(" ", "");
        $(id).val(json[index].listed_answer).prop('selected', true);
        index++;
      });
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
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
  var index = 0;
  var data = new FormData($('#user_form')[0]);
  $('option:selected').each(function(){
    data.append($('#' + index).text().replace(/\s/g, ''), $(this).val());
    index += 2;
  });

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
