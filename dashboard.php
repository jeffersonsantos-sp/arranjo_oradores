<?php
include 'include/config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Discurso de Oradores</title>
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body>

    <header>
        <div class="container-header">
            <h1>Bem-vindo, <?= $_SESSION['usuario']['login'] ?>  </h1>
            <nav class="main-nav">
                
                <a href="logout.php">Sair</a>
            </nav>
        </div>
    </header>

    <main class="dashboard-main">
        <section class="dashboard-intro">
        
            <h2>Arranjo de Oradores de Vale Verde</h2>
            <p>Escolha uma das opções abaixo para gerenciar os oradores:</p>
        </section>

        <section class="dashboard-options">
            <a href="oradores_enviaremos.php" class="card card-enviar">
                <h3>Oradores que Enviaremos</h3>
                <p>Ver e cadastrar oradores que sairão da nossa congregação.</p>
            </a>

            <a href="oradores_receberemos.php" class="card card-receber">
                <h3>Oradores que Receberemos</h3>
                <p>Ver e cadastrar oradores que virão para a nossa congregação.</p>
            </a>

            <a href="cadastro-enviaremos.php" class="card card-cadastro">
                <h3>Cadastrar Oradores - Enviaremos</h3>
                <p>Adicione novos oradores que serão enviados.</p>
            </a>

            <a href="cadastro-receberemos.php" class="card card-cadastro">
                <h3>Cadastrar Oradores - Receberemos</h3>
                <p>Adicione novos oradores que virão até nós.</p>
            </a>
        </section>
    </main>

    <footer class="dashboard-footer">
        <p>&copy; <?= date('Y') ?> - Sistema de Oradores | Jefferson Santos 😊</p>
    </footer>

</body>
</html>