<?php


function addAllNumbers($number){
	if($number==0){
		return 0;
	}else{
		return $number + addAllNumbers($number-1);
	}
}
$sum = "&nbsp;";
if(isset($_GET['number'])){
	if(is_numeric($_GET['number'])){
		if($_GET['number'] < 312500){
			$sum = addAllNumbers($_GET['number']);
		}else{
			$sum = "<span style='color:red;'>Sorry, the number is too big for my memory to handle.</span>";
		}
	}else{
		$sum = "<span style='color:red;'>Sorry, that is not a number.</span>";
	}
}

?>
<html>
	<head>
		<title>Recursion - Sum of Integers 1 to N</title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<h1>Sum of Integers</h1>
		<p>This is a basic example of recursion used to find the sum of all integers from 1 to the number specified.</p>
		<form action="sum.php" method="GET">
			<p><?php echo $sum; ?></p>
			<p><input name="number" type="text" /></p>
			<p><input name="submit" type="submit" value="Sum" /></p>
		</form>
		<p class="finePrint">*Yes, I know that recursion is not necessary for this particular problem.  It's just the easiest example that popped into my head.</p>
	</body>
</html>