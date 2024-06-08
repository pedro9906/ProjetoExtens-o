


<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "bdrecicla";

// Cria a conexão
$conexao = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
