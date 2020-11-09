<?php
require_once("conexao.class.php");
class ComentarioDAO
{
    function __construct()
    {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function enviarComentario(comentario $entComentario)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO comentario VALUES (null, :com_us_cod, :com_autor, :com_texto, :com_data, :com_hora)");
            $param = array(
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

    function excluirComentario($com_cod)
    {
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

    function contarNumeroComentarios($not_cod)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comentario WHERE com_not_cod = :not_cod");
            $param = array(":not_cod" => $not_cod);
            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {
                $consulta = $stmt->rowCount();
                return $consulta;
            } else {
                return 0;
            }
        } catch (PDOException $ex) {
            echo "ERRO 307: {$ex->getMessage()}";
        }
    }

    function pegarComentarios($sessionUsu, $sessionLog)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM comentario ORDER BY com_cod DESC");
            $param = array();
            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {
                while ($consulta = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dataComent = date("d/m/Y", strtotime($consulta['com_data']));
                    $horaComent = date("H:i", strtotime($consulta['com_hora']));
                    
                    $foto['foto_img'] = 'icon_default.jpg';
                    $foto['foto_desc'] = 'Imagem padrão de avatar';

                    if (!is_null($consulta['com_us_cod'])){
                        require_once("fotoDAO.class.php");
                        $fotoDAO = new FotoDAO();
                        if($img = $fotoDAO->pegarFoto($consulta['com_us_cod'])){
                            if(file_exists('img/usuarios/' . $img['foto_img'])){
                                $foto = $img;
                            }
                        }
                    }

                    echo '<div class="border-top my-3"></div>
                    <div class="row">
                    <div class="col-12">';
                    if (!is_null($sessionUsu) && $sessionUsu === $consulta['com_us_cod'] || $sessionLog >= 2) {
                        echo '<form action="" method="post" class="float-right"><input type="hidden" value="' . $consulta['com_cod'] . '" name="codComent"/>
                        <button name="excluirComentario" class="btn btn-danger text-dark font-weight-bold">Excluir</button></form>';
                    }
                    echo '<img src="img/usuarios/' . $foto['foto_img'] . '" alt="' . $foto['foto_desc'] . '" class="img-thumbnail float-left w-25 mr-3 mb-3">
                    <p class="text-info font-weight-bold">' . $consulta['com_autor'] . '</br>
                    <span class="text-dark font-weight-light font-italic">' . $dataComent . ' às ' . $horaComent . '</span></p>
                    <p class="text-dark">' . $consulta['com_texto'] . '</p>
                    </div></div>';
                }
            } else {
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 302: {$ex->getMessage()}";
        }
    }
}
