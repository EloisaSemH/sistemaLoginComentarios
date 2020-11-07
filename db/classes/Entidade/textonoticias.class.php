<?php
#Criação da classe senha
class textonoticias{
    private $not_cod;
    private $text_texto;
    
    function getNot_cod() {
        return $this->not_cod;
    }

    function getText_texto() {
        return $this->text_texto;
    }

    function setNot_cod($not_cod) {
        $this->not_cod = $not_cod;
    }

    function setText_texto($text_texto) {
        $this->text_texto = $text_texto;
    }
}
?>