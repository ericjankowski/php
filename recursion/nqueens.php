<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


 
function isAttacked(&$board, $x, $y){
	foreach($board as $key => $value){
		if(!is_null($value)){
			if ($key==$x){
				return true;
			}else if($value==$y){
				return true;
			}else if(($key-$x) / ($value-$y) == 1){
				return true;
			}else if(($key-$x) / ($value-$y) == -1){
				return true;
			}
		}
	}
	return false;
}

/**
 * @param $board - the board rows which are filled with column numbers
 * @param $index - the current row number
 * @param $filledPositions - the columns which are filled with the corresponding row number
 * @param $indexIteration - a counter to determine how many times the index has been tried.
 */
function placeQueens(&$board, &$index, &$filledPositions, $rand=null, $startRand=null, $rolledOver=false){
	//check if we're done here.	
	if($index[0] == count($board)){
		//done
		return;
	}
	if(!is_null($rand) && $rand >= count($board)){
		//roll over to 0
		$rand = 0;
		$rolledOver = true;
	}
	//generate a new random number starting position
//	echo "rand: ".$rand.",".$startRand." -- <br />";
//	var_dump(!is_null($rand) && ($rand == $startRand));
	if(!is_null($rand) && ($rand == $startRand)){ //rolled over, game unsolvable in current state. Try again.
//		echo $rand.'=='.$startRand."<br />";
		$board = array_fill(0,count($board) ,null);
		$filledPositions = array();
		$index = array(0);
		placeQueens($board, $index, $filledPositions);
		return false;
	}else if(is_null($rand)){
		$rand = mt_rand(0,count($board)-1);
		$startRand = $rand;
	}
	
//	echo "finding position for {$index[0]},{$rand}<br />";
	if(isset($filledPositions[$rand])){
//		echo "fillpos set at {$filledPositions[$rand]},{$rand}<br />";
		//try this again, post increment
		placeQueens($board, $index, $filledPositions, ++$rand, $startRand, $rolledOver);
		$index[0] = $index[0]+1;
		return;
	}
	//check diagonal
	if($index[0] > 0){
//		echo "finding diag for {$index[0]},{$rand}<br />";
		for($i=1; $i < count($board); $i++){
			if(isCollision($index[0]+$i, $rand+$i, $board, $filledPositions)
				|| isCollision($index[0]+$i, $rand-$i, $board, $filledPositions)
				|| isCollision($index[0]-$i, $rand+$i, $board, $filledPositions)
				|| isCollision($index[0]-$i, $rand-$i, $board, $filledPositions)
			){
				placeQueens($board, $index, $filledPositions, ++$rand, $startRand, $rolledOver);
				$index[0] = $index[0]+1;
				return;
			}
		}
	}
	
	//fallthrough
	//successful placement
	$board[$index[0]] = $rand;
	$filledPositions[$rand] = $index[0];
//	echo "placed ".$index[0].",".$rand."<br />";
	$index[0] = $index[0]+1;
	placeQueens($board, $index, $filledPositions);
	return true;
}

function isCollision($row, $col, &$board, &$filledPositions){
	if($row < 0 || $col < 0 || $row >= count($board) || $col >= count($board)) return false;
//echo $row." - ".$col;
//print_r($board);
//print_r($filledPositions);
//var_dump(!is_null($board[$row]));
//var_dump(isset($filledPositions[$col]));
//echo "<br />";
	if(!is_null($board[$row]) && $board[$row] == $col){
		return true;
	}

	return false;
}

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<style>
			div{
				float:left;
				
			}
			div.black{
				background-color:#B58862;
				width:40px;
				height:40px;
				text-align:center;
				
			}
			div.white{
				background-color:#F0D9B5;
				width:40px;
				height:40px;
				text-align:center;
				
			}
		</style>
	</head>
	<body>
		<h1>Recursion: Brute Force N-Queens</h1>
		<form action="nqueens.php" method="GET">
			<p>Number of queens: <input name="queens" type="text" /><input name="submit" type="submit" value="Go" /></p>
		</form>
		<div style='margin:50px;border:1px solid black;'>
<?php

if(isset($_GET['queens']) && is_numeric($_GET['queens']) && $_GET['queens'] > 4){
	$queens = $_GET['queens'];
}else{
	$queens = 8;
}

//build an array that is the size of the queens number
$placements = array_fill(0,$queens,null); //either null or -1
$filledPositions = array();
$index = array(0);

placeQueens($placements, $index, $filledPositions);
//doesn't get here on 26

//print_r($placements);

//places queens on the board.
for ($i=0;$i<$queens;$i++){
	echo "<div style='clear:left;'>\n";
	for($j=0;$j<$queens;$j++){
		if(($i+$j)%2==0){
			echo "<div class='black'>";
		}else{
			echo "<div class='white'>";
		}
		if ($placements[$i]==$j){
			echo "<img height='40' src='../images/queen.png'/>";
		}else{
			echo "&nbsp;";
		}
		echo "</div>\n";
	}
	echo"</div>\n";
}

?>
		</div>
	</body>
</html>
