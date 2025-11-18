<?php
require_once __DIR__ . '/../models/Venda.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../core/View.php';

$vendaModel   = new Venda($pdo);
$clienteModel = new Cliente($pdo);
$produtoModel = new Produto($pdo);

$action = $_GET['action'] ?? 'index';

if ($action == 'index') {
    $vendas = $vendaModel->all();
    View::render('vendas/index', ['vendas' => $vendas]);
    exit;
}

if ($action == 'novo') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $cliente_id = $_POST['cliente_id'];
        $produto_id = $_POST['produto_id'];
        $qtd = (int)$_POST['quantidade'];

        $produto = $produtoModel->find($produto_id);
        $total = $produto['preco'] * $qtd;

        $vendaModel->create([
    'cliente_id' => $cliente_id,
    'produto_id' => $produto_id,
    'quantidade' => $qtd,
    'total'      => $total
]);


        header('Location: /vendas');
        exit;
    }

    $clientes = $clienteModel->all();
    $produtos = $produtoModel->all();

    View::render('vendas/form', [
        'clientes' => $clientes,
        'produtos' => $produtos
    ]);
    exit;
}

if ($action == 'deletar') {
    $id = $_GET['id'] ?? null;
    if ($id) $vendaModel->delete($id);
    header('Location: /vendas');
    exit;
}

header('Location: /vendas');
