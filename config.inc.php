<?php
$host = "localhost";//no próprio xampp é localhost
$user = "root"; //usuário padrão do xampp é root
$pass = "";//senha padrão do xampp é vazio
$db   = "habit_tracker";//noome do banco de dados

$conn = new mysqli($host, $user, $pass, $db);//cria a conexão

if ($conn->connect_error) {//verifica se houve erro na conexão
    die("Erro de conexão: " . $conn->connect_error);//se houve erro, exibe a mensagem
}
?>