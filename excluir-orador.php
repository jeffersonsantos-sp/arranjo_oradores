<?php
include 'include/config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$tipo = $_GET['tipo'] === 'enviaremos' ? 'oradores_enviaremos' : 'oradores_receberemos';
$tabela_php = $tipo === 'oradores_enviaremos' ? 'oradores_enviaremos.php' : 'oradores_receberemos.php';

$sql = "DELETE FROM $tipo WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Registro excluído com sucesso!'); window.location.href = '$tabela_php';</script>";
} else {
    echo "<script>alert('Erro ao excluir.'); window.history.back();</script>";
}
?>