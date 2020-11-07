<?php
    if ($_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
        ?>
        <script type="text/javascript">
            alert("Faça login para acessar esta página");
            document.location.href = "index.php?&pg=login";
        </script>
        <?php
    }

    if(isset($_GET['id'])){
        $not_cod = $_GET['id'];
    }else{
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=noticias&pagina=1";
        </script>
        <?php
    }

    require_once ("db/classes/DAO/noticiasDAO.class.php");
    require_once ("db/classes/DAO/textonoticiasDAO.class.php");
    $noticiasDAO = new noticiasDAO();
    $textonoticiasDAO = new textonoticiasDAO();

    $noticia = $noticiasDAO->pegarNoticia($not_cod);

    $textonoticia = $textonoticiasDAO->pegarTextoNoticia($not_cod);
?>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="" method="post" enctype="multipart/form-data">
                <div class="form-row justify-content-center">
                    <?php if (file_exists('img/noticias/' . $noticia['not_img']) && !is_null($noticia['not_img'])) { ?>
                        <img src="img/noticias/<?php echo $noticia['not_img']; ?>" class="d-block w-100" height="50%"/>
                    <?php } ?>
                </div> 
                <div class="form-row justify-content-center mt-2">
                    <div class="form-group col-md-8">
                        <label>Título: *</label>
                        <input type="text" name="not_titulo" required="" class="form-control" max="128" value="<?php echo $noticia['not_titulo']; ?>"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Subtitulo:</label>
                        <input type="text" name="not_subtitulo" class="form-control" max="256" value="<?php echo $noticia['not_subtitulo']; ?>"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Texto: *</label><br/>
                        <textarea style="height: 300px;" name="text_texto" class="form-control" required=""><?php echo $textonoticia['text_texto']; ?></textarea>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Inserir imagem:</label><br/>
                        <input type="file" name="not_img" class="form-control" accept="image/png, image/jpeg"/>
                    </div>
                </div>
                <?php if($noticia['not_cat'] == 'not'){ ?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name='excluirfoto'>
                            <label class="custom-control-label" for="customCheck1">Excluir foto da notícia</label>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Categoria: * </label>
                        <select name="not_cat">
                            <?php if($noticia['not_cat'] == 'not'){
                                echo '<option value="not" selected>Noticia</option>';                           
                                echo '<option value="eve">Evento</option>';
                            }elseif($noticia['not_cat'] == 'eve'){
                                echo '<option value="not">Noticia</option>';                      
                                echo '<option value="eve" selected>Evento</option>';
                            } ?>                                            
                        </select>                   
                    </div>
                </div>
                <?php
                if($_SESSION['logado'] == 3){?>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-2">
                            <label>Ativo: * </label>
                            <select name="not_ativo">
                                <?php
                                    if($noticia['not_ativo'] == '0'){
                                        echo '<option value="0" selected>Desativado</option>';                           
                                        echo '<option value="1">Ativado</option>';
                                    }elseif($noticia['not_ativo'] == '1'){
                                        echo '<option value="0">Desativado</option>';                      
                                        echo '<option value="1" selected>Ativado</option>';
                                    }
                                ?>                                            
                            </select>                   
                        </div>
                    </div>
                <?php } ?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label class="text-danger">* Item obrigatório</label>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Atualizar notícia" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Excluir notícia" id="excluir" name="excluir" class="btn btn-danger">
                        <!-- <button onclick="excluirFunction()" id="excluir" name="excluir" class="btn btn-danger">Excluir notícia</button> -->
                    </div>
                </div>            
<?php
if (isset($_POST["atualizar"])) {
    require_once ("db/classes/Entidade/textonoticias.class.php");
    $textonoticias = new textonoticias();

    require_once ("db/classes/Entidade/noticias.class.php");
    $noticias = new noticias();

    $noticias->setNot_cod($not_cod);
    $noticias->setNot_titulo($_POST['not_titulo']);
    $noticias->setNot_subtitulo($_POST['not_subtitulo']);
    $noticias->setNot_cat($_POST['not_cat']);
    $noticias->setNot_ativo($_POST['not_ativo']);
    $noticias->setNot_img($noticia['not_img']);

    if(isset($_POST['excluirfoto'])){
        $noticias->setNot_img(NULL);
    }else{
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

                if(!is_null($noticia['not_img']) && $noticia['not_img'] == 'NULL'){
                    unlink('img/noticias/' . $noticia['not_img']);
                }

                $verf = move_uploaded_file($imagem['tmp_name'], 'img/noticias/' . $nomeimagem);

                if($verf == 1){
                    $noticias->setNot_img($nomeimagem);
                }
            }
        }
    }

    if ($noticiasDAO->atualizarNoticia($noticias)) {
        $textonoticias->setNot_cod($not_cod);
        $textonoticias->setText_texto($_POST['text_texto']);

        if ($textonoticiasDAO->atualizar($textonoticias)) {
            ?>
            <script type="text/javascript">
                alert("Notícia alterada com sucesso!");
                document.location.href = "index.php?&pg=noticia&id=<?php echo $not_cod; ?>";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Desculpe, houve um erro ao alterar a notícia, contate o Webmaster para resolvê-lo. Código: ATTTEXT01");
            </script>
            <?php
        }
    }else{
    ?>
    <script type="text/javascript">
        alert("Desculpe, houve um erro ao alterar a notícia, contate o Webmaster para resolvê-lo. Código: ATTNOT01");
    </script>
    <?php
    }
}

if(isset($_POST['excluir'])){
    ?>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-3 text-center">
            <div class="alert alert-warning" role="alert">Você tem certeza que quer excluir a notícia?<br/>(A ação não poderá ser desfeita)
                <input type="submit" value="Sim" id="confirmaexcluirSIM" name="confirmaexcluirSIM" class="btn btn-outline-danger mt-1">
                <input type="submit" value="Cancelar" id="confirmaexcluirNAO" name="confirmaexcluirNAO" class="btn btn-outline-secondary mt-1">
            </div>
        </div>
    </div>
    <?php
    
}

if(isset($_POST['confirmaexcluirSIM'])){
    require_once ("db/classes/Entidade/noticias.class.php");
    $noticias = new noticias();

    $noticias->setNot_cod($not_cod);
    if ($noticiasDAO->excluirNoticias($noticias)) {
        ?>
        <script type="text/javascript">
            alert("Notícia excluida com sucesso!");
            document.location.href = "index.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Desculpe, houve um erro ao excluir a notícia, contate o Webmaster para resolvê-lo. Código: EXNOT01");
        </script>
        <?php
    }
}
?>
                <div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
                        <a class="btn btn-link" href="index.php?&pg=noticia&id=<?php echo $not_cod; ?>">Voltar</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>