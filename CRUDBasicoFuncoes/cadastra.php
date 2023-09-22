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
                    <h1 class="display-8">CADASTRO DE PRATOS</h1>
                    <h4 class="display-8">CADASTRE SEUS PRATOS E GERENCIE ELES</h4>
                </div>
            </div>
            <div class="col-7">
                <h2>Cadastro de Pratos</h2>
                <div>

                    <!-- form com enctype para indicar que serão enviados dados em binário além de texto -->
                    <form method="POST" enctype="multipart/form-data">


                        Código:<br>
                        <input type="text" size="10" name="codigo"><br><br>

                        Nome:<br>
                        <input type="text" size="30" name="nome"><br><br>

                        Preço:<br>
                        <input type="text" size="30" name="preco"><br><br>

                        Foto:<br>
                        <input type="file" name="foto" accept="image/*"><br><br>

                        <input type="submit" class="btn btn-dark" value="Cadastrar">
                        <button type="button" class="btn btn-dark"><a href="index.html">Home</a></button>
                        <?php
                        include("bd.php");

                        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                            define('MAX_SIZE', (2 * 1024 * 1024));
                            $codigo = $_POST["codigo"];
                            $nome = $_POST["nome"];
                            $preco = $_POST["preco"];
                            $foto = $_FILES["foto"];

                            $image_nome = $foto["name"];
                            $image_tmp = $foto["tmp_name"];
                            $image_tamanho = $foto["size"];

                            if ($image_tamanho < MAX_SIZE) {
                                if ((trim($codigo) == "") || (trim($nome) == "")) {
                                    echo "<span id='warning'>Código e nome são obrigatórios!</span>";
                                } else {
                                    cadastrar($codigo, $nome, $preco, $image_tmp);
                                }
                            }
                        }
                        ?>

                        <hr>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>