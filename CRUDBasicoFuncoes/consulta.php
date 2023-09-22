<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de Pratos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">

        <div class="row" style="height: 100vh;">
            <div class="col-5 text-center text-white d-flex align-items-center justify-content-center"
                style="background-color: #FF5E1E">
                <div class="text-center mb-5">
                    <h1 class="display-8">CONSULTA DE PRATOS</h1>
                    <h4 class="display-8">CONSULTE SEUS PRATOS E GERENCIE ELES</h4>
                </div>
            </div>
            <div class="col-7">
                <h2>Consulta de Pratos</h2>
                <div>
                    <form method="post">

                        Código:<br>
                        <input type="text" size="10" name="codigo"><br><br>
                        <input type="submit" class="btn btn-dark" value="Consultar">
                        <button type="button" class="btn btn-dark"><a href="index.html">Home</a></button>
                        <hr>
                    </form>
                </div>

                <?php
                include("bd.php");

                if ($_SERVER["REQUEST_METHOD"] === 'POST') {

                    try {

                        $stmt = consultar();

                        echo "<form method='post'><table class='table table-bordered tabela-laranja'>"; // Aplicando a classe tabela-laranja
                        echo "<thead><tr><th></th><th>RA</th><th>Nome</th><th>Preco</th><th>Foto</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<th><input type='radio' name='codigoPrato' value='" . $row['codigo'] . "'></th>";
                            echo "<td>" . $row['codigo'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['preco'] . "</td>";

                            // Exibição da imagem armazenada no banco de dados com tamanho máximo
                            if (!empty($row['foto'])) {
                                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['foto']) . "' alt='Imagem do Prato' style='max-width: 200px; max-height: 200px;'></td>";
                            } else {
                                echo "<td>Sem imagem</td>";
                            }

                            echo "</tr>";
                        }

                        echo "</tbody></table>
                         
                         <button type='submit' class='btn btn-dark' formaction='remove.php'>Excluir Prato</button>
                         <button type='submit' class='btn btn-dark' formaction='edicao.php'>Editar Prato</button>
                         
                         </form>";

                    } catch (PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                    }

                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>

