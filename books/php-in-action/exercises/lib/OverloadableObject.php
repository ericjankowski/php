<?php
abstract class OverloadableObject {
	function __call($name, $args){
		$method = $name."_".count($args);
		if(!method_exists($this, $method)){
			throw new Exception("Call to undefined method ".get_class($this)."::$method");
		}
		return call_user_func_array(array($this, $method), $args);
	}
}
?>