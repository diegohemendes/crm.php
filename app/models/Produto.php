<?php

class Produto {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        return $this->pdo->query("SELECT * FROM produtos ORDER BY id DESC")
                         ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $estoque = $data['estoque'] ?? 0;

        $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, preco, estoque) VALUES (?,?,?)");
        $stmt->execute([
            $data['nome'],
            $data['preco'],
            $estoque
        ]);
    }

    public function update($id, $data) {
        $estoque = $data['estoque'] ?? 0;

        $stmt = $this->pdo->prepare("UPDATE produtos SET nome=?, preco=?, estoque=? WHERE id=?");
        $stmt->execute([
            $data['nome'],
            $data['preco'],
            $estoque,
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id=?");
        $stmt->execute([$id]);
    }
}
