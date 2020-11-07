<?php
require_once ("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

$dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

if($dados['us_sexo'] == 'f'){
    $sexo = '1';
}elseif($dados['us_sexo'] == 'm'){
    $sexo = '2';    
}else{
    $sexo = 'Outro';
}

$data = date('d/m/Y', strtotime($dados['us_data']));
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="" method="post" enctype="">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Nome:</label>
                        <input type="text" name="us_nome" required="" class="form-control" value="<?= $dados['us_nome']; ?>"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Email:</label>
                        <input type="email" name="us_email" required="" placeholder="nome@email.com" class="form-control" value="<?= $dados['us_email']; ?>"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Gênero:</label>
                        <select name="us_sexo">
                        <?php if($sexo == 1){ ?>
                            <option value="f" selected>Feminino</option>                            
                            <option value="m">Masculino</option>                                                        
                        <?php }elseif($sexo == 2){ ?>
                            <option value="f">Feminino</option>                            
                            <option value="m" selected>Masculino</option>                                                        
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Insira sua nova senha:</label>
                        <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin');" type="password" class="form-control" name="usSenha" id="senha1" maxlength="40">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Repita a senha:</label>
                        <input onKeyUp="validarSenha('senha1', 'senha2', 'senhasCoin')" type="password" class="form-control" name="usSenhaRep" id="senha2" maxlength="40">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <p id="senhasCoin">&nbsp;</p>
                    </div>
                </div>
                
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Atualizar" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                    </div>
                </div>
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php" class="btn btn-link">Voltar</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST["atualizar"])) {
    require_once ("db/classes/Entidade/usuario.class.php");
    $usuario = new usuario();
    // die($_POST['usSenha']);
    $usuario->setUs_cod($dados["us_cod"]);
    $usuario->setUs_nome($_POST["us_nome"]);
    $usuario->setUs_email($_POST["us_email"]);
    $usuario->setUs_sexo($_POST["us_sexo"]);
    $usuario->setUs_tipo($dados["us_tipo"]);

    if ($usuarioDAO->atualizarUsuario($usuario)) {
        if($_POST['usSenha'] != ''){
            require_once ("db/classes/DAO/senhaDAO.class.php");
            $senhaDAO = new senhaDAO();
            $verifsenha = $senhaDAO->verificacaoSenha($_POST['usSenha'], $_POST['usSenhaRep']);
    
            if($verifsenha == true){
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
        }else{
            ?>
            <script type="text/javascript">
                alert("Usuário atualizado com sucesso!");
                document.location.href = "index.php";
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