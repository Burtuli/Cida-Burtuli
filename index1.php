<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #a6a9ac;
    }

    .login-container {
        width: 400px;
        padding: 60px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 157, 255, 0.1);
    }

    .login-container h2 {
        text-align: center;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ffffff;
        border-radius: 5px;
    }

    .login-container button {
        width: 100%;
        padding: 8px;
        background-color: blue;
        border: none;
        color: #ffffff;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-container button:hover {
        background-color: blue;
    }
</style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
