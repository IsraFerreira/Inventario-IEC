<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
<link href="styles/css.css" rel="stylesheet" type="text/css">
<title> Confirmação de Remoção </title>
</head>
<body>
<img style=" vertical-align:'middle'; margin-left:-18px; margin-top:-18px" width="635px" height="140px" src="imagens/imagem4.jpg"/>
<form action="dadospaciente.php" method="post">
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "9L@d@$9";
$dbname = "estoque";

//criar a conexão
$conn3 = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(mysqli_connect_errno($conn3)){
	 echo "Falha na conexão com o banco de dados";
}else{
     echo "<center><h3>Produto Removido</h3></center>";
}
?>
<center><a href="visualizar2.php"><input type="button" value="Visualizar Estoque"></a>
</form>
</body>

<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>