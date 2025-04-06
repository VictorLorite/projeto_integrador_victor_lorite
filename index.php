<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Integrador - Victor Lorite</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Projeto Integrador - Victor Lorite</h1>
    </header>

    <main class="container">
        <section class="projetos">
            <h2>Lista de Projetos</h2>
            <a href="adicionar.php" class="btn novo-projeto">+ Novo Projeto</a>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM projetos ORDER BY data_criacao DESC";
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();
                    
                    while ($projeto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$projeto['id']}</td>
                                <td>{$projeto['nome']}</td>
                                <td>{$projeto['descricao']}</td>
                                <td>" . date('d/m/Y', strtotime($projeto['data_criacao'])) . "</td>
                                <td class='acoes'>
                                    <a href='editar.php?id={$projeto['id']}' class='btn editar'>Editar</a>
                                    <a href='excluir.php?id={$projeto['id']}' class='btn excluir' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>Desenvolvido por Victor Lorite - Projeto Integrador &copy; <?= date('Y') ?></p>
    </footer>
</body>
</html>