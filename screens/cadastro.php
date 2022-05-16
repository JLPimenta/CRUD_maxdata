<?php
	include_once("../components/config.php"); //incluir conexão BD
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>


  	<title>Cadastro de Clientes</title>
  	<meta http-equiv="X-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta charset="utf-8">

  	<link href="../css/bootstrap.min.css" rel="stylesheet">

  </head>
 	<body>
 		<div class="container" style="max-width: 50%;">
	 		

			<form action="?page=salvar" method="POST">
				<?php 
					$update = false;

					if(isset($_GET['idcliente'])){

						$acao='editar';
						$id = $_GET['idcliente'];
						$update = true;
						$sql = "SELECT cliente.*, cidade.idcidade,estado.uf FROM cliente 
											INNER JOIN cidade ON cidade.idcidade = cliente.idcidade
    									INNER JOIN estado ON estado.idestado = cidade.idestado
    								WHERE idcliente =$id";
						$res = $conn->query($sql);
						$row = $res->fetch_object();

						//print_r($row);
				
					} else {
						$acao='cadastrar';
					}
				?>
				<input type="hidden" name="acao" value="<?php echo $acao ?>">


				<?php 
				if ($update == true):
				?>
					<h1  name="editarCli" style="margin-top: 10px;">Editar Cliente</h1>
					<input type="hidden" name="idcliente" value="<?php echo $row->idcliente ?>">
				<?php else: ?>
					<h1 name="novoCli" style="margin-top: 10px;">Novo Cliente</h1>
				<?php endif; ?>

					<div class="mb-3">
						<label>Nome</label>
						<input type="text" name="nome" class="form-control" value="<?php if(isset($row->nome)){ echo $row->nome; } else { echo "";} ?>" required>
					</div>

					<div class="mb-3">
						<label>CPF</label>
						<input type="text" name="cpf" id="cpf" class="form-control" placeholder="Ex: 000.000.000-00" value="<?php if(isset($row->cpf)){ echo $row->cpf; } else { echo "";} ?>" required>
					</div><br>

					<div style="display: inline;">
						<div class="mb-3" style="display: flex; justify-content: space-between; flex-direction: row;"> 
							<select class="btn btn-secondary btn-sm dropdown mb-3"name="estado" id="selecionarUF" required>
								<option value="">-UF-</option>
									<?php include_once "../components/retorna_estado.php" ?>
							</select>

							<select  style="margin-left: 10px" class="form-select mb-3" name="cidade" id="selecionarCidade" required>
										'<option value="">--Selecione a Cidade--</option>';
							</select>
						</div>
					</div>

					<div class="mb-3">
						<label>Telefone</label>
						<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Ex: (00) 00000-0000"  value="<?php if(isset($row->telefone)){ echo $row->telefone; } else { echo "";} ?>" required>
					</div>

					<div class="mb-3">
						<label>E-mail</label>
						<input type="email" name="email" class="form-control" placeholder="janedoe@example.com" value="<?php if(isset($row->email)){ echo $row->email; } else { echo "";} ?>" required>
					</div>

					<div style="display: inline;">
						<label>Ativo</label>
						<div class="mb-3" style="width: 100%; display: flex; justify-content: space-between; flex-direction: row; margin-right: 5px;">
							<select  name="ativo" style="width: 20%" class="form-select form-select-sm" aria-label=".form-select-sm example" value="<?php if(isset($row->ativo)){ echo $row->ativo; } else { echo "";} ?>" required>
							  <option value="1">Sim</option>
							  <option value="0">Não</option>
							</select>
							<button class='btn btn-secondary' type='submit'>Enviar</button>	
						</div>
					</div>
			</form>
		</div>






		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="../js/jquery.mask.js"></script>

		<script name="mascaras">
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

		</script>

		<script type="text/javascript">
			$(function(){
				$('#selecionarUF').change(function(){
					if( $(this).val() ) {
						$('#selecionarCidade').hide();
						$.getJSON('../components/connect_UF.php?search=', {selecionarUF: $(this).val(), ajax: 'true'}, function(j) {
								var options = '<option value="">--Selecione a Cidade--</option>';
								for (var i = 0; i < j.length; i++) {
									options += '<option value="' + j[i].id + '">' + j[i].cidade + '</options>';
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