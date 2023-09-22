

<?php

    include("bd.php");

    $codigo = $_POST['codigo'];
    $novoNome = $_POST['nome'];
    $novoPreco = $_POST['preco'];

    alterar($codigo, $novoNome, $novoPreco,);

?>