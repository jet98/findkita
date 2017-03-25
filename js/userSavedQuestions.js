$(function(){
  // this is to save user edit search profile
  // there needs to be a check for the user to answer all questions
  $.ajax({
    url: '../php/userEdit.php?cmd=getSearchOptions',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      console.log(json);
      var index = 0;
      $('select').each(function(){
        console.log(json[index].listed_answer.replace(/\s/g, ''));
        var id = json[index].listed_answer.replace(/\s/g, '');
        $('option#' + id).prop('selected', true);
        index++;
      });
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
});
