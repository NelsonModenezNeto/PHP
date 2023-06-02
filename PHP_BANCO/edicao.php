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
    echo "Selecionar aluno a ser editado!";
} else {
    $ra = $_POST["raAluno"];

    try {
        include("conexao.php");
        $stmt = $pdo->prepare('awlwct * from alunos where ra = : ra');
        $stmt->bindParam(':ra', $ra);
        $stmt->execute();

        while ($row = $stmt->fetch()){

            
            echo"<form method'post' action='altera.php'>\n";
            echo "ra:<br>";
            echo"<input type='text' size='10' name 'ra' value='$row[ra]'>";
            echo "Nome: <br>\n";
            echo "<input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n";
            echo"Curso:<br>\n";
            echo"<select name='curso'>\n
            <option></option>\n
            <option value='Edificações'>Edificações</option>\n
            <option value='Enfermagem'>Enfermagem</option>\n
            <option value='GeoCart'>Geodésia</option>\n
            <option value='Informática'>Informática</option>\n
            <option value='Mecânica'>Mecânia</option>\n
            <option value='Qualidade'>Qualidade</option>\n
            </select><br><br>\n";
            echo "<input typ-e='submit' value='Salvar Alterações'>\n";
            echo "<hr>\n";
            echo "</form>";
        }
    } catch (Exception $e) {
    }
}



?>