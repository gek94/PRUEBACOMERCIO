<?php

$app->get('/', 'HomeController:index')->setName('home');

$app->post('/employee/search', 'EmployeeController:postEmployeeSearch')->setName('employee.search');

$app->post('/employee/detail', 'EmployeeController:postEmployeeDetail')->setName('employee.detail');

$app->get('/employee/salary', 'EmployeeController:getEmployeeSalary')->setName('employee.salary');