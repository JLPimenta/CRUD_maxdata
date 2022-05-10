<?php
session_start();
include("config.php"); // Arquivo de conexão BD
$btnLogin = filter_input (INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING); 
// 'FILTER_SANITIZE_STRING' Remove tags e codifica aspas duplas e simples no estilo HTML, opcionalmente remove ou codifica caracteres HTML especiais.

//clicou no botão
if($btnLogin) {
	$usuario = filter_input (INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	// echo "$usuario - $senha";
	if ((!empty($usuario)) AND (!empty($senha))) { // DIFERENTE de vazio
		// Gerar senha com criptografia
		// echo password_hash($senha, PASSWORD_DEFAULT); //retornar o usuário/senha criptografados

		// Buscar usuário no BD
		$consultar_usuario = "SELECT idusuario, nome, senha FROM usuario WHERE nome='$usuario' LIMIT 1";
		// comparar na database se há algum usuário com as credenciais incluídas na tela de login
		$retornar_usuario = MySQLi_query($conn, $consultar_usuario);
		if($retornar_usuario) {
			$row_usuario = MySQLi_fetch_assoc($retornar_usuario); // ler o resultado da query
			if(password_verify($senha, $row_usuario['senha'])){
				// Atribuir todos os valores retornados do BD em variáveis globais
				$_SESSION['idusuario'] = $row_usuario['idusuario'];
				$_SESSION['nome'] = $row_usuario['nome'];
				header("Location: ../screens/index.php"); //Redirecionar para o Menu Principal

			} else {
				$_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'>Login ou senha incorretos!</div>";
				header('Location: ../screens/login.php');

				$_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'>Login ou senha incorretos!</div>";;
				header('Location: ../screens/login.php');
			}
		}
	} else {
		$_SESSION['mensagem'] = "<div class='alert alert-danger' role='alert'>Login ou senha incorretos!</div>";;
		header('Location: ../screens/login.php');
		
	}

} else {
	$_SESSION['mensagem'] = "<div class='alert alert-warning' role='alert'>Página não encontrada!</div>";
	header('Location: ../screens/login.php');
}