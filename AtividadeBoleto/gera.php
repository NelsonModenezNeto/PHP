<?php
/* Geração de arquivo CSV */
include("conexaoBD.php");

try {
    $stmt = $pdo->prepare("select * from bancadas order by idBancada");
    $stmt->execute();

    $fp = fopen('arquivoBancadas.csv', 'w');

    $colunasTitulo = array("idBancada", "local", "status", "apelido");

    fputcsv($fp, $colunasTitulo);

    while ($row = $stmt->fetch()) {
        $idBancada = $row["idBancada"];
        $local = $row["local"];
        $status = $row["status"];
        $apelido = $row["apelido"];

        $lista = array(
            array($idBancada, $local, $status, $apelido)
        );

        foreach ($lista as $linha) {
            fputcsv($fp, $linha);
        }
    }

    $msg = "Arquivo gerado: arquivoBancadas.csv";
    fclose($fp);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Bancadas em CSV</title>
</head>

<body>
    <h1>Listagem de Bancadas em CSV</h1>
    <?= $msg ?>
</body>

</html>
