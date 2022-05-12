<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lista de Clientes</title>
	</head>
	<body>

		<h1 style="margin-top: 10px;">Lista de Clientes</h1>
		<?php
			$sql = "SELECT * FROM cliente";

			$res = $conn->query($sql);

			$qtd = $res->num_rows; // Quantidade de linhas relicada na consulta anterior.

			if ($qtd > 0) {

				
				print "<table class='table table-striped table-hover table-bordered'>";
					print "<thead class='thead-dark bg-dark'>";
						print "<tr>";
						print "<th class='text-light' scope='col'>#</th>";
						print "<th class='text-light' scope='col'>Nome</th>";
						print "<th class='text-light' scope='col'>Telefone</th>";
						print "<th class='text-light' scope='col'>Email</th>";
						print "<th class='text-light' scope='col'>Opções</th>";
						print "</tr>";
					print "</thead>";
				while ($row = $res-> fetch_object()) { 
				//laço de repetição que transfere os dados da query para a variável $row
					print "<tr>";
					print "<td>".$row->idcliente."</td>";
					print "<td>".$row->nome."</td>";
					print "<td>".$row->telefone."</td>";
					print "<td>".$row->email."</td>";
					print "<td>
							<button onclick=\"location.href='?page=editar&idcliente=".$row->idcliente."';\" class='btn btn-warning'>Editar</button>

							<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&idcliente=".$row->idcliente."';}else{false;}\" class='btn btn-danger'>Excluir</button>
						   </td>";
					print "</tr>";
				}
				print "</table>";
			} else {
				print "<div class='alert alert-warning' role='alert'>Aviso: Não foi possível encontrar nenhum registro</div>";
			}
		?>


	</body>
</html>