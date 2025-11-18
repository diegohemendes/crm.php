<?php
$dbPath = __DIR__ . '/data/erp.db';
try {
$pdo = new PDO('sqlite:' . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
echo 'Erro DB: ' . $e->getMessage();
exit;
}