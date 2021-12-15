<?php
session_start();
include_once('conexaoapagar.php');
include_once('con.php');

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
//$visita = mysql_escape_string($visita);
$visita = "Produto Removido";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', NULL, '$visita')";
$log2 = mysqli_query($conn, $log);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
//echo $nomedamae;
$quantidade = filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_STRING);
$result_paciente = "DELETE FROM produtos WHERE nome='$nome'";
$resultado_paciente = mysqli_query($conn2, $result_paciente);


//<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
?>
