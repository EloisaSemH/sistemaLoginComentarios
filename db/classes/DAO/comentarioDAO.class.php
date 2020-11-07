<?php
require_once ("conexao.class.php");
class comentarioDAO{
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function enviarComentario(comentario $entComentario){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO comentario VALUES ('', :com_not_cod, :com_us_cod, :com_autor, :com_texto, :com_data, :com_hora)");
            $param = array(
                ":com_not_cod" => $entComentario->getCom_not_cod(),
                ":com_us_cod" => $entComentario->getCom_us_cod(),
                ":com_autor" => $entComentario->getCom_autor(),
                ":com_texto" => $entComentario->getCom_texto(),
                ":com_data" => $entComentario->getCom_data(),
                ":com_hora" => $entComentario->getCom_hora()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 601: {$ex->getMessage()}";
        }
    }

    function atualizarNoticia(comentario $entComentario){
        try {
            $stmt = $this->pdo->prepare("UPDATE comentario SET com_titulo = :com_titulo, com_subtitulo = :com_subtitulo, com_img = :com_img, com_cat = :com_cat, com_not_cod = :com_not_cod WHERE com_cod = :com_cod");
            $param = array(
                ":com_titulo" => $entComentario->getCom_titulo(),
                ":com_subtitulo" => $entComentario->getCom_subtitulo(),
                ":com_img" => $entComentario->getCom_img(),
                ":com_cat" => $entComentario->getCom_cat(),
                ":com_not_cod" => $entComentario->getCom_not_cod(),
                ":com_cod" => $entComentario->getCom_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 604: {$ex->getMessage()}";
        }
    }

    function excluirComentario($com_cod){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM comentario WHERE `comentario`.`com_cod` = :com_cod");
            $param = array(
                ":com_cod" => $com_cod
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 605: {$ex->getMessage()}";
        }
    }

    function contarNumeroComentarios($not_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comentario WHERE com_not_cod = :not_cod");
            $param = array(":not_cod" => $not_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return 0;
            }
        } catch (PDOException $ex) {
            echo "ERRO 307: {$ex->getMessage()}";
        }
    }

    function pegarComentarios($not_cod, $sessionUsu, $sessionLog){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comentario WHERE com_not_cod = :not_cod ORDER BY com_cod DESC");
            $param = array(":not_cod" => $not_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                while($consulta = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $dataComent = date("d/m/Y", strtotime($consulta['com_data']));
                    $horaComent = date("H:i", strtotime($consulta['com_hora']));
                    echo '<div class="border-top mb-2"></div>';
                    
                    echo '<div class="form-row justify-content float-left"><div class="bg-white text-dark font-weight-bold">'. $consulta['com_autor'] .'</div></div>';
                    if($sessionUsu === $consulta['com_us_cod'] || $sessionLog == 3){
                        echo '<form action="" method="post" class=""><input type="hidden" value="'. $consulta['com_cod'] .'" name="codComent"/><div class="form-row justify-content-end float-right"><div class="form-group"><button name="excluirComentario" class="btn btn-danger mb-2"><spam class="float-right text-dark font-weight-bold">Excluir</spam></i></button></div></div></form>';
                    }
                    echo '<br/><div class="form-row justify-content-center float-left"><div class="bg-white text-dark font-weight-light font-italic">'. $dataComent . ' às ' . $horaComent .'</div></div>';
                    
                    echo '<br/><div class="form-row"><div class="bg-white text-dark">'. $consulta['com_texto'] .'</div></div>';
                }
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 302: {$ex->getMessage()}";
        }
    }

}