
<?php

include("bd.php");

if (!isset($_POST["codigoPrato"])) {
    
} else {
    $codigo = $_POST["codigoPrato"];
    excluir($codigo);
}

?>