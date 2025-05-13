<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h2> Cadastro de cliente </h2>
    <form action = "processar_insercao.php" method = "post">
        <label for = "nome"> Nome: </label>
        <input type = "text" id="nome" name="nome" required>

        <label for = "endereco"> Endereço: </label>
        <input type = "text" id="endereco" name="endereco" required>

        <label for = "telefone"> Telefone: </label>
        <input type = "text" id="telefone" name="telefone" required>
        
        <label for = "email"> Email: </label>
        <input type = "email" id="email" name="email" required>
        
        <button type = "submit"> Cadastrar cliente </button>
    </form>
</body>
</html>