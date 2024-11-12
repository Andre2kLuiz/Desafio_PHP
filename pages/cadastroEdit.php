<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alterar cadastro</title>
</head>

<body>

    <?php 
        require_once('../conexao.php');
        $id = $_GET['id'] ?? '';

        $sql = "
            SELECT associado.*, anuidade.valor, anuidade.vencimento, pagamento.pago 
            FROM associado 
            LEFT JOIN anuidade ON associado.id = anuidade.associado_id 
            LEFT JOIN pagamento ON associado.id = pagamento.associado_id 
            WHERE associado.id LIKE '%$id%'
        ";
        $dados = mysqli_query($con, $sql);
        $linha = mysqli_fetch_assoc($dados);
        
        $sql2 = "SELECT * FROM anuidade WHERE id = '$id'";
        $dados2 = mysqli_query($con, $sql2);

        
        $linha2 = mysqli_fetch_assoc($dados2);
    
    ?>
    <header>
        <h1>Cadastro de associado</h1>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="../edit.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" required
                                value="<?php echo $linha['nome'];?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required
                                value="<?php echo $linha['email'];?>">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor </label>
                            <input type="number" name="valor" id="valor" class="form-control" step="0.01" required
                                value="<?php echo $linha['valor'];?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Salvar Alterações">
                            <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                        </div>
                    </form>
                    <a href="./listarAssociado.php" class="btn btn-info">Voltar</a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>