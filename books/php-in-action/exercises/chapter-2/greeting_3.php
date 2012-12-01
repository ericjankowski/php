<?php
	include "../lib/HtmlDocument.php";
	include "../lib/HelloWorld_3.php";
	$greetings = new HelloWorld('Epsilon Eridani II');
	echo $greetings->getHtml();
?>