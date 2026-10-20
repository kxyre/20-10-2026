<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe formaPagamento (bean)
    $formaPagamento = new formaPagamento();

    // Definir os valores dos atributos a partir do form
    $formaPagamento->setId($_POST['idformaPagamento']);
    $formaPagamento->setDescricao($_POST['descricao']);

    // Instanciar um objeto da classe formaPagamentoDAO
    $dao = new formaPagamentoDAO();

    // Invocar o método create
    $dao->create($formaPagamento);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');