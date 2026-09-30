<?php


//pegando os dados do form
$nome       = $_GET["nome"];
$endereco   = $_GET["endereco"];
$numero     = $_GET["numero"];
$complemento = $_GET["complemento"];
$bairro     = $_GET["bairro"];
$cidade     = $_GET["cidade"];
$cep        = $_GET["cep"];
$uf         = $_GET["uf"];
$email      = $_GET["email"];
$usuario    = $_GET["usuario"];
$senha      = $_GET["senha"];
$pontos     = 0; 

// validando todos os campos de uma so vez

	function erro($msg) {
		echo "<h3>$msg</h3>";
		echo "<a href='javascript:history.back()'>Voltar</a>";
		exit;
}
	if ($nome == "" || $email == "" || $usuario == "" || $senha == "") {
		echo "Erro: Campos obrigatórios vazios!";
		echo "<a href='javascript:history.back()'>Voltar</a>";
		exit;
}

	$regex_proibidos = "/[*#!@<>]/";
	$campos_texto = [
		"nome" => $nome,
		"endereco" => $endereco,
		"cidade" => $cidade,
		"bairro" => $bairro
];
	foreach ($campos_texto as $campo => $valor) {
		if (preg_match($regex_proibidos, $valor)) {
			erro("Campo " . ucfirst($campo) . " contém caracteres especiais não permitidos (* # ! @ < >).");
		}
}

	if ($uf == "") {
		erro("Selecione um estado (UF).");
}

	if (!str_contains($email, "@") || !str_contains($email, ".")) {
		erro("E-mail inválido. Deve conter '@' e '.'.");
}

//conexao
$host = "localhost";
$username = "root";
$password = "";
$db_name = "jogadores";

$con = mysqli_connect($host, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Falha ao conectar: " . mysqli_connect_error();
    exit();
}

//adicionando no banco
$sql = "INSERT INTO cadastro (nome, endereco, numero, complemento, bairro, cidade, cep, uf, email, usuario, senha, pontos)
        VALUES ('$nome', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$cep', '$uf', '$email', '$usuario', '$senha', '$pontos')";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Erro ao cadastrar: " . mysqli_error($con));
} else {
    echo "Cadastro realizado com sucesso!<br>";
    echo "<a href='login.html'>Fazer Login</a><br>";
    echo "<a href='ranking.php'>Ver Ranking</a>";
    mysqli_close($con);
}
?>