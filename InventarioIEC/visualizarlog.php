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
<input type="text" name="pagina" value="1" hidden />
<input type="submit" value="Ordenar" />
</form>
</p></center>

<form action="dadosproduto.php" method="post">


<?php
include_once('con.php');



//criando tabela e o cabeçalho de dados:
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






$pagina = $_GET['pagina'];
if (!$pagina) {
$paginamarcada = "1";
} else {
$paginamarcada = $pagina;
}






//conectando ao banco de dados;
$parametro = filter_input(INPUT_GET, "parametro");

$strcon = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Erro ao conectar ao banco de dados');
//$sql = "SELECT * FROM dadospaciente";
//$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");

if($parametro){
$sql = "SELECT * from produtosretirada where nome like ('%$parametro%') or ID like ucase('%$parametro%') or chamado like ('%$parametro%') or setor like ('%$parametro%') or ip like ucase('%$parametro%') or mensagem like ('%$parametro%') order by hora desc";
//$sql = "SELECT * from dadospaciente WHERE nomedopaciente like '%$parametro%' order by data";
$total_registros = "5000";
}
//if($parametro == "Masculino" or "Feminino"){
//$sql = "SELECT * from dadospaciente where sexo like '$parametro%' order by data";
//}
else{
	$sql = "SELECT * FROM produtosretirada order by hora desc";
	$total_registros = "50";
}

//switch ($parametro){
//    case "Apto" or "Nao apto":
//    $sql = "SELECT * from dadospaciente where riscocirurgico like '$parametro%' order by data";
//    break;}


$inicio = $paginamarcada - 1;
$inicio = $inicio * $total_registros;


$todos = mysqli_query($strcon, "$sql");



$todos2 = mysqli_query($strcon, "$sql");
$totalregistros = mysqli_num_rows($todos2);


$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");


//$totalregistros = mysql_num_rows($todos); // verifica o número total de registros
$totalpaginas = $totalregistros / $total_registros;	

echo "<h2><center> Lista de Transações de Produtos </center></h2>";


//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))

{


	
    $rid = $registro['ID']; 
	$rnome = $registro['nome'];
	$rquantidadeacr = $registro['quantidadeacr'];
	$rquantidaderet = $registro['quantidaderet'];
	$rquantidadetotal = $registro['quantidadetotal'];
	$rchamado = $registro['chamado'];
	$rsetor = $registro['setor'];
	$rip = $registro['ip'];
	$rhora = $registro['hora'];
	$rmensagem = $registro['mensagem'];
	$rpreco = $registro['preco'];
	echo "<tr>";
	echo "<td>".$rid."</td>";
//	echo "<td><a href='checkproduto.php?id=".$rid."nome=".$rnome."&rquantidade=".$rquantidade."&chamado=".$rchamado."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnome</a></td>";
//    echo "<td><a href='saidaproduto.php?id=".$rid."nome=".$rnome."&rquantidade=".$rquantidade."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnome</a></td>";
    echo "<td>".$rnome."</td>";
	echo "<td>".$rquantidadeacr."</td>";
	echo "<td>".$rquantidaderet."</td>";
	echo "<td>".$rquantidadetotal."</td>";
	echo "<td>".$rchamado."</td>";
	echo "<td>".$rsetor."</td>";
	echo "<td>".$rip."</td>";
	echo "<td>".$rhora."</td>";
	echo "<td>".$rmensagem."</td>";
	echo "<td>".$rpreco."</td>";
//	if($rstatus == "Nao Apto"){
//	echo "<td><span style=\"color:red;\">".$rstatus."</span></td>";}
//	else{
//	echo "<td><span style=\"color:green;\">".$rstatus."</span></td>";
//	}
	
//	echo "<td><a href='alterarproduto.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."'><img src='imagens/editar2.png'/></a></td>";
//	echo "<td><a href='apagar.php?id=".$rid."&nome=".$rnome."&quantidade=".$rquantidade."'><img src='imagens/concluido2.png'/></a></td>";
	echo "</tr>";

}
mysqli_close($strcon);
echo "</table></center>";

$anterior = $paginamarcada -1;

$proximo = $paginamarcada +1;


if ($totalpaginas >= $paginamarcada){
echo "<h4 align=Right >Pagina $paginamarcada </br>";
if ($paginamarcada>1) {
echo "<a href='?pagina=$anterior' align=Right style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\"><- Anterior</a> ";}
echo "|";
echo "<a href='?pagina=$proximo' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">Próxima -></a></h4>";
}
elseif ($parametro){
echo "<h4 align=Right >Pagina Unica - Filtrada </br>";
echo "<input type='button' value='Voltar' onClick='history.go(-1)'></h4>"; 
}
else{	
echo "<h4 align=Right >Pagina $paginamarcada </br>";	
echo "<a href='?pagina=$anterior' align=Right style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\"><- Anterior</a></h4>";
}

?>
<br>
<br>
<center><a href="cadastrarproduto.php"><input type="button" value="Cadastrar Produto Novo"></a>

<a href="visualizar.php?pagina=1"><input type="button" value="Visualizar Estoque"></a>

<a href="entradasaida.php?pagina=1"><input type="button" value="Entrada/Saída de Produto"></a></center>
</form>

<br>
<br>
<br>
<br>
<center>
<a href="gerarplanilha2.php"><input type="button" value="Gerar EXCEL Completo"></a>
<?php
echo "<a href='gerarplanilhafiltro2.php?parametro=".$parametro."'><input type='button' value='Gerar EXCEL Filtro'></a>";
?>

<a href="gerarplanilhaultimomes.php"><input type="button" value="Último Mês"></a>
</center>
<!--<p><center>
<form action="<?php// echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="parametro" placeholder="Filtrar" />
<input type="submit" value="Ordenar" />
</form>
</p></center> -->

</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>