<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
<link href="./styles2/css.css" rel="stylesheet" type="text/css">
<title> Entrada de Produtos </title>
</head>
<body 
  style=" width: 1030px;
  margin: 0 auto;
  background-color: #b5c7e5;
  padding: 120px;
  border: 3px solid black;
  font:12px auto trebuchet ms,Verdana,Arial,Helvetica,sans-serif;
  color:#4f6b72;">

<img style="vertical-align:'middle'; margin-left:-118px; margin-top:-119px;" width="1268px" height="140px" src="imagens/imagem5.jpg"/>

<p><center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="parametro" placeholder="Filtrar" />
<input type="submit" value="Ordenar" />
</form>
</p></center>

<form action="dadosproduto.php" method="post">


<?php




//criando tabela e o cabeçalho de dados:
echo "<center><table border = 1>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Nome </th>";
echo "<th> Quantidade </th>";
echo "<th> Preço </th>";
echo "<th> Editar </th>";
echo "<th> Remover </th>";
echo "</tr>";






$pagina = $_GET['pagina'];
if (!$pagina) {
$paginamarcada = "1";
} else {
$paginamarcada = $pagina;
}






//conectando ao banco de dados;
$parametro = filter_input(INPUT_GET, "parametro");

$strcon = mysqli_connect('localhost', 'root', '9L@d@$9', 'estoque') or die ('Erro ao conectar ao banco de dados');
//$sql = "SELECT * FROM dadospaciente";
//$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");

if($parametro){
$sql = "SELECT * from produtos where nome like ucase('%$parametro%') order by ID asc";
//$sql = "SELECT * from dadospaciente WHERE nomedopaciente like '%$parametro%' order by data";
$total_registros = "5000";
}
//if($parametro == "Masculino" or "Feminino"){
//$sql = "SELECT * from dadospaciente where sexo like '$parametro%' order by data";
//}
else{
	$sql = "SELECT * FROM produtos order by ID asc";
	$total_registros = "50";
}

//switch ($parametro){
//    case "Apto" or "Nao apto":
//    $sql = "SELECT * from dadospaciente where riscocirurgico like '$parametro%' order by data";
//    break;}


$inicio = $paginamarcada - 1;
$inicio = $inicio * $total_registros;


$todos = mysql_query("$sql");
$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");


$totalregistros = mysql_num_rows($todos); // verifica o número total de registros
$totalpaginas = $totalregistros / $total_registros;	

echo "<h2><center> Lista de Produtos no Estoque </center></h2>";


//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))

{


	
    $rid = $registro['ID']; 
	$rnome = $registro['nome'];
	$rquantidade = $registro['quantidade'];
	$rpreco = $registro['preco'];
	echo "<tr>";
	echo "<td>".$rid."</td>";
//	echo "<td><a href='checkproduto.php?id=".$rid."nome=".$rnome."&rquantidade=".$rquantidade."&chamado=".$rchamado."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnome</a></td>";
    echo "<td><a href='saidaproduto.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."&preco=".$rpreco."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnome</a></td>";
	if($rquantidade <= "4"){
	echo "<td style='background-color:#fc6c68'>".$rquantidade."</td>";}
	else{
	echo "<td style='background-color:#89f59f'>".$rquantidade."</td>";
}
	echo "<td>".$rpreco."</td>";
//	if($rstatus == "Nao Apto"){
//	echo "<td><span style=\"color:red;\">".$rstatus."</span></td>";}
//	else{
//	echo "<td><span style=\"color:green;\">".$rstatus."</span></td>";
//	}
	
	echo "<td><a href='alterarproduto.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."&preco=".$rpreco."'><img src='imagens/editar2.png'/></a></td>";
	echo "<td><a href='apagar.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."'><img src='imagens/remover.png'/></a></td>";
	echo "</tr>";

}
mysqli_close($strcon);
echo "</table></center>";

$anterior = $paginamarcada -1;

$proximo = $paginamarcada +1;


echo "<h4 align=Right >Pagina $paginamarcada </br>";
if ($paginamarcada>1) {
echo "<a href='?pagina=$anterior' align=Right style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\"><- Anterior</a> ";
}
echo "|";
echo "<a href='?pagina=$proximo' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">Próxima -></a></h4>";


