var topic = "";
var thread = "";
var dataTable = $('table').DataTable();

$(function(){
  $('#nav-forum').hide();

  if($('.create-thread-button').is(":visible")){
    loadThread(topic);
  }
  else if($('.reply-post-button').is(":visible")){
    loadPosts(thread);
  }
  else{
    $('.create-thread-button').hide();
    $('.reply-post-button').hide();
    loadTopics();
  }
});

function loadTopics(){
  $.ajax({
    url: '../php/forum/forumHome.php?cmd=loadTopics',
    type: 'POST',
    contentType: 'application/json',
    success: function(json){
      dataTable.destroy();
      var addHead = "<tr><th id=\"topic-title-head\">Topic</th><th>Thread</th></tr>";
      $('#forum_topic_head').html(addHead);
      var addHtml = "";
      $('#nav-forum').hide();
      $('.reply-post-button').hide();
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
                     "<td value=\"" + json[i].topic + "\" id=\"topic-row-value\"><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"topic-title\">" + json[i].topic + "</span></br><p id=\"topic-theme\">" + json[i].topic_desc + "</p></td>" +
                     "<td><span>" + json[i].post + "</span> threads</td>" +
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

// Redirect to forum threads
$(document).on('click','#topic-title', function(){
  topic = $(this).text();
  sessionStorage.setItem('topic', topic);
  window.location.assign('/findkita/view/forum_thread.html.php');
  loadThread();
});

// Redirect to forum posts
$(document).on('click','#thread-title', function(){
  thread = $(this).text();
  sessionStorage.setItem('thread', thread);
  window.location.assign('/findkita/view/forum_post.html.php');
  loadPosts();
});

function getPaging(){
  dataTable = $('table').DataTable({
    bPaginate: true,
    bInfo: false,
    bFilter: false,
    bLengthChange: false,
    bSort: false
  });
}
