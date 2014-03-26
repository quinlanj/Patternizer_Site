<?php
include('layout.php');
?>

<html>
<body>
  <div class="container">
  	<div class="well">
	<h1>All About The Patternizer</h1>
	<br>
	<p>
		<h2> What is this? </h2>
		The patternizer is a prototype application that finds common regex patterns in logs.

		<br>
		<br>
		<h2> How does it work? </h2>
		<h3> Step 1 </h3>
		<br>
		A log is taken and tokenized. Common patterns are searched for, such as the date and directories. The tokenizer was made using Lex.
		<img src="./img/one.png" >


		<h3> Step 2 </h3>
		After we tokenize our log, we find frequent regex patterns using a frequent itemset miner called Loghound. The miner is implemented 
		using a prefix tree and the SLCT algorithm as outlined <a href=" http://ristov.users.sourceforge.net/publications/intellcomm04-final.pdf">here</a>.
		<br>
		<img src="./img/two.png" >


		<h3> Result </h3>
		The user chooses the regex pattern that they were looking for.
		<br> <br>

		<h2> Can i haz teh codes? </h2>
		Patternizer Backend:
		<br><br>
   		<code>$ git clone https://quinlan_jung@bitbucket.org/quinlan_jung/patternizer.git</code>	
   		<br><br>
   		Patternizer Frontend:
   		<br><br>
   		<code>$ git clone https://quinlan_jung@bitbucket.org/quinlan_jung/patternizer_site.git</code>
   		<br><br>
   		<h2> I still have questions </h2>
   		Shoot me an email at quinlanjung[at]gmail[dot]com
	</p>
	</div>
  </div>
</body>
</html>
