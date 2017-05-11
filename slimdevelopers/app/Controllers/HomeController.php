<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{

	public function index($request, $response)
	{
		$stringJson = file_get_contents( __DIR__ . '/../../data/employees.json');
		$json = json_decode($stringJson, true);

		// $this->view->getEnvironment()->addGlobal('employees', $string);


		return $this->view->render($response, 'home.twig', [
        'employees' => $json
    	]);
	}

}

