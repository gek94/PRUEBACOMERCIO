<?php
/**
* Clase ClearPar 
*/
class ClearPar
{
	var $nstr;
	function build($str)
	{
		if($str === ')(') $str = '';
		$nstr = preg_replace("/(\(\))[\)]{1,}/", "()", $str);
        $nstr = preg_replace("/([\(]{1,}\(\))/", "()", $nstr);
		echo $nstr . "<br>";
	}

}

$cs = new ClearPar;
$cs->build("()())()");
$cs->build("()(()");
$cs->build(")(");
$cs->build("((()");
