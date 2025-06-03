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

    // Recupera funcionários
    $stmt = $pdo->query("SELECT id, nome FROM funcionarios");
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <style>
        body {
            background-color: #dba0c1;
        }
        /* Container principal */
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(238, 12, 118, 0.2);
            font-family: Arial, sans-serif;
        }

        /* Títulos */
        h1 {
            text-align: center;
            color: #b4207b;
            margin-bottom: 20px;
        }

        h2 {
            color: #eb65b3;
            margin-bottom: 15px;
        }

        /* Bem-vindo */
        p {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
            color: #555;
        }

        /* Container dos botões de ação */
        .actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        /* Botões */
        .button {
            background-color: #eb65b3;
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .button:hover {
            background-color: #922a5e;
        }

        /* Lista de funcionários */
        .funcionarios-list {
            background: #fff0f7;
            padding: 20px;
            border-radius: 12px;
            box-shadow: inset 0 0 10px rgba(231, 126, 175, 0.15);
        }

        /* Item funcionário */
        .funcionario-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffe5f1;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 12px;
            border-left: 5px solid #eb65b3;
            font-weight: 600;
            color: #6a1b4d;
        }

        /* Container dos botões dentro do item funcionário */
        .funcionario-item .actions {
            justify-content: flex-end;
            gap: 10px;
        }

        /* Ajuste no form excluir para alinhar o botão */
        form {
            margin: 0;
            display: inline;
        }

        /* Mensagem para quando não há funcionários */
        .funcionarios-list p {
            text-align: center;
            color: #555;
            font-style: italic;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Painel Administrativo</h1>  
        <p>Bem-vindo, <?= htmlspecialchars($_SESSION['adm']) ?>!</p>
        
        <div class="actions">
            <a href="cadastro_funcionario.php" class="button">Cadastrar Novo Funcionário</a>
            <a href="logout.php" class="button">Sair</a>
        </div>
        
        <div class="funcionarios-list">
            <h2>Funcionários Cadastrados</h2>
            <?php if (count($funcionarios) > 0): ?>
                <?php foreach ($funcionarios as $func): ?>
                <div class="funcionario-item">
                    <span><?= htmlspecialchars($func['nome']) ?></span>
                    <div class="actions">
                        <a href="visualizar_funcionario.php?id=<?= $func['id'] ?>" class="button">Visualizar</a>
                        <form method="POST" action="consultar_funcionario.php" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                            <input type="hidden" name="excluir_id" value="<?= $func['id'] ?>">
                            <button type="submit" class="button">Excluir</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum funcionário cadastrado ainda.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
