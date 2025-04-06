<?php include 'conexao.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM projetos WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id]);
$projeto = $stmt->fetch();

if (!$projeto) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Projeto - Victor Lorite</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Editar Projeto</h1>
    </header>

    <main class="container">
        <section class="formulario">
            <form action="processar.php" method="post">
                <input type="hidden" name="id" value="<?= $projeto['id'] ?>">
                
                <div class="campo">
                    <label for="nome">Nome do Projeto:</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($projeto['nome']) ?>" required>
                </div>
                
                <div class="campo">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" rows="4" required><?= htmlspecialchars($projeto['descricao']) ?></textarea>
                </div>
                
                <div class="botoes">
                    <button type="submit" class="btn salvar">Atualizar Projeto</button>
                    <a href="index.php" class="btn cancelar">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>Desenvolvido por Victor Lorite - Projeto Integrador &copy; <?= date('Y') ?></p>
    </footer>
</body>
</html>