<?php
// Mostrar erros em DEV
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$basePath = __DIR__;
require $basePath . '/conexao.php';


// Parse de rota bonita: /clientes/novo -> c=clientes action=novo
$route = $_GET['route'] ?? null;
if ($route) {
$parts = array_values(array_filter(explode('/', $route)));
$c = $parts[0] ?? 'clientes';
$action = $parts[1] ?? null;
$id = $parts[2] ?? null;
// Preenche GET para compatibilidade
if ($action) $_GET['action'] = $action;
if ($id) $_GET['id'] = $id;
} else {
$c = $_GET['c'] ?? 'clientes';
}


$ctrl = $c;
$map = [
'clientes' => $basePath . '/app/controllers/ClientesController.php',
'produtos' => $basePath . '/app/controllers/ProdutosController.php',
'vendas' => $basePath . '/app/controllers/VendasController.php'
];


if (!isset($map[$ctrl]) || !file_exists($map[$ctrl])) {
http_response_code(404);
echo 'Página não encontrada.';
exit;
}


require $map[$ctrl];