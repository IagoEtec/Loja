<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
require 'conexao.php';
include "cabecalho.php";

$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
$produtos = $stmt->fetchAll();
?>

<a href="index.php" class="back-button">⬅ Voltar</a>

<div class="container fade-in">
    <h3 class="section-title">Lista de Produtos</h3>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['nome']) ?></td>
                <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                <td><?= $p['quantidade'] ?></td>
                <td>
                    <a href="form_atualizado.php?id=<?= $p['id'] ?>" class="btn btn-outline">Editar</a>
                    <a href="apagar.php?id=<?= $p['id'] ?>" class="btn btn-primary">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="btn-group">
        <a href="cadastrar.php" class="btn btn-primary">Cadastrar Novo</a>
    </div>
</div>
