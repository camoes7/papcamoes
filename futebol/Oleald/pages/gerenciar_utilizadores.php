<?php
session_start();

// Verificar se o usuário está logado como administrador

    // Você pode verificar o papel do utilizador (administrador ou comum) aqui, se necessário
    // ...

    // Conectar ao banco de dados (substitua com suas próprias credenciais)
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "futmax";

    $conexao = new mysqli($servername, $username, $password, $database);

    if ($conexao->connect_error) {
        die('Erro na ligação com o banco de dados: ' . $conexao->connect_error);
    }

    if (isset($_SESSION['tipo_user'])){
        if ($_SESSION['tipo_user'] == 0){
             echo "Sem permissão";
            return;
        }
    }

    // Consulta para buscar os utilizadores no banco de dados
    $consulta = "SELECT id, nome, email FROM users";
    $resultado = $conexao->query($consulta);

    if ($resultado->num_rows > 0) {
        echo "<h1>Página de Gerenciamento de Utilizadores</h1>";
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $resultado->fetch_assoc()) {
            $UID = $row['id'];
            echo "<tr>";
            echo "<td>" . $UID . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>";
            echo "<a href='editar_utilizador.php?id=$UID'>Editar</a> | <a href='excluir_utilizador.php?id=$UID'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Nenhum utilizador encontrado no banco de dados.";
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();

    echo '<button><a href="administração_utilizadores.php">Voltar à Página de Admin</a></button>';

    
// } else {
    // Se o utilizador não estiver logado como administrador, redirecione-o para a página de login ou para onde desejar.
    //header('Location: index.php'); // Substitua 'index.php' pelo URL correto.
    //exit();
//}
?>
