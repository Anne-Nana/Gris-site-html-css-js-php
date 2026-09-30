<?php

session_start(); 

// Impedir acesso sem login
if (!isset($_SESSION['usuario'])) {
    echo "ERRO: Nenhum usuário logado!";
    exit();
}

$usuarioLogado = $_SESSION['usuario'];

$host = "localhost";
$username = "root";
$password = "";
$db_name = "jogadores";

$con = mysqli_connect($host, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Erro ao conectar: " . mysqli_connect_error();
    exit();
}

// Buscar nome e pontos do usuário logado
$sql = "SELECT nome, usuario, pontos 
        FROM cadastro 
        WHERE usuario = '$usuarioLogado'";

$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Erro: usuário não encontrado no banco!";
    exit();
}

$dados = mysqli_fetch_assoc($result);

$nome = $dados['nome'];
$pontos = $dados['pontos'];

// Descobrir posição no ranking
$sqlPosicao = "
    SELECT posicao FROM (
        SELECT ROW_NUMBER() OVER (ORDER BY pontos DESC) AS posicao,
               usuario
        FROM cadastro
    ) AS ranking
    WHERE usuario = '$usuarioLogado'
";

$resultPosicao = mysqli_query($con, $sqlPosicao);
$rankData = mysqli_fetch_assoc($resultPosicao);

$ranking = $rankData['posicao'];

mysqli_close($con);

?>

<html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo-padrao.css">
    <title>Dashboard</title>
</head>

<body style="background-image: url('image/fundo_2.jpg'); background-size: cover; background-repeat:no-repeat;">
    <div align="center">
        <h2>Dashboard</h2>
    </div>

    <div align="center">
        <h3>Usuário: <?php echo $usuarioLogado; ?></h3>
        <h3>Pontos: <?php echo number_format($pontos, 0, ',', '.'); ?></h3>
        <h3>Posição no Ranking: <?php echo $ranking; ?></h3>
    </div>

</body>

</html>
