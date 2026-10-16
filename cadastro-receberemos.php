<?php
include 'include/config.php';
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
$erro = '';
$sucesso = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $congregacao = trim($_POST['congregacao'] ?? '');
    $orador = trim($_POST['orador'] ?? '');
    $tema = trim($_POST['tema'] ?? '');
    $data = $_POST['data'] ?? '';
    if ($congregacao === '' || $orador === '' || $tema === '' || $data === '') {
        $erro = "Preencha todos os campos.";
    } else {
        $stmt = $conn->prepare("INSERT INTO oradores_receberemos (congregacao, orador, tema, data) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $congregacao, $orador, $tema, $data);
        if ($stmt->execute()) {
            $sucesso = "Cadastro realizado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastrar Oradores que Receberemos</title>
<link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<header>
    <div class="container-header">
        <h1>Cadastrar Oradores que Receberemos</h1>
        <nav class="main-nav">
            <a href="oradores_receberemos.php">Cronograma</a>
            <a href="dashboard.php">Voltar</a>
        </nav>
    </div>
</header>
<body>
    <main class="dashboard-main">
    <div class="form-card">
        <div style="text-align:center;margin-bottom:8px;font-size:36px;">🎤</div>
        <h2>Cadastrar Orador</h2>
        <p class="subtitle">Preencha os dados para incluir no cronograma</p>

        <?php if (!empty($erro)): ?>
            <div class="mensagem erro" role="alert"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>
        <?php if (!empty($sucesso)): ?>
            <div class="mensagem sucesso" role="status"><?= htmlspecialchars($sucesso) ?></div>
        <?php endif; ?>

        <form method="post" novalidate>
            <div class="form-group">
                <label for="congregacao">Congregação</label>
                <input id="congregacao" type="text" name="congregacao" placeholder="Ex: Vale Verde" required>
            </div>
            <div class="form-group">
                <label for="orador">Orador</label>
                <input id="orador" type="text" name="orador" placeholder="Nome do orador" required>
            </div>
            <div class="form-group">
                <label for="tema">Tema</label>
                <input id="tema" type="text" name="tema" placeholder="Tema do discurso" required>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input id="data" type="date" name="data" required>
            </div>
            <button type="submit">Cadastrar Orador</button>
        </form>
    </div>
    </main>
</body>
</html>
