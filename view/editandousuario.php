<?php
if ($_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Desculpe, você não tem permissão para acessar esta página");
        document.location.href = "index.php";
    </script>
    <?php
}

require_once ("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

if($_GET['id']){
    $cod = $_GET['id'];
}else{
    $cod = $usuarioDAO->consultarCodUsuario($_POST['us_email']);
}

$dados = $usuarioDAO->pegarInfos($cod);

if($dados['us_sexo'] == 'f'){
    $sexo = 'Feminino';
}elseif($dados['us_sexo'] == 'M'){
    $sexo = 'Masculino';    
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
                        <label>Código:</label>
                        <input type="text" name="us_cod" required="" class="form-control" value="<?php echo $dados['us_cod']; ?>" readonly/>
                    </div>
                </div>   
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Nome:</label>
                        <input type="text" name="us_nome" required="" class="form-control" value="<?php echo $dados['us_nome']; ?>"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Email:</label>
                        <input type="email" name="us_email" required="" placeholder="nome@email.com" class="form-control" value="<?php echo $dados['us_email']; ?>" readonly/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Gênero:</label>
                        <input type="text" name="us_sexo" required="" class="form-control" value="<?php echo $sexo; ?>" readonly/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Data e hora de cadastro:</label>
                        <input type="text" name="us_datahora" required="" class="form-control" value="<?php echo $data . ' às ' . $dados['us_hora']; ?>" readonly/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Classe de usuário:</label>
                        <select name="us_tipo">
                        <?php if($dados['us_tipo'] == 1){ ?>
                            <option value="1" selected>Comum</option>                            
                            <option value="2">Postador</option>                                                        
                            <option value="3">Webmaster</option>                                                        
                        <?php }elseif($dados['us_tipo'] == 2){ ?>
                            <option value="1">Comum</option>                            
                            <option value="2" selected>Postador</option>                                                        
                            <option value="3">Webmaster</option>                                                        
                        <?php }elseif($dados['us_tipo'] == 3){ ?>
                            <option value="1">Comum</option>                            
                            <option value="2">Postador</option>                                                        
                            <option value="3" selected>Webmaster</option>                                                        
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Atualizar" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                    </div>
                </div>
				<div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
						<a href="index.php?&pg=editarusuario" class="btn btn-link">Voltar</a>
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

    $usuario->setUs_cod($_POST["us_cod"]);
    $usuario->setUs_nome($_POST["us_nome"]);
    $usuario->setUs_email($dados["us_email"]);
    $usuario->setUs_sexo($dados["us_sexo"]);
    $usuario->setUs_tipo($_POST["us_tipo"]);

    if ($usuarioDAO->atualizarUsuario($usuario)) {
        ?>
        <script type="text/javascript">
            alert("Usuário atualizado com sucesso!");
            document.location.href = "index.php?&pg=adm";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Desculpe, houve um erro ao atualizar o usuário");
            // document.location.href = "index.php?&pg=editarusuario";
        </script>
        <?php
    }
}
?>
