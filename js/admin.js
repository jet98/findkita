$(function(){
  $('.delete-post-submit-button').click(deletePost);
});

function deletePost(){
  $.ajax({
    url: '../php/admin.php?cmd=deletePost',
    type: 'POST',
    contentType: 'application/json',
    data: {
      'date': $('#forum-post-username').val(),
      'post': $('#forum-post-date').val()
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
  })
}
