<?php
session_start();
include_once('con1.php');

//criar a conexão
$conn7 = mysqli_connect($servidor, $usuario, $senha, $dbname);


$id = $_POST['id2'];
$nome = $_POST['nome2'];
$quantidade = $_POST['quantidade2'];
$preco = $_POST['preco2'];




//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
//$visita = mysql_escape_string($visita);
$visita = "Produto Atualizado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$atualizapaciente = "UPDATE produtos SET ID = '$id', nome = '$nome', quantidade = '$quantidade', preco = '$preco' WHERE id='$id'";
//$atualizapaciente = "UPDATE dadospaciente SET nomedopaciente = '$nomedopaciente', nomedamae = '$nomedamae', prontuario = '$prontuario', sexo = '$sexo', prioridade = '$prioridade', grupo = '$grupo', diagnostico = '$diagnostico', nomedomedico = '$nomedomedico', status = '$status', contatos = '$contatos', data = '$data' WHERE nomedopaciente='$nomedopaciente'";
$atualizpaciente = mysqli_query($conn, $atualizapaciente)


//<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
?>

<?php
header("Location:visualizar.php?pagina=1");
?>