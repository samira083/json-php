<?php
session_start();
include("protect.php"); // Protege a página

// Pega os dados da sessão em vez da URL
 $nome = $_SESSION['nome'] ?? 'Usuário';
 $objetivo = $_SESSION['objetivo'] ?? 'Sem objetivo definido';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body { // Estilo para o corpo da página
            display: flex;
            justify-content: space-evenly;
            align-items: start;
            padding-top: 50px;
        }
.painel{
    margin: auto;
    margin-left: 50px;
    width: 25%; /* Reduzi de 40% para 25% */
}

.tabela{
    margin: auto;
    width: 50%; /* Aumentei de 40% para 50% */
}

.tabela, .painel {
    /*Estilo para a tabela e o painel*/
    backdrop-filter: blur(20px);
    /*Deixa o fundo borrado*/
    -webkit-backdrop-filter: blur(20px);
    /* Versão para Safari */
    background: rgba(255, 255, 255, 0.08);
    /* Fundo translúcido */
    border-radius: 15px;
    /* Arredonda os cantos */
    padding: 20px;
    /* Espaçamento interno */
    color: white;
    /* Cor do texto */
    box-shadow: 0 0 20px rgba(0, 255, 128, 0.3);
    /* Sombra suave */
    height: 90vh;
    /* Altura */
    overflow-y: auto;
    /* Adiciona barra de rolagem vertical se necessário */
    }
        }
        table {
            /* Estilo para a tabela */
            width: 100%;
            /* Largura total da tabela */
            border-collapse: collapse;
            /* Remove espaçamento entre células */
            text-align: center;
            /* Centraliza o texto */
        }
        th, td {
            /* Estilo para cabeçalhos e células */
            padding: 10px;
            /* Espaçamento interno */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            /* Linha inferior suave */
        }
        th {
            /* Estilo para cabeçalhos */
            color: #00ff99;
            /* Cor verde clara */
        }
        
        /* Adicionando estilo para o logout */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            color: #00ff99;
            border: 1px solid #00ff99;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: #00ff99;
            color: #000;
        }
    </style>
</head>
<body>
    <!-- Botão de logout no canto superior direito -->
    <a href="logout.php" class="logout-btn">Sair</a>
    

    <div class="painel">
        <h2>👤 Perfil do Usuário</h2>
        <p><b>Nome:</b> <?= htmlspecialchars($nome) ?></p>
        <p><b>Objetivo:</b> <?= htmlspecialchars($objetivo) ?></p>
        <hr style="margin: 15px 0; opacity: 0.3;">
        <h3>🧭 Dicas:</h3>
        <ul style="list-style:none; padding:0;">
            <li>✔ Organize suas metas por prioridade</li>
            <li>✔ Acompanhe o progresso semanal</li>
            <li>✔ Atualize suas metas sempre que precisar</li>
        </ul>
    </div>

        <div class="tabela">
        <h2>📅 Metas do Habit Tracker</h2>
        <table>
            <tr><th>Meta</th><th>Período</th><th>Status</th></tr>
            <tr><td>Treinar</td><td>Diário</td><td>✅</td></tr>
            <tr><td>Estudar 1h</td><td>Diário</td><td>✅</td></tr>
            <tr><td>Ler 1 livro</td><td>Semanal</td><td>🕒</td></tr>
            <tr><td>Guardar R$100</td><td>Mensal</td><td>❌</td></tr>
        </table>
    </div>
</body>
</html>