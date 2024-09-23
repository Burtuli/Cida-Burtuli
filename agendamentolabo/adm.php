<?php
// Inclui o arquivo de configuração (config.php)
include_once('config.php');

// Obtém o termo de busca da URL (se existir)
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Cria a consulta SQL com filtragem por nome ou email
$sql = "SELECT nome, cpf, email, telefone, endereco, cidade, estado, cep, tipo
        FROM clientes 
        WHERE nome LIKE '%$searchTerm%' 
        OR email LIKE '%$searchTerm%'";

// Executa a consulta e verifica se houve sucesso
$result = $conexao->query($sql);
if (!$result) {
    die("Falha ao executar a consulta: " . $conexao->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="adm.css"> 

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="adm1.php">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
</nav>

<br>

<h1>Lista de Clientes</h1>

<br>

<div class="box-search">
    <input type="text" id="pesquisar" class="form-control" placeholder="Buscar por nome ou email">
    <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6"/>
        </svg>
    </button>
</div>

<div class="m-5">
    <table class="table text-white table-bg">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">CEP</th>
                <th scope="col">tipo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$user_data['nome']."</td>";
                    echo "<td>".$user_data['cpf']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['telefone']."</td>";
                    echo "<td>".$user_data['endereco']."</td>";
                    echo "<td>".$user_data['cidade']."</td>";
                    echo "<td>".$user_data['estado']."</td>";
                    echo "<td>".$user_data['cep']."</td>";
                    echo "<td>".$user_data['tipo']."</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?email=".$user_data['email']."' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a> 
                        <a class='btn btn-sm btn-danger' href='delete.php?email=".$user_data['email']."' title='Deletar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchData() {
        var term = encodeURIComponent(search.value);
        window.location.href = 'listaclient
