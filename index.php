
<!-- The Main Page for the Patternizer Frontend -->
<html>

<!-- include the dependencies -->
<?php
include('layout.php');
?>

<body>

<!-- Div Class Container -->
<div class="container" >

<!-- Tab Navigation -->
<ul class="nav nav-tabs">
  <li id="a1" class="active"><a href="#patternizer" data-toggle="tab">Patternizer</a></li>
  <li id ="a2"><a href="#patterns" data-toggle="tab">Patterns</a></li>
  <li id="a3"><a href="#output" data-toggle="tab">Output</a></li>
</ul>
<!-- End of Tab Navigation -->

<!-- Tab panes -->

<!-- PATTERNIZER TAB -->
<div class="tab-content">
  <div class="tab-pane active" id="patternizer">
    <h1>Step 1: Upload your log file.</h1><hr>
    <!-- Form for input -->
        <form id="input_data" action="file.php" name="form" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <textarea name="text_box" title="Must be at least 8 characters." cols=45 rows=10 class="form-control"></textarea>
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file" class="form-control">
          </div><br>

          <div class="form-group">
            <label for="support">Minimum Pattern Frequency:</label>
            <input type="text" name="support" size="50" placeholder="Default is 10" class="form-control"> <br>
          </div><br>

          <input type="submit" id="search-submit" value="submit" class="btn btn-primary">

        </form>
        <!-- Form End -->
  </div>
<!-- END OF PATTERNIZER TAB -->


<!-- PATTERN TAB -->
  <div class="tab-pane" id="patterns">
    <h1>Step 2: Choose a pattern</h1><hr>
    <div id="result"></div>
  </div>
<!-- END OF PATTERN TAB -->

<!-- OUTPUT TAB -->
  <div class="tab-pane" id="output">
    <h1>Result: Here is the pattern regex</h1><hr>
    <textarea id="regex"> </textarea>
  </div>
<!-- END OF OUTPUT TAB -->

</div>
<!-- End of Tab Panes -->


</div>
<!-- Div Class Container End-->


<!-- Javascript -->
<script>

      // Check to see if we have submitted a log file or anything in the text box
      // switch to the patterns tab if we have
      if (getParam("submitted")=="true"){
        $("#a2").toggleClass("active");
        $("#patterns").toggleClass("active");
        $("#a2").siblings().removeClass("active");
        $("#patterns").siblings().removeClass("active");
      }



      //make the candidate divs clickable
      $('#result').on('click', '.clickable', function(e) {
      	var regex_div = document.getElementById(this.id+"_regex");
      	var regex_str = replaceDiv(regex_div.innerHTML);
      	$('#regex').val(regex_str);
          //console.log(regex_div.innerHTML);
      });
      getFile();




      //This Function switches the tab to output once a pattern is selected.
      $("#result").click(function() {
          $("#a3").toggleClass("active");
          $("#output").toggleClass("active");
          $("#a3").siblings().removeClass("active");
          $("#output").siblings().removeClass("active");
        });
      //End of function

</script>
<!-- End of Javascript -->

</body>
</html>
