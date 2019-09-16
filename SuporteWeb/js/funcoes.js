/* 
  Funções JS do Projeto 
*/

/* Retorna a hora atual em um elemento com o ID chamado hora */
function relogio() {
		var agora = new Date();
		var d = verificaNumero(agora.getDate());
		var m = verificaNumero(agora.getMonth());
		var y = verificaNumero(agora.getFullYear());
		var h = verificaNumero(agora.getHours());
		var mi = verificaNumero(agora.getMinutes());
		var s = verificaNumero(agora.getSeconds());
		
		document.getElementById('hora').innerHTML = d+"/"+m+"/"+y +" "+  h + ":" + mi + ":" + s;
		var t = setTimeout(relogio, 500);
}

/* Verifica se o número é menor que zero e adicionar um zero à esquerda do mesmo */		
function verificaNumero(i) {
		if (i < 10) {i = "0" + i};  
		return i;
}

/* Conta o número de caracteres faltantes no texto */
function contaCaractere(val, divId, tamanho) {	
    var len = $('#' + val).val().length;
    if (len > tamanho) {        
		$('#' + divId).html("Máximo de caracteres <strong>atingidos</strong> para o campo! <br>Os dados serão <strong>perdidos</strong>!");
    } else {
        var a = tamanho - len;
        var count = "<span style='color:red'>" + a + "</span>";
        var text = "Restam";
        var count1 = "<span style='color:grey'>" + text + "</span>";
        var text1 = "caracteres";
        var count2 = "<span style='color:grey'>" + text1 + "</span>";
        $('#' + divId).html(count1 + " " + count + " " + count2);
    }
}

/* Imprime a DIV informada */
function imprimeDiv(nomeDIV, nomeTitulo) {
                var printContents = document.getElementById(nomeDIV).innerHTML;
                var popupWin = window.open('', '_blank', 'width=1024,height=768');
                popupWin.document.open();
                popupWin.document.write('<html><head><title>Relatorio</title></head>' +
                        '<body onload="window.print()"><style>#img{width:100%; opacity:0.1; position:absolute;}</style><img id="img" src="imagens/logo.png"><h3>Falcon Tecnologia - Suporte Web</h3><h4>' + nomeTitulo + '</h4>' + printContents + '</html>');
                popupWin.document.close();
				
            };



