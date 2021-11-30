<?php

$login = filter_input(INPUT_GET, "login");
echo $login;


?>
<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
<link href="styles/css.css" rel="stylesheet" type="text/css">
<title> Entrada/Saída</title>

</head>

<body>
<img style=" vertical-align:'middle'; margin-left:-18px" width="635px" height="140px" src="imagens/imagem4.jpg"/>
<br>
<br>

<center><h2 style = "font-family:Helvetica ">Escolha uma das opções</h2></center>

<br>
<center>
<a href="visualizar.php"><input type="button" value="Visualizar Estoque"></a>

<a href="entrada.php"><input type="button" value="Entrada Produto Novo"></a>

<a href="entradasaida.php"><input type="button" value="Entrada/Saída Produto"></a></center>

</form>
</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>