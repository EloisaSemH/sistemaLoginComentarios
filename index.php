<?php
error_reporting(-1);

setlocale(LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');

session_start();

$pag = $_GET['url'] ?? 'inicio';

include('view/' . $pag . '.php');

if ($pag == NULL || $pag == '') {
    if (!isset($_SESSION['logado'])) {
        $_SESSION['logado'] = 0;
        $_SESSION['cod_usuario'] = '';
    }
?>
    <script type="text/javascript">
        document.location.href = "index.php?&pg=!";
    </script>
<?php
}

// include('pags/rodape.php');
?>