<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pagamento</title>
</head>

<body>
    <main>
        <?php 
            require_once('class/Associado.php');
            require_once('class/Pessoa.php');
            require_once('class/Anuidade.php');
            require_once('class/Pagamento.php');
            require_once('conexao.php');

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            
                // Atualiza o campo 'pago' para true (1) no banco de dados
                $sql = "UPDATE pagamento SET pago = 1 WHERE associado_id = $id";
                if (mysqli_query($con, $sql)) {
                    echo "Pagamento realizado com sucesso!";
                } else {
                    echo "Erro ao atualizar pagamento: " . mysqli_error($con);
                }
            } else {
                echo "ID do associado não fornecido.";
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