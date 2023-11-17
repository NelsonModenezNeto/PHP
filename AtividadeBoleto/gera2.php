<?php
/* Geração de arquivo CSV */
include("conexaoBD.php");

try {
    $stmt = $pdo->prepare("select * from patrimonios order by idPatrimonio");
    $stmt->execute();

    $fp = fopen('arquivoPatrimonio.csv', 'w');

    $colunasTitulo = array("idPatrimonio", "marca", "modelo", "tipo");

    fputcsv($fp, $colunasTitulo);

    while ($row = $stmt->fetch()) {
        $idPatrimonio = $row["idPatrimonio"];
        $marca = $row["marca"];
        $modelo = $row["modelo"];
        $tipo = $row["tipo"];

        $lista = array(
            array($idPatrimonio, $marca, $modelo, $tipo)
        );

        foreach ($lista as $linha) {
            fputcsv($fp, $linha);
        }
    }

    $msg = "Arquivo gerado: arquivoPatrimonio.csv";
    fclose($fp);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Patrimônios em CSV</title>
</head>

<body>
    <h1>Listagem de Patrimônios em CSV</h1>
    <?= $msg ?>
</body>

</html>
