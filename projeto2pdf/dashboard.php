<?php
require_once 'config.php';

if (isset($_SESSION["usuario_id"])) {
    header("location: dashboard.php");
    exit;
}

$pdo = conectarBanco();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }
        .header {
            background: #333;
            color: white;
            padding: 10px;
        }
        .menu {
            margin: 20px 0;

        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align:left;

        }
        th {
            background-color: #f2f2f2;
        }
        </style>
</head>
<body>
    
</body>
</html>