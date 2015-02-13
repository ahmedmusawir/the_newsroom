<!DOCTYPE html>
<html lang="eng">
  <head>
    <?php include('common_head.php'); ?>
    <link rel="stylesheet" href="style.css"/>
    <style type="text/css">
      img {
        padding-right: .5em;
        /*padding-bottom: .5em;*/
      }
    </style>
  </head>

  <body>
    <section class="text-center">

        <?php // include('jq_top_nav.php'); ?>
        <?php include('jq_header.php'); ?>

    </section>

     <section class="container">
                  <div class="row">

                    <button type="button" class="btn  btn-block btn-default  code_view" data-toggle="collapse" data-target="#run_code_1">View Code</button>

                    <article id="run_code_1" class="collapse">

                      <div class="thumbnail"> 

                      <?php include('code_view/cv1.php'); ?>

                      </div>
                    </article>

                  </div> <!-- row -->
      <hr>
      <div class="well code_view">
        <select class="form-control" id="news">
          <option value="#">Choose Your Type of News</option>
          <option value="topstories">Top Stories</option>
          <option value="world">World</option>
          <option value="us">U.S.</option>
          <option value="politics">Politics</option>
          <option value="tech">Tech</option>
          <option value="entertainment">Entertainment</option>
          <option value="business">Business</option>
        </select>
      </div>

      <article id="output" class="code_view"><img alt="" src="snippets/img/the_newsroom.png"></article>

    </section> <!-- content -->


    <script src="snippets/js/jquery-2.0.3.min.js"></script>
    <!-- // <script src="snippets/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">
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
                  console.log('newsTitle: ' + title);

                 myFun(title).then(function (data) {
                  // console.log(data);
                  // console.log(data.query.results.item);
                  var newsTitles = data.query.results.item;
                    
                    $('#output').text('');
                        $.each(newsTitles, function (index, val) {

                            // console.log(val.title);
                            // console.log(val.description);
                            // console.log(val.link);
                            // console.log(val.pubDate);

                            if(val.title){
                              $('#output').append("<div class='code_view'>");
                              $('#output').append("<h4 class='alert alert-info code_view'>" + val.title + "</h4>");
                              $('#output').append("<h5 class='label label-default'>" + val.pubDate + "</h5>");
                              $('#output').append("<h6 class='well code_view'>" + val.description + "</h6>");
                              $('#output').append("<a class='label label-danger' href='"+ val.link +"'>" + val.link +  "<a>");
                              $('#output').append("</div>");
                            }else{
                              $('#output').append("<h4>Nothing Found</h4>");

                            }  
                    });
         });


      });

    </script>
      

        
    </section> <!-- END MAIN container -->

    <hr>
    <section class="row">
    <?php include('jq_footer.php'); ?>
    </section>

  </body>
</html>
