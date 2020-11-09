<?php
#Criação da classe comentario
class Comentario{
    private $com_cod;
    private $com_not_cod;
    private $com_us_cod;
    private $com_autor;
    private $com_texto;
    private $com_data;
    private $com_hora;
    
    function getCom_cod() {
        return $this->com_cod;
    }

    function getCom_not_cod() {
        return $this->com_not_cod;
    }

    function getCom_us_cod() {
        return $this->com_us_cod;
    }

    function getCom_autor() {
        return $this->com_autor;
    }

    function getCom_texto() {
        return $this->com_texto;
    }

    function getCom_data() {
        return $this->com_data;
    }

    function getCom_hora() {
        return $this->com_hora;
    }

    function setCom_cod($com_cod) {
        $this->com_cod = $com_cod;
    }

    function setCom_not_cod($com_not_cod) {
        $this->com_not_cod = $com_not_cod;
    }

    function setCom_us_cod($com_us_cod) {
        $this->com_us_cod = $com_us_cod;
    }

    function setCom_autor($com_autor) {
        $this->com_autor = $com_autor;
    }

    function setCom_texto($com_texto) {
        $this->com_texto = $com_texto;
    }

    function setCom_data($com_data) {
        $this->com_data = $com_data;
    }

    function setCom_hora($com_hora) {
        $this->com_hora = $com_hora;
    }
}