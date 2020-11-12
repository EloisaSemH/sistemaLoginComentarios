<?php
require_once("db/classes/DAO/usuarioDAO.class.php");
require_once("db/classes/Entidade/usuario.class.php");
$usuarioDAO = new usuarioDAO();
$usuario = new usuario();
?>
<div id="index">
    <div class="container">
        <div class="row justify-content-center center text-left">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <form name="login" action="" method="post" enctype="" class="bg-dark p-4 text-light rounded shadow">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="usEmail" required="" placeholder="nome@email.com" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <input type="password" name="usSenha" required="" class="form-control" />
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Entrar" id="entrar" name="entrar" class="btn btn-outline-info">
                    </div>
                    <div class="form-group text-center">
                        <a href="index.php?&pg=cadastro" class="btn btn-link">Cadastre-se</a>
                        <!-- <a href="index.php?&pg=recuperarsenha" class="btn btn-link">Esqueceu a senha?</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['entrar'])) {
    if ($usuarioDAO->login($_POST['usEmail'], $_POST['usSenha'])) {

        $dados = $usuarioDAO->consultarPorEmail($_POST['usEmail']);
        $_SESSION['cod_usuario'] = $dados['us_cod'];
        $_SESSION['usuario'] = $dados['us_nome'];

        if ($dados['us_tipo'] == 1) {
            // Usuário comum
            $_SESSION['logado'] = 1;
        } elseif ($dados['us_tipo'] == 2) {
            // Usuário postador
            $_SESSION['logado'] = 2;
        } elseif ($dados['us_tipo'] == 3) {
            // Webmaster
            $_SESSION['logado'] = 3;
        } else {
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