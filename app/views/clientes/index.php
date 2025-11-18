<?php require __DIR__.'/../partials/navbar.php'; ?>
<div class="container">
<h2>Clientes</h2>
<a href="/clientes/novo" class="btn btn-primary mb-3">Novo Cliente</a>
<table class="table table-bordered table-striped">
<thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr></thead>
<tbody>
<?php foreach($clientes as $c): ?>
<tr>
<td><?= $c['id'] ?></td>
<td><?= htmlspecialchars($c['nome']) ?></td>
<td><?= htmlspecialchars($c['email']) ?></td>
<td><?= htmlspecialchars($c['telefone']) ?></td>
<td>
<a href="/clientes/editar?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
<a href="/clientes/deletar?id=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir?');">Excluir</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>