<?php
session_start();
include("config.inc.php"); // inclui o arquivo de conexão com o banco de dados

 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
 $objetivo = $_POST['objetivo'];

 $sql = "INSERT INTO usuarios (nome, email, senha, objetivo) VALUES (?, ?, ?, ?)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("ssss", $nome, $email, $senha, $objetivo);

try {
    // Tenta executar o cadastro
    if ($stmt->execute()) {
        // Se o cadastro for bem-sucedido, inicia a sessão para o usuário
        $_SESSION['usuarioID'] = $conn->insert_id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['objetivo'] = $objetivo;

        header("Location: habit_tracker.php");
        exit;
    }
} catch (mysqli_sql_exception $e) {
    // Captura erros específicos do MySQL
    // Verifica se o erro é de entrada duplicada para o e-mail
    if (strpos($e->getMessage(), 'Duplicate entry') !== false && strpos($e->getMessage(), 'unique_email') !== false) {
        $_SESSION['erro'] = "Este e-mail já está cadastrado. Por favor, utilize outro.";
    } else {
        // Para outros erros de banco de dados
        $_SESSION['erro'] = "Ocorreu um erro ao cadastrar. Tente novamente mais tarde.";
    }
    // Redireciona de volta para a página de cadastro com a mensagem de erro
    header("Location: index.php");
    exit;
}

 $stmt->close();
 $conn->close();
?>