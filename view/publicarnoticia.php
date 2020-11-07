<?php
if ($_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Faça login para acessar esta página");
        document.location.href = "index.php?&pg=login";
    </script>
    <?php
}
?>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="publicarnoticia" action="" method="post" enctype="multipart/form-data">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Título: *</label>
                        <input type="text" name="not_titulo" required="" class="form-control" max="128"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Subtitulo:</label>
                        <input type="text" name="not_subtitulo" class="form-control" max="256"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Texto: *</label><br/>
                        <textarea style="height: 300px;" name="text_texto" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Inserir imagem:</label><br/>
                        <input type="file" name="not_img" class="form-control" accept="image/png, image/jpeg"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Categoria: * </label>
                        <select name="not_cat">
                            <option value="not" selected>Noticia</option>                            
                            <option value="eve">Evento</option>                                                        
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label class="text-danger">* Item obrigatório</label>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Enviar notícia" id="enviar" name="enviar" class="btn btn-outline-dark">
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
if (isset($_POST["enviar"])) {
    require_once ("db/classes/DAO/usuarioDAO.class.php");
    require_once ("db/classes/Entidade/usuario.class.php");
    $usuarioDAO = new usuarioDAO();
    $usuario = new usuario();

    require_once ("db/classes/DAO/textonoticiasDAO.class.php");
    require_once ("db/classes/Entidade/textonoticias.class.php");
    $textonoticiasDAO = new textonoticiasDAO();
    $textonoticias = new textonoticias();

    require_once ("db/classes/DAO/noticiasDAO.class.php");
    require_once ("db/classes/Entidade/noticias.class.php");
    $noticiasDAO = new noticiasDAO();
    $noticias = new noticias();

    $data = date("Y/m/d");
    $hora = date("H:i:s");

    $dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

    $noticias->setNot_autor($dados['us_nome']);
    $noticias->setNot_titulo($_POST['not_titulo']);
    $noticias->setNot_data($data);
    $noticias->setNot_hora($hora);
    $noticias->setNot_cat($_POST['not_cat']);
    
    if(isset($_POST['not_subtitulo'])){
        $noticias->setNot_subtitulo($_POST['not_subtitulo']);
    }else{
        $noticias->setNot_subtitulo();
    }
    
    if(!is_null($_FILES['not_img']['name'])){
        if($_FILES['not_img']['error'] == 1){
            ?>
            <script type="text/javascript">
                alert("Desculpe, houve um erro ao enviar a imagem. Envie uma imagem diferente e tente novamente.");
            </script>
            <?php
            die();
        }else{
            $imagem = $_FILES['not_img'];

            $data = date("Y/m/d");
            $hora = date("H:i:s");

            $extensao = pathinfo ($imagem['name'], PATHINFO_EXTENSION);
            $extensao = '.' . strtolower ($extensao);

            $novadata = str_replace("/", "", $data);
            $novahora = str_replace(":", "", $hora);
            
            $nomeimagem = $_POST['not_cat'] . '_' . $novadata . $novahora . $extensao;

            $verf = move_uploaded_file($imagem['tmp_name'], 'img/noticias/' . $nomeimagem);

            if($verf == 1){
                $noticias->setNot_img($nomeimagem);
            }
        }
    }

    if ($noticiasDAO->inserirNoticia($noticias)) {
        $codTexto = $noticiasDAO->consultarCodNotDataHora($data, $hora);
        $textonoticias->setNot_cod($codTexto);
        $textonoticias->setText_texto($_POST['text_texto']);

        if ($textonoticiasDAO->cadastrar($textonoticias)) {
            ?>
            <script type="text/javascript">
                alert("Notícia enviada com sucesso!");
                document.location.href = "index.php?&pg=adm";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Desculpe, houve um erro ao enviar a notícia, contate o Webmaster para resolvê-lo. Código: TEXT01");
            </script>
            <?php
        }
    }else{
    ?>
    <script type="text/javascript">
        alert("Desculpe, houve um erro ao enviar a notícia, contate o Webmaster para resolvê-lo. Código: NOT01");
    </script>
    <?php
    }
}
?>