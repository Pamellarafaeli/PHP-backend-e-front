<?php
    require_once "conexao.php";
    $conexao = conectarBanco();

    $id_Cliente = $_GET["id"] ?? null;
    $cliente = null;
    $msgErro = "";

    // Função local para buscar cliente por ID
    function buscarClientePorId($id_Cliente, $conexao) {
        $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $id_Cliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($id_Cliente && is_numeric($id_Cliente)) {
        $cliente = buscarClientePorId($id_Cliente, $conexao);

        if (!$cliente) {
            $msgErro = "Erro: Cliente não encontrado.";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo) {
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>
    <h2>Atualizar Cliente</h2>

    <?php if (!empty($msgErro)): ?>
        <p style="color:red;"><?= htmlspecialchars($msgErro) ?></p>
        <form action="atualizar_cliente.php" method="GET">
            <label for="id">ID do cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Buscar</button>
        </form>
    <?php elseif ($cliente): ?>
        <form action="processar_atualizar.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente["id_cliente"]) ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente["nome"]) ?>" readonly onclick="habilitarEdicao('nome')">

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente["endereco"]) ?>" readonly onclick="habilitarEdicao('endereco')">

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente["telefone"]) ?>" readonly onclick="habilitarEdicao('telefone')">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($cliente["email"]) ?>" readonly onclick="habilitarEdicao('email')">

            <button type="submit">Atualizar Cliente</button>
        </form>
    <?php else: ?>
        <p>Digite o ID do cliente para buscar os dados.</p>
        <form action="atualizar_cliente.php" method="GET">
            <label for="id">ID do cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Buscar</button>
        </form>
    <?php endif; ?>
</body>
</html>
