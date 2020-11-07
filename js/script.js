function validarSenha(senha1, senha2, campo){
    var resultado = document.getElementById(campo);
    var verficar = false;
    senhaPrimaria = document.getElementById(senha1).value;
    senhaSecundaria = document.getElementById(senha2).value;

    if(senhaPrimaria.length >= 8){
        if(senhaPrimaria == senhaSecundaria){
            resultado.innerHTML = "Senhas iguais";
            verficar = true;
        }else{
            resultado.innerHTML = "Senhas diferentes";
        }
    }else{
        resultado.innerHTML = "A senha precisa conter, pelo menos, 8 caracteres";
    }
}

function excluirFunction() {
    var txt;
    var r = confirm("Tem certeza que quer excluir essa noticia?");
    if (r == true) {
        txt = "sim";
    } else {
        txt = "nao";
    }
}
