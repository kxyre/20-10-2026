<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe comprador (bean)
    $comprador = new comprador();

    // Definir os valores dos atributos a partir do form
    $comprador->setNome($_POST['nome']);
    $comprador->setCpf($_POST['cpf']);

    // Instanciar um objeto da classe compradorDAO
    $dao = new CompradorDAO();

    // Invocar o método create
    $dao->create($comprador);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');