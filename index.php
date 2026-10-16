<?php
session_start();
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

include 'include/config.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($login === '' || $senha === '') {
        $erro = "Preencha todos os campos.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario'] = $usuario;
                if ($usuario['precisa_alterar']) {
                    header("Location: alterar_senha.php");
                    exit;
                } else {
                    header("Location: dashboard.php");
                    exit;
                }
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Usuário não encontrado.";
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
<title>Login - Arranjo de Oradores</title>
<link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body class="login-body">
<div class="login-card">
  <div class="login-logo">🎤</div>
  <h1>Arranjo de Oradores</h1>
  <p class="subtitle">Entre para gerenciar a agenda</p>

  <?php if (!empty($erro)): ?>
    <p class="error" role="alert"><?= htmlspecialchars($erro) ?></p>
  <?php endif; ?>

  <form method="post" autocomplete="off" novalidate>
    <label for="login" class="sr-only">Usuário</label>
    <input id="login" type="text" name="login" placeholder="Seu usuário" required autofocus autocomplete="username">
    <label for="senha" class="sr-only">Senha</label>
    <input id="senha" type="password" name="senha" placeholder="Sua senha" required autocomplete="current-password">
    <button type="submit">Entrar</button>
  </form>
</div>
</body>
</html>
