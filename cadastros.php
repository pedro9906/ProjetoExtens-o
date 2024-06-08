<?php
// Inclua o arquivo de configuração para conectar ao banco de dados
include_once('config.php');

// Consulta ao banco de dados para obter os dados de incidentes
$query = "SELECT endereco, dataehora, tipodenuncia, resumo FROM denuncia";
$result = mysqli_query($conexao, $query);

// Verifique se a consulta foi bem-sucedida
if (!$result) {
    die("Falha na consulta ao banco de dados: " . mysqli_error($conexao));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JP Descarte Certo</title>
    <link rel="stylesheet" href="./css/cadastros.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./imgs/logojp.png" alt="logo_img" class="logoimg">
        </div>
        <div class="botoes">
            <li><a href="./inicio.php">Início</a></li>
            <li><a href="./cadastros.php">Acompanhe aqui</a></li>
            <li><a href="./impacto.php">Impacto Ambiental</a></li>
            <li><a href="./contato.php">Contato</a></li>
        </div>
    </header>
    <main>
        <div class="titulo_cadastro">
            <h1>CADASTRADOS:</h1>
        </div>
        <table class="cadastro_table">
            <thead>
                <tr>
                    <th>Endereço</th>
                    <th>Data e Hora</th>
                    <th>Incidente</th>
                    <th>Resumo do Incidente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop através dos resultados da consulta e preencha a tabela
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['dataehora']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipodenuncia']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['resumo']) . "</td>";
                    echo "</tr>";
                }
                // Libere o resultado
                mysqli_free_result($result);
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>🌎Descarte consciente, planeta saudável🌍</p>
    </footer>
</body>
</html>
