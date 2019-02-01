$(function(){
  $('.delete-post-submit-button').click(deletePost);
  $('.delete-thread-submit-button').click(deleteThread);
});

function deletePost(){
  $.ajax({
    url: '../php/admin.php?cmd=deletePost',
    type: 'POST',
    contentType: 'application/json',
    data: {
      'post': $('#forum-post-post').val(),
      'date': $('#forum-post-date').val()
    },
    success: function(json){
      if(json){
        alert("Post has been removed");
        window.location.reload();
      }
      else{
        alert("Post was unable to be removed");
      }
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}

function deleteThread(){
  $.ajax({
    url: '../php/admin.php?cmd=deleteThread',
    type: 'POST',
    contentType: 'application/json',
    data: {
      'replies': $('#thread-replies').val(),
      'title': $('#thread-title').val()
    },
    success: function(json){
      console.log(json);
      if(json){
        alert("Thread has been removed");
        window.location.reload();
      }
      else{
        alert("Thread was unable to be removed");
      }
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}
