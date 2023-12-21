<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'futmax';
 
$conn = mysqli_connect($host, $username, $password, $database);
 
if (!$conn) {
    die('Falha na conexão com a base de dados: ' . mysqli_connect_error());
}
 
mysqli_set_charset($conn, "utf8");
// Consulta SQL para selecionar todas as faculdades com o nome do distrito
$sql = "SELECT id AS id_facul, faculdade.Nome, faculdade.Morada, faculdade.contacto, distritos.nome AS nome_distrito
        FROM faculdade
        INNER JOIN distritos ON faculdade.distrito_id = distritos.id";
 
$resultado = mysqli_query($conn, $sql);
 
session_start();
 
// Verifique se o utilizador está logado
if (!isset($_SESSION['username'])) {
    // Se o usuário não estiver logado, redirecione para a página de login
    header('Location: login.html');
    exit();
}
 
// Verifique se o usuário é um administrador (baseado na coluna "is_admin" do banco de dados)
if ($_SESSION['is_admin'] != 1) {
    // Se o usuário não for um administrador, redirecione para uma página de erro ou negação de acesso
    header('Location: acesso_negado.html');
    exit();
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="fotos/imagem_2023-04-28_150907081-removebg-preview.png"/>
    <div class="titulo">
    <title>Lista de Faculdades</title>
    </div>
    <body>
    <style>
        /* Estilo para a tabela */
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 120px;
        }
 
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-family: 'Courier New', Courier, monospace;
            border-right: 1px solid #ddd; /* Adiciona uma borda direita às células */
            border-left: 1px solid #ddd;
        }
 
        th {
            background-color: #f2f2f2;
            font-family: 'Courier New', Courier, monospace;
        }
 
        body {
            background-image: linear-gradient(to top, #43344a, #43334a);
            min-height: 100%;
            background-size: cover;
            background-repeat: repeat;
            margin: 0;
        }
 
        .titulo {
            font-family: 'Courier New', Courier, monospace;
            font-size: 11px;
            color: white;
            margin-left: 560px;
            font-weight: bold;
        }
 
        a:link {
            color: #089DCC; /* Cor normal do link */
            text-decoration: none; /* Remova sublinhado */
        }
 
        a:hover {
            color: #C21466; /* Cor quando o mouse passa sobre o link (laranja neste exemplo) */
        }
 
        a:active {
            color: #089DCC; /* Cor quando o link está ativo (clicado) (verde neste exemplo) */
        }
 
        .imagem {
            margin-left: 5px;
            margin-top: 25px;
        }
 
        .search {
            display: inline-block;
            position: relative;
            margin-left: 570px;
            margin-top: 20px;
        }
 
        .search input[type="text"] {
            width: 210px;
            padding: 10px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        .search button[type="submit"] {
            background-color: #8B7881;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 0;
            right: 0;
            transition: 0.3s ease;
        }
 
        .search button[type="submit"]:hover {
            transform: scale(1.1);
            color: rgb(194, 20, 102);
            background-color: purple;
        }
 
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3d154a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-left: 640px;
            margin-top: 20px;
            font-family: 'Courier New', Courier, monospace;
        }
 
        .button:hover {
            background-color: #612175;
            color: white;
        }
 
        .button-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3d154a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-left: 590px;
            margin-top: 20px;
            font-family: 'Courier New', Courier, monospace;
        }
 
        .button-add:hover {
            background-color: #612175;
            color: white;
        }
 
 
    </style>
</head>
<div class="page-content">
    <img class="imagem" width="50" src="fotos/imagem_2023-04-28_150907081-removebg-preview.png">
    <div class="titulo">
    <h1>Lista de Faculdades</h1>
    </div>
 
 
    <div class="search">
        <input type="text" id="pesquisar" placeholder="Nome da Faculdade">
        <button type="submit" onclick="pesquisarFaculdade()">Pesquisar</button>
    </div>
 
        <a href="adicionar_faculdade.php" class="button-add">Adicionar Faculdade</a>
    <?php
    $resultado = mysqli_query($conn, $sql);
 
    if (!$resultado) {
        die('Erro na consulta: ' . mysqli_error($conn));
    }
   
    if (mysqli_num_rows($resultado) > 0) {  
        echo '<table>';
        echo '<tr><th>Nome</th><th>Morada</th><th>Contacto</th><th>Distrito</th><th>Ações</th></tr>';
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $row['Nome'] . '</td>';
            echo '<td>' . $row['Morada'] . '</td>';
            echo '<td>' . $row['contacto'] . '</td>';
            echo '<td>' . $row['nome_distrito'] . '</td>';
            echo '<td>';
            echo '<button onclick="editarFaculdade(' . $row['id_facul'] . ')">Editar</button>';
            echo '<button onclick="excluirFaculdade(' . $row['id_facul'] . ')">Excluir</button>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Nenhuma faculdade encontrada.';
    }
   
    mysqli_close($conn);
    ?>
   
 
    <a href="paginaadministracao.php" class="button">Voltar</a>
 
    <script>
        function pesquisarFaculdade() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pesquisar");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");
 
            // Loop através de todas as linhas da tabela, começando pelo índice 1 para ignorar o cabeçalho
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // Coluna do Nome da Faculdade
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; // Exibir a linha se a pesquisa corresponder
                    } else {
                        tr[i].style.display = "none"; // Ocultar a linha se a pesquisa não corresponder
                    }
                }
            }
        }
        function editarFaculdade(faculdadeId) {
        // Redirecionar para a página de edição com o ID da faculdade
        window.location.href = "editar_faculdade.php?faculdade_id=" + faculdadeId;
    }
 
    function excluirFaculdade(faculdadeId) {
        if (confirm("Tem certeza de que deseja apagar esta faculdade?")) {
            // Redirecionar para a página de exclusão com o ID da faculdade
            window.location.href = "apagar_faculdade.php?faculdade_id=" + faculdadeId;
        }
    }
    </script>
</div>
</body>
</html>