<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de associados</title>
</head>

<body>

    <?php 
       
        $pesquisa = $_POST['busca'] ?? '';
      

        require_once('../conexao.php');

        $sql = "
            SELECT associado.*, anuidade.valor, anuidade.vencimento, pagamento.pago 
            FROM associado 
            LEFT JOIN anuidade ON associado.id = anuidade.associado_id 
            LEFT JOIN pagamento ON associado.id = pagamento.associado_id 
            WHERE associado.nome LIKE '%$pesquisa%'
        ";
        $dados = mysqli_query($con, $sql);
        
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisa</h1>
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" action="listarAssociado.php" method="post">
                            <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search"
                                name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">nome</th>
                            <th scope="col">email</th>
                            <th scope="col">data_filiacao</th>
                            <th scope="col">vencimento</th>
                            <th scope="col">valor</th>
                            <th scope="col">pago</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                             while ( $linha = mysqli_fetch_assoc($dados)) {
                               
                                $id = $linha['id'];
                                $nome = $linha['nome'];
                                $email = $linha['email'];
                                $data_filiacao = $linha['data_filiacao'];
                                
                                // Novos campos da anuidade e pagamento
                                $valor = number_format($linha['valor'], 2, ',', '.');
                                $vencimento = $linha['vencimento'];
                                $pago = $linha['pago'] ? 'Sim' : 'Não'; // Converte booleano para 'Sim' ou 'Não'

                                $data_vencimento = new DateTime($data_filiacao);
                                $data_vencimento->modify('+1 year');
                                $data_final = $data_vencimento->format('Y-m-d');
                                $data_filiacao = mostra_data($data_filiacao);
                                $data_final = mostra_data($data_final);

                                    echo "<tr>
                                    <th scope='row'>{$nome}</th>
                                    <td>{$email}</td>
                                    <td>{$data_filiacao}</td>
                                    <td>{$data_final}</td>
                                    <td>R$: {$valor}</td> <!-- Valor da Anuidade -->
                        <td>{$pago}</td> <!-- Status do Pagamento -->
                        <td width=150px>
                            <a href='./cadastroEdit.php?id=$id' class='btn btn-success btn-sm'>Editar</a>
                            <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'
                                onClick=" .'"' ."pegar_dados($id, ' $nome')" .'"' .">Deletar</a>
                                <a  href='../pagamento.php?id=$id' class='btn btn-info btn-sm'>Pagamento</a>
                        </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <a href="../index.php" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../excluir.php" method="POST">


                        <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="id" id="id_associado" value="">
                    <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function pegar_dados(id, nome) {
        document.getElementById('nome_pessoa').textContent = nome;
        document.getElementById('id_associado').value = id;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>