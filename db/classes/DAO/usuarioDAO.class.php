<?php
require_once ("conexao.class.php");
class UsuarioDAO {

    // private $us_email;

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(usuario $entUsuario) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuario VALUES (null, :us_nome, :us_email, :us_sexo, :us_data, :us_hora, :us_ip, :us_tipo)");
            $param = array(
                ":us_nome" => $entUsuario->getUs_nome(),
                ":us_email" => $entUsuario->getUs_email(),
                ":us_sexo" => $entUsuario->getUs_sexo(),
                ":us_data" => date("Y-m-d"),
                ":us_hora" => date("H:i:s"),
                ":us_ip" => $_SERVER["REMOTE_ADDR"],
                ":us_tipo" => 1
            );
            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo "ERRO 101: {$ex->getMessage()}";
        }
    }

    function consultarCodUsuario($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['us_cod'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 102: {$ex->getMessage()}";
        }
    }

    function consultarPorEmail($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo "ERRO 103: {$ex->getMessage()}";
        }
    }
    
    function login($us_email, $se_senha) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario INNER JOIN senha ON senha.se_us_cod = usuario.us_cod WHERE usuario.us_email = :us_email AND senha.se_senha = :se_senha");
            $param = array(
                ":us_email" => $us_email,
                ":se_senha" => md5($se_senha)
            );
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){

                $this->us_email = $us_email;

                return TRUE;
            }else{
                return FALSE;
            }
        } catch (PDOException $ex) {
            echo "ERRO 104: {$ex->getMessage()}";
        }
    }

    function consultarTipoUsuario($us_email) {
        try {
            $stmt = $this->pdo->prepare("SELECT us_tipo FROM usuario WHERE us_email = :us_email");
            $param = array(":us_email" => $us_email);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['us_tipo'];
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 105: {$ex->getMessage()}";
        }
    }

    function pegarInfos($us_cod){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE us_cod = :us_cod");
            $param = array(":us_cod" => $us_cod);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta;
            }else{
                return '';
            }
        } catch (PDOException $ex) {
            echo "ERRO 106: {$ex->getMessage()}";
        }
    }

    function atualizarUsuario(usuario $entUsuario){
        try {
            $stmt = $this->pdo->prepare("UPDATE usuario SET us_nome = :us_nome, us_email = :us_email, us_sexo = :us_sexo, us_tipo = :us_tipo WHERE us_cod = :us_cod");
            $param = array(
                ":us_nome" => $entUsuario->getUs_nome(),
                ":us_email" => $entUsuario->getUs_email(),
                ":us_sexo" => $entUsuario->getUs_sexo(),
                ":us_tipo" => $entUsuario->getUs_tipo(),
                ":us_cod" => $entUsuario->getUs_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 107: {$ex->getMessage()}";
        }
    }

    function excluirUsuario(usuario $entUsuario){
        try {
            $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE us_cod = :us_cod");
            $param = array(
                ":us_cod" => $entUsuario->getUs_cod()
            );
            return $stmt->execute($param);

        } catch (PDOException $ex) {
            echo "ERRO 108: {$ex->getMessage()}";
        }
    }
    
    function pegarTodosUsuarios($limite, $quantpag){
        try {
            $stmt = $this->pdo->prepare("SELECT us_cod, us_nome, us_email, us_tipo FROM usuario ORDER BY us_cod DESC LIMIT :limite, :quantpag");
            $param = array(":limite" => $limite, ":quantpag" => $quantpag);
            $stmt->execute($param);
            
            if($stmt->rowCount() > 0){
                $cel = $stmt->rowCount();
                $col = 1;
                $qtdcol = $quantpag;
                $celconstruida = 0;
                $colConstruida = 0;
                echo '<table class="table table-striped"><thead class="thead-dark"><tr><th>Código</th><th>Tipo</th><th>Nome</th><th>E-mail</th></tr></thead><tbody>';   
                for ($a = 0; $a < $qtdcol; $a++) {
                    if ($col == 1) {
                        echo '<tr>';
                        $celconstruida++;
                    }
                    if ($celconstruida <= $cel) {
                        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $us_nome = $dados['us_nome'];
                            $us_email = $dados['us_email'];
                            echo '<td>' . $dados['us_cod'] . '</td>';
                            if($dados['us_tipo'] == 1){
                                echo '<td>Comum</td>';
                            }else if ($dados['us_tipo'] == 2){
                                echo '<td>Postador</td>';
                            }else{
                                echo '<td>Webmaster</td>';
                            }
                            echo '<td><a class="text-uppercase font-weight-bold text-dark" href="index.php?&pg=editandousuario&id=' . $dados['us_cod'] . '">' . $us_nome . '</a></td>';
                            echo '<td>' . $us_email . '</td>';
                            echo '</tr>';

                            $colConstruida++;
                            if($colConstruida == $qtdcol){
                                $colConstruida = 0;
                            }
                        }
                    }
                }
            echo '</tbody></table>';
            }else{
                
            }
        }catch (PDOException $ex){
            echo "ERRO 109: {$ex->getMessage()}";
        }
    }
}
?>
