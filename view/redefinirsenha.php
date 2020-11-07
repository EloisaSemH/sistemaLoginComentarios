<?php
    require_once ("db/classes/DAO/usuarioDAO.class.php");
    $usuarioDAO = new usuarioDAO();
 
    require_once ("db/classes/DAO/senhaDAO.class.php");
    $senhaDAO = new senhaDAO;
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="cadastro" action="" method="post" enctype="multipart/form-data">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Insira sua nova senha:</label>
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
                        <input type="submit" value="Atualizar senha" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST["atualizar"])) {
    $emai = base64_decode($_GET['conta']);
    $verifsenha = $senhaDAO->verificacaoSenha($_POST['usSenha'], $_POST['usSenhaRep']);

    $codeUsuario = $usuarioDAO->consultarCodUsuario($email);

    if($verifsenha == true){
        if ($senhaDAO->redefinirSenha($codeUsuario, $_POST['usSenhaRep'])) {
            ?>
            <script type="text/javascript">
                alert("Senha atualizada com sucesso!");
                document.location.href = "index.php?&pg=login";
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("Desculpe, houve algum erro ao atualizar sua senha. Por favor, verifique com o Webmaster.");
            </script>
        <?php
        }
    }else{
        ?>
        <script type="text/javascript">
            alert("Há algum problema com a senha, por favor, verifique");
        </script>
        <?php
    }
}
?>