<?php
//pegando dados do input

include_once('conexao2.php');
$nomedopaciente2 = $_POST['nomedopaciente2'];
$nomedamae2 = $_POST['nomedamae2'];
$prontuario2 = $_POST['prontuario2'];
$sexo2 = $_POST['sexo2'];
$prioridade2 = $_POST['prioridade2'];
$grupo2 = $_POST['grupo2'];
$diagnostico2 = $_POST['diagnostico2'];
$nomedomedico2 = $_POST['nomedomedico2'];
$status2 = $_POST['status2'];
$cns2 = $_POST['cns2'];
$idade2 = $_POST['idade2'];
$remocao2 = $_POST ['remocao2'];
$remocao3 = $_POST ['remocao3'];
$cadastrado2 = $_POST['cadastrado'];
$data2 = $_POST['data'];
//echo "Nome do Paciente: ".$nomedopaciente2."<br />";
//echo "Nome da mãe: ".$nomedamae."<br />";
//echo "Prontuario: ".$prontuario."<br />";
$servidor = "localhost";
$usuario = "root";
$senha = "9L@d@$9";
$dbname = "cadastrodepacientes";

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$visita = mysql_escape_string($visita);
$visita = "Paciente adicionado na lista de realizados";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$pacienteremovido = "INSERT INTO pacienteremovido(nomedopaciente, nomedamae, prontuario, sexo, prioridade, grupo, diagnostico, nomedomedico, status, cns, idade, motivoderemocao, outromotivo, cadastrado, data) VALUES ('$nomedopaciente2', '$nomedamae2', '$prontuario2', '$sexo2', '$prioridade2', '$grupo2', '$diagnostico2', '$nomedomedico2', '$status2', '$cns2', '$idade2', '$remocao2', '$remocao3', NOW(), NOW())";
$pacientremovido = mysqli_query($conn3, $pacienteremovido)

//<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->

?>
