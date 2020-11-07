<?php
#Criação da classe fotos
class fotos{
    private $foto_cod;
    private $foto_img;
    private $foto_titulo;
    private $foto_desc;
    
    function getGal_cod() {
        return $this->foto_cod;
    }

    function getGal_img() {
        return $this->foto_img;
    }

    function getGal_titulo() {
        return $this->foto_titulo;
    }

    function getGal_desc() {
        return $this->foto_desc;
    }

    function setGal_cod($foto_cod) {
        $this->foto_cod = $foto_cod;
    }

    function setGal_img($foto_img) {
        $this->foto_img = $foto_img;
    }

    function setGal_titulo($foto_titulo) {
        $this->foto_titulo = $foto_titulo;
    }

    function setGal_desc($foto_desc) {
        $this->foto_desc = $foto_desc;
    }

}