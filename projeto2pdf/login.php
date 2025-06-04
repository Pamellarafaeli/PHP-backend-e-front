<?php
require_once 'config.php';

if (isset($_SESSION["usuario_id"])) {
    header("location: dashboard.php");
    exit;
}
$erro = '';
if ($_SERVER["REQUEST_METHOD"] =="POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    if (!empty($email) && !empty($senha)) {
        $pdo = conectarBanco();
        $stmt = $pdo->prepare("SELECT id_usuario,nome,senha FROM usuario WHERE email = ?");
        $stmt-> execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha,$usuario['senha'])) {
            $_SESSION["usuario_id"] = $usuario['id_usuario'];
            $_SESSION["usuario_nome"] = $usuario['nome'];
            header ("location:dashboard.php");

        } else {
            $erro = "Credenciais inválidas!";
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B6A39E;
        }
        .container {
            width: 400px;
            height: 300px;
            margin: 100px auto;
            background-color: white;
            border-radius: 10px;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 15px 0;

        }
        button {
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            width: 90%;
        }
        .erro {
            color: red;
        }
        </style>
</head>
<body>
    <div class = "container">
    <h2> Login </h2>
    <?php if($erro):?>
        <p class = "erro"><?=erro?></p>
        <?php endif;?>
        <form method = "POST">
            <input type = "email" name = "email" placeholder = "Email" required>
            <input type = "password" name = "senha" placeholder = "Senha" required>
            <button type= "submit"> Entrar </button>
    </form>
    </div>
</body>
</html>