<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <?php
        require "conexao.php";

        $conexao = conectarBanco();
        $stmt = $conexao -> prepare("SELECT * FROM cliente");
        $stmt -> execute();
        $cliente = $stmt -> fetchAll();
    ?>
    <h2> Lista de Clientes </h2>
    <table border = "1">
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Telefone </th>
            <th> Endereço </th>
            <th> Email </th>
        </tr>
    <?php foreach ($cliente as $cliente):?>
        <tr>
        <td> <?= htmlspecialchars($cliente["id_cliente"]) ?></td>
        <td> <?= htmlspecialchars($cliente["nome"]) ?></td>
        <td> <?= htmlspecialchars($cliente["endereco"]) ?></td>
        <td> <?= htmlspecialchars($cliente["telefone"]) ?></td>
        <td> <?= htmlspecialchars($cliente["email"]) ?></td>

        </tr>

        <?php endforeach; ?>
    </table>
</body>
</html>