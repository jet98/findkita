$(function(){
  $('.create-thread-submit-button').click(createThread);
});

function createThread(){
  $.ajax({
    url: '../php/forum/forumThread.php?cmd=createThread',
    type: 'GET',
    contentType: 'text/html',
    data: {
      'title': $('#create_thread_title').val(),
      'post': $('#create_thread_post').val(),
    },
    success: function(data){
      alert(data.toUpperCase() + " successfully was created.");
      location.reload();
    },
    error: function(request, status, error) {
      console.log("error" + " " + request.responseText);
    }
  });
}
