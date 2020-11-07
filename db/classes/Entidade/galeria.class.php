<?php
#Criação da classe galeria
class galeria{
    private $gal_cod;
    private $gal_img;
    private $gal_titulo;
    private $gal_desc;
    
    function getGal_cod() {
        return $this->gal_cod;
    }

    function getGal_img() {
        return $this->gal_img;
    }

    function getGal_titulo() {
        return $this->gal_titulo;
    }

    function getGal_desc() {
        return $this->gal_desc;
    }

    function setGal_cod($gal_cod) {
        $this->gal_cod = $gal_cod;
    }

    function setGal_img($gal_img) {
        $this->gal_img = $gal_img;
    }

    function setGal_titulo($gal_titulo) {
        $this->gal_titulo = $gal_titulo;
    }

    function setGal_desc($gal_desc) {
        $this->gal_desc = $gal_desc;
    }

}