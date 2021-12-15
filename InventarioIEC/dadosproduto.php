<?php
//pegando dados do input

include_once('confirmacao.php');

//$login = $_POST['login'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$chamado = 0;

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);	
$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
//$visita = mysql_escape_string($visita);
$visita = "Produto adicionado";


// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(hora, ip, usuario, visita) VALUES ('$hora', '$ip', '$login', '$visita')";
$log2 = mysqli_query($conn, $log);

$dadospaciente = "INSERT INTO produtos(nome, quantidade, chamado, preco) VALUES ('$nome', '$quantidade', '$chamado', '$preco')";
$dadopaciente = mysqli_query($conn, $dadospaciente);

//<!-- Feito por: Israel Ferreira Nonato da Silva, venda ou troca sem passar pelo mesmo será vista como crime de plágio. -->
?>