<?php
include 'include/config.php';
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
$erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nova_senha = $_POST['senha'] ?? '';
    if (strlen($nova_senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $id_usuario = (int) $_SESSION['usuario']['id'];
        $stmt = $conn->prepare("UPDATE usuarios SET senha = ?, precisa_alterar = 0 WHERE id = ?");
        $stmt->bind_param("si", $hash, $id_usuario);
        if ($stmt->execute()) {
            $_SESSION['usuario']['precisa_alterar'] = 0;
            header("Location: dashboard.php");
            exit;
        } else {
            $erro = "Erro ao alterar senha.";
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
<title>Alterar Senha</title>
<link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body>
    <main class="dashboard-main">
    <div class="container" style="max-width:480px;margin-top:40px;">
        <h2 style="margin-top:0;color:var(--primary);">Altere sua senha</h2>
        <?php if (!empty($erro)) echo "<p class='error' role='alert'>" . htmlspecialchars($erro) . "</p>"; ?>
        <form method="post" novalidate>
            <label for="senha">Nova senha (mínimo 6 caracteres)</label>
            <input id="senha" type="password" name="senha" placeholder="Nova senha" minlength="6" required>
            <button type="submit">Salvar Nova Senha</button>
        </form>
    </div>
    </main>
</body>
</html>
