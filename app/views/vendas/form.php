<?php require __DIR__.'/../partials/navbar.php'; ?>
<div class="container">
<h2>Nova Venda</h2>
<form method="POST">
<div class="mb-3">
<label>Cliente</label>
<select name="cliente_id" class="form-select" required>
<option value="">Selecione...</option>
<?php foreach ($clientes as $c): ?>
<option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="mb-3">
<label>Produto</label>
<select name="produto_id" class="form-select" required>
<option value="">Selecione...</option>
<?php foreach ($produtos as $p): ?>
<option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome']) ?> - R$ <?= number_format($p['preco'],2,',','.') ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="mb-3">
<label>Quantidade</label>
<input type="number" name="quantidade" value="1" min="1" class="form-control" required>
</div>
<button class="btn btn-success">Salvar Venda</button>
<a href="/vendas" class="btn btn-secondary">Voltar</a>
</form>
</div>