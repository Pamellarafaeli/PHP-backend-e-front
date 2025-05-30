<?php
// função para dimensionar a imagem
function redimensionarImagem($imagem, $largura, $altura) {
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);
    $novaImagem = imagecreatetruecolor($largura, $altura);
    $imagemOriginal = imagecreatefromjpeg($imagem);
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean();

    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem;
}

// conexão com banco
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
        if ($_FILES['foto']['error'] === 0) {
            $nome = $_POST['nome'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $nome_foto = $_FILES['foto']['name']; 
            $tipo_foto = $_FILES['foto']['type'];


            // redimensiona a imagem para 300x400 pixels
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);


            $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) 
                    VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nome_foto);
            $stmt->bindParam(':tipo_foto', $tipo_foto);
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

        } else {
            echo "Erro no upload da imagem: " . $_FILES['foto']['error'];
        }
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Lista imagens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Lista de imagens</h1>
    
    <?php
    if ($stmt->execute()) {
        echo '<p class="mensagem-sucesso">Funcionário cadastrado com sucesso!</p>';
    } else {
        echo '<p class="mensagem-erro">Erro ao cadastrar funcionário.</p>';
    }
    ?>
    
    <a href="consultar_funcionario.php" class="button">Listar Funcionários</a>
</div>

</body>
</html>

