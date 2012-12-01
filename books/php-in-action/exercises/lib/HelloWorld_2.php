<?php
class HelloWorld {
	public $name;
	
	function __construct($world){
		$this->name = $world;
	}
	
	function greetInHtml(){
		return "<html><body>Hello, ".$this->name.".</body></html>";
	}
}

?>