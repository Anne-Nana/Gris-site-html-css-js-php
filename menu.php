<?php
session_start();
?>


<html>
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
  <style>
    body {
      font-family: Arial;
      background-image: url('fundomenu.jpg');
      background-size: cover;
      background-position: center;
      color: #000;
      margin: 0;
      padding: 20px;
    }
    h3 { text-align: center; }

    a {
      display: block;
      color: #000;
      text-decoration: none;
      margin: 6px 0;
      font-weight: bold;
      transition: 0.3s;
    }
    a:hover {
      color: #444;
      text-decoration: underline;
    }

    form {
      margin-top: 20px;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 15px;
      border-radius: 20px;
      width: 180px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 6px;
      margin: 5px 0;
      border: 1px solid #aaa;
      border-radius: 5px;
      color: #000;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #000;
      color: white;
      border: none;
      padding: 8px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
    }

    input[type="submit"]:hover {
      background-color: #333;
    }

    .logado {
      margin-top: 20px;
      padding: 15px;
      background-color: rgba(255,255,255,0.5);
      border-radius: 15px;
      width: 180px;
      font-weight: bold;
      text-align: center;
    }
  </style>
</head>

<body>

<h3>MENU</h3>

<!-- LINKS DO MENU -->
<a href="home.html" target="conteudo">Home</a>
<a href="sobre.html" target="conteudo">Sobre o Jogo</a>
<a href="login.html" target="conteudo">Login</a>
<a href="cadastro.html" target="conteudo">Cadastro</a>
<a href="ranking.php" target="conteudo">Ranking</a>
<a href="https://store.steampowered.com/app/683320/GRIS/" target="_blank">Download do Jogo</a>

<?php 

	if (isset($_SESSION['usuario'])) { ?>

    <div class="logado">
        Bem-vindo<br>
        <b><?= $_SESSION['usuario'] ?></b>
        <br><br>
        <a href="logout.php" target="_top">Sair</a>
    </div>
<?php } ?>


</body>
</html>
