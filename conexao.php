<?php 
    $server = "localhost";
    $user = "root";
    $senha = "";
    $bd = "base_dev_rn";

    if ( $con = mysqli_connect($server, $user, $senha, $bd) ) {
       // echo "Conectado";
    } else {
        echo "Erro!";
    }

    function mensagem($texto, $tipo) {
        echo "<div class='alert alert-$tipo' role='alert'> 
            $texto
        </div> ";
    }

    function mostra_data($data) {
        $data = explode('-', $data);
        $escreve = $data[2] . "/" . $data[1] . "/" . $data[0];

        return $escreve;
    }

?>