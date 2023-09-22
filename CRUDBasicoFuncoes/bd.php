<?php

function conectarBD()
{
    $pdo = new PDO("mysql:host=143.106.241.3;dbname=cl201172;charset=utf8", "cl201172", "cl*10102005");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function cadastrar($codigo, $nome, $preco, $image_tmp)
{
    try {
        $bimagem = file_get_contents($image_tmp);
        $pdo = conectarBD();
        $rows = verificarCadastro($codigo, $pdo);

        if ($rows <= 0) {
            $stmt = $pdo->prepare("insert into pratos (codigo, nome, preco, foto) values(:codigo, :nome, :preco, :foto)");
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':foto', $bimagem);
            $stmt->execute();
            echo "<span id='sucess'>Prato Cadastrado!</span>";
        } else {
            echo "<span id='error'>Código já existente!</span>";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function verificarCadastro($codigo, $pdo)
{
    //verificando se o RA informado já existe no BD para não dar exception
    $stmt = $pdo->prepare("select * from pratos where codigo = :codigo");
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();

    $rows = $stmt->rowCount();
    return $rows;
}

function consultar()
{
    $pdo = conectarBD();
    if (isset($_POST["codigo"]) && ($_POST["codigo"] != "")) {
        $codigo = $_POST["codigo"];
        $stmt = $pdo->prepare("select * from pratos where codigo= :codigo order by preco, nome");
        $stmt->bindParam(':codigo', $codigo);
    } else {
        $stmt = $pdo->prepare("select * from pratos order by preco, nome");
    }

    $stmt->execute();

    return $stmt;
}

function buscarEdicao($codigo)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare('select * from pratos where codigo = :codigo');
    $stmt->bindParam(':codigo', $codigo);
    $stmt->execute();
    return $stmt;
}

function alterar($codigo, $novoNome, $novoPreco)
{
    try {
        $pdo = conectarBD();
        $stmt = $pdo->prepare('UPDATE pratos SET nome = :novoNome, preco = :novoPreco WHERE codigo = :codigo');
        $stmt->bindParam(':novoNome', $novoNome);
        $stmt->bindParam(':novoPreco', $novoPreco);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();

        echo "Os dados do prato de Código $codigo foram alterados!";
        header('Location: consulta.php');

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function excluir($codigo)
{
    try {
        $pdo = conectarBD();
        $stmt = $pdo->prepare('DELETE FROM pratos WHERE codigo = :codigo');
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            // Redirecionar para consulta.php após a exclusão bem-sucedida
            header('Location: consulta.php');
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            echo "Nenhum prato com o código $codigo foi encontrado.";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


?>