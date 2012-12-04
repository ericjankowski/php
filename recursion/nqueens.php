<?php

function isAttacked($board, $x, $y){
	foreach($board as $key => $value){
		if($value != -1){
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

function allQueensPlaced($board){
	$done = true;
	for($i=0;$i<sizeof($board);$i++){
		if($board[$i]==-1){
			$done = false;
		}
	}
	return $done;
}

function placeQueens($board, $index){

	if($index==sizeof($board) && allQueensPlaced($board)){	
		return $board;
	}

	$nextPosition = $board[$index] + 1;
	$board[$index] = -1;

	for($i=$nextPosition; $i<sizeof($board);$i++){
		if(!isAttacked($board, $index, $i)){
			$board[$index]=$i;
			return placeQueens($board, $index+1);
		}
	}
	$board[$index] = -1;
	return placeQueens($board, $index-1);
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

if(isset($_GET['queens']) && is_numeric($_GET['queens'])){
	$queens = $_GET['queens'];
}else{
	$queens=8;
}

if($queens > 25 || $queens < 4){
	$queens = 8;
}

$placements = array($queens);

for($i=0;$i<$queens;$i++){
	$placements[$i]=-1;
}

$placements = placeQueens($placements, 0);

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