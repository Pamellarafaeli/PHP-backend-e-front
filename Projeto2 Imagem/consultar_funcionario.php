<?php
session_start();
if (!isset($_SESSION['adm'])) {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt_excluir->execute();
        $mensagem = "Funcionário excluído com sucesso.";
    }

    $sql = "SELECT id, nome FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultar Funcionários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Consultar Funcionários</h1>
    
    <?php if (!empty($mensagem)): ?>
        <p class="mensagem-sucesso"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <?php if (count($funcionarios) > 0): ?>
        <ul class="funcionarios-list">
            <?php foreach ($funcionarios as $func): ?>
                <li class="funcionario-item">
                    <span><?= htmlspecialchars($func['nome']) ?></span>
                    <form method="POST" action="consultar_funcionario.php" class="form-excluir">
                        <input type="hidden" name="excluir_id" value="<?= $func['id'] ?>">
                        <button type="submit" class="button">Excluir</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="mensagem-vazia">Nenhum funcionário encontrado.</p>
    <?php endif; ?>

    <a href="index.php" class="button">Voltar</a>
</div>
</body>
</html>
