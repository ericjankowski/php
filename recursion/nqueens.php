<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


$queens = 8;
$tlimit = 30;

if(isset($_GET['queens']) && is_numeric($_GET['queens']) && $_GET['queens'] >= 4){
	$queens = $_GET['queens'];
}
if(isset($_GET['tlimit']) && intval($_GET['tlimit'])){
	echo "Updating time limit to ".$_GET['tlimit']." seconds";
	set_time_limit ($_GET['tlimit']);
	$tlimit = $_GET['tlimit'];
}

/**
 * @param $board - the board rows which are filled with column numbers
 * @param $index - the current row number
 * @param $filledPositions - the columns which are filled with the corresponding row number
 * @param $indexIteration - a counter to determine how many times the index has been tried.
 */
function placeQueens(&$board, &$index, &$filledPositions, $col=null, $startRand=null, $rolledOver=false){
	$result = true; //default true
	
	//check if we're done here.	
//	echo $index[0].",".$col."---<br />";
	if($index[0] == count($board)){
		//done
		return $result && true;
	}
	if(!is_null($col) && $col >= count($board)){
		//roll over to 0
		$col = 0;
		$rolledOver = true;
	}
	//generate a new random number starting position
	if(!is_null($col) && ($col == $startRand)){ //rolled over, game unsolvable in current state. Try again.
		//reset board
//		echo "unsolvable<br />";
		//$board = array_fill(0,count($board) ,null);
		//$filledPositions = array();
		//$index = array(0);
		//$result = placeQueens($board, $index, $filledPositions);
		return false;
	}else if(is_null($col)){
		$col = mt_rand(0,count($board)-1);
		$startRand = $col;
	}
	
	if(isset($filledPositions[$col])){
//		echo "Collision in column ".$index[0].",".$col."<br />";
		//try this again, post increment
		$result = placeQueens($board, $index, $filledPositions, ++$col, $startRand, $rolledOver);
		$index[0] = $index[0]+1;
		//var_dump($result && true);
//		if(!$result) echo "false<br />";
		return $result && true;
	}
	//check diagonal
	if($index[0] > 0){
		for($i=1; $i < count($board); $i++){
			if(isCollision($index[0]+$i, $col+$i, $board, $filledPositions)
				|| isCollision($index[0]+$i, $col-$i, $board, $filledPositions)
				|| isCollision($index[0]-$i, $col+$i, $board, $filledPositions)
				|| isCollision($index[0]-$i, $col-$i, $board, $filledPositions)
			){
//				echo "Diag collision ".$index[0].",".$col."<br />";
				$result = placeQueens($board, $index, $filledPositions, ++$col, $startRand, $rolledOver);
				$index[0] = $index[0]+1;
				return ($result && true);
			}
		}
	}
	
	//fallthrough
	//successful placement
	$board[$index[0]] = $col;
	$filledPositions[$col] = $index[0];
//	echo "placed ".$index[0].",".$col."<br />";
	$index[0] = $index[0]+1;
	$result = placeQueens($board, $index, $filledPositions);
	return $result && true;
}

function isCollision($row, $col, &$board, &$filledPositions){
	if($row < 0 || $col < 0 || $row >= count($board) || $col >= count($board)) return false;
	if(!is_null($board[$row]) && $board[$row] == $col){
		return true;
	}

	return false;
}

?>
<html>
	<head>
		<style>
			div.main {
				float:left;
				clear:left;
				margin:25px;
				border:1px solid black;
			}
			div.black{
				background-color:#B58862;
				width:40px;
				height:40px;
				text-align:center;
				float:left;
			}
			div.white{
				background-color:#F0D9B5;
				width:40px;
				height:40px;
				text-align:center;
				float:left;
			}
		</style>
	</head>
	<body>
		<h1>Recursion: Brute Force N-Queens</h1>
		<form action="nqueens.php" method="GET">
			<p><label for="queens">Number of queens:</label> <input id="queens" name="queens" type="text" value="<?php echo $queens; ?>" /><br />
			<label for="tlimit">Time limit (seconds):</label> <input id="tlimit" name="tlimit" type="text" value="<?php echo $tlimit; ?>" /><input type="submit" value="Go" /></p>
		</form>
		<div class="main">
<?php

$startTime = microtime(true);
$complete = false;
//if it fails, kill the call stack and try again.
while(!$complete){
//	echo "trying again<br />";
	//build an array that is the size of the queens number
	$placements = array_fill(0,$queens,null); //either null or -1
	$filledPositions = array();
	$index = array(0);
//	echo "<br />";
	$complete = placeQueens($placements, $index, $filledPositions);
//	var_dump($complete);
}
$endTime = microtime(true);
//doesn't get here on 26

//print_r($placements);

//places queens on the board.
for ($i=0;$i<$queens;$i++){
	echo '<div style="clear:left;width:'.(40*$queens).'px;">'."\n";
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
<?php
echo '<div style="clear:both"></div>';
echo "Total time (seconds): ".($endTime-$startTime)."<br />";
echo "Peak memory usage (bytes): ".memory_get_peak_usage(true);
?>
	</body>
</html>