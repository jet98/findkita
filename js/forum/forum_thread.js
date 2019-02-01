var dataTable = $('table').DataTable();

$(function(){
  // $('.create-thread-button').show();
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
      $.ajax({
        url: '../php/index.php?cmd=currentSession',
        type: 'GET',
        contentType: 'application/json',
        success: function(user){
          dataTable.destroy();
          $('#nav-forum').hide();
          $('#nav-forum-text').html("<< Topics");

          var addHead = "<tr><th id=\"thread-title-head\">Thread</th><th>Replies</th>";
          if(user.length != 0){
            if(user[0].is_admin == 1){
              addHead += "<th></th>";
            }
          }

          addHead += "</tr>";
          $('#forum_topic_head').html(addHead);
          var addHtml = "";

          for(var i = 0; i < json.length; i++){
            addHtml += "<tr>" +
                         "<td><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"thread-title\">" + json[i].thread_title + "</span>" +
                         "<p id=\"forum-user\">Created By: " + json[i].f_name + " on " + json[i].post_date.substring(0, 10) + "</p></td>" +
                         "<td><span id=\"thread-replies\">" + json[i].replies + "</span> replies</td>";
            // Add admin button if user is an Admin
            if(user.length != 0){
              if(user[0].is_admin == 1){
                addHtml += "<td><button class=\"btn\" id=\"delete-thread\" data-toggle=\"modal\" data-target=\"#deleteThread\" type=\"submit\" style=\"cursor: pointer;\" title=\"Delete Thread\">Delete</button></td>";
              }
            }
            addHtml += "</tr>";
          }

          $('#forum_topic_body').html(addHtml);
          getPaging();
        },
        error: function(request, status, error) {
          console.log("error " + request.responseText);
        }
      });
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}
