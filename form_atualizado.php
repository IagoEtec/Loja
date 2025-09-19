<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
require 'conexao.php';
include "cabecalho.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch();
?>

<a href="listar.php" class="back-button">⬅ Voltar</a>

<div class="container fade-in">
    <h3 class="section-title">Editar Produto</h3>
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome']) ?>" required>
        <input type="number" name="preco" step="0.01" class="form-control" value="<?= $produto['preco'] ?>" required>
        <input type="number" name="quantidade" class="form-control" value="<?= $produto['quantidade'] ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</div>
