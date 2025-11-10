<?php
$nome = $_GET['nome'] ?? 'Usuário';
$objetivo = $_GET['objetivo'] ?? 'Sem objetivo definido';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Habit Tracker</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            display: flex;
            justify-content: space-evenly;
            align-items: start;
            padding-top: 50px;
        }

        .tabela, .painel {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            padding: 20px;
            color: white;
            box-shadow: 0 0 20px rgba(0, 255, 128, 0.3);
            width: 40%;
            height: 70vh;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            color: #00ff99;
        }
    </style>
</head>
<body>

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

</body>
</html>