<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe comprador (bean)
    $comprador = new comprador();

    // Definir os valores dos atributos a partir dos dados do form
    $comprador->setNome($_POST['nome']);
    $comprador->setCpf($_POST['cpf']);

    // Instanciar um objeto da classe compradorDAO
    $dao = new CompradorDAO();

    // Invocar o método update da classe compradorDAO
    $dao->update($comprador);

    // Redirecionar para o index
    header('Location: index.php');