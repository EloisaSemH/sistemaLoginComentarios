<?php
require_once("db/classes/DAO/usuarioDAO.class.php");
require_once("db/classes/Entidade/usuario.class.php");
$usuarioDAO = new usuarioDAO();
$usuario = new usuario();

require_once("db/classes/DAO/senhaDAO.class.php");
require_once("db/classes/Entidade/senha.class.php");
$senhaDAO = new senhaDAO;
$senha = new senha;
?>
<div id="index">
<div class="container">
    <div class="row justify-content-center center text-left">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <form name="cadastro" action="" method="post" enctype="multipart/form-data" class="bg-dark p-4 text-light rounded shadow">
                <div class="form-group">
                    <label>Nome completo:</label>
                    <input type="text" maxlength='50' name="usNome" required="" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="usEmail" id="email" maxlength="100" required="">
                </div>
                <div class="form-group">
                    <label>Gênero: </label>
                    <select name="slSexo" class="form-control">
                        <option value="f">Feminino</option>
                        <option value="m">Masculino</option>
                        <option value="o">Outro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin');" type="password" class="form-control" name="usSenha" id="senha1" maxlength="40" required="">
                </div>
                <div class="form-group">
                    <label>Repita a senha:</label>
                    <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin')" type="password" class="form-control" name="usSenhaRep" id="senha2" maxlength="40" required="">
                </div>
                <div class="form-group">
                    <p id="senhasCoin">&nbsp;</p>
                </div>
                <div class="form-group">
                    <label>Inserir imagem: </label><br />
                    <input type="file" name="foto_img" class="form-control-file" accept="image/png, image/jpeg, image/jpg" />
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Registrar" id="registrar" name="registrar" class="btn btn-outline-info">
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<?php
if (isset($_POST["registrar"])) {
    $verifsenha = $senhaDAO->verificacaoSenha($_POST['usSenha'], $_POST['usSenhaRep']);

    if ($verifsenha == true) {
        $usuario->setUs_nome($_POST["usNome"]);
        $usuario->setUs_email($_POST["usEmail"]);
        $usuario->setUs_sexo($_POST["slSexo"]);
        if (!$usuarioDAO->consultarPorEmail($_POST['usEmail'])) {
            if ($usuarioDAO->cadastrar($usuario)) {
                $codUsu = $usuarioDAO->consultarCodUsuario($_POST['usEmail']);
                $senha->setSe_senha($_POST['usSenhaRep']);
                $senha->setUs_cod($codUsu);
                if ($senhaDAO->cadastrar($senha)) {
                    if (isset($_FILES['foto_img'])) {
                        require_once("db/classes/DAO/fotoDAO.class.php");
                        require_once("db/classes/Entidade/fotos.class.php");
                        $fotoDAO = new FotoDAO();
                        $fotos = new Fotos();

                        $extensao = pathinfo($_FILES['foto_img']['name'], PATHINFO_EXTENSION);
                        $extensao = '.' . strtolower($extensao);
                        $nomeimagem = str_replace('-', '', date('Y-m-d')) . str_replace(':', '', date('H:i:s')) . rand(0,999) . $extensao;

                        $verf = move_uploaded_file($_FILES['foto_img']['tmp_name'], 'img/usuarios/' . $nomeimagem);
                        if ($verf == 1) {
                            $fotos->setFoto_us_cod($codUsu);
                            $fotos->setFoto_img($nomeimagem);
                            $fotos->setFoto_desc('Foto de perfil do usuário ' . $_POST['usNome']);
                            if ($fotoDAO->inserirfoto($fotos)) {
?>
                                <script type="text/javascript">
                                    alert("Cadastro com foto realizado com sucesso!");
                                    document.location.href = "index.php?&pg=login";
                                </script>
                            <?php
                            } else {
                            ?>
                                <script type="text/javascript">
                                    alert("Desculpe, houve um erro ao enviar a foto, contate o Webmaster para resolvê-lo.");
                                </script>
                            <?php
                            }
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Desculpe, houve um erro ao salvar a foto, contate o Webmaster para resolvê-lo.");
                            </script>
                    <?php
                        }
                    }
                    ?>
                    <script type="text/javascript">
                        alert("Cadastrado com sucesso!");
                        document.location.href = "index.php?&pg=login";
                    </script>
                <?php
                } else {
                ?>
                    <script type="text/javascript">
                        alert("Erro ao cadastrar");
                    </script>
            <?php
                }
            }
        } else {
            ?>
            <script type="text/javascript">
                alert("O E-mail informado já foi cadastrado");
            </script>
<?php
        }
    }
}
?>