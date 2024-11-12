<?php 
require_once('Pessoa.php');
class Associado extends Pessoa{
   
    private $data_filiacao;

    //construtor
    function __construct($nome, $email, $data_filiacao){
        $this->nome = $nome;
        $this->email = $email;
        $this->data_filiacao = $data_filiacao;
    }

    //seters
    
    public function setDataFiliacao($data) {
        $this->data_filiacao = $data;
    }

    //getres

    public function getDataFiliacao() {
        return $this->data_filiacao;
    }
    
};
   
?>