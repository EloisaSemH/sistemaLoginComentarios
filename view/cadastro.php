<?php
    require_once ("db/classes/DAO/usuarioDAO.class.php");
    require_once ("db/classes/Entidade/usuario.class.php");
    $usuarioDAO = new usuarioDAO();
    $usuario = new usuario();
 
    require_once ("db/classes/DAO/senhaDAO.class.php");
    require_once ("db/classes/Entidade/senha.class.php");
    $senhaDAO = new senhaDAO;
    $senha = new senha;
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="cadastro" action="" method="post" enctype="multipart/form-data">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Nome completo:</label>
                        <input type="text" maxlength='50' name="usNome" required="" class="form-control"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="usEmail" id="email" maxlength="100" required="">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <label>Sexo:</label>
                            <select name="slSexo">
                                <option value="f">Feminino</option>
                                <option value="m">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <label>Senha:</label>
                            <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin');" type="password" class="form-control" name="usSenha" id="senha1" maxlength="40" required="">
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <label>Repita a senha:</label>
                            <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin')" type="password" class="form-control" name="usSenhaRep" id="senha2" maxlength="40" required="">
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <p id="senhasCoin">&nbsp;</p>
                        </div>
                    </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Registrar" id="registrar" name="registrar" class="btn btn-outline-dark">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST["registrar"])) {
    $verifsenha = $senhaDAO->verificacaoSenha($_POST['usSenha'], $_POST['usSenhaRep']);
    
    if($verifsenha == true){
        $usuario->setUs_nome($_POST["usNome"]);
        $usuario->setUs_email($_POST["usEmail"]);
        $usuario->setUs_sexo($_POST["slSexo"]);
        if (!$usuarioDAO->consultarPorEmail($_POST['usEmail'])) {
            if ($usuarioDAO->cadastrar($usuario)) {
                $codUsu = $usuarioDAO->consultarCodUsuario($_POST['usEmail']);
                $senha->setSe_senha($_POST['usSenhaRep']);
                $senha->setUs_cod($codUsu);
                if ($senhaDAO->cadastrar($senha)) {
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