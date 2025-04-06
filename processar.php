<?php include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    
    if (isset($_POST['id'])) {
        // Atualização
        $id = $_POST['id'];
        $sql = "UPDATE projetos SET nome = ?, descricao = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$nome, $descricao, $id]);
    } else {
        // Inserção
        $sql = "INSERT INTO projetos (nome, descricao, data_criacao) VALUES (?, ?, NOW())";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$nome, $descricao]);
    }
    
    header('Location: index.php');
    exit;
}
?>