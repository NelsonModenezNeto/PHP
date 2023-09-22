<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    <div class="container-fluid">

        <div class="row" style="height: 100vh;">
            <div class="col-5 text-center text-white d-flex align-items-center justify-content-center"
                style="background-color: #FF5E1E">
                <div class="text-center mb-5">
                    <h1 class="display-8">EDIÇÃO DE PRATOS</h1>
                    <h4 class="display-8">EDITE SEUS PRATOS E GERENCIE ELES</h4>
                </div>
            </div>
            <div class="col-7">
                <h2>Edição de Pratos</h2>
                <div>
                    <!-- form com enctype para indicar que serão enviados dados em binário além de texto -->


                    <?php
                    include("bd.php");

                    if (!isset($_POST["codigoPrato"])) {
                        echo "Selecione o prato a ser editado!";
                    } else {
                        $codigo = $_POST["codigoPrato"];

                        try {
                            $stmt = buscarEdicao($codigo);

                            while ($row = $stmt->fetch()) {
                                echo "<form method='post' action='altera.php'>\n
                    Codigo:<br>\n
                    <input type='text' size='10' name='codigo' value='$row[codigo]' readonly><br><br>\n
                    Nome:<br>\n
                    <input type='text' size='30' name='nome' value='$row[nome]'><br><br>\n
                    Preco:<br>\n
                    <input type='text' size='30' name='preco' value='$row[preco]'><br><br>\n       
                    <input type='submit' value='Salvar Alterações'>\n        
                    <hr>\n
                    </form>";
                            }

                        } catch (PDOException $e) {
                            echo 'Error: ' . $e->getMessage();
                        }
                    }
                    ?>
                </div>
            </div>