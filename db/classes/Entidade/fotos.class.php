<?php
#Criação da classe fotos
class Fotos{
    private $foto_img;
    private $foto_us_cod;
    private $foto_desc;
    
    function getFoto_img() {
        return $this->foto_img;
    }

    function getFoto_us_cod() {
        return $this->foto_us_cod;
    }

    function getFoto_desc() {
        return $this->foto_desc;
    }

    function setFoto_img($foto_img) {
        $this->foto_img = $foto_img;
    }

    function setFoto_us_cod($foto_us_cod) {
        $this->foto_us_cod = $foto_us_cod;
    }

    function setFoto_desc($foto_desc) {
        $this->foto_desc = $foto_desc;
    }

}