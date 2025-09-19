<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if ($nome === '' || $email === '' || strlen($senha) < 6) {
    header('Location: index.php?registered=0');
    exit;
}

// verifica se email já existe
$sql = "SELECT id FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
if ($stmt->fetch()) {
    header('Location: index.php?registered=0');
    exit;
}

// salva com hash seguro
$hash = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $hash]);

header('Location: index.php?registered=1');
exit;
