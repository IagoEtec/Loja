<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
require 'conexao.php';

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome' => $nome, ':preco' => $preco, ':quantidade' => $quantidade]);

header("Location: listar.php");
exit;
