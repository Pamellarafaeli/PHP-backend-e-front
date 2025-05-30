<?php
$host = "localhost";    
$usuario = "root";       
$senha = "";            
$banco = "bd_imagem";    

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
