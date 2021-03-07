<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/flights', ['uses' => 'FligthsController@ShowAll']);
//Airport crud
$router->get('/api/airport', ['uses' => 'AirportsController@index']);
$router->get('/api/airport/{id}', ['uses' => 'AirportsController@show']);
$router->post('/api/airport', ['uses' => 'AirportsController@store']);
$router->put('/api/airport/{id}', ['uses' => 'AirportsController@update']);
$router->delete('/api/airport/{id}', ['uses' => 'AirportsController@delete']);
//Routes
$router->get('/api/route', ['uses' => 'RoutesController@index']);
$router->get('/api/route/{id}', ['uses' => 'RoutesController@show']);
$router->post('/api/route', ['uses' => 'RoutesController@store']);
$router->put('/api/route/{id}', ['uses' => 'RoutesController@update']);
$router->delete('/api/route/{id}', ['uses' => 'RoutesController@delete']);
//Status
$router->get('/api/status', ['uses' => 'StatusController@index']);
$router->get('/api/status/{id}', ['uses' => 'StatusController@show']);
$router->post('/api/status', ['uses' => 'StatusController@store']);
$router->put('/api/status/{id}', ['uses' => 'StatusController@update']);
$router->delete('/api/status/{id}', ['uses' => 'StatusController@delete']);
//fligth
$router->get('/api/flight', ['uses' => 'FlightController@index']);
$router->get('/api/flight/{id}', ['uses' => 'FlightController@show']);
$router->post('/api/flight', ['uses' => 'FlightController@store']);
$router->put('/api/flight/{id}', ['uses' => 'FlightController@update']);
$router->delete('/api/flight/{id}', ['uses' => 'FlightController@delete']);
//Booking
$router->get('/api/booking', ['uses' => 'BookingController@index']);
$router->get('/api/booking/{id}', ['uses' => 'BookingController@show']);
$router->post('/api/booking', ['uses' => 'BookingController@store']);
$router->put('/api/booking/{id}', ['uses' => 'BookingController@@update']);
$router->delete('/api/booking/{id}', ['uses' => 'BookingController@delete']);

//Custom Query
$router->get('/api/highesttraffic', ['uses' => 'CustomQueryController@HighestTrafic']);
$router->get('/api/leastfrequent', ['uses' => 'CustomQueryController@LeastFrequent']);
$router->get('/api/lastsevendays', ['uses' => 'CustomQueryController@LastSevenDays']);




/**
 * Endpoints
 * User, Fligth, AirPort, Status, Routes,booking (CRUD)
 * listar vuelos por status 
 * rutas y tiempos con mas traficos 
 * menos frecuentes en 8  horas
 * cuantos usuarios han viajado los ultimos 7 dias 
 */

