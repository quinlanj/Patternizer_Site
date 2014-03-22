

<html>

<?php
include('layout.php');
?>

<body>

<!-- <button id="quinlan"> Quin</button> -->

<div class="container">
  <div class="well">

<h1>Patternizer</h1><hr>
<!-- Form for input -->
    <form id="input_data" action="file.php" name="form" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <textarea name="text_box" cols=45 rows=10 class="form-control"></textarea> 
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file" class="form-control">
      </div><br>

      <div class="form-group">
        <label for="support">Support:</label>
        <input type="text" name="support" size="50" placeholder="Enter Support" class="form-control"> <br>
      </div><br>

      <input type="submit" id="search-submit" value="submit" class="btn btn-primary">

    </form>
<!-- Form End -->

    <textarea id="regex"> </textarea>
    <br>

    <!-- Button trigger modal -->
    <button id="buttonmash" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      patterns
    </button>
    <!-- Button End -->
    <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                  <div id="result"></div>  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal End -->
      </div>  <!-- div class="well" end--> 
     </div>  <!-- div class="container" end-->    


    <!-- Javascript -->
    <script>



      //make the candidate divs clickable
      $('#result').on('click', '.clickable', function(e) { 
      	var regex_div = document.getElementById(this.id+"_regex");
      	var regex_str = replaceDiv(regex_div.innerHTML);
      	$('#regex').val(regex_str);
          //console.log(regex_div.innerHTML);
      });     
      

      getFile();      

      //JQuery Scroll on click      

      $("#quinlan").click(function() {
          $('html, body').animate({
              scrollTop: $("#buttonmash").offset().top
          }, 2000);
      });


    </script>





</body>
</html>


