<?php
class Cliente {
private $pdo;
public function __construct($pdo) { $this->pdo = $pdo; }


public function all() {
$stmt = $this->pdo->query('SELECT * FROM clientes ORDER BY id DESC');
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function find($id) {
$stmt = $this->pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function create($data) {
$stmt = $this->pdo->prepare('INSERT INTO clientes (nome,email,telefone) VALUES (?, ?, ?)');
$stmt->execute([$data['nome'],$data['email'],$data['telefone']]);
return $this->pdo->lastInsertId();
}


public function update($id, $data) {
$stmt = $this->pdo->prepare('UPDATE clientes SET nome=?,email=?,telefone=? WHERE id=?');
return $stmt->execute([$data['nome'],$data['email'],$data['telefone'],$id]);
}


public function delete($id) {
$stmt = $this->pdo->prepare('DELETE FROM clientes WHERE id=?');
return $stmt->execute([$id]);
}
}