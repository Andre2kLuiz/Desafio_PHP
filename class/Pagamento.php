<?php 
    class Pagamento {
        private $id;
        private $associado_id;
        private $anuidade_id;
        private $pago;
        private $data_pagamento;

        function __construct($associado_id, $anuidade_id, $pago, $data_pagamento){
            $this->associado_id = $associado_id;
            $this->anuidade_id = $anuidade_id;
            $this->pago = $pago;
            $this->data_pagamento = $data_pagamento;
        }

        public function setAssociadoId($associado_id){
            $this->associado_id = $associado_id;
        }
        public function setAnuidadeId($anuidade_id){
            $this->anuidade_id = $anuidade_id;
        }
        public function setPago($pago) {
            $this->pago = $pago;
        }
        public function setDataPagamento($data_pagamento){
            $this->data_pagamento = $data_pagamento;
        }

        public function getAssociadoId(){
            return $this->associado_id;
        }
        public function getAnuidadeId(){
            return $this->anuidade_id;
        }
        public function getPago(){
            return $this->pago;
        }

        public function getDataPagamento() {
            return $this->data_pagamento;
        }
    }


?>