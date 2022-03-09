<?php

use MyApp\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
    
]);
/*Tipos de respostas cabeçalho, texto, Json, XML*/

$app->get('/json', function(Request $request, Response $response){
    return $response->withJson([
        "nome" => "Alex Junior",
        "endereço" => "rua apucarana 442"
    ]);
   
});

$app->get('/xml', function(Request $request, Response $response){
    $xml = file_get_contents('arquivo');
    $response->write($xml);
    return $response->withAddedHeader('Content-Type', 'application/xml');
   
});


/* middleware*/
$app->add( function($request, $response, $next){
    return $response->write('Inicio camada 1 + ');
});

$app->get('/usuarios', function(Request $request, Response $response){
   $response->write('Ação principal usuarios');   
});

$app->get('/postagens', function(Request $request, Response $response){
    $response->write('Ação principal postagens');   
 });


$app->run();


?>