<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function conectarBanco() {
        $dsn = "mysql:host=localhost:3306;dbname=EMPRESA;charset=utf8";
        $usuario = "root";
        $senha = "";
        try {
            $conexao = new PDO ($dsn, $usuario, $senha, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Corrigido aqui
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return $conexao;
        } catch (PDOException $e) {
            error_log ("Erro ao conectar o banco: " . $e->getMessage());
            die ("Erro ao conectar ao banco");
        }
    } 
?>

</body>
</html>