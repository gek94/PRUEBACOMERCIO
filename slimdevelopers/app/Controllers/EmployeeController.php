<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

use App\Controllers\Controller;

class EmployeeController extends Controller
{

	public function postEmployeeSearch($request, $response)
	{
		$stringJson = file_get_contents( __DIR__ . '/../../data/employees.json');
		$employees = json_decode($stringJson, true);
		$filtered = array();

		$email = $request->getParam('email');

		if(is_null($email) || trim($email) === '')
		{
			return $this->view->render($response, 'home.twig', [
	        'employees' => $employees
	    	]);
		}
		else
		{
			foreach ($employees as $employee)
			{

				if( strpos(trim(strtoupper($employee['email'])), trim(strtoupper($email))) !== FALSE )
			    {
			        $filtered[] = $employee;

			    }
			}

			return $this->view->render($response, 'home.twig', [
	        'employees' => $filtered
	    	]);
		}
	}

	public function postEmployeeDetail($request, $response)
	{
		$stringJson = file_get_contents( __DIR__ . '/../../data/employees.json');
		$employees = json_decode($stringJson, true);

		$detailemployee = array();
		$id = $request->getParam('id');
		
		if(is_null($id) || trim($id) === '')
		{
			return $this->view->render($response, 'detailemployee.twig', [
	        'detailemployee' => $detailemployee
	    	]);
		}
		else
		{
			foreach ($employees as $employee)
			{
				if( trim($employee['id']) === trim($id) )
			    {
			        $detailemployee = $employee;
			    }
			}

			return $this->view->render($response, 'detailemployee.twig', [
	        	'detailemployee' => $detailemployee
	    	]);
		}
	}

	public function getEmployeeSalary($request, $response)
	{
		$stringJson = file_get_contents( __DIR__ . '/../../data/employees.json');
		$employees = json_decode($stringJson, true);

		$minimo = $request->getParam('minimo');
		$maximo = $request->getParam('maximo');

		$filtered = array();

		if(is_null($minimo) || trim($minimo) === '')
		{
			$minimo = 0;
		}

		if(is_null($maximo) || trim($maximo) === '')
		{
			$maximo = 0;
		}

		foreach ($employees as $employee)
		{
			$salary = preg_replace('/[^0-9.]+/', '', $employee['salary']);

			if(floatval($salary) >= floatval($minimo) && floatval($salary) <= floatval($maximo))
		    {
		        $filtered[] = $employee;
		    }
		}

		return $this->view->render($response, 'employeessalary.xml', [
        	'employees' => $filtered
    	]);
	}

}

