<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="login" action="index.php?&pg=editandousuario" method="post" enctype="">                            
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label>Por favor, insira seu email:</label>
                        <input type="email" name="us_email" required="" placeholder="nome@email.com" class="form-control"/>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Enviar" id="enviar" name="enviar" class="btn btn-outline-dark">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['enviar'])) {
    $mail = $_POST['us_email'];
    $mailCript = base64_encode($_POST['us_email']);
    $mensagem2 = "Você está recebendo este e-mail porque foi solicitada a alteração de senha para o site Italianos em Itu. Clique no link abaixo para redefinir sua senha. <br/><a href='http://localhost/logSystem/redefinirSenha.php?conta={$mailCript}'>Recuperar Senha</a>";
    $mensagem = '<h1 style="text-align: center;"><strong>Ol&aacute;!</strong></h1></br><img src="img/Logo2.png" style="display:block;padding:0px;text-align:center;height:auto;width:100%"/></br><p style="text-align: center;">Uma redefini&ccedil;&atilde;o de senha para o site Italianos em Itu foi solicitada atrav&eacute;s desse e-mail.<br />Caso tenha sido voc&ecirc;,&nbsp;<em><a href="http://italianosemitu.com.br/index.php?&pg=redefinirsenha&conta='. $mailCript .'">clique aqui</a></em>&nbsp;para redefinir sua senha, se n&atilde;o, desconsidere este e-mail.</p><p>&nbsp;</p><p><em>- Suporte Italianos em Itu Website.&nbsp;</em></p>';
    require_once("pags/enviaremail.php");

    enviarEmail($_POST['us_email'], "Prezado", "Italianos em Itu: Recuperação de senha", $mensagem);
}
?>