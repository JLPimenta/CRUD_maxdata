<?php
session_start();
unset($_SESSION['idusuario'], $_SESSION['nome']);

$_SESSION['mensagem'] = "<div class='alert alert-success' role='alert'>Sessão encerrada com sucesso!</div>";
header("Location: ../screens/login.php");
?>