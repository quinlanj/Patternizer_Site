<?php
include('layout.php');
?>

<html>
<body>
  <div class="container">
  	<div class="well">
	<h1>About</h1>
	<br>
	<p>
		<h2> What is this </h2>
		The patternizer is a prototype application that finds common regex patterns in logs.

		<h2> How does it work </h2>
		<br>
		<h3> Step 1 </h3>
		<br>
		A log is taken and tokenized. Common patterns are searched for, such as the date and directories. The tokenizer was made using Lex.
		<br>
		<img src="/img/one.png" >
		<h3> Step 2 </h3>
		<br>
		After we tokenize our log, we find frequent regex patterns using a frequent itemset miner called Loghound. The miner is implemented 
		using a prefix tree and uses the SLCT algorithm as outlined <a href=" http://ristov.users.sourceforge.net/publications/intellcomm04-final.pdf">here</a>.
		<br>
		<img src="/img/two.png" >
		<h3> Result </h3>
		<br>
		The user chooses the regex pattern that they were looking for.
		<br>
	</p>
	</div>
  </div>
</body>
</html>
