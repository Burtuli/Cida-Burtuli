<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento de Laboratório de Informática</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #007bff;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    nav {
        background-color: #f4f4f4;
        padding: 10px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin-right: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group button {
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }
</style>
</head>
<body>
<header>
    <h1>Agendamento de Laboratório de Informática</h1>
</header>
<nav>
    <ul>
        <li><a href="#agendar">Agendar Laboratório</a></li>
        <li><a href="#visualizar">Visualizar Agendamentos</a></li>
        <li><a href="#sobre">Sobre</a></li>
    </ul>
</nav>
<div class="container">
    <section id="agendar">
        <!-- Formulário de agendamento -->
    </section>
    <hr>
    <section id="visualizar">
        <h2>Visualizar Agendamentos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Duração</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui você pode adicionar as linhas da tabela com os agendamentos -->
                <tr>
                    <td>Exemplo</td>
                    <td>2024-04-02</td>
                    <td>10:00</td>
                    <td>2 horas</td>
                </tr>
                <tr>
                    <td>Outro Exemplo</td>
                    <td>2024-04-03</td>
                    <td>14:00</td>
                    <td>3 horas</td>
                </tr>
            </tbody>
        </table>
    </section>
    <hr>
    <section id="sobre">
        <h2>Sobre</h2>
        <p>Este é um site de agendamento de laboratório de informática.</p>
    </section>
</div>
<footer>
    <p>&copy; 2024 Agendamento de Laboratório de Informática</p>
</footer>
</body>
</html>
