<?php require __DIR__ . '/../partials/navbar.php'; ?>
<div class="container">
  <h2><?= isset($produto['id']) ? 'Editar Produto' : 'Novo Produto' ?></h2>
  <form method="POST">
    <div class="mb-3">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control"
             value="<?= htmlspecialchars($produto['nome']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Preço</label>
      <input type="number" step="0.01" name="preco" class="form-control"
             value="<?= htmlspecialchars($produto['preco']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Estoque</label>
      <input type="number" name="estoque" class="form-control"
             value="<?= htmlspecialchars($produto['estoque'] ?? 0) ?>" required>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="/produtos" class="btn btn-secondary">Voltar</a>
  </form>
</div>
