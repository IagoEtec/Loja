<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
include "cabecalho.php";
?>

<a href="listar.php" class="back-button">⬅ Voltar</a>

<div class="container fade-in">
    <h3 class="section-title">Cadastrar Produto</h3>
    <form action="inserir.php" method="POST">
        <input type="text" name="nome" class="form-control" placeholder="Nome do produto" required>
        <input type="number" name="preco" step="0.01" class="form-control" placeholder="Preço" required>
        <input type="number" name="quantidade" class="form-control" placeholder="Quantidade" required>
        <button type="submit">Salvar</button>
    </form>
</div>
