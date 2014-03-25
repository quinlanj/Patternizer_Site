<?php

	//this file processes the files you submit
	// and run the patternizer on it.

	function upload_file (){
		echo "<p>writing file</p>";

		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  		echo "Type: " . $_FILES["file"]["type"] . "<br>";
  		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  		echo "Stored in: " . $_FILES["file"]["tmp_name"];

		tokenize($_FILES["file"]["tmp_name"]);
	}

	function upload_textbox(){
		if(isset($_POST['text_box'])) { //only do file operations when appropriate
        	echo "<p>writing textbox</p>";
			$a = $_POST['text_box'];
        	$myFile = tempnam(sys_get_temp_dir(),"test");
        	$fh = fopen($myFile, 'w') or die("can't open file");
        	fwrite($fh, $a);
        	fclose($fh);

			tokenize($myFile);
    	}	
	}

	function tokenize($file_name){
		$support = grab_support();
		echo "tokenizing $file_name";
		$out = fopen("out.txt", 'w') or die("can't open log file");
		fclose($out);
		$result = fopen("result.txt",'w') or die ("cant open log file");
		fclose($result);
		$output = shell_exec('bash tokenize '.$file_name.' '.$support);
		echo "<p>$output</p>";
	}

	function grab_support(){

		if (isset($_POST['support'])){
			$s = $_POST['support'];
			if (is_numeric($s)){
				$s = intval($s);
				if ($s > 0){
					//Support is numeric
					return $s;
				}
				else {
					//support is 0 or less, return default
					return 10;
				}
			}
			else {
				//support is not numeric, return default
				return 10;
			}
		}
	}

	// If we cant upload a file, we grab stuff from the textbox.

	if ($_FILES["file"]["error"] > 0 || $_FILES["file"]["size"] == 0){
  			echo "Error: " . $_FILES["file"]["error"] . "<br>";
  			upload_textbox();
 	}
 	else{
 		upload_file();
 	}

 	header('Location: ./index.php?submitted=true');
 	die();
?>