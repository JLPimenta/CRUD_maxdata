<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <title>Tela de Login</title>
</head>
<body style='overflow-x: hidden; overflow-y: hidden;'>
    <?php
        if (isset($_SESSION['mensagem'])) { //Caso exista a global
            echo $_SESSION['mensagem']; // retornar mensagem
            unset($_SESSION['mensagem']); // destruir a mensagem
        }
    ?>
    <form method="POST" action="../components/validacao.php">
            <section class="vh-100 gradient-custom">
              <div class="container py-4 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                      <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                          <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                          <p class="text-white-50 mb-5">Por favor, preencha com o seu login e senha</p>

                          <div class="form-outline form-white mb-4">
                            <input type="text" name="usuario" id="typeUser" class="form-control form-control-lg" placeholder="Usuário">
                          </div>

                          <div class="form-outline form-white mb-4">
                            <input type="password" name="senha" id="typePasswordX" class="form-control form-control-lg" placeholder="Senha"><br>
                          </div>

                          <button class="btn btn-outline-light btn-lg px-5" name="btnLogin" type="submit" value="Acessar">Acessar</button>

                        </div>

                        <div>
                          <p class="mb-0">Processo seletivo Maxdata</p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
    </form>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>