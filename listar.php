<?php
    include "cabecalho.php";
    require 'conexao.php'; // Move o require para antes de usar $pdo
?>

    <a href="index.php" class="back-button">← Voltar</a>

    <div class="container">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>

            <?php
                // Verifica se a conexão foi estabelecida
                if ($pdo !== null) {
                    $sql = "SELECT * FROM produtos";
                    $stmt = $pdo->query($sql);
                    while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        echo "<tr>";
                        echo "<td>" . $produto['id'] . "</td>";
                        echo "<td>" . $produto['nome'] . "</td>";
                        echo "<td>" . $produto['preco'] . "</td>";
                        echo "<td>" . $produto['quantidade'] . "</td>";
                        echo "
                        <td>
                            <div class='btn-group' role='group'>
                                <a href='form_atualizado.php?id=" . $produto['id'] . "' type='button' class='btn btn-success'>Atualizar</a>
                                <a href='#' type='button' class='btn btn-danger'>Apagar</a>
                            </div>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Erro: Não foi possível conectar ao banco de dados</td></tr>";
                }
            ?>

            </tbody>
        </table>
    </div>
</body>
</html>