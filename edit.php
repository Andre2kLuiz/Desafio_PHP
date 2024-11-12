<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alterar Cadastro</title>
</head>

<body>
    <main>
        <?php 
            require_once('class/Associado.php');
            require_once('class/Pessoa.php');
            require_once('class/Anuidade.php');
            require_once('class/Pagamento.php');
            require_once('conexao.php');

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $data = date("Y.m.d");
            $valor = $_POST['valor'];

            $data = str_replace('.', '-', $data);
            
            $data_vencimento = new DateTime($data);
            $data_vencimento->modify('+1 year');
            $data_final = $data_vencimento->format('Y-m-d');

            $associado = new Associado($nome, $email, $data);
            $anuidade = new Anuidade($data, $valor, $data_final, $id);
            
            //$sql = "INSERT INTO `associado`(`nome`, `email`, `data_filiacao`) VALUES ('{$associado->getNome()}','{$associado->getEmail()}','{$associado->getDataFiliacao()}')";

            $sql = "UPDATE `associado` 
                SET nome = '{$associado->getNome()}', 
                    email = '{$associado->getEmail()}' 
                WHERE id = $id";

            //$sql2 = "INSERT INTO `anuidade`(`ano`, `valor`, `vencimento`) VALUES ('{$anuidade->getAno()}','{$anuidade->getValor()}','{$anuidade->getVencimento()}')";
            if (mysqli_query($con, $sql)) {
                // Atualiza o valor na tabela 'anuidade' para o mesmo associado
                $sql2 = "UPDATE `anuidade` 
                        SET valor = '{$anuidade->getValor()}' 
                        WHERE associado_id = $id";
            
                if (mysqli_query($con, $sql2)) {
                    echo "Dados atualizados com sucesso!";
                } else {
                    echo "Erro ao atualizar o valor em 'anuidade': " . mysqli_error($con);
                }
            } else {
                echo "Erro ao atualizar dados em 'associado': " . mysqli_error($con);
            }
        ?>
        <hr>
        <a href="./pages/listarAssociado.php" class="btn btn-primary">Voltar</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>