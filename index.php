<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/postagens', function(Request $request, Response $response){
    //Escreve no corpo da resposta utilizando o padrão PSR7
    $response->getBody()->write("Listagem de Postagens");

    return $response;
});

/*
    Tipos de requisação ou Verbos HTTP
    
    get -> recupera recursos do servidor (select)
    post -> criar dado no Servidor (insert)
    put -> Atualizar dados do Servidor (update)
    delete -> Deletar dados do Servidor (Delete)

*/


$app->delete('/usuarios/remove/{}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');
    /*
    deletar o banco de dados com DELETE
    */
    
    return $response->getBody()->write("Sucesso ao deletar: " . $id);
});




$app->put('/usuarios/atualiza', function(Request $request, Response $response){

    //Recuperar post ($_POST)
    $post  = $request->getParsedBody();
    $id    =  $post['id'];
    $nome  =  $post['nome'];
    $email =  $post['email'];

    /*
    Salvar no banco de dados com insert into
    */
    
    return $response->getBody()->write("Sucesso ao atualizar: " . $id);
});



$app->post('/usuarios/adiciona', function(Request $request, Response $response){

    //Recuperar post ($_POST)
    $post = $request->getParsedBody();
    $nome =  $post['nome'];
    $email =  $post['email'];

    /*
    Salvar no banco de dados com insert into
    */

    return $response->getBody()->write($nome . " - " . $email );
});

$app->run();





/*


$app->get('/usuarios[/{id}]', function($request, $response){
    $id = $request->getAttribute('id');

    // Verificar se ID é valido e existe no DB

    echo "Lista de usuarios ou ID:" . $id;
});

$app->get('/postagens[/{ano}[/{mes}]]', function($request, $response){
    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');

    // Verificar se ID é valido e existe no DB

    echo "Lista de postagens Ano: " . $ano . " mes : " .$mes;
});

$app->get('/lista/{itens:.*}', function($request, $response){
    $itens = $request->getAttribute('itens');
    
    // Verificar se ID é valido e existe no DB
    //echo $itens;
    var_dump(explode("/", $itens));
});
*/
/*Nomear rotas

$app->get('/blog/postagens/{id}', function($request, $response){
    echo "listar postagem para um ID";
})->setName("blog");

$app->get('/meusite', function($request, $response){
    $retorno = $this->get("router")->pathFor("blog", ["id" => "5"] );
    echo $retorno;    
});
*/
/*agrupar rotas
$app->group('/v1' , function(){
    $this->get('/usuarios' , function(){
        echo "Listagem de usuarios";    
    } );
    $this->get('/postagens' , function(){
        echo "Listagem de postagem";    
    } );        
} );

*/


?>