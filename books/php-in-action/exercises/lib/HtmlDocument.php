<?php
class HtmlDocument {
	function getHtml(){
		return "<html><body>".$this->getContent()."</body></html>";
	}
	function getContent(){
		return '';
	}
}


?>