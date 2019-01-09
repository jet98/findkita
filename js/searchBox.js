var keyword;

$(function(){
  // send the user input from the search box to ajax
  $('.search').click(function(){
    keyword = $('#search').val();
    getResults(keyword);
  });

  // Search bar button
  $('#search').keyup(function(event){
    if(event.keyCode === 13){
      $('.search').click(function(){
        event.preventDefault();
        keyword = $('#search').val();
        getResults(keyword);
      });
    }
  });
});

function getResults(keyword){
  $.ajax({
    url: '../php/index.php?cmd=searchResults',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'keyword': keyword
    },
    success: function(json){
      window.location.assign('/findkita/view/forum_search.html.php');
      console.log(json);
      // $('#home-login-buttons').hide();
      // $('#home-logout-button').hide();
      // $('#user-home-link').hide();
    },
    error: function(request, status, error) {
      console.log("error " + request.responseText);
    }
  });
}

// $(document).on('keypress', '#search', function(event){
//   if(event.keyCode === 13){
//     $('.search').click(function(){
//       event.preventDefault();
//       keyword = $('#search').val();
//       getResults(keyword);
//     });
//   }
// });
