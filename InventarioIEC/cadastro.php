﻿<?php
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='login.html';</script>";  
}

?>

<html>
<meta charset="UTF-8">

<head>
    <LINK REL="SHORTCUT ICON" href="imagens/logo.png">
    <link href="styles/css.css" rel="stylesheet" type="text/css">
    <title>Cadastro no Inventário</title>
</head>

<body>
    <div class="total">
        <div class="inicial">
        <?php include("session.php"); ?>
            <img src="imagens/logo.png" />
            <h3>Entre com os dados a serem cadastrados no Inventário</h3>

            <form method="POST" action="cadastroRealizado.php" id="formLogin">
                <label id="loginLBL">Login:</label>
                <input type="text" name="login" id="loginInput">
                <label id="senhaLBL">Senha:</label>
                <input type="password" name="senha" id="senhaInput">
                <div id="botao">
                    <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" class="botao">
                    <a href="index.html">
                        <input type="button" value="Voltar" id="voltar" name="voltar" class="botao">
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>