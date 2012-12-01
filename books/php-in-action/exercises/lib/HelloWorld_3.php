<?php

class HelloWorld extends HtmlDocument{
	public $name;
	function __construct($world){
		$this->name = $world;
	}
	function getContent(){
		return "Hello, ".$this->name."!";
	}
}


?>