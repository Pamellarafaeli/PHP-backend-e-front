<?php
      require_once "conexao.php";

      $conexao = conectarBanco();

      $sql = "SELECT id_cliente,nome,endereco,telefone,email FROM cliente ORDER BY nome ASC";

      $stmt = $conexao -> prepare($sql);
      $stmt -> execute();
      $clientes = $stmt->fetchAll();
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lista de clientes</title>
</head>
<body>
      <h2> Todos os clientes cadastrados</h2>

      <?php if (!$clientes): ?>
            <p style = "color:red;"> Nenhum cliente encontrado no banco de dados </p>

            <?php else: ?>
            <table border = "1">
      <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Telefone </th>
            <th> Endereço </th>
            <th> Email </th>
            <th> Ação </th>
      </tr>
      <?php foreach ($clientes as $cliente): ?>
        <td> <?= htmlspecialchars($cliente["id_cliente"]) ?></td>
        <td> <?= htmlspecialchars($cliente["nome"]) ?></td>
        <td> <?= htmlspecialchars($cliente["endereco"]) ?></td>
        <td> <?= htmlspecialchars($cliente["telefone"]) ?></td>
        <td> <?= htmlspecialchars($cliente["email"]) ?></td>
        <td>
            <a href="atualizar_cliente.php?id=<?php echo $cliente['id_cliente']; ?>">Editar</a>
            </td>
            </tr>
      <?php endforeach; ?>
      </table>
      <?php endif; ?>
</body>
</html>