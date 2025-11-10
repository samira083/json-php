<?php
include("config.inc.php");//inclui o arquivo 

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$objetivo = $_POST['objetivo'];

$sql = "INSERT INTO usuarios (nome, email, senha, objetivo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nome, $email, $senha, $objetivo);

if ($stmt->execute()) {
    header("Location: habit_tracker.php?nome=" . urlencode($nome) . "&objetivo=" . urlencode($objetivo));
    exit;
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>