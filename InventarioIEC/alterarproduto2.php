<?php



?>

<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
<link href="styles/css.css" rel="stylesheet" type="text/css">
<title> Edição de Produto </title>
</head>
<body>
<img style=" vertical-align:'middle'; margin-left:-18px; margin-top:-18px" width="635px" height="140px" src="imagens/imagem4.jpg"/>

<?php


$servidor = "localhost";
$usuario = "root";
$senha = "9L@d@$9";
$dbname = "estoque";

//criar a conexão
$conn2 = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(mysqli_connect_errno($conn2)){
	 echo "Falha na conexão com o banco de dados";
}else{
     echo "<center><h3>Produto Editado</h3></center>";
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
//echo $nomedamae;
$quantidade = filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_STRING);
//echo $prontuario;

?>

<br>
<br>

<center><h2 style = "font-family:Helvetica ">Atualizar dados do Produto</h2></center>

<br>

<form align="left" position-left="201px" action="inserir2.php" method="post"><h3> 

ID:
<input type="int" name="id2" placeholder="ID" value="<?php echo $id; ?>" readonly="true"> <br><br>

Nome:
<input type="text" name="nome2" placeholder="Nome" value="<?php echo $nome; ?>"> <br><br>

Quantidade:
<input type="int" name="quantidade2" value="<?php echo $quantidade; ?>" readonly="true"/><br><br>

</h3>

<center><input type="submit" value="Atualizar">
</form>
</center>

</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
