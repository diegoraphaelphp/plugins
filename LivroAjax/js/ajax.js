//Inicia o XMLHttpRequest
function iniciaAjax() {
	var objetoAjax = false;
		if (window.XMLHttpRequest) {
			objetoAjax = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		try {		
		objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try {
			objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");			
		} catch(ex) {	
		objetoAjax = false;
       }
		}
	}
	return objetoAjax;
}

// Captura o link clicado
function linkClicado() {
	var clink = document.getElementById("clink");
		clink.onclick = function() {
		var query = this.getAttribute("href").split("?")[1];
		var arquivo = "requisicao-php.php?"+(query);
		return !requisitar(arquivo);
		};
	}
	
function carregando(container) {
	while (container.hasChildNodes()) {
	container.removeChild(container.lastChild);
	}
	
	var imagem = document.createElement("img");
	imagem.setAttribute("src", "img/carregando.gif");
	imagem.setAttribute("alt", "Carregando...");
	imagem.style.cssText = 'display:block; width:64px; height:64px; margin:30px auto;'; 
	container.appendChild(imagem);
}	

//Função para requisitar um arquivo		
function requisitar(arquivo) {
			var requisicaoAjax = iniciaAjax(); 
				if(requisicaoAjax) {
					carregando(document.getElementById("insere_aqui"));     
					requisicaoAjax.onreadystatechange = function () {	
					trataResposta(requisicaoAjax);	
					};
  requisicaoAjax.open("GET", arquivo, true);
  requisicaoAjax.send(null);
    return true;
  } else {
    return false;
  }
}

				
//Função para mostrar a resposta
function mostraResposta(requisicaoAjax) {
	if(requisicaoAjax.readyState == 4) {
	if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304) {
	//alert(requisicaoAjax.responseText);
	var insere_aqui = document.getElementById("insere_aqui");
	insere_aqui.innerHTML = requisicaoAjax.responseText;
	} else {
	alert("Problema na comunicação com o servidor");
	}
	}	
}

function trataResposta(requisicaoAjax) {                 
	if(requisicaoAjax.readyState == 4) {
	if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304) {         
	document.getElementById("insere_aqui").innerHTML = requisicaoAjax.responseText;
} 
}
}
window.onload = linkClicado;

/*function trataResposta(requisicaoAjax){
	if(requisicaoAjax.readyState == 4){
		if(requisicaoAjax.status == 200 || requisicaoAjax.status == 304){
		var dados = requisicaoAjax.responseXML;
		var tituloDado = dados.getElementsByTagName("titulo")[0].firstChild.nodeValue;
		var autorDado  = dados.getElementsByTagName("autor")[0].firstChild.nodeValue;
		var siteDado   = dados.getElementsByTagName("site")[0].firstChild.nodeValue;
		var titulo = document.createElement("h2");
		var site   = document.createElement("a");
		site.setAttribute("href", siteDado);
		var textoTitulo = document.createTextNode(tituloDado);
		site.appendChild(textoTitulo);
		titulo.appendChild(site);
		var autor = document.createElement("p");
		var textoAutor = document.createTextNode(autorDado);
		autor.appendChild(textoAutor);
		var insere = document.getElementById("insere_aqui");
		while(insere.hasChildNodes()){
			insere.removeChild(insere.lastChild);
		}
		insere.appendChild(titulo);
		insere.appendChild(autor);
		} else {
		alert("Problema na comunicação com o servidor");
		}
	}
}*/
