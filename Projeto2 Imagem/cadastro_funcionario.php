<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="style.css">

  
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <h2>Funcionário</h2>

        <div class = "cadastro">
        <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">

            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/jpeg" required>

            <input type="submit" value="Cadastrar">
        </form>
</div>
    </div>
</body>
</html>
