var keyboard = "";
var dataTable = $('table').DataTable();

$(function(){
  // send the user input from the search box to ajax
  $('.search').click(function(){
    keyword = $('#search').val();
    window.location.assign('/findkita/view/forum_search.html.php');
    getResults(keyword);
  });
});

function getResults(){
  $.ajax({
    url: '../php/index.php?cmd=searchResults',
    type: 'GET',
    contentType: 'application/json',
    data: {
      'keyword': keyword
    },
    success: function(json){
      dataTable.destroy();
      console.log(json);
      var addHead = "<tr><th id=\"search-topic-head\">Topic</th><th id=\"search-thread-head\">thread</th><th id=\"search-post-head\">Post</th></tr>";
      $('#forum_topic_head').html(addHead);
      var addHtml = "";
      $('#nav-forum').hide();
      for(var i = 0; i < json.length; i++){
        addHtml += "<tr>" +
                     "<td value=\"" + json[i].topic + "\" id=\"search-topic-value\"><span id=\"search-topic\">" + json[i].topic + "</span></td>" +
                     "<td value=\"" + json[i].thread + "\" id=\"search-thread-value\"><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"search-thread\">" + json[i].thread + "</span></td>" +
                     "<td value=\"" + json[i].post + "\" id=\"search-post-value\"><span onmouseover=\"\" style=\"cursor: pointer;\" id=\"search-post\">" + json[i].post + "</span></td>" +
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

// Keypress on enter for search bar
$(document).on('keypress', '#search', function(event){
  if(event.keyCode === 13){
    event.preventDefault();
    keyword = $('#search').val();
    getResults(keyword);
  }
});

function getPaging(){
  dataTable = $('table').DataTable({
    bPaginate: true,
    bInfo: false,
    bFilter: false,
    bLengthChange: 25,
    bSort: false
  });
}
