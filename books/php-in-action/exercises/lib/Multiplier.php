<?php
class Multiplier extends OverloadableObject {
	function multiply_2($one, $two){
		return $one * $two;
	}
	function multiply_3($one, $two, $three){
		return $one * $two * $three;
	}
}
?>