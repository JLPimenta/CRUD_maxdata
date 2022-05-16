<?php
switch ($_REQUEST['acao']) {
	case 'cadastrar':
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$cidade = $_POST['cidade'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$ativo = $_POST['ativo'];

		$sql = "INSERT INTO cliente (nome, cpf, idcidade, telefone, email, ativo) 
				VALUES ('{$nome}', '{$cpf}', '{$cidade}', '{$telefone}', '{$email}', '{$ativo}')";

		$res = $conn -> query($sql);

		if ($res == true){
			print "<script>alert('Cadastro realizado com sucesso');</script>";
			print "<script>location.href='?page=listar';</script>";

		} else {
			print "<script>alert('Não foi possível realizar o cadastro');</script>";
			print "<script>location.href='?page=listar';</script>";
		}
		break;
	
	case 'editar':
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$cidade = $_POST['cidade'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$ativo = $_POST['ativo'];

		$sql = "UPDATE cliente SET 
					nome='{$nome}',
					cpf='{$cpf}',
					idcidade='{$cidade}',
					telefone='{$telefone}',
					email='{$email}',
					ativo='{$ativo}'
				WHERE idcliente=".$_REQUEST['idcliente'];

		$res = $conn -> query($sql);

		if ($res == true){
			print "<script>alert('Cadastro editado com sucesso');</script>";
			print "<script>location.href='?page=listar';</script>";;

		} else {
			print "<script>alert('Não foi possível editar o cadastro');</script>";
			print "<script>location.href='?page=listar';</script>";
		}
		break;

	case 'excluir':

		$sql = "DELETE FROM cliente WHERE idcliente=".$_REQUEST['idcliente'];

		$res = $conn -> query($sql);

		if ($res == true){
			print "<script>alert('Cadastro excluído com sucesso');</script>";
			print "<script>location.href='?page=listar';</script>";

		} else {
			print "<script>alert('Não foi possível excluir o cadastro');</script>";
			print "<script>location.href='?page=listar';</script>";
		}

		break;
}
 ?>