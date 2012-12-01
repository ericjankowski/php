<?php
class HelloWorld {
	public $name = 'World';
	
	function greetInHtml(){
		return "<html><body>Hello, ".$this->name.".</body></html>";
	}
}

?>