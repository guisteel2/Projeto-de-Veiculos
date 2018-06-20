<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \slim/App;

//chama do get para os veiculos
$app->get('/routes/customers',function(Request $request, Response $response){
echo 'veiculos';
});
