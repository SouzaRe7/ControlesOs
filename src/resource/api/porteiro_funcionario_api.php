<?php
require_once dirname(__DIR__,3) . '/vendor/autoload.php';
use Src\resource\api\classe\FuncionarioAPI;

$api = new FuncionarioAPI();

$api->SetMethod($_SERVER['REQUEST_METHOD']);

if (!$api->CheckMethod($api->GetMethod()))
    $api->SendData('Method invalid', -1, 'Error');


$get_data = getallheaders();

$temjson = $get_data['Content-Type'] == 'application/json' ? true : false;

if ($temjson) :
    $dados = file_get_contents('php://input');
    $dados = json_decode($dados, true);
else :
    $dados = $_POST;
endif;

$api->SetEndPoint($dados['endpoint']);

if(!$api->CheckEndPoint($api->GetEndPoint()))
$api->SendData('Endpoint invalid', -1, 'Error');

$api->AddParameters($dados);

$result = $api->{$api->GetEndPoint()}();

$api->SendData('Resultado', $result, '200');
