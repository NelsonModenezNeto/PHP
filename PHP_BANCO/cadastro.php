<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>

    <style>
        #sucess {
            color: green;
            font-weight: bold;
        }

        #error {
            color: red;
            font-weight: bold;
        }

        #warning {
            color: orange;
            font-weight: bold;
        }

    </style>

</head>

<body>

<a href="index.html">Home</a>
<hr>

<h2>Cadastro de Alunos</h2>
<div>
    <form method="post">

        RA:<br>
        <input type="text" size="10" name="ra"><br><br>

        Nome:<br>
        <input type="text" size="30" name="nome"><br><br>

        Curso:<br>
        <select name="curso">
            <option></option>
            <option value="Edificações">Edificações</option>
            <option value="Enfermagem">Enfermagem</option>
            <option value="GeoCart">Geodésia e Cartografia</option>
            <option value="Informática">Informática</option>
            <option value="Mecânica">Mecânica</option>
            <option value="Qualidade">Qualidade</option>
        </select><br><br>

        <input type="submit" value="Cadastrar">

        <hr>

    </form>
</div>

</body>
</html>

<?php  if($_SERVER["REQUEST_METHOD"]){
    try{
        $ra = '';
        $nome = '';
        $curso = '';
        if ((trim($ra)== "") || (trim($nome) == "")){
            echo "<span id='warning'>RA e nome são obrigátorios!</span?";
        }else{
            include("conexao.php");

            $stmt = $pdo -> prepare("Select * from alunos_php where ra = :ra");
            $stmt -> bindParam(':ra, $ra');
            $stmt -> execute();

            $rows = $stmt -> rowCont();

            if(rwos <= 0){
                $stmt = $pdo -> prepare("insert into alunos_php (ra, nome, curso) values(:ra, :nome, :curso)");
                $stm = bindParam(':ra', $ra);
                $stm = bindParam(':nome', $ra);
                $stm = bindParam(':curso', $ra);

            }
        }

    } 
    catch(PDOException $e){
        $output  = 'Impossível conectar com BD :' . $e . '<br>';
        echo $output;
    }

}
?>
   
