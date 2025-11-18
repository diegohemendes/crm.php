<?php require __DIR__.'/../partials/navbar.php'; ?>
<div class="container">
<h2><?= isset($cliente['id']) ? 'Editar Cliente' : 'Novo Cliente' ?></h2>
<form method="POST">
<div class="mb-3">
<label>Nome</label>
<input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
</div>
<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="<?= htmlspecialchars($cliente['email']) ?>" required>
</div>
<div class="mb-3">
<label>Telefone</label>
<input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($cliente['telefone']) ?>" required>
</div>
<button class="btn btn-success">Salvar</button>
<a href="/clientes" class="btn btn-secondary">Voltar</a>
</form>
</div>