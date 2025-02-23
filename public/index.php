<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once __DIR__ . '/../app/core/Rotas.php';
require_once __DIR__ . '/../app/controller/ContatoController.php';

$rotas = new rotas();

$contatoController = new ContatoController();

$rotas->add("GET", "/contatos", [$contatoController, "index"]);
$rotas->add("POST", "/contatos", [$contatoController, "store"]);
$rotas->add("PUT", '/contatos/:id', [$contatoController, "update"]);
$rotas->add("DELETE", '/contatos/:id', [$contatoController, "delete"]);
$rotas->add("GET", "/contato/:id", [$contatoController, "show"]);

$rotas->dispatch();
?>
