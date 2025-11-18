<?php require __DIR__.'/../partials/navbar.php'; ?>
<div class="container">
<h2>Vendas</h2>
<a href="/vendas/novo" class="btn btn-primary mb-3">Registrar Venda</a>
<table class="table table-bordered table-striped">
<thead><tr><th>ID</th><th>Cliente</th><th>Produto</th><th>Qtd</th><th>Total</th><th>Ações</th></tr></thead>
<tbody>
<?php foreach($vendas as $v): ?>
<tr>
<td><?= $v['id'] ?></td>
<td><?= htmlspecialchars($v['cliente_nome']) ?></td>
<td><?= htmlspecialchars($v['produto_nome']) ?></td>
<td><?= $v['quantidade'] ?></td>
<td>R$ <?= number_format($v['total'],2,',','.') ?></td>
<td>
<a href="/vendas/deletar?id=<?= $v['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir venda?');">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>