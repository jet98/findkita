$(function(){
  $('.create-thread-button').hide();
  $('#nav-forum').hide();
  loadTopics();
});

function loadTopics(){
  $.ajax({
    url: '../php/forum/forumHome.php?cmd=loadTopics',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      var addHead = "<tr><th id=\"topic-title-head\">Topic</th><th>Thread</th></tr>";
      $('#forum-topic-head').html(addHead);
      var addHtml = "";
      $('#nav-forum').hide();
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
                     "<td value=\"" + json[i].topic + "\" id=\"topic-row-value\"><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"topic-title\">" + json[i].topic + "</span></br><p id=\"topic-theme\">" + json[i].topic_desc + "</p></td>" +
                     "<td><span>" + json[i].post + "</span> threads</td>" +
                   "</tr>";
      }
      $('#forum_topic_body').html(addHtml);
    },
    error: function(request, status, error) {
      console.log("error" + request.responseText);
    }
  });
}

$(document).on('click','#topic-title',function(){
  var topic = $(this).text();
  loadThread(topic);
});

function loadThread(topicTitle){
  $.ajax({
    url: '../php/forum/forumThread.php?cmd=loadThread',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'topicTitle': topicTitle
    },
    success: function(json){
      $('.create-thread-button').show();
      $('#nav-forum').show();
      $('#nav-forum-text').html("<< Topics");
      $('#nav-forum-text').click(loadTopics);
      var addHead = "<tr><th id=\"thread-title-head\">Thread</th><th>Replies</th></tr>";
      $('#forum-topic-head').html(addHead);
      var addHtml = "";
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
                     "<td><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"thread-title\">" + json[i].thread_title + "</span>" +
                     "<p id=\"forum-user\">Created By: " + json[i].f_name + " on " + json[i].post_date.substring(0, 10) + "</p></td>" +
                     "<td><span>99</span> replies</td>" +
                   "</tr>";
      }
      $('#forum_topic_body').html(addHtml);
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}

$(document).on('click','#thread-title',function(){
  var thread = $(this).text();
  loadPosts(thread);
});

function loadPosts(threadTitle){
  $.ajax({
    url: '../php/forum/forumPost.php?cmd=loadPosts',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'threadTitle': threadTitle
    },
    success: function(json){
      $('.create-thread-button').hide();
      $('#nav-forum').show();
      $('#nav-forum-text').html("<< Threads");
      $('#nav-forum-text').click(loadThread);
      var addHead = "<tr><th id=\"forum-post-author\">Author</th><th id=\"forum-post-post\">Posts</th><th id=\"forum-post-reply\">Reply</th></tr>";
      $('#forum-topic-head').html(addHead);
      var addHtml = "";
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
          "<td id=\"forum-post-author\">" +
            "<img src=\"../uploads/" + json[i].avatar_link + "\" id=\"forum-profile-picture\" />" +
            "<h4 id=\"forum-post-username\">" + json[i].f_name + "</h4>" +
            "<h4 id=\"forum-post-date\">" + json[i].post_date.substring(0, 10) + "</h4>" +
          "</td>" +
          "<td id=\"forum-post-post\">" + json[i].post + "</td>" +
          "<td id=\"forum-post-reply\">" +
            "<div class=\"create-post-button\">" +
              "<a href=\"#\" title=\"Reply\">&#10226</a>" +
              "<a href=\"#\" title=\"Quote\">&#10557</a>" +
            "</div>" +
          "</td>" +
        "</tr>";
      }
      $('#forum_topic_body').html(addHtml);
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}
