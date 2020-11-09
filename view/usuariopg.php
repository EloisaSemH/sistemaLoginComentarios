<?php
require_once("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

$dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

$data = date('d/m/Y', strtotime($dados['us_data']));
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <form name="editarusuario" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="us_nome" required="" class="form-control" value="<?= $dados['us_nome']; ?>" />
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="us_email" required="" placeholder="nome@email.com" class="form-control" value="<?= $dados['us_email']; ?>" />
                </div>
                <div class="form-group">
                    <label>Gênero:</label>
                    <select name="us_sexo" class="form-control">
                        <?php if (strcasecmp($dados['us_sexo'], 'f') == 0) { ?>
                            <option value="f" selected>Feminino</option>
                            <option value="m">Masculino</option>
                            <option value="o">Outro</option>
                        <?php } elseif (strcasecmp($dados['us_sexo'], 'm') == 0) { ?>
                            <option value="f">Feminino</option>
                            <option value="m" selected>Masculino</option>
                            <option value="o">Outro</option>
                        <?php } else { ?>
                            <option value="f">Feminino</option>
                            <option value="m">Masculino</option>
                            <option value="o" selected>Outro</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Insira sua nova senha:</label>
                    <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin');" type="password" class="form-control" name="usSenha" id="senha1" maxlength="40">
                </div>
                <div class="form-group">
                    <label>Repita a senha:</label>
                    <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin')" type="password" class="form-control" name="usSenhaRep" id="senha2" maxlength="40">
                </div>
                <div class="form-group">
                    <p id="senhasCoin">&nbsp;</p>
                </div>
                <div class="form-group">
                    <label>Inserir imagem: </label><br />
                    <input type="file" name="foto_img" class="form-control-file" accept="image/png, image/jpeg, image/jpg" />
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Atualizar" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                </div>
                <div class="form-group text-center">
                    <a href="index.php" class="btn btn-link">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST["atualizar"])) {
    $codUsu = $dados["us_cod"];
    require_once("db/classes/Entidade/usuario.class.php");
    $usuario = new Usuario();
    $usuario->setUs_cod($codUsu);
    $usuario->setUs_nome($_POST["us_nome"]);
    $usuario->setUs_email($_POST["us_email"]);
    $usuario->setUs_sexo($_POST["us_sexo"]);
    $usuario->setUs_tipo($dados["us_tipo"]);

    if ($usuarioDAO->atualizarUsuario($usuario)) {
        if (isset($_FILES['foto_img'])) {
            require_once("db/classes/DAO/fotoDAO.class.php");
            require_once("db/classes/Entidade/fotos.class.php");
            $fotoDAO = new FotoDAO();
            $fotos = new Fotos();

            $extensao = pathinfo($_FILES['foto_img']['name'], PATHINFO_EXTENSION);
            $extensao = '.' . strtolower($extensao);
            $nomeimagem = str_replace('-', '', date('Y-m-d')) . str_replace(':', '', date('H:i:s')) . rand(0, 999) . $extensao;

            $fotos->setFoto_us_cod($codUsu);
            $fotos->setFoto_img($nomeimagem);
            $fotos->setFoto_desc('Foto de perfil do usuário ' . $_POST['us_nome']);
            if ($fotoDAO->pegarFoto($codUsu)) {
                $img = $fotoDAO->pegarFoto($codUsu);
                if (file_exists('img/usuarios/' . $img['foto_img'])) {
                    unlink('img/usuarios/' . $img['foto_img']);
                }
                if ($fotoDAO->atualizarFoto($fotos)) {
                    move_uploaded_file($_FILES['foto_img']['tmp_name'], 'img/usuarios/' . $nomeimagem);
                }
            } elseif ($fotoDAO->inserirfoto($fotos)) {
                move_uploaded_file($_FILES['foto_img']['tmp_name'], 'img/usuarios/' . $nomeimagem);
            }
        }
        if ($_POST['usSenha'] != '') {
            require_once("db/classes/DAO/senhaDAO.class.php");
            $senhaDAO = new senhaDAO();
            $verifsenha = $senhaDAO->verificacaoSenha($_POST['usSenha'], $_POST['usSenhaRep']);

            if ($verifsenha == true) {
                if ($senhaDAO->redefinirSenha($dados["us_cod"], $_POST['usSenhaRep'])) {
?>
                    <script type="text/javascript">
                        alert("Usuário e senha atualizados com sucesso!");
                        document.location.href = "index.php";
                    </script>
                <?php
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Desculpe, houve um erro ao atualizar o usuário e senha. Por favor, verifique com o Webmaster.");
                    </script>
            <?php
                }
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("Usuário atualizado com sucesso!");
                // document.location.href = "index.php";
            </script>
        <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Desculpe, houve um erro ao atualizar o usuário");
            document.location.href = "index.php?&pg=editarusuario";
        </script>
<?php
    }
}
?>