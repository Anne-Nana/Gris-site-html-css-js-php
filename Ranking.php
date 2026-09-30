<html>
<head>
    <title>Ranking</title>
    <meta http-equiv="Cache-Control" content="No-Cache">
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ccc;
        }
    </style>
</head>
<body>

<h2 align="center">Ranking dos Jogadores</h2>

<?php 

//conexão
$host = "localhost";
$username = "root";
$password = "";
$db_name = "jogadores";

$con = mysqli_connect($host, $username, $password, $db_name) or die("cannot connect");

if (mysqli_connect_errno()) {
    echo "Falhou ao conectar ao MySQL: " . mysqli_connect_error();
    exit();
}

//ranking 

$sql = "SELECT ROW_NUMBER() OVER (ORDER BY pontos DESC) AS posicao, 
               nome, usuario, pontos 
        FROM cadastro 
        ORDER BY pontos DESC";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($con));
}

//exibindo tabela

echo "<table border='1' align='center'>";
echo "<tr>";
echo "<th>Posição</th>";
echo "<th>Nome</th>";
echo "<th>Usuário</th>";
echo "<th>Pontos</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['posicao'] . "º</td>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['usuario'] . "</td>";
    echo "<td>" . $row['pontos'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>

</body>
</html>