?>
<br>
<br>
<center><a href="cadastrarproduto.php"><input type="button" value="Produto Novo">

<a href="entradasaida.php"><input type="button" value="Entrada/Saída de Produto"></a>

<a href="visualizarlog.php"><input type="button" value="Ultimas Mudanças"></a></center>
</form>

<br>
<br>
<br>
<br>
<center>
<a href="gerarplanilha.php"><input type="button" value="Gerar EXCEL Completo"></a>
<?php
echo "<a href='gerarplanilhafiltro.php?parametro=".$parametro."'><input type='button' value='Gerar EXCEL Filtro'></a>";
?>
</center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





<?php
echo "<center><table border = 1>";
echo "<tr>";
echo "<th> ID </th>";
echo "<th> Nome </th>";
echo "<th> Quantidade + </th>";
echo "<th> Quantidade - </th>";
echo "<th> Quantidade Total </th>";
echo "<th> Chamado </th>";
echo "<th> Setor </th>";
echo "<th> IP </th>";
echo "<th> hora </th>";
echo "<th> Mensagem </th>";
echo "<th> Preco </th>";
echo "</tr>";




$sql2 = "SELECT * FROM produtosretirada order by hora desc";
$total_registros2 = "100";
$strcon2 = mysqli_connect('localhost', 'root', '9L@d@$9', 'estoque') or die ('Erro ao conectar ao banco de dados');



$todos2 = mysql_query("$sql2");
$resultado2 = mysqli_query($strcon2, "$sql2 LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");


$totalregistros2 = mysql_num_rows($todos2); // verifica o número total de registros

echo "<h2><center> Lista de Transações de Produtos </center></h2>";

//obtendo os dados por meio de um loop while:
while ($registro2 = mysqli_fetch_array($resultado2))

{
    $rid2 = $registro2['ID']; 
	$rnome2 = $registro2['nome'];
	$rquantidadeacr2 = $registro2['quantidadeacr'];
	$rquantidaderet2 = $registro2['quantidaderet'];
	$rquantidadetotal2 = $registro2['quantidadetotal'];
	$rchamado2 = $registro2['chamado'];
	$rsetor2 = $registro2['setor'];
	$rip2 = $registro2['ip'];
	$rhora2 = $registro2['hora'];
	$rmensagem2 = $registro2['mensagem'];
	$rpreco2 = $registro2['preco'];
	echo "<tr>";
	echo "<td>".$rid2."</td>";
//	echo "<td><a href='checkproduto.php?id=".$rid."nome=".$rnome."&rquantidade=".$rquantidade."&chamado=".$rchamado."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnome</a></td>";
//    echo "<td><a href='saidaproduto.php?id=".$rid."nome=".$rnome."&rquantidade=".$rquantidade."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnome</a></td>";
    echo "<td>".$rnome2."</td>";
	echo "<td>".$rquantidadeacr2."</td>";
	echo "<td>".$rquantidaderet2."</td>";
	echo "<td>".$rquantidadetotal2."</td>";
	echo "<td>".$rchamado2."</td>";
	echo "<td>".$rsetor2."</td>";
	echo "<td>".$rip2."</td>";
	echo "<td>".$rhora2."</td>";
	echo "<td>".$rmensagem2."</td>";
	echo "<td>".$rpreco2."</td>";
//	if($rstatus == "Nao Apto"){
//	echo "<td><span style=\"color:red;\">".$rstatus."</span></td>";}
//	else{
//	echo "<td><span style=\"color:green;\">".$rstatus."</span></td>";
//	}
	
//	echo "<td><a href='alterarproduto.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."'><img src='imagens/editar2.png'/></a></td>";
//	echo "<td><a href='apagar.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."'><img src='imagens/concluido2.png'/></a></td>";
	echo "</tr>";

}
mysqli_close($strcon2);
echo "</table></center>";
?>





<!--<p><center>
<form action="<?php// echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="parametro" placeholder="Filtrar" />
<input type="submit" value="Ordenar" />
</form>
</p></center> -->

</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>