<?php require __DIR__.'/../partials/navbar.php'; ?>
<div class="container">
<h2>Produtos</h2>
<a href="/produtos/novo" class="btn btn-primary mb-3">Novo Produto</a>
<table class="table table-bordered table-striped">
<thead><tr><th>ID</th><th>Nome</th><th>Preço</th><th>Ações</th></tr></thead>
<tbody>
<?php foreach($produtos as $p): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= htmlspecialchars($p['nome']) ?></td>
<td>R$ <?= number_format($p['preco'],2,',','.') ?></td>
<td>
<a href="/produtos/editar?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
<a href="/produtos/deletar?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir?');">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>