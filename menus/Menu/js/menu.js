$(document).ready(function(){
//$('#av').ready(function(){
		//Definimos que todos as tags dd ter�o display:none menos o primeiro filho
		$('dd:not(:first)').hide();
		//Ao clicar no link, executamos a func�o
		$('dt a').click(function(){
			//As tags dd's vis�veis agora ficam com display:none
			$("dd:visible").slideUp("slow");
			//Ap�s, a func�o � transferida para seu pai, que procura o pr�ximo irm�o no c�digo o tonando vis�vel
			$(this).parent().next().slideDown("slow");
			return false;
		});
});