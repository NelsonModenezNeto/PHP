<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.html">Home</a> | <a href="consulta.php">Consultar</a>
    <hr>
    <h2>Exclusão de Alunos</h2>
</body>

</html>
<?php
if (!isset($_POST["raAluno"])) {
    echo "Selecionar o aluno a ser excluido!";
} else {
    $ra = $_POST["raAluno"];
    try {
        include("conexaoBD.php");
        $stmt = $pdo->prepare('DELETE FROM alunos WHERE ra = :ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        echo $stmt->rowCOunt() . "aluno de RA $ra foi removido";
    } catch (PDOException $e) {
        echo "Erro" . $e->getMessage();
    }
}
?>