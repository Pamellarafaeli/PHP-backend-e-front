<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar cliente</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <form action = "processar_delacao.php" method = "POST">
        <label for = "id"> ID do cliente: </label>
        <input type = "number" id = "id" name = "id" required>

        <button type = "submit"> Excluir cliente </button>
</form>
</body>
</html>