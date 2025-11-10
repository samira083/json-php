<?php
include("config.inc.php");//inclui o arquivo de conexão com o banco de dados

$nome = $_POST['nome']; // Pega o nome no cadastro  
$email = $_POST['email'];//pega email no cadastro
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);//pega a senha no cadastro e faz o hash dela
$objetivo = $_POST['objetivo'];//pega o objetivo no cadastro

$sql = "INSERT INTO usuarios (nome, email, senha, objetivo) VALUES (?, ?, ?, ?)"; //variaveis preparadas para evitar SQL Injection
$stmt = $conn->prepare($sql); //prepara a query
$stmt->bind_param("ssss", $nome, $email, $senha, $objetivo);//junta os parametros

if ($stmt->execute()) {// se o cadastro for executado com sucesso...
    header("Location: habit_tracker.php?nome=" . urlencode($nome) . "&objetivo=" . urlencode($objetivo));//redireciona para a página do habit tracker com os dados na URL
    exit;
} else {//se houver erro ao cadastrar...
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();//fecha a declaração
$conn->close();//fecha a conexão
?>