<?php
## Criar base de dados
## Definir conexões com a database
	define('HOST', 'localhost'); ## Definição de nomes / HOST BD
	define('USER', 'root'); ## Definir Usuário
	define('PASS', ''); ## Definir Senha
	define('BASE', 'bd_crud');

	$conn = new MySQLi(HOST, USER, PASS, BASE); #variável de conexão
?>