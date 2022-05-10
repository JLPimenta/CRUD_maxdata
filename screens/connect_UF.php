<?php
	include_once("config.php");
	
	$id_uf = $_REQUEST['selecionarUF'];
	$consultar_cidade = "SELECT * FROM cidade WHERE idestado='$id_uf' ORDER BY nome";
	$retornar_cidade = MySQLi_query($conn, $consultar_cidade);

	while ($row_cidade = MySQLi_fetch_assoc($retornar_cidade)) {
		$connect_UF[] = array(
			'idcidade' => $row_cidade['idcidade'],
			'nome' => utf8_encode($row_cidade['nome']),
		);
	}

	echo(json_encode($connect_UF));