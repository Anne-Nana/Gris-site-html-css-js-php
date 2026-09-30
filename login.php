<?php
session_start(); 

//POST metodo mais seguro
if (!isset($_POST["user"]) || !isset($_POST["senha"])) {
    header("Location: login.html");
    exit;
}

$usuario = $_POST["user"];
$senha = $_POST["senha"];

//conexão
$host = "localhost";
$username = "root";
$password = "";
$db_name = "jogadores";

$con = mysqli_connect($host, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Falha ao conectar: " . mysqli_connect_error();
    exit();
}

//procurando usuario
$sql = "SELECT usuario, senha, nome FROM cadastro 
        WHERE usuario = '$usuario' AND senha = '$senha'";

$result = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($result)) {
   
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['nome'] = $row['nome'];
    mysqli_close($con);
    header("Location: dashboard.php");  
    exit;
} else {
    mysqli_close($con);
    echo "<script>alert('Usuário ou senha inválidos!'); history.back();</script>";
    exit;
}
?>