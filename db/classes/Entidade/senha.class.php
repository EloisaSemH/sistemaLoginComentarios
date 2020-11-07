<?php
#Criação da classe senha
class senha{
    private $us_cod;
    private $se_senha;
    
    function getUs_cod() {
        return $this->us_cod;
    }

    function getSe_senha() {
        return $this->se_senha;
    }

    function setUs_cod($us_cod) {
        $this->us_cod = $us_cod;
    }

    function setSe_senha($se_senha) {
        $this->se_senha = $se_senha;
    }
}
?>