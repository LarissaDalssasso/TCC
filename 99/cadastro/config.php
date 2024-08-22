<?php
$servername = "localhost";
$username = "root"; // Altere conforme necessário
$password = "root"; // Altere conforme necessário
$dbname = "site";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
