<?php
#Criação da classe usuário
class usuario {
    //Criação dos atributos (variávies)
    private $us_cod;
    private $us_nome;
    private $us_email;
    private $us_sexo;
    private $us_data;
    private $us_hora;
    private $us_ip;
    private $us_tipo;

    function getUs_cod() {
        return $this->us_cod;
    }

    function getUs_nome() {
        return $this->us_nome;
    }

    function getUs_email() {
        return $this->us_email;
    }

    function getUs_sexo() {
        return $this->us_sexo;
    }

    function getUs_data() {
        return $this->us_data;
    }

    function getUs_hora() {
        return $this->us_hora;
    }

    function getUs_ip() {
        return $this->us_ip;
    }

    function getUs_tipo() {
        return $this->us_tipo;
    }

    function setUs_cod($us_cod) {
        $this->us_cod = $us_cod;
    }

    function setUs_nome($us_nome) {
        $this->us_nome = $us_nome;
    }

    function setUs_email($us_email) {
        $this->us_email = $us_email;
    }

    function setUs_sexo($us_sexo) {
        $this->us_sexo = $us_sexo;
    }

    function setUs_data($us_data) {
        $this->us_data = $us_data;
    }

    function setUs_hora($us_hora) {
        $this->us_hora = $us_hora;
    }

    function setUs_ip($us_ip) {
        $this->us_ip = $us_ip;
    }

    function setUs_tipo($us_tipo) {
        $this->us_tipo = $us_tipo;
    }
}