<?php
session_start();
require 'conexao.php';
include "cabecalho.php";
?>

<div class="container fade-in">
    <?php if (isset($_SESSION['user'])): ?>
        <div class="card">
            <h3>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user']['nome']); ?>!</h3>
            <div class="btn-group">
                <a href="listar.php" class="btn btn-primary">Gerenciar Produtos</a>
                <a href="logout.php" class="btn btn-outline">Sair</a>
            </div>
        </div>
    <?php else: ?>
        <div class="card">
            <h3>Entrar</h3>
            <?php if (isset($_GET['login_error'])): ?>
                <p style="color: red;">Credenciais inválidas. Tente novamente.</p>
            <?php endif; ?>
            <form action="login_action.php" method="POST">
                <input required type="email" name="email" class="form-control" placeholder="Email">
                <input required type="password" name="senha" class="form-control" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
        </div>

        <div class="card">
            <h3>Cadastrar-se</h3>
            <?php if (isset($_GET['registered'])): ?>
                <p style="color: lime;">Cadastro realizado! Faça login.</p>
            <?php endif; ?>
            <form action="register_action.php" method="POST">
                <input required type="text" name="nome" class="form-control" placeholder="Nome completo">
                <input required type="email" name="email" class="form-control" placeholder="Email">
                <input required type="password" name="senha" class="form-control" placeholder="Senha (mín. 6 caracteres)">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    <?php endif; ?>
</div>

<footer>
    <p>Iago de Almeida Coelho - Direitos reservados</p>
</footer>
</body>
</html>
