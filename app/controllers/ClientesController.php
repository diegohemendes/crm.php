<?php
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../core/View.php';

$clienteModel = new Cliente($pdo);
$action = $_GET['action'] ?? 'index';

if ($action == 'index') {
    $clientes = $clienteModel->all();
    View::render('clientes/index', ['clientes' => $clientes]);
    exit;
}

if ($action == 'novo') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clienteModel->create($_POST);
        header('Location: /clientes');
        exit;
    }
    $cliente = ['nome'=>'','email'=>'','telefone'=>''];
    View::render('clientes/form', ['cliente' => $cliente]);
    exit;
}

if ($action == 'editar') {
    $id = $_GET['id'] ?? null;
    if (!$id) { header('Location: /clientes'); exit; }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clienteModel->update($id, $_POST);
        header('Location: /clientes');
        exit;
    }

    $cliente = $clienteModel->find($id);
    View::render('clientes/form', ['cliente' => $cliente]);
    exit;
}

if ($action == 'deletar') {
    $id = $_GET['id'] ?? null;
    if ($id) $clienteModel->delete($id);
    header('Location: /clientes');
    exit;
}

header('Location: /clientes');
