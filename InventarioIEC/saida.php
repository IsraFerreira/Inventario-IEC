<html>
<meta charset="UTF-8">
<head>
<LINK REL="SHORTCUT ICON" href="imagens/imagem2.jpg">
<link href="./styles2/css.css" rel="stylesheet" type="text/css">
<title> Lista de pacientes </title>
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

<form action="dadospaciente.php" method="post">


<?php




//criando tabela e o cabeçalho de dados:
echo "<table border = 1>";
echo "<tr>";
echo "<th> Nome do Paciente </th>";
echo "<th> Nome da mãe </th>";
echo "<th> Pron tuário </th>";
echo "<th> Sexo </th>";
echo "<th> Prio ridade </th>";
echo "<th> Grupo </th>";
echo "<th> Diagnóstico </th>";
echo "<th> Nome do médico </th>";
echo "<th> Status </th>";
echo "<th> Cns </th>";
echo "<th> Ida de </th>";
echo "<th> Dias na fila </th>";
echo "<th> Data </th>";
echo "<th> Editar </th>";
echo "<th> Con cluído </th>";
echo "</tr>";






$pagina = $_GET['pagina'];
if (!$pagina) {
$paginamarcada = "1";
} else {
$paginamarcada = $pagina;
}






//conectando ao banco de dados;
$parametro = filter_input(INPUT_GET, "parametro");

$strcon = mysqli_connect('localhost', 'root', '9L@d@$9', 'cadastrodepacientes') or die ('Erro ao conectar ao banco de dados');
//$sql = "SELECT * FROM dadospaciente";
//$resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");

if($parametro){
$sql = "SELECT * from dadospaciente where grupo like ucase('%$parametro%') or status like ucase('%$parametro%') or nomedopaciente like ucase('%$parametro%') or prontuario like ucase('$parametro%') or nomedomedico like ucase('%$parametro%') or sexo like ucase('$parametro%') or diagnostico like ucase('%$parametro%') or cns like ucase('%$parametro%') order by data";
//$sql = "SELECT * from dadospaciente WHERE nomedopaciente like '%$parametro%' order by data";
$total_registros = "5000";
}
//if($parametro == "Masculino" or "Feminino"){
//$sql = "SELECT * from dadospaciente where sexo like '$parametro%' order by data";
//}
else{
	$sql = "SELECT * FROM dadospaciente order by data asc";
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

echo "<h2><center> Lista de Pacientes em Espera para a Cirurgia </center></h2>";


//obtendo os dados por meio de um loop while:
while ($registro = mysqli_fetch_array($resultado))

{

    $hoje = date('Y-m-d');

	

	$rnomedopaciente = $registro['nomedopaciente'];
	$rnomedamae = $registro['nomedamae'];
	$rprontuario = $registro['prontuario'];
	$rsexo = $registro['sexo'];
	$rprioridade = $registro['prioridade'];
	$rgrupo = $registro['grupo'];
	$rdiagnostico = $registro['diagnostico'];
	$rnomedomedico = $registro['nomedomedico'];
	$rstatus = $registro['status'];
	$rcns = $registro['cns'];
	$ridade = $registro['idade'];
	$rcadastrado = $registro['cadastrado'];
	$rdata = $registro['data'];
	$rremover = $registro['Remover'];
	$dif = strtotime($hoje) - strtotime($rdata);
	$rdiasnafila= ($dif/86400);
	$rriscocirurgico2 = $registro['riscocirurgico2'];
	$rcomprovantedoser = $registro['comprovantedoser'];
	$ravaliacaopreanestesica = $registro['avaliacaopreanestesica'];
	echo "<tr>";
	echo "<td><a href='checkpaciente.php?nomedopaciente=".$rnomedopaciente."&riscocirurgico2=".$rriscocirurgico2."&comprovantedoser=".$rcomprovantedoser."&avaliacaopreanestesica=".$ravaliacaopreanestesica."' style=\"text-decoration: none; color:4f6b72;\" onMouseOver=\"this.style.textDecoration='underline';\" onMouseOut=\"this.style.textDecoration='none';\">$rnomedopaciente</a></td>";
	//echo "<td>".$rnomedopaciente."</td>";
	echo "<td>".$rnomedamae."</td>";
	echo "<td>".$rprontuario."</td>";
	echo "<td>".$rsexo."</td>";
	echo "<td>".$rprioridade."</td>";
	echo "<td>".$rgrupo."</td>";
	echo "<td>".$rdiagnostico."</td>";
	echo "<td>".$rnomedomedico."</td>";
	if($rstatus == "Nao Apto"){
	echo "<td><span style=\"color:red;\">".$rstatus."</span></td>";}
	else{
	echo "<td><span style=\"color:green;\">".$rstatus."</span></td>";
	}
	echo "<td>".$rcns."</td>";
	echo "<td>".$ridade."</td>";
	echo "<td>".round($rdiasnafila)."</td>";
	echo "<td>".$rdata."</td>";
	echo "<td><a href='editar.php?nomedopaciente=".$rnomedopaciente."&nomedamae=".$rnomedamae."&prontuario=".$rprontuario."&sexo=".$rsexo."&prioridade=".$rprioridade."&grupo=".$rgrupo."&diagnostico=".$rdiagnostico."&nomedomedico=".$rnomedomedico."&status=".$rstatus."&cns=".$rcns."&idade=".$ridade."'><img src='imagens/editar2.png'/></a></td>";
	echo "<td><a href='apagar.php?nomedopaciente=".$rnomedopaciente."&nomedamae=".$rnomedamae."&prontuario=".$rprontuario."&sexo=".$rsexo."&prioridade=".$rprioridade."&grupo=".$rgrupo."&diagnostico=".$rdiagnostico."&nomedomedico=".$rnomedomedico."&status=".$rstatus."&cns=".$rcns."&idade=".$ridade."'><img src='imagens/concluido2.png'/></a></td>";
	echo "</tr>";

}
mysqli_close($strcon);
echo "</table>";

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
<center><a href="consulta1.php"><input type="button" value="Cadastrar Novo Paciente"></a>

<a href="listagem2.php"><input type="button" value="Visualizar Lista de Cirurgia Realizada"></a></center>
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
<!--<p><center>
<form action="<?php// echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="parametro" placeholder="Filtrar" />
<input type="submit" value="Ordenar" />
</form>
</p></center> -->

</body>
<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
</html>
