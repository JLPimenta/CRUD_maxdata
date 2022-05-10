<?php
	include_once("../components/config.php") //incluir conexão BD
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  	<title>Cadastro de Clientes</title>
  	<meta charset="utf-8">
  </head>
 	<body>
 		<h1 style="margin-top: 10px;">Novo Cliente</h1>
		<form>
			<div class="mb-3">
				<label>Nome</label>
				<input type="text" name="nome" class="form-control">
			</div>
			<div class="mb-3">
				<label>CPF</label>
				<input type="text" name="cpf" class="form-control">
			</div>

			<div class="mb-3"> 
				<select class="btn btn-secondary btn-sm dropdown-toggle" name="estado" id="selecionarUF">
					<option value="">UF</option>
					<?php
						$consultar_estado = "SELECT * FROM estado ORDER BY nome"; //variável que busca registros de estado no BD
						$retornar_estado = MySQLi_query($conn, $consultar_estado); //variável para retornar informações do BD
						while ($row_estado = MySQLi_fetch_assoc($retornar_estado)) {
							echo '<option value="'.$row_estado['idestado'].'">'.$row_estado['uf'].'</option>';
						}
					?>
				</select>

			<select class="btn btn-secondary btn-sm dropdown-toggle" name="cidade" id="selecionarCidade">
				<option value="">--Selecione a Cidade--</option>
			</select>

			</div>

			<div class="mb-3">
				<label>Telefone</label>
				<input type="text" name="telefone" class="form-control">
			</div>
		</form>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript">
  			google.load("jquery", "1.4.2");
		</script>

		<script type="text/javascript">
			$(function(){
				$('#selecionarUF').change(function(){
					if( $(this).val() ) {
						$('#selecionarCidade').hide();
						$.getJSON('connect_UF.php?search=', {selecionarUF: $(this).val(), ajax: 'true'}, function(j) {
								var options = '<option value="">--Selecione a Cidade--</option>';
								for (var i = 0; i < j.length; i++) {
									options += '<option value="' + j[i].id + '">' + j[i].nome + '</options>';
								}
								$('#selecionarCidade').html(options).show();	
						});
					} else {
						$('#selecionarCidade').html('<option value="">--Selecione a Cidade--</option>');
					}
				});
			});
		</script>
	</body>