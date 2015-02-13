<pre class="prettyprint">
<xmp>
function getVals() {
var singleValues = $( "#news" ).val();

return singleValues;
}

$('#news').on('change', function () {

// ======================================
// JQ DEFFERED WITH SET ajax({}) NEWS
// ======================================

var myFun = function (arg) {

console.log('newsTitle in myFun: ' + arg);
  var newsTitle = encodeURIComponent(arg);
  var rss = "http://rss.news.yahoo.com/rss/"+newsTitle;
  var query = encodeURIComponent('select * from rss where url="'+rss+'"');
  var yql = 'http://query.yahooapis.com/v1/public/yql?q='+query+'&format=json&diagnostics=true&callback=?';

  return  $.ajax({
      url: yql,
      dataType: 'jsonp'
    }).promise();

  }

  var title = getVals();
  //console.log('newsTitle: ' + title);

 myFun(title).then(function (data) {
  // console.log(data);
  var newsTitles = data.query.results.item;
    
    $('#output').text('');
        $.each(newsTitles, function (index, val) {

            if(val.title){
              $('#output').append("<h4 class='alert alert-info'>" + val.title + "</h4>");
              $('#output').append("<h5 class='label label-default'>" + val.pubDate + "</h5>");
              $('#output').append("<h6 class='well'>" + val.description + "</h6>");
              $('#output').append("<a class='label label-danger' href='"+ val.link +"'>" + val.link +  "<a>");
            }else{
              $('#output').append("<h4>Nothing Found</h4>");

            }  
    });
    
  });

});

</xmp>
</pre>