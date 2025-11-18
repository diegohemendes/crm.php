<div class="row">
  <div class="col-md-12">
    <h3>Venda #<?= $venda['id'] ?></h3>
    <p>Cliente: <?= esc($venda['cliente']) ?> • Total: <?= brl($venda['total']) ?></p>
    <form method="post" class="row g-2 mb-3"><input type="hidden" name="add_item" value="1"><input type="hidden" name="venda_id" value="<?= $venda['id'] ?>"><div class="col-md-6"><select name="produto_id" class="form-select" required><option value="">-- Produto --</option><?php foreach($produtos as $p): ?><option value="<?= $p['id'] ?>"><?= esc($p['nome']) ?> (Estoque: <?= $p['estoque'] ?>)</option><?php endforeach; ?></select></div><div class="col-md-2"><input name="quantidade" class="form-control" placeholder="Qtd" required></div><div class="col-md-2"><button class="btn btn-success w-100">Adicionar</button></div></form>
    <table class="table table-bordered"><thead class="table-light"><tr><th>Produto</th><th>Qtd</th><th>Preço</th><th>Subtotal</th></tr></thead><tbody><?php foreach($itens as $it): ?><tr><td><?= esc($it['nome']) ?></td><td><?= $it['quantidade'] ?></td><td><?= brl($it['preco_unit']) ?></td><td><?= brl($it['quantidade']*$it['preco_unit']) ?></td></tr><?php endforeach; ?></tbody></table>
  </div>
</div>