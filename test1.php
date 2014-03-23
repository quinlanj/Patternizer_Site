

<html>

<?php
include('layout.php');
?>

<body>



<!-- <button id="quinlan"> Quin</button> -->

<div class="container">

<ul class="nav nav-tabs">
  <li id="a1" class="active"><a href="#patternizer" data-toggle="tab">Patternizer</a></li>
  <li id ="a2"><a href="#patterns" data-toggle="tab">Patterns</a></li>
  <li id="a3"><a href="#output" data-toggle="tab">Output</a></li>
</ul>

<!-- Tab panes -->
<!-- PATTERNIZER TAB -->
<div class="tab-content">
  <div class="tab-pane active" id="patternizer">
    <h1>Patternizer</h1><hr>
    <!-- Form for input -->
        <form id="input_data" action="file.php" name="form" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <textarea name="text_box" title="Must be at least 8 characters." cols=45 rows=10 class="form-control"></textarea>
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
    </div>


<!-- PATTERN TAB -->
  <div class="tab-pane" id="patterns">
    <h1>Patterns</h1><hr>
    <div id="result"></div>
  </div>

  <div class="tab-pane" id="output">
    <h1>Output</h1><hr>
    <textarea id="regex"> </textarea>
  </div>
</div>



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

//       This Function switches the tab to output once a pattern is selected.
      $("#result").click(function() {
          $("#a3").toggleClass("active");
          $("#output").toggleClass("active");
          $("#a3").siblings().removeClass("active");
          $("#output").siblings().removeClass("active");
        });
    </script>





</body>
</html>
