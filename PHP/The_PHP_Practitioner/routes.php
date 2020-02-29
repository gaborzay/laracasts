<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('about/culture', 'PagesController@aboutCulture');
$router->post('names', 'PagesController@addName');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');