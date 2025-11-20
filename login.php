<?php
session_start();
include("config.inc.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Consulta para verificar o usuário 
    $sql = "SELECT id, nome, email, senha, objetivo FROM usuarios WHERE email = ?"; //usando prepared statement para evitar SQL Injection
    $stmt = $conn->prepare($sql); //prepara a consulta
    $stmt->bind_param("s", $email);    //vincula o parâmetro
    $stmt->execute();   //executa a consulta
    $result = $stmt->get_result(); //obtém o resultado
    
    if($result->num_rows == 1) { // Usuário encontrado
        $usuario = $result->fetch_assoc(); // Pega os dados do usuário
        
        // Verifica a senha
        if(password_verify($senha, $usuario['senha'])) {
            // Senha correta, inicia a sessão
            $_SESSION['usuarioID'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['objetivo'] = $usuario['objetivo'];
            
            // Redireciona para o habit tracker
            header("Location: habit_tracker.php");
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Email não encontrado!";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Habit Tracker</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* Adicionando estilo para o link de cadastro */
        .cadastro-link {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #00ff99;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        
        .cadastro-link:hover {
            color: #02f091;
        }
        
        .erro {
            color: #ff6b6b;
            margin-bottom: 15px;
            padding: 10px;
            background: rgba(255, 107, 107, 0.1);
            border-radius: 5px;
        }
    </style>
</head>
<body>

    
    <div class="container">
        <h2>Faça seu login</h2>
        <?php if(isset($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Seu e-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
<a href="cadastrar.php" class="cadastro-link">Criar conta</a>
</div>
</body>
</html>