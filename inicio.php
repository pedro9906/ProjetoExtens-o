<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    // Obtenha os valores do formulário
    $endereco = $_POST['endereco'];
    $data_hora = $_POST['data_hora'];
    $incidente = $_POST['incidente'];
    $resumo_incidente = $_POST['resumo_incidente'];

    // Verifique se a conexão foi estabelecida corretamente
    if (!$conexao) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Insira os dados no banco de dados
    $sql = "INSERT INTO denuncia (endereco, dataehora, tipodenuncia, resumo) VALUES ('$endereco', '$data_hora', '$incidente', '$resumo_incidente')";
    
    if (mysqli_query($conexao, $sql)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    // Feche a conexão
    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JP Descarte Certo</title>
    <link rel="stylesheet" href="./css/inicio.css">
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
        <div class="titulo">Informe o incidente:</div>
        <div class="caixa_cadastro">
            <form action="inicio.php" method="post">
                <div class="cmp_end">
                    <label>Endereço:</label>
                    <input type="text" class="campo_end_in" id="end_id" name="endereco" required>
                </div>
                <div class="cmp_dt">
                    <label>Data e Hora:</label>
                    <input type="text" class="campo_dt_in" id="dt_id" name="data_hora" required>
                </div>
                <div class="cmp_incidente">
                    <label>Qual o tipo de incidente?</label>
                    <input type="text" class="campo_incidente_in" id="incidente_id" name="incidente" required>
                </div>
                <div class="cmp_resumo">
                    <label>Faça um resumo do incidente:</label>
                    <input type="text" class="campo_resumo_in" id="resumo_id" name="resumo_incidente" required>
                </div>
                <div class="botao_cad">
                    <input type="submit" name="submit" value="Cadastrar" class="submit">
                </div>
            </form>
        </div>
        <div class="titulo">Incidentes Cadastrados:</div>
        <div class="caixa_incidentes">
            <table class="incidentes_table">
                <thead>
                    <tr>
                        <th>Endereço</th>
                        <th>Data e Hora</th>
                        <th>Incidente</th>
                        <th>Resumo do Incidente</th>
                    </tr>
                </thead>
                <tbody id="incidentes-body">
                    <!-- Os dados serão preenchidos aqui pelo script -->
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>🌎Descarte consciente, planeta saudável🌍</p>
    </footer>
</body>
</html>
