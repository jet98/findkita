var dataTable = $('table').DataTable();

$(function(){
  $('.reply-post-button').show();
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
      dataTable.destroy();
      $('.create-thread-button').hide();
      $('.reply-post-button').show();
      $('#nav-forum').hide();
      $('#nav-forum-text').html("<< Threads");
      var addHead = "<tr><th id=\"forum-post-author\">Author</th><th id=\"forum-post-post-title\">Posts</th><th id=\"forum-post-reply\">Reply</th></tr>";
      $('#forum-topic-head').html(addHead);
      var addHtml = "";
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
          "<td id=\"forum-post-author\">" +
            "<img src=\"../uploads/" + json[i].avatar_link + "\" id=\"forum-profile-picture\" />" +
            "<h4 id=\"forum-post-username\">" + json[i].f_name + "</h4>" +
            "<h4 id=\"forum-post-date\">" + json[i].post_date.substring(0, 10) + "</h4>" +
          "</td>" +
          "<td><p><i style=\"margin-left: 5%; color: grey;\">" + json[i].quote + "</i></p><span id=\"forum-post-post\">" + json[i].post + "</span></td>" +
          "<td id=\"forum-post-reply\">" +
            "<div class=\"create-post-button\">" +
              "<span id=\"post-reply\" data-toggle=\"modal\" data-target=\"#quotePost\" type=\"submit\" onmouseover=\"\" style=\"cursor: pointer;\" onclick=\"\" title=\"Quote Post\">&#10226</span>" +
            "</div>" +
          "</td>" +
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
