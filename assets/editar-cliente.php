<!DOCTYPE html>
<html lang="pt-br">
  <head>

  	<title>Editar de Clientes</title>
  	<meta http-equiv="X-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta charset="utf-8">

  	<link href="../css/bootstrap.min.css" rel="stylesheet">

  </head>
 	<body>
 		<div class="container" style="max-width: 50%;">
	 		<h1 style="margin-top: 10px;">Editar Cliente</h1>
	 		<?php
				$sql = "SELECT * FROM cliente WHERE idcliente=".$_REQUEST["idcliente"];
				$res = $conn->query($sql);
				$row = $res->fetch_object();
			?>
			<form action="?page=salvar" method="POST">
				<input type="hidden" name="acao" value="editar">
				<input type="hidden" name="idcliente" value="<?php print $row->idcliente ?>">

					<div class="mb-3">
						<label>Nome</label>
						<input type="text" name="nome" class="form-control" value="<?php print $row->nome; ?>" required>
					</div>

					<div class="mb-3">
						<label>CPF</label>
						<input type="text" name="cpf" id="cpf" class="form-control" placeholder="Ex: 000.000.000-00" value="<?php print $row->cpf; ?>" required>
					</div><br>

					<div style="display: inline;">
						<div class="mb-3" style="display: flex; justify-content: space-between; flex-direction: row;"> 
							<select class="btn btn-secondary btn-sm dropdown mb-3"name="estado" id="selecionarUF" required>
								<option value="">-UF-</option>
								<?php
									$consultar_estado = "SELECT * FROM estado ORDER BY nome"; //variável que busca registros de estado no BD
									$retornar_estado = MySQLi_query($conn, $consultar_estado); //variável para retornar informações do BD
									while ($row_estado = MySQLi_fetch_assoc($retornar_estado)) {
										echo '<option value="'.$row_estado['idestado'].'">'.$row_estado['uf'].'</option>';
									}
								?>
							</select>
							<select  style="margin-left: 10px" class="form-select mb-3" name="cidade" id="selecionarCidade" required>
								<option value="">--Selecione a Cidade--</option>
							</select>
						</div>
					</div>

					<div class="mb-3">
						<label>Telefone</label>
						<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Ex: (00) 00000-0000" value="<?php print $row->telefone; ?>" required>
					</div>

					<div class="mb-3">
						<label>E-mail</label>
						<input type="email" name="email" class="form-control" placeholder="janedoe@example.com" value="<?php print $row->email; ?>" required>
					</div>

					<div style="display: inline;">
						<label>Ativo</label>
						<div class="mb-3" style="width: 100%; display: flex; justify-content: space-between; flex-direction: row; margin-right: 5px;">
							<select  name="ativo" style="width: 20%" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
							  <option value="1">Sim</option>
							  <option value="0">Não</option>
							</select>
							<button class="btn btn-secondary" type="submit">Enviar</button>
						</div>
					</div>
			</form>
		</div>






		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="../js/jquery.mask.js"></script>

		<script>
			$(document).ready(function() {
				 $('#cpf').mask('000.000.000-00', {reverse: true}); 
				 // Formatação de máscara no input CPF via plugin jQuery

			var SPMaskBehavior = function (val) {
			  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
			},
			spOptions = {
			  onKeyPress: function(val, e, field, options) {
			      field.mask(SPMaskBehavior.apply({}, arguments), options);
			    }
			};

			$('#telefone').mask(SPMaskBehavior, spOptions); // Formatação de máscara para número via plugin jQuery

			});
		</script>

		<script type="text/javascript">
			$(function(){
				$('#selecionarUF').change(function(){
					if( $(this).val() ) {
						$('#selecionarCidade').hide();
						$.getJSON('../components/connect_UF.php?search=', {selecionarUF: $(this).val(), ajax: 'true'}, function(j) {
								var options = '<option value="">--Selecione a Cidade--</option>';
								console.log(j);
								for (var i = 0; i < j.length; i++) {
									options += '<option value="' + j[i].cidade + '">' + j[i].cidade + '</options>';
								}
								$('#selecionarCidade').show().html(options);	
						});
					} else {
						$('#selecionarCidade').html('<option value="">--Selecione a Cidade--</option>');
					}
				});
			});
		</script>
	</body>