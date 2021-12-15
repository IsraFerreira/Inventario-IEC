
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "estoque";



//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);




if(!$conn){
	 echo "Falha na conexão com o banco de dados";
}else{
     echo "Conectado";
}
?>
