<?php
require_once ("db/classes/DAO/usuarioDAO.class.php");
require_once ("db/classes/Entidade/usuario.class.php");
$usuarioDAO = new usuarioDAO();
$usuario = new usuario();
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="" method="post" enctype="">                            
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Email:</label>
                        <input type="email" name="usEmail" required="" placeholder="nome@email.com" class="form-control"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Senha:</label>
                        <input type="password" name="usSenha" required="" class="form-control"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Entrar" id="entrar" name="entrar" class="btn btn-outline-dark">
                    </div>
                </div>
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php?&pg=cadastro" class="btn btn-link">Cadastre-se</a>
                        <a href="index.php?&pg=recuperarsenha" class="btn btn-link">Esqueceu a senha?</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['entrar'])) {
    if ($usuarioDAO->login($_POST['usEmail'], $_POST['usSenha'])) {

        $dados = $usuarioDAO->consultarPorEmail($_POST['usEmail']);
        $_SESSION['cod_usuario'] = $dados['us_cod'];
        $_SESSION['usuario'] = $dados['us_nome'];
        
        if($dados['us_tipo'] == 1){
            // Usuário comum
            $_SESSION['logado'] = 1;
        }elseif($dados['us_tipo'] == 2){
            // Usuário postador
            $_SESSION['logado'] = 2;
        }elseif($dados['us_tipo'] == 3){
            // Webmaster
            $_SESSION['logado'] = 3;
        }else{
            ?>
            <script type="text/javascript">
                alert("Desculpe, houve algum erro na sessão. Contate o Webmaster para a verificação.");
            </script>
            <?php
        }

        ?>
        <script type="text/javascript">
            document.location.href = "index.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Email ou senha incorretos");
        </script>
        <?php
    }
}
?>