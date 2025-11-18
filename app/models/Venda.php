<?php
class Venda {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lista todas as vendas com nome do cliente e produto
    public function all() {
        $sql = "SELECT 
                    v.*, 
                    c.nome AS cliente_nome, 
                    p.nome AS produto_nome
                FROM vendas v
                JOIN clientes c ON c.id = v.cliente_id
                JOIN produtos p ON p.id = v.produto_id
                ORDER BY v.id DESC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Busca uma venda específica
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM vendas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cria uma venda (recebe ARRAY)
    public function create($data) {

        if (!is_array($data)) {
            throw new Exception("Erro: create() espera um array, recebeu: " . gettype($data));
        }

        $stmt = $this->pdo->prepare("
            INSERT INTO vendas (cliente_id, produto_id, quantidade, total)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['cliente_id'],
            $data['produto_id'],
            $data['quantidade'],
            $data['total']
        ]);

        return $this->pdo->lastInsertId();
    }

    // Deleta uma venda
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM vendas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
