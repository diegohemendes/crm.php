<?php
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../core/View.php';

$produtoModel = new Produto($pdo);
$action = $_GET['action'] ?? 'index';

if ($action == 'index') {
    $produtos = $produtoModel->all();
    View::render('produtos/index', ['produtos' => $produtos]);
    exit;
}

if ($action == 'novo') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $produtoModel->create($_POST);
        header('Location: /produtos');
        exit;
    }

    $produto = ['nome'=>'','preco'=>''];
    View::render('produtos/form', ['produto' => $produto]);
    exit;
}

if ($action == 'editar') {
    $id = $_GET['id'] ?? null;
    if (!$id) { header('Location: /produtos'); exit; }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $produtoModel->update($id, $_POST);
        header('Location: /produtos');
        exit;
    }

    $produto = $produtoModel->find($id);
    View::render('produtos/form', ['produto' => $produto]);
    exit;
}

if ($action == 'deletar') {
    $id = $_GET['id'] ?? null;
    if ($id) $produtoModel->delete($id);
    header('Location: /produtos');
    exit;
}

header('Location: /produtos');
