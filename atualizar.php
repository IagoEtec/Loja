<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
require 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => $nome,
    ':preco' => $preco,
    ':quantidade' => $quantidade,
    ':id' => $id
]);

header("Location: listar.php");
exit;
