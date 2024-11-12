<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <?php 
require_once('class/Associado.php');
require_once('class/Pessoa.php');
require_once('class/Anuidade.php');
require_once('class/Pagamento.php');
require_once('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = date("Y.m.d");
    $valor = $_POST['valor'];

    $data = str_replace('.', '-', $data);
    
    $data_vencimento = new DateTime($data);
    $data_vencimento->modify('+1 year');
    $data_final = $data_vencimento->format('Y-m-d');

    $associado = new Associado($nome, $email, $data);
    
    $sql = "INSERT INTO `associado`(`nome`, `email`, `data_filiacao`) VALUES ('{$associado->getNome()}','{$associado->getEmail()}','{$associado->getDataFiliacao()}')";

    if( mysqli_query($con, $sql) ){
        mensagem("$nome cadastrado com sucesso!", 'success');
        $associado_id = mysqli_insert_id($con);
    }else {
        mensagem("$nome não cadastrado!", 'danger');
    }

    $anuidade = new Anuidade($data, $valor, $data_final, $associado_id);

    $sql2 = "INSERT INTO `anuidade`(`ano`, `valor`, `vencimento`,`associado_id`) VALUES ('{$anuidade->getAno()}','{$anuidade->getValor()}','{$anuidade->getVencimento()}', '{$anuidade->getAssociadoId()}')";

    if( mysqli_query($con, $sql2)){
        mensagem("$nome cadastrado com sucesso!", 'success');
        $anuidade_id = mysqli_insert_id($con); 
    } else {
        mensagem("$nome não cadastrado!", 'danger');
    }

    $pagamento = new Pagamento($associado_id, $anuidade_id, false, NULL);

    $sql3 = "INSERT INTO `pagamento`(`associado_id`, `anuidade_id`, `pago`) 
    VALUES ('{$pagamento->getAssociadoId()}', '{$pagamento->getAnuidadeId()}', '{$pagamento->getPago()}')";

    if( mysqli_query($con, $sql3)){
        mensagem("$nome cadastrado com sucesso!", 'success');
    } else {
        mensagem("$nome não cadastrado!", 'danger');
    }
    
?>
        <hr>
        <a href="./index.php" class="btn btn-primary">Voltar</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>