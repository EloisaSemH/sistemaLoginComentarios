<?php
require_once ("conexao.class.php");
class galeriaDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirFoto(galeria $entGaleria){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO galeria VALUES ('', :gal_img, :gal_titulo, :gal_desc)");
            $param = array(
                ":gal_img" => $entGaleria->getGal_img(),
                ":gal_titulo" => $entGaleria->getGal_titulo(),
                ":gal_desc" => $entGaleria->getGal_desc()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 501: {$ex->getMessage()}";
        }
    }

    function atualizarFoto(galeria $entGaleria){
        try {
            $stmt = $this->pdo->prepare("UPDATE galeria SET gal_img = :gal_img, gal_titulo = :gal_titulo, gal_desc = :gal_desc WHERE gal_cod = :gal_cod");
            $param = array(
                ":gal_img" => $entGaleria->getGal_img(),
                ":gal_titulo" => $entGaleria->getGal_titulo(),
                ":gal_desc" => $entGaleria->getGal_desc(),
                ":gal_cod" => $entGaleria->getGal_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 502: {$ex->getMessage()}";
        }
    }

    function excluirFoto(galeria $entGaleria){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM galeria WHERE gal_cod = :gal_cod");
            $param = array(
                ":gal_cod" => $entGaleria->getGal_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 503: {$ex->getMessage()}";
        }
    }

    function contarFotos(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM galeria ORDER BY :orderby DESC");
            $param = array(":orderby" => 'gal_cod');
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 504: {$ex->getMessage()}";
        }
    }

    function pegarFoto($gal_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM galeria WHERE gal_cod = :gal_cod");
            $param = array(":gal_cod" => $gal_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 302: {$ex->getMessage()}";
        }
    }


    function pegarFotos($limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM galeria ORDER BY gal_cod DESC LIMIT :limite, :quantpag");
            $param = array(":limite" => $limite, ":quantpag" => $quantpag);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $cel = $stmt->rowCount();
                $col = 1;
                $qtdcol = $quantpag;
                $celconstruida = 0;
                $colConstruida = 0;
                for ($a = 0; $a < $qtdcol; $a++) {
                    if ($col == 1) {
                        $celconstruida++;
                    }
                    if ($celconstruida <= $cel) {
                        echo '<div class="conteiner my-3 "><div class="card-columns">';
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="card" data-toggle="modal" data-target="#' . $dados['gal_cod'] . '">';
                            if (file_exists('img/galeria/' . $dados['gal_img']) && !is_null($dados['gal_img'])) {
                                echo '<img src="img/galeria/'. $dados['gal_img'] . '" alt="' . $dados['gal_titulo'] . '" class="card-img-top">';
                            } else {
                                echo '<img src="img/galeria/semfoto.jpg" class="card-img-top" alt="Sem foto">';
                            }
                            echo '</div><div class="modal fade" id="' . $dados['gal_cod'] . '" tabindex="-1" role="dialog" aria-labelledby="' . $dados['gal_cod'] . '" aria-hidden="true"><div class="modal-dialog" role="document">';
                            echo '<div class="modal-content"><div class="modal-header"><a href="index.php?&pg=foto&id=' . $dados['gal_cod'] . '"><h5 class="modal-title text-dark" id="' . $dados['gal_cod'] . '">' . $dados['gal_titulo'] . '</h5>';
                            echo '<a/><button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><a href="index.php?&pg=foto&id=' . $dados['gal_cod'] . '" class="text-center text-dark">';
                            if (file_exists('img/galeria/' . $dados['gal_img']) && !is_null($dados['gal_img'])) {
                                echo '<img src="img/galeria/'. $dados['gal_img'] . '" alt="' . $dados['gal_titulo'] . '" class="img-fluid">';
                            } else {
                                echo '<img src="img/galeria/semfoto.jpg" class="img-fluid" alt="Sem foto">';
                            }
                            if(!is_null($dados['gal_desc'])){
                                echo  '<p class="text-center text-dark mt-1" style="text-decoration: none">' . $dados['gal_desc'] . '</p>';
                            }
                            echo '</a></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></div></div></div></div>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                        echo '</div></div>';
                    }
                }
            }else{
                
            }
        }catch (PDOException $ex){
            echo "ERRO 506: {$ex->getMessage()}";
        }
    }
}