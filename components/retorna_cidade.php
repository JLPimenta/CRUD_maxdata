<?php  
include_once("config.php");

retorna($cidade, $conn){
	$consultar_cidade = "SELECT cidade.idcidade,estado.uf FROM cliente 
							INNER JOIN cidade ON cidade.idcidade = cliente.idcidade
    						INNER JOIN estado ON estado.idestado = cidade.idestado
    						WHERE idcliente ='$id'";

}

if (isset($_GET['cidade'])) {
	echo retorna($_GET['cidade'], $conn);
}

?>