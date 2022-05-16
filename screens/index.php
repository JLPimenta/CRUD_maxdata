<?php
  session_start();
  if(!empty($_SESSION['idusuario'])){ 
  // Ao realizar login, caso o ID do usuário seja diferente de '', a sessão é estabelecida
 // botão de sair (finalizar sessão)
  } else {
    $_SESSION['mensagem'] = "<div class='alert alert-warning' role='alert'>Realize log-in para acessar a página</div>";
    header("Location: ../screens/login.php");
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">



    <title>Cadastro</title>
  </head>
  <body style='overflow-x: hidden; overflow-y: hidden;'>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid">
        <a style="font-weight: bolder;" class="navbar-brand text-light bg-dark" href="index.php">CRUD Maxdata</a>
        <button class="navbar-toggler ms-auto mb02 mb-lg-0" style="border-color: white; " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar"><i style="color: white;" class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" style="width: 100%; display: flex; justify-content: right; flex-direction: row; margin-right: 5px;">
            <li class="nav-item">
              <a style="padding-right: 15px; margin-top: 5px;" class="nav-link active text-light" aria-current="page" href="index.php">Lista de Clientes</a>
            </li>
            <li class="nav-item">
              <a style="padding-right: 15px; margin-top: 5px;" class="nav-link text-light" href="?page=novo">Novo Cliente</a>
            </li>
            <li style="margin-left: 15px; margin-top: 5px;" class="nav-item">
              <button class="btn btn-light pull-right" type="button">
                <a style="text-decoration: none; color: black; font-weight: bold;" href='../components/sair.php'>Sair</a>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row">
        
        <div class ="col mt=5">
          <?php
              include("../components/config.php"); // Arquivo de conexão com o BD
              switch (@$_REQUEST["page"]){ // '@' para inibir o erro da request
                case "novo":
                  include ("cadastro.php");
                break;
                case "listar":
                  include ("lista.php");
                break;
                case "salvar":
                  include ("../assets/salvar-cliente.php");
                break;
                case "editar":
                  include ("cadastro.php");
                break;
                default:
                  include_once "lista.php";
            
              }
          ?>
        </div>
      </div>
      

    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>

    
  </body>
</html>