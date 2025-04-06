<?php include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM projetos WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id]);
}

header('Location: index.php');
exit;
?>