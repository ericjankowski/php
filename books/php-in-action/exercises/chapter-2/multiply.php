<?php
include ("../lib/OverloadableObject.php");
include ("../lib/Multiplier.php");

$multi = new Multiplier;
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../../../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../../../../css/style.css">
		<title>Java-style method overloading in PHP</title>
	</head>
	<body>
		<p class="breadcrumbs"><a href="../../../../index.php">PHP</a> &gt;&gt; <a href="../../../index.php">Books</a> &gt;&gt; <a href="../../notes.php">PHP in Action</a></p>
		<h1>Java-style method overloading in PHP</h1>
		<p>Two arguments: 5 * 6 = <?php echo $multi->multiply(5,6); ?></p>	
		<p>Three arguments: 5 * 6 * 3 = <?php echo $multi->multiply(5,6,3); ?></p>
	</body>
</html>