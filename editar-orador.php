<?php
include 'include/config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$tipo = $_GET['tipo'] === 'enviaremos' ? 'oradores_enviaremos' : 'oradores_receberemos';

$sql = "SELECT * FROM $tipo WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Registro não encontrado.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orador</title>
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body>
    <header>
        <div class="container-header">
            <h1>Editar Orador</h1>
            <nav class="main-nav">
                <a href="<?= $tipo === 'enviaremos' ? 'oradores_enviaremos.php' : 'oradores_receberemos.php' ?>">Voltar</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Editar Registro</h2>
        <form method="post">
            <label>Congregação:</label>
            <input type="text" name="congregacao" value="<?= htmlspecialchars($row['congregacao']) ?>" required>

            <label>Orador:</label>
            <input type="text" name="orador" value="<?= htmlspecialchars($row['orador']) ?>" required>

            <label>Tema:</label>
            <input type="text" name="tema" value="<?= htmlspecialchars($row['tema']) ?>" required>

            <label>Data:</label>
            <input type="date" name="data" value="<?= $row['data'] ?>" required>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $congregacao = $conn->real_escape_string($_POST['congregacao']);
    $orador = $conn->real_escape_string($_POST['orador']);
    $tema = $conn->real_escape_string($_POST['tema']);
    $data = $conn->real_escape_string($_POST['data']);

    $sql = "UPDATE $tipo SET congregacao = ?, orador = ?, tema = ?, data = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $congregacao, $orador, $tema, $data, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Registro atualizado com sucesso!'); window.location.href = '$tipo.php';</script>";
    } else {
        echo "<p class='error'>Erro ao atualizar.</p>";
    }
}
?>