<?php
include_once('con.php');

//criar a conexão
$connnn = mysqli_connect($servidor, $usuario, $senha, $dbname);

?>

<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
<link href="styles/css.css" rel="stylesheet" type="text/css">
<title> Cadastrar Produto </title>

</head>

<body>
<img style=" vertical-align:'middle'; margin-left:-18px" width="635px" height="140px" src="imagens/imagem4.jpg"/>
<br>
<br>

<center><h2 style = "font-family:Helvetica ">Cadastre Novo produto</h2></center>

<br>

<form align="left" position-left="201px" action="dadosproduto.php" method="post"><h3> 

Nome do Produto:
<input type="text" name="nome" placeholder="Nome" required> <br><br>

Quantidade:
<input type="int" name="quantidade" placeholder="Quantidade" required> <br><br>

Preço R$:
<input type="text" name="preco" placeholder="preco" required> <br><br>


</h3>

<center><input type="submit" value="Cadastrar Produto">

<input type="reset" value="Limpar">

<a href="visualizar.php?pagina=1"><input type="button" value="Visualizar Estoque"></a></center>

</form>

</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>