var dataTable = $('table').DataTable();

$(function(){
  $('.create-thread-button').show();
});

function loadThread(){
  var topicTitle = sessionStorage.getItem('topic');

  $.ajax({
    url: '../php/forum/forumThread.php?cmd=loadThread',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'topicTitle': topicTitle
    },
    success: function(json){
      // //If there is no user logged in
      // if(json[0] === undefined){
      //   alert("Please log in to add a thread");
      //   $('.create-thread-button').hide();
      // }
      // else{
        dataTable.destroy();
        $('.create-thread-button').show();
        $('.reply-post-button').hide();
        $('#nav-forum').hide();
        $('#nav-forum-text').html("<< Topics");
      // }

      var addHead = "<tr><th id=\"thread-title-head\">Thread</th><th>Replies</th></tr>";
      $('#forum-topic-head').html(addHead);
      var addHtml = "";
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
                     "<td><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"thread-title\">" + json[i].thread_title + "</span>" +
                     "<p id=\"forum-user\">Created By: " + json[i].f_name + " on " + json[i].post_date.substring(0, 10) + "</p></td>" +
                     "<td><span>" + json[i].replies + "</span> replies</td>" +
                   "</tr>";
      }
      $('#forum_topic_body').html(addHtml);
      getPaging();
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}
