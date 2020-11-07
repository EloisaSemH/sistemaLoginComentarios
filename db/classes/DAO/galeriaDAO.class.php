<?php
require_once ("conexao.class.php");
class fotoDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirFoto(fotos $entFoto){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO fotos VALUES ('', :foto_img, :foto_titulo, :foto_desc)");
            $param = array(
                ":foto_img" => $entFoto->getGal_img(),
                ":foto_titulo" => $entFoto->getGal_titulo(),
                ":foto_desc" => $entFoto->getGal_desc()
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 501: {$ex->getMessage()}";
        }
    }

    function atualizarFoto(fotos $entFoto){
        try {
            $stmt = $this->pdo->prepare("UPDATE fotos SET foto_img = :foto_img, foto_titulo = :foto_titulo, foto_desc = :foto_desc WHERE foto_cod = :foto_cod");
            $param = array(
                ":foto_img" => $entFoto->getGal_img(),
                ":foto_titulo" => $entFoto->getGal_titulo(),
                ":foto_desc" => $entFoto->getGal_desc(),
                ":foto_cod" => $entFoto->getGal_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 502: {$ex->getMessage()}";
        }
    }

    function excluirFoto(fotos $entFoto){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM fotos WHERE foto_cod = :foto_cod");
            $param = array(
                ":foto_cod" => $entFoto->getGal_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 503: {$ex->getMessage()}";
        }
    }

    function contarFotos(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM fotos ORDER BY :orderby DESC");
            $param = array(":orderby" => 'foto_cod');
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

    function pegarFoto($foto_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM fotos WHERE foto_cod = :foto_cod");
            $param = array(":foto_cod" => $foto_cod);
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
            $stmt = $this->pdo->prepare("SELECT * FROM fotos ORDER BY foto_cod DESC LIMIT :limite, :quantpag");
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
                            echo '<div class="card" data-toggle="modal" data-target="#' . $dados['foto_cod'] . '">';
                            if (file_exists('img/fotos/' . $dados['foto_img']) && !is_null($dados['foto_img'])) {
                                echo '<img src="img/fotos/'. $dados['foto_img'] . '" alt="' . $dados['foto_titulo'] . '" class="card-img-top">';
                            } else {
                                echo '<img src="img/fotos/semfoto.jpg" class="card-img-top" alt="Sem foto">';
                            }
                            echo '</div><div class="modal fade" id="' . $dados['foto_cod'] . '" tabindex="-1" role="dialog" aria-labelledby="' . $dados['foto_cod'] . '" aria-hidden="true"><div class="modal-dialog" role="document">';
                            echo '<div class="modal-content"><div class="modal-header"><a href="index.php?&pg=foto&id=' . $dados['foto_cod'] . '"><h5 class="modal-title text-dark" id="' . $dados['foto_cod'] . '">' . $dados['foto_titulo'] . '</h5>';
                            echo '<a/><button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><a href="index.php?&pg=foto&id=' . $dados['foto_cod'] . '" class="text-center text-dark">';
                            if (file_exists('img/fotos/' . $dados['foto_img']) && !is_null($dados['foto_img'])) {
                                echo '<img src="img/fotos/'. $dados['foto_img'] . '" alt="' . $dados['foto_titulo'] . '" class="img-fluid">';
                            } else {
                                echo '<img src="img/fotos/semfoto.jpg" class="img-fluid" alt="Sem foto">';
                            }
                            if(!is_null($dados['foto_desc'])){
                                echo  '<p class="text-center text-dark mt-1" style="text-decoration: none">' . $dados['foto_desc'] . '</p>';
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