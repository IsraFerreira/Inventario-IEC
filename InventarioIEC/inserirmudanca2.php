<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$senha = "9L@d@$9";
$dbname = "estoque";

//criar a conexão
$conn7 = mysqli_connect($servidor, $usuario, $senha, $dbname);


$id = $_POST['id2'];
$nome = $_POST['nome2'];
$quantidadeanterior = $_POST['quantidade2'];
$quantidaderet = $_POST['quantidaderet'];
$quantidadeacr = $_POST['quantidadeacr'];
$chamado = $_POST['chamado2'];
$setor = $_POST['setor2'];
$preco = $_POST['preco2'];


$servidor = "localhost";
$usuario = "root";
$senha = "9L@d@$9";
$dbname = "estoque";

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Produto Retirado/Acrescentado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

if($quantidadeacr == 0){
$quantidade = ($quantidadeanterior - $quantidaderet);
$mensagem = "Produto Retirado";
$inserirmudanca = "INSERT INTO produtosretirada(ID, nome, quantidaderet, quantidadetotal, chamado, setor, ip, hora, mensagem, preco) VALUES ('$id', '$nome', '$quantidaderet', '$quantidade', '$chamado', '$setor', '$ip', '$hora', '$mensagem', '$preco')";
$inserirmudanca2 = mysqli_query($conn7, $inserirmudanca);}
else{
$quantidade = ($quantidadeanterior + $quantidadeacr);
$mensagem = "Produto Acrescentado";
$inserirmudanca3 = "INSERT INTO produtosretirada(ID, nome, quantidadeacr, quantidadetotal, chamado, setor, ip, hora, mensagem, preco) VALUES ('$id', '$nome', '$quantidadeacr', '$quantidade', '$chamado', '$setor', '$ip', '$hora', '$mensagem', '$preco')";
$inserirmudanca4 = mysqli_query($conn7, $inserirmudanca3);}



$atualizapaciente = "UPDATE produtos SET ID = '$id', nome = '$nome', quantidade = '$quantidade' WHERE ID='$id'";
//$atualizapaciente = "UPDATE dadospaciente SET nomedopaciente = '$nomedopaciente', nomedamae = '$nomedamae', prontuario = '$prontuario', sexo = '$sexo', prioridade = '$prioridade', grupo = '$grupo', diagnostico = '$diagnostico', nomedomedico = '$nomedomedico', status = '$status', contatos = '$contatos', data = '$data' WHERE nomedopaciente='$nomedopaciente'";
$atualizpaciente = mysqli_query($conn7, $atualizapaciente)


//<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
?>

<?php
header("Location:visualizarlog2.php");
?>