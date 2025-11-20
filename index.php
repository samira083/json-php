

<!DOCTYPE html>
<!-- Define o tipo de documento HTML -->
<html lang="pt-br">
<!-- Define o idioma da página -->
<head>
    <meta charset="UTF-8">
    <!-- Garante que acentuação e caracteres especiais apareçam corretamente -->
    <title>Cadastro - Habit Tracker</title>
    <!-- Título que aparece na aba do navegador -->
    <link rel="stylesheet" href="estilo.css">
    <!-- Conecta o arquivo CSS externo -->
    <style>
        /* Adicionando estilo para o link de login */
        .login-link {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #00ff99;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        
        .login-link:hover {
            color: #02f091;
        }
    </style>
</head>
<body>


    <!-- Container principal que segura o formulário -->
    <div class="container">

    
    <a href="login.php" class="login-link">Já tenho uma conta</a>
    
        <h2>Crie sua conta</h2>
        <!-- Título da janela -->
        <!-- Formulário que envia dados para "cadastrar.php" via método POST -->
        <form action="cadastrar.php" method="POST">
            <!-- Campo de texto para o nome -->
            <input type="text" name="nome" placeholder="Seu nome" required>
            <!-- Campo de e-mail -->
            <input type="email" name="email" placeholder="Seu e-mail" required>
            <!-- Campo de senha -->
            <input type="password" name="senha" placeholder="Senha" required>
            <!-- Campo de texto maior para o objetivo -->
            <textarea name="objetivo" rows="3" placeholder="Seu principal objetivo"></textarea>
            <!-- Botão para enviar o formulário -->
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>