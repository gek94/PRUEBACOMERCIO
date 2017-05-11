<?php
/**
* Clase CompleteRange 
*/
class CompleteRange
{
	var $newArr;
	function build($arr)
	{
		// Segun indicaciones => Considerar el parámetro de colecciones con números enteros positivos 
		// ordenados de manera ascendente. Ejemplo [4, 6, 7 ,10]
		// Por lo tanto si estan en orden solo es necesario obtener el primer y ultimo elemento y devolver el nuevo array en ese rango.
		// Una solucion rapida seria =>>> $newArr = range($arr[0],$arr[count($arr) - 1]);

		// Solucion
        $newArr = $arr;
        $newItemsCounter = 0;
        for ($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i-1] + 1 === $arr[$i]){ continue; }
            $ran = range($arr[$i-1] + 1, $arr[$i] - 1);
            array_splice($newArr, $i + $newItemsCounter, 0, $ran);
            $newItemsCounter = $newItemsCounter + count($ran);
        }
		// Se transformara a json solo para mostrar el resultado de forma clara
		echo json_encode($newArr) . "<br>";
	}

} 

$cs = new CompleteRange;
$cs->build([1, 2, 4, 10]);
$cs->build([2, 4, 9]);
$cs->build([55, 58, 60]);
