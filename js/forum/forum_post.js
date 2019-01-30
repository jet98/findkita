var dataTable = $('table').DataTable();

$(function(){
  $.ajax({
    url: '../php/forum/forumPost.php?cmd=currentUser',
    type: 'GET',
    contentType: 'application/json',
    success: function(json){
      // console.log(json);
      // if(json == null){
      //   $('#post-reply').css('visibility', 'hidden');
      // }
      // else{
      //   $('#post-reply').css('visibility', 'visible');
      // }
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
});

function loadPosts(threadTitle){
  var threadTitle = sessionStorage.getItem('thread');
  $.ajax({
    url: '../php/forum/forumPost.php?cmd=loadPosts',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'threadTitle': threadTitle
    },
    success: function(json){
      $.ajax({
        url: '../php/index.php?cmd=currentSession',
        type: 'GET',
        contentType: 'application/json',
        success: function(user){
          console.log(user);
          dataTable.destroy();
          $('#nav-forum').hide();
          $('#nav-forum-text').html("<< Threads");

          var addHead = "<tr><th id=\"forum-post-author\">Author</th><th id=\"forum-post-post-title\">Posts</th><th id=\"forum-post-reply\"></th></tr>";
          var addHtml = "";
          $('#forum_topic_head').html(addHead);

          for(var i = 0; i < json.length; i++){
            addHtml += "<tr>" +
              "<td id=\"forum-post-author\">" +
                "<img src=\"../uploads/" + json[i].avatar_link + "\" id=\"forum-profile-picture\" />" +
                "<h4 id=\"forum-post-username\">" + json[i].f_name + "</h4>" +
                "<h4 id=\"forum-post-date\">" + json[i].post_date.substring(0, 10) + "</h4>" +
              "</td>" +
              "<td><p><i style=\"margin-left: 5%; color: grey;\">" + json[i].quote + "</i></p><span id=\"forum-post-post\">" + json[i].post + "</span></td>" +
              "<td id=\"forum-post-reply\">";

              // Remove the reply button if non user
              if(user.length != 0){
                addHtml += "<div class=\"create-post-button\">" +
                             "<button class=\"btn\" id=\"post-reply\" data-toggle=\"modal\" data-target=\"#quotePost\" type=\"submit\" style=\"cursor: pointer;\" title=\"Quote Post\">Quote + Reply</button>";
                // Add admin button if user is an Admin
                if(user[0].is_admin == 1){
                  addHtml += "<button class=\"btn\" id=\"delete-reply\" data-toggle=\"modal\" data-target=\"#deletePost\" type=\"submit\" style=\"cursor: pointer;\" title=\"Delete Post\">Delete</button>";
                }
                addHtml += "</div>";
              }
              addHtml += "</td>" + "</tr>";
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
