<?php
require_once ("conexao.class.php");
class noticiasDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function inserirNoticia(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO noticias VALUES ('', :not_autor, :not_titulo, :not_subtitulo, :not_data, :not_hora, :not_img, :not_cat, :not_ativo)");
            $param = array(
                ":not_autor" => $entNoticias->getNot_autor(),
                ":not_titulo" => $entNoticias->getNot_titulo(),
                ":not_subtitulo" => $entNoticias->getNot_subtitulo(),
                ":not_data" => $entNoticias->getNot_data(),
                ":not_hora" => $entNoticias->getNot_hora(),
                ":not_img" => $entNoticias->getNot_img(),
                ":not_cat" => $entNoticias->getNot_cat(),
                ":not_ativo" => '0'
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 301: {$ex->getMessage()}";
        }
    }

    function pegarNoticia($not_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_cod = :not_cod");
            $param = array(":not_cod" => $not_cod);
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

    function pegarNoticiasAtivasOuNao($num){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_ativo ORDER BY not_cod DESC");
            $param = array(":not_ativo" => $num);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 303: {$ex->getMessage()}";
        }
    }

    function atualizarNoticia(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("UPDATE noticias SET not_titulo = :not_titulo, not_subtitulo = :not_subtitulo, not_img = :not_img, not_cat = :not_cat, not_ativo = :not_ativo WHERE not_cod = :not_cod");
            $param = array(
                ":not_titulo" => $entNoticias->getNot_titulo(),
                ":not_subtitulo" => $entNoticias->getNot_subtitulo(),
                ":not_img" => $entNoticias->getNot_img(),
                ":not_cat" => $entNoticias->getNot_cat(),
                ":not_ativo" => $entNoticias->getNot_ativo(),
                ":not_cod" => $entNoticias->getNot_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 304: {$ex->getMessage()}";
        }
    }

    function excluirNoticias(noticias $entNoticias){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM noticias WHERE not_cod = :not_cod");
            $param = array(
                ":not_cod" => $entNoticias->getNot_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 305: {$ex->getMessage()}";
        }
    }

    function consultarCodNotDataHora($not_data, $not_hora) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_data = :not_data AND not_hora = :not_hora");
            $param = array(":not_data" => $not_data, ":not_hora" => $not_hora);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['not_cod'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 306: {$ex->getMessage()}";
        }
    }

    function contarNoticiasAtivasOuNao($condicao){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_ativo ORDER BY not_cod DESC");
            $param = array(":not_ativo" => $condicao);
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

    function pegarTodasNoticias($ativo, $limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT not_cod, not_titulo, not_subtitulo FROM noticias WHERE not_ativo = :not_ativo ORDER BY not_cod DESC LIMIT :limite, :quantpag");
            $param = array(":not_ativo" => $ativo, ":limite" => $limite, ":quantpag" => $quantpag);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $cel = $stmt->rowCount();
                $col = 1;
                $qtdcol = $quantpag;
                $celconstruida = 0;
                $colConstruida = 0;
                echo '<table class="table">';        
                for ($a = 0; $a < $qtdcol; $a++) {
                    if ($col == 1) {
                        echo '<tr>';
                        $celconstruida++;
                    }
                    if ($celconstruida <= $cel) {
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $not_titulo = $dados['not_titulo'];
                            $not_subtitulo = $dados['not_subtitulo'];
                            echo '<td>';
                            echo '<a class="text-uppercase font-weight-bold text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_titulo . '</a>';
                            if(!is_null($not_subtitulo)){
                                echo '<br/><a class="text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_subtitulo . '</a>';
                            }
                            echo '</td>';
                            echo '</tr>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                    }
                }
            echo '</table>';
            }else{
                
            }
        }catch (PDOException $ex){
            echo "ERRO 308: {$ex->getMessage()}";
        }
    }

    function contarEventosAtivasOuNao($num){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_ativo AND not_cat = 'eve' ORDER BY not_cod DESC");
            $param = array(":not_ativo" => $num);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return 0;
            }
        } catch (PDOException $ex) {
            echo "ERRO 309: {$ex->getMessage()}";
        }
    }

    function pegarEventos($limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = 1 AND not_cat = 'eve' ORDER BY not_cod DESC LIMIT :limite, :quantpag");
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
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $not_img = $dados['not_img'];
                            $not_titulo = $dados['not_titulo'];
                            $not_subtitulo = $dados['not_subtitulo'];
                            echo '<div class="col-sm-4 mt-2"><div class="card-header text-dark text-center">';
                            echo '<a class="text-uppercase font-weight-bold text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_titulo . '</a>';
                            if(!is_null($not_subtitulo)){
                                echo '<br/><a class="text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_subtitulo . '</a>';
                            }
                            echo '</div>';
                            if (file_exists('img/noticias/' . $not_img) && !is_null($not_img)) {
                                echo '<a href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '"><img src="img/noticias/'. $not_img . '" alt="Imagem do evento" class="img-thumbnail"></a>';
                            } else {
                                echo '<a href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '"><img src="img/noticias/semfoto.jpg" class="img-thumbnail" alt="Sem foto"></a>';
                            }
                            echo '</div>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                    }
                }
            }else{
                
            }
        }catch (PDOException $ex){
            echo "ERRO 310: {$ex->getMessage()}";
        }
    }

    function contarCarrossel(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = 1 AND not_cat = 'eve' AND not_img IS NOT NULL ORDER BY not_cod DESC LIMIT :limite");
            $param = array(":limite" => 3);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return 0;
            }
        } catch (PDOException $ex) {
            echo "ERRO 311: {$ex->getMessage()}";
        }
    }


    function carrossel(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = 1 AND not_cat = 'eve' AND not_img IS NOT NULL ORDER BY not_cod DESC LIMIT :limite");
            $param = array(":limite" => 3);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $ver = 0;
                while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $ver++;
                    if($ver == 1){
                        echo '<div class="carousel-item active">';
                    }else{
                        echo '<div class="carousel-item">';
                    }
                    if (file_exists('img/noticias/' . $dados['not_img']) && !is_null($dados['not_img'])) {
                        echo '<a href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '"><img src="img/noticias/'. $dados['not_img'] . '" alt="Imagem do evento"  class="d-block w-100" height="50%" width="100%"></a>';
                    } else {
                        echo '<a href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '"><img src="img/noticias/semfoto.jpg" class="d-block w-100" height="50%" width="100%" alt="Sem foto"></a>';
                    }
                    echo '<div class="carousel-caption d-none d-md-block">';
                    echo '<h5>'. $dados['not_titulo'] .'</h5>';
                    if(!is_null($dados['not_subtitulo'])){
                        echo '<p>'. $dados['not_subtitulo'] .'</p>';
                    }
                    echo '</div></div>';
                }
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 312: {$ex->getMessage()}";
        }

    }

    function pesquisarNoticiasQnt($pesquisa){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_ativo = :not_titulo AND not_titulo LIKE '%" . $pesquisa . "%'");
            $param = array(":not_titulo" => 1);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->rowCount();
                return $consulta;
            }else{
                return 0;
            }
        } catch (PDOException $ex) {
            echo "ERRO 313: {$ex->getMessage()}";
        }
    }

    function pesquisarNoticias($pesquisa, $limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM noticias WHERE not_titulo LIKE '%" . $pesquisa . "%' AND not_ativo = 1 ORDER BY not_cod DESC LIMIT :limite, :quantpag");
            $param = array(":limite" => $limite, ":quantpag" => $quantpag);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $cel = $stmt->rowCount();
                $col = 1;
                $qtdcol = $quantpag;
                $celconstruida = 0;
                $colConstruida = 0;
                echo '<table class="table">';        
                for ($a = 0; $a < $qtdcol; $a++) {
                    if ($col == 1) {
                        echo '<tr>';
                        $celconstruida++;
                    }
                    if ($celconstruida <= $cel) {
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $not_titulo = $dados['not_titulo'];
                            $not_subtitulo = $dados['not_subtitulo'];
                            echo '<td>';
                            echo '<a class="text-uppercase font-weight-bold text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_titulo . '</a>';
                            if(!is_null($not_subtitulo)){
                                echo '<br/><a class="text-dark" href="index.php?&pg=noticia&id=' . $dados['not_cod'] . '">' . $not_subtitulo . '</a>';
                            }
                            echo '</td>';
                            echo '</tr>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                    }
                }
            echo '</table>';
            }else{
                return '';
            }
        }catch (PDOException $ex){
            echo "ERRO 314: {$ex->getMessage()}";
        }
    }
}