<?	
	include_once("../../cba/class/conexao.php");
	$banco  = Conexao::singleton();
	include_once("../../cba/lib/util.php");
	//include_once("../../lib/verifica.php");
	
	$upd = "../../lib/Fachada.php?acao=".base64_encode('altUser');
	$act = "../print/printUsuarios.php";
	$new = "../../lib/Fachada.php?acao=".base64_encode("novoUser");
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<head> 
<title>Untitled Document</title> 
	<link rel="stylesheet" href="../../css/jquery.autocomplete.css" type="text/css" />
	<script type="text/javascript" src="../../js/jquery.js"></script> 
	<script type="text/javascript" src="../../js/jquery.tablesorter.js"></script> 
	<script type="text/javascript" src="../../js/jquery.tablesorter.pager.js"></script>
    <script type="text/javascript" src="../../js/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="../../js/jquery.quicksearch.js"></script>
    <script language="javascript" src="../../js/ajax.js" type="text/javascript"></script>
	<script type="text/javascript"> 
	$(function() {
		$("table")
			.tablesorter({widthFixed: true, widgets: ['zebra']})
			.tablesorterPager({container: $("#pager")
		});	
		
		/*$('table#t1 tbody tr th').quicksearch({
			position: 'before',
			attached: '#t1',
			hideElement: 'parent',
			stripeRowClass: ['odd', 'even'],
			labelText: 'Search by the email column only'
		});*/					
	});
	
	var req;

function loadXMLDoc2(url){
    req = null;
	url = "../"+url;	
    // Procura por um objeto nativo (Mozilla/Safari)
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = processReqChange2;
        req.open("GET", url, true);
        req.send(null);
    // Procura por uma versao ActiveX (IE)
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = processReqChange2;
            req.open("GET", url, true);
            req.send();
        }
    }
}

function processReqChange2(){
    // apenas quando o estado for "completado"
    document.getElementById('resultado').innerHTML = "<span><img src='../../img/ajax-loader.gif' /></span>";
    if (req.readyState == 4) {
        if (req.status == 200) {			  			
            document.getElementById('resultado').innerHTML = req.responseText;			
        }else{
            alert("Houve um problema ao obter os dados:\n" + req.statusText);
        }
    }
}

var req;

function loadXMLDoc3(url,valor){	
    req = null;
	url = "../consultas/"+url;
    // Procura por um objeto nativo (Mozilla/Safari)
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = processReqChange3;
        req.open("GET", url+"&pagina="+valor, true);
        req.send(null);
    // Procura por uma versao ActiveX (IE)
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = processReqChange3;
            req.open("GET", url+"&pagina="+valor, true);
            req.send();
        }
    }
}

function processReqChange3(){
    // apenas quando o estado for "completado"
    document.getElementById('resultado').innerHTML = "<span><img src='../../img/ajax-loader.gif' /></span>";
    if (req.readyState == 4) {
        // apenas se o servidor retornar "OK"
        if (req.status == 200) {
            // procura pela div id="resultado" e insere o conteudo
            // retornado nela, como texto HTML
            document.getElementById('resultado').innerHTML = req.responseText;
        } else {
            alert("Houve um problema ao obter os dados:\n" + req.statusText);
        }
    }
}

function lookup(NOME) {
	if(NOME.length == 0) {
		// Hide the suggestion box.
		//$('#suggestions').hide();
		$('#suggestions').hide('slow');
	} else {
		$.post("usuarios.php", {nome: ""+NOME+""}, function(data){
			if(data.length >0) {
				//$('#suggestions').show();
				$('#suggestions').show('slow');
				$('#autoSuggestionsList').html(data);
			}
		});
	}
} // lookup
	
function fill(thisValue) {
	$('#NOME').val(thisValue);
	setTimeout("$('#suggestions').hide();", 200);
}
	
</script> 
<style type="text/css">
	body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 30px;
		margin: 10px 0px 0px 0px;
		width: 200px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
</head> 
<body> 

<div id="main"> 
<!--<form action="#" id="quicksearch" class="quicksearch"></form>-->
<table id="t1" cellspacing="0" width="770" class="tablesorter" border="1" align="center" cellpadding="0"> 
	<thead> 
		<tr> 
			<th>Nome</th> 
			<th>N&iacute;vel</th> 
			<th>Status</th> 
			<th>&nbsp;</th> 
			<th>&nbsp;</th> 
		</tr> 
	</thead> 
	<tbody> 
    <?
		$sql = "SELECT * from cba_categorias";
		$row = $banco->listarArray($sql);
		foreach($row as $l){
    ?>
		<tr>		
			<td><?=$l["CATE_Codigo"];?></td> 
			<td><?=$l["CATE_Descricao"];?></td> 
			<td><?=$l["CATE_NacionalInter"];?></td>
		</tr> 
      <?
	  	}
      ?>
	</tbody> 
</table> 
<div id="pager" class="pager" align="center"><form>
    <table border="0" cellpadding="0" cellspacing="0" align="center">
    	<tr>
        	<td>
                <img src="../../img/first.png" class="first"/> 
                <img src="../../img/prev.png" class="prev"/> 
                <input type="text" class="pagedisplay"/> 
                <img src="../../img/next.png" class="next"/> 
                <img src="../../img/last.png" class="last"/> 
                <select class="pagesize"> 
                    <option selected="selected"  value="10">10</option> 
                    <option value="20">20</option> 
                    <option value="30">30</option> 
                    <option  value="40">40</option> 
                </select> 
        	</td>
         </tr>
     </table>
	</form> 
</div> 
 
</div> 

</body> 
</html> 
 