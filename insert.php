<?php
    require "../../autoload.php";

    $quarto = new Quarto();

    $quarto->setNumero($_POST['numero']);
    $quarto->setTipo($_POST['tipo']);
    $quarto->setPreco($_POST['preco']);
    $quarto->setDisponivel($_POST['disponivel']);

    $dao = new QuartoDAO();
    $dao->create($quarto);
    header('Location: index.php');