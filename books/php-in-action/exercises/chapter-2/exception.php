<?php
include "../lib/Thrower.php";
include "../lib/ThrowerUser.php";
include "../lib/ThrowerUserUser.php";
try{
	new ThrowerUserUser();
}catch(Exception $e){
	echo($e->getMessage());
}
?>