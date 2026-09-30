<?php

function erro($msg)
{
    echo "<h3>$msg</h3>";
    exit;
}

$campos_obrigatorios = [
    "nome" => "Nome",
    "endereco" => "Endereço",
    "bairro" => "Bairro",
    "cidade" => "Cidade",
    "email" => "E-mail",
    "celular" => "Celular",
    "unidade" => "UF"
];

foreach ($campos_obrigatorios as $campo => $nomeCampo) {
    if (!isset($_GET[$campo]) || trim($_GET[$campo]) == ""){
        erro("campo $nomeCampo incorreto (não deixe em branco)");
    }
}

$regex_proibidos = "/[*#!@<>]/";


$campos_sem_especiais = [
    "nome" => "Nome",
    "endereco" => "Endereço",
    "cidade" => "Cidade",
    "bairro" => "Bairro"
];

foreach ($campos_sem_especiais as $campo => $nomeCampo) {
    if (preg_match($regex_proibidos, $_GET[$campo])) {
        erro("Campo $nomeCampo incorreto (caracteres especiais proibidos)");
    }
}


if ($_GET["unidade"] == "") {
    erro("Campo UF incorreto (selecione um estado)");
}


$email = $_GET["email"];
if (!str_contains($email, "@") || !str_contains($email, ".")) {
    erro("Campo E-mail incorreto (precisa conter @ e .)");
}

$celular = $_GET["celular"];
if (!ctype_digit($celular)) {
    erro("Campo Celular incorreto (somente números)");
}

echo "<h2>Dados enviados com sucesso!</h2>";
echo "<p>Obrigado por preencher o formulário!</p>";
