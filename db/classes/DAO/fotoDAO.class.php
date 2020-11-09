<?php
require_once ("conexao.class.php");
class fotoDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirFoto(fotos $entFoto){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO fotos VALUES (:foto_us_cod, :foto_img, :foto_desc)");
            $param = array(
                ":foto_us_cod" => $entFoto->getFoto_us_cod(),
                ":foto_img" => $entFoto->getFoto_img(),
                ":foto_desc" => $entFoto->getFoto_desc()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO FOTO1: {$ex->getMessage()}";
        }
    }

    function atualizarFoto(fotos $entFoto){
        try {
            $stmt = $this->pdo->prepare("UPDATE fotos SET foto_img = :foto_img, foto_desc = :foto_desc WHERE foto_us_cod = :foto_us_cod");
            $param = array(
                ":foto_img" => $entFoto->getFoto_img(),
                ":foto_desc" => $entFoto->getFoto_desc(),
                ":foto_us_cod" => $entFoto->getFoto_us_cod(),
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO FOTO2: {$ex->getMessage()}";
        }
    }

    function excluirFoto(fotos $entFoto){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM fotos WHERE foto_us_cod = :foto_us_cod");
            $param = array(
                ":foto_cod" => $entFoto->getFoto_us_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO FOTO3: {$ex->getMessage()}";
        }
    }

    function pegarFoto($foto_us_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM fotos WHERE foto_us_cod = :foto_us_cod");
            $param = array(":foto_us_cod" => $foto_us_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO FOTO4: {$ex->getMessage()}";
        }
    }
}