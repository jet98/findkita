$(function(){
  $('.search').click(getSearchResults);
});

function getSearchResults(){
  var keyword = $('#search').val();
  window.location.assign("/seniorproject/view/results.html.php");
  getItems("../php/amazon/search.php?cmd=searchItems", keyword, '#results_list');
  // $.ajax({
  //   url: '../php/amazon/search.php?cmd=searchItems',
  //   type: 'GET',
  //   contentType: 'application/json',
  //   data:{
  //     'keyword': keyword
  //   },
  //   success: function(json){
  //     console.log(json);
  //     var addHtml = "";
  //     for(var i = 0; i < json.length; i++){
  //       addHtml += "<div class=\"col-sm-6 col-md-4\" id=\"item\">" +
  //         "<div class=\"thumbnail\">" +
  //           "<a href=\"" + json[i][3][0] + "\"><img src=" + json[i][2][0] + " alt=\"Generic placeholder thumbnail\" style=\"height:200px\" /></a>" +
  //         "</div>" +
  //         "<div class=\"caption\">" +
  //           "<a style=\"color:black\" href=\"" + json[i][3][0] + "\"><h4 style=\"height:120px\">" + json[i][0][0] + "</h4></a>" +
  //           "<p>" +
  //             "<h4 id=\"float_left\" style=\"color:#FF0000\">" + json[i][1][0] + "</h4>" +
  //             "<span class=\"a-button-inner\" id=\"float_right\">" +
  //               "<a onclick=\"location.href='" + json[i][3][0] + "'\">Buy Now</br><img src=\"http://webservices.amazon.com/scratchpad/assets/images/Amazon-Favicon-64x64.png\" class=\"a-icon a-icon-shop-now\" /></a>" +
  //             "</span>" +
  //           "</p>" +
  //         "</div>" +
  //       "</div>";
  //     }
  //     $('#results_list').append(addHtml);
  //     console.log(addHtml);
  //   },
  //   error: function(request, status, error) {
  //     console.log("error " + request.responseText);
  //   }
  // });

  // var query = "<?php include_once \"../php/amazon/querySearch.php\"; include_once \"../php/amazon/getItems.php\"; $response = querySearch(" + keyword + ");  getItems($response) ?>";
  // $('#results_list_keyword').html(query);
}
