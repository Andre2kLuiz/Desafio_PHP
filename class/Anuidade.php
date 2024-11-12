<?php 
class Anuidade {
    private $id;
    private $ano;
    private $valor;
    private $vencimento;

    private $associado_id;

    function __construct($ano, $valor, $vencimento, $associado_id){
        $this->ano = $ano;
        $this->valor = $valor;
        $this->vencimento = $vencimento;
        $this->associado_id = $associado_id;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function setVencimento($vencimento){
        $this->vencimento = $vencimento;
    }

    public function setAssociadoId($associado_id){
        $this->associado_id = $associado_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getAno() {
        return $this->ano;
    }
    public function getValor() {
        return $this->valor;
    }
    public function getVencimento() {
        return $this->vencimento;
    }

    public function getAssociadoId() {
        return $this->associado_id;
    }
}

?>