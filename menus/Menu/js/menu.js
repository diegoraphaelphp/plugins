$(document).ready(function(){
//$('#av').ready(function(){
		//Definimos que todos as tags dd terão display:none menos o primeiro filho
		$('dd:not(:first)').hide();
		//Ao clicar no link, executamos a funcão
		$('dt a').click(function(){
			//As tags dd's visíveis agora ficam com display:none
			$("dd:visible").slideUp("slow");
			//Após, a funcão é transferida para seu pai, que procura o próximo irmão no código o tonando visível
			$(this).parent().next().slideDown("slow");
			return false;
		});
});