    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <?php
            require_once("db/classes/DAO/comentarioDAO.class.php");
            $comentarioDAO = new ComentarioDAO();
            ?>
            <form name="enviarcomentario" action="" method="post" enctype="">
                <?php if (is_null($_SESSION['logado'])) { ?>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-4">
                            <label>Insira seu nome:</label><br />
                        </div>
                        <div class="form-group col-8">
                            <input type="text" maxlength="100" name="com_autor" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <h6 class="mt-1 mb-1">Ou faça <a href="index.php?&pg=login">login</a> para comentar</h6>
                    </div>
                <?php } ?>
                <div class="form-group ">
                    <label>Insira seu comentário:</label><br />
                    <textarea name="com_texto" class="form-control" required=""></textarea>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Enviar comentário" id="enviar" name="enviar" class="btn btn-outline-info">
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['enviar'])) {
        require_once("db/classes/Entidade/comentario.class.php");
        $comentario = new Comentario();
        if (!is_null($_SESSION['logado'])) {
            require_once("db/classes/DAO/usuarioDAO.class.php");
            $usuarioDAO = new UsuarioDAO();
            $autor = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);
            $comentario->setCom_us_cod($_SESSION['cod_usuario']);
            $autor = $autor['us_nome'];
        }else{
            $autor = $_POST['com_autor'];
        }

        $comentario->setCom_autor($autor);
        $comentario->setCom_texto($_POST['com_texto']);
        $comentario->setCom_data(date("Y-m-d"));
        $comentario->setCom_hora(date("H:i:s"));

        if ($comentarioDAO->enviarComentario($comentario)) {
    ?>
            <script type="text/javascript">
                alert("Comentário enviado com sucesso!");
                // document.location.href = "index.php";
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("Desculpe, houve algum erro ao enviar seu comentário.");
            </script>
    <?php
        }
    }
    $retorno = $comentarioDAO->pegarComentarios($_SESSION['cod_usuario'], $_SESSION['logado']);
    ?>
    <?php
    if (isset($_POST['excluirComentario'])) {
        $comcod = $_POST['codComent'];
    ?>
        <script type="text/javascript">
            var res = confirm("Tem certeza que quer excluir esse comentario?");
            if (res) {
                document.location.href = "index.php?&res=true&comcod=<?= $comcod ?>";
            } else {
                document.location.href = "index.php?&res=false";
            }
        </script>
        <?php
    }
    if (isset($_GET['res'])) {
        $res = $_GET['res'];
        if ($res == 'true') {
            if ($comentarioDAO->excluirComentario($_GET['comcod'])) {
        ?>
                <script type="text/javascript">
                    alert("Comentário excluído com sucesso!");
                    document.location.href = "index.php";
                </script>
            <?php
            } else {
            ?>
                <script type="text/javascript">
                    alert("Desculpe, houve um erro ao excluir comentário, contate o Webmaster para resolvê-lo. Código: EXCOM01");
                </script>
            <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                document.location.href = "index.php?";
            </script>
    <?php
        }
    }
