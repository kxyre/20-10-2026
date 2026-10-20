<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe comprador (bean)
    $comprador = new formaPagamento();

    // Definir os valores dos atributos a partir dos dados do form
    $comprador->setNome($_POST['nome']);
    $comprador->setCpf($_POST['cpf']);

    // Instanciar um objeto da classe compradorDAO
    $dao = new formaPagamentoDAO();

    // Invocar o método update da classe compradorDAO
    $dao->update($formaPagamento);

    // Redirecionar para o index
    header('Location: index.php');