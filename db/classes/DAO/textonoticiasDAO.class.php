<?php
require_once ("conexao.class.php");
class textonoticiasDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(textonoticias $enttextonoticias) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO textonoticias VALUES (:not_cod, :text_texto)");
            $param = array(
                ":not_cod" => $enttextonoticias->getNot_cod(),
                ":text_texto" => $enttextonoticias->getText_texto()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 401: {$ex->getMessage()}";
        }
    }

    function pegarTextoNoticia($not_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM textonoticias WHERE noticias_not_cod = :not_cod");
            $param = array(":not_cod" => $not_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 402: {$ex->getMessage()}";
        }
    }

    function atualizar(textonoticias $enttextonoticias) {
        try {
            $stmt = $this->pdo->prepare("UPDATE textonoticias SET text_texto = :text_texto WHERE noticias_not_cod = :not_cod");
            $param = array(
                ":text_texto" => $enttextonoticias->getText_texto(),
                ":not_cod" => $enttextonoticias->getNot_cod()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 403: {$ex->getMessage()}";
        }
    }
}