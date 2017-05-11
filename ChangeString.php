<?php
setlocale(LC_ALL, 'es_PE');

/**
* Clase ChangeString 
* Se debe cambiar la configuracion en el php para que se pueda trabajar correctamente con las "ñ" (UTF-8)
*/
class ChangeString
{
	const LETTERS = "abcdefghijklmnñopqrstuvwxyzaABCDEFGHIJQLMNÑOPQRSTUVWXYZA";
	var $positionInLetters;
	function build($str)
	{
		for ($i=0; $i < strlen($str); $i++)
		{
			if(!ctype_alpha($str[$i])) continue;
			$this->positionInLetters = strpos(self::LETTERS, $str[$i]);
			$str[$i] = $this->positionInLetters !== false? self::LETTERS[$this->positionInLetters + 1]:$str[$i];
		}
		echo $str ."<br>";
	}

} 

$cs = new ChangeString;
$cs->build('123 abcd*3');
$cs->build('**Casa 52');
$cs->build('**Casa 52Z');
