<?php
include 'include/config.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$tipo = 'oradores_receberemos'; // ou 'oradores_receberemos' no outro arquivo
$tabela_php = 'oradores_receberemos.php'; // ajuste para 'oradores_receberemos.php' se necessário

$mes_atual = (isset($_GET['mes']) && preg_match('/^\d{4}-\d{2}$/', $_GET['mes'])) ? $_GET['mes'] : date('Y-m');

if (isset($_GET['mes']) && !empty($_GET['mes'])) {
    $mes_ano = $mes_atual;
    $stmt = $conn->prepare("SELECT * FROM oradores_receberemos WHERE DATE_FORMAT(data, '%Y-%m') = ? ORDER BY data ASC");
    $stmt->bind_param("s", $mes_ano);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $stmt = $conn->prepare("SELECT * FROM oradores_receberemos WHERE DATE_FORMAT(data, '%Y-%m') = ? ORDER BY data ASC");
    $stmt->bind_param("s", $mes_atual);
    $stmt->execute();
    $result = $stmt->get_result();
}

// Navegação de mês
$ts_atual = strtotime($mes_atual . '-01');
$mes_anterior = date('Y-m', strtotime('-1 month', $ts_atual));
$mes_seguinte = date('Y-m', strtotime('+1 month', $ts_atual));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oradores que Receberemos</title>
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body>

    <header>
        <div class="container-header">
            <h1>Cronograma</h1>
            <nav class="main-nav">
                <a href="dashboard.php">Voltar</a>
            </nav>
        </div>
    </header>

<?php
$meses = ['January'=>'Janeiro','February'=>'Fevereiro','March'=>'Março','April'=>'Abril','May'=>'Maio','June'=>'Junho','July'=>'Julho','August'=>'Agosto','September'=>'Setembro','October'=>'Outubro','November'=>'Novembro','December'=>'Dezembro'];
$nome_mes = $meses[date('F', strtotime($mes_atual.'-01'))];
?>
   <div class="container">
    <h2>Oradores que Receberemos</h2>

    <!-- Navegação de mês moderna -->
    <div class="mes-nav">
        <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?mes=<?= $mes_anterior ?>" class="nav-mes" aria-label="Mês anterior">◀ Anterior</a>
        <div class="mes-titulo"><?= $nome_mes ?> <?= date('Y', strtotime($mes_atual.'-01')) ?></div>
        <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?mes=<?= $mes_seguinte ?>" class="nav-mes" aria-label="Mês seguinte">Próximo ▶</a>
    </div>

    <form method="get" class="filtro-mes" style="margin-bottom:24px;">
        <label for="mes">Ir para mês:</label>
        <input type="month" name="mes" id="mes" value="<?= $mes_atual ?>">
        <button type="submit">Ir</button>
        <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="limpar-filtro">Hoje</a>
    </form>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card-orador">
            <p><strong>Data:</strong> <?= date("d/m/Y", strtotime($row['data'])) ?></p>
            <p><strong>Congregação:</strong> <?= htmlspecialchars($row['congregacao']) ?></p>
            <p><strong>Orador:</strong> <?= htmlspecialchars($row['orador']) ?></p>
            <p><strong>Tema:</strong> <?= htmlspecialchars(str_replace(["\r\n", "\n", "\r"], ' ', $row['tema'])) ?></p>

            <div class="acoes">
                <a href="editar-orador.php?id=<?= $row['id'] ?>&tipo=receberemos" class="editar">Editar</a>
                <a href="excluir-orador.php?id=<?= $row['id'] ?>&tipo=receberemos" class="excluir" onclick="return confirm('Tem certeza que deseja excluir este orador?');">Excluir</a>
            </div>
        </div>
    <?php endwhile; ?>
    <?php if (isset($stmt)) $stmt->close(); ?>
</div>

</body>
</html>