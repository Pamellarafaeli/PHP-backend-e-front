<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email_adm'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM adm WHERE email_adm = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if ($senha === $usuario['senha']) {
            $_SESSION['adm'] = $usuario['email_adm']; // nome da sessão corrigido
            header("Location: index.php");
            exit();
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
  display: flex;
  justify-content: center; /* centraliza horizontal */
  align-items: center;     /* centraliza vertical */
  height: 100vh;           /* altura total da viewport */
  margin: 0;               /* tira margem padrão */
  font-family: Arial, sans-serif;
}
form {
  background: #fff;        /* só pra visualizar o form */
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  width: 300px;
  box-sizing: border-box;
}

</style>
</head>
<body>
<form method="post">
    <h2>Login</h2>
    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <label>Email:</label>
    <input type="email" name="email_adm" required>

    <label>Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Entrar</button>
</form>
</body>
</html>
