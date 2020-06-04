<?
	include_once("PerfilMunicipal/lib/conexao.php");
	$banco = Conexao::singleton();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="PerfilMunicipal/css/style.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="PerfilMunicipal/js/valida.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {
	color: #0033FF;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<?

//$v = "123456";
//$z = base64_decode($v);
//echo $v = md5($v);

//echo $z;
/*$s = "¶ëÞë@äÿžü§®››üžkkë†©";
$z = base64_decode($s);
echo "Z:".$z;*/


	//Separa a string idenficando pelos espaços
//	$nomeC = {nome};
	
/*	$com = array("á", "da", "à", "â", "a", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "u", "ù", "û", "ü", "c"
				, "a", "À", "Â", "a", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "u", "Ù", "Û", "Ü", "c", " de "
				, " do ", " dos ", " e ", " s "); 
	$sem = array("a", " ", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" 
				, "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C", " "
				, " ", " ", " ", " ");  

	$t = str_replace( $com, $sem, $nomeC ); 
	
	//Trata a string como minusculas
	$nomeM = strtolower($t);
	$nomeD = explode(" ", $nomeM);

	$primeiro = $nomeD[0];
	$segundo  = $nomeD[1];
	$terceiro = $nomeD[2];
	$penultimo= count($nomeD)-2;
	$ultimo   = count($nomeD)-1;
	
//	Montando os e-mails
	$mail1 = $primeiro.".".$segundo."@ipa.br";
	$mail2 = $primeiro.".".$terceiro."@ipa.br";
	$mail3 = $primeiro.".".$nomeD[$ultimo]."@ipa.br";
	$mail4 = $primeiro.".".$nomeD[$penultimo]."@ipa.br";
	
	
	$r = "<input type='radio' name='mailSuger' value=".$mail1." />".$mail1."<br>
		       <input type='radio' name='mailSuger' value=".$mail2." />".$mail2."<br>
		       <input type='radio' name='mailSuger' value=".$mail3." />".$mail3."<br>
		       <input type='radio' name='mailSuger' value=".$mail4." />".$mail4;
	echo $r;*/


//function retiraAcento($texto) {

	//Separa a string idenficando pelos espaços
/*	$nomeC = $nomeC = "Marival Gomes dos Santos";
	
	$com = array("á", "à", "â", "ä", "ã", "da", "das", "é", "è", "ê", "ë", " de ", " des ", "í", "ì", "ï", "î", "ó", "ò", "ô", "ö", "õ", " do ", " dos ",
				 "ú", "ù", "û", "ü", "ç", " s ", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Ö", "Õ", "Ú", "Ù", "Û", "Ü",
				 " DA ", " DAS ", " DE ", " DES ", " DO ", " DOS ", "Ç", " e ", " E ", "s");
				 
	$sem = array("a", "a", "a", "a", "a", " ", " ", "e", "e", "e", "e", " ", " ", "i", "i", "i", "i", "o", "o", "o", "o", "o", " ", " ",
				 "u", "u", "u", "u", "c", " ", "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u",
				 " ", " ", " ", " ", " ", " ", "C", " ", " ", "s"); 
	
	$B = str_replace( $com, $sem, $nomeC ); 
	$nomeM = strtolower($B);
	$nomeD = explode(" ", $nomeM);
	$r = "";
	for($i=1;$i<count($nomeD);$i++){
		
		$primeiro = $nomeD[0];
		$segNome  = $nomeD[1];
		$segundo  = $nomeD[$i];
		$terceiro = $nomeD[$i-1];

		if((!empty($segundo)) && (!empty($terceiro))){
			$mail1 = $primeiro.".".$segundo."@ipa.br";
			$mail2 = $segundo.".".$terceiro."@ipa.br";
			$r.= "<input type='radio' value='$mail1' name='mailSuger'/>".$mail1."<br>";
			$r.= "<input type='radio' value='$mail2' name='mailSuger'/>".$mail2."<br>";
//			echo $r;
		}
	}
	echo $r;*/
//	var_dump($nomeD);
//	echo strtolower($t);

        	$sql = "SELECT
					   F.nome as nome,
					   F.dtNasc as dtNasc,
					   F.idade as idade,
					   F.portDef as PD,
					   F.idUser as User
					FROM
					   tb_filhos as F,
					   tb_usuario as U   
					WHERE F.idUser = U.idUser AND U.cpf = '05487664447'";
			$qry = $banco->executarQuery($sql);
			$total = $banco->totalLinhas($qry);			
?>

<table width="100%" border='0' align="left" cellpadding='0' cellspacing='0'>
	<tr class="menu">
		<td width="20%">Nome:</td>
        <td width="8%">Data Nasc.</td>
        <td width="3%">&nbsp;</td>
        <td width="4%">&nbsp;</td>
	    <td width="5%">Idade</td>
	    <td width="60%">Portador de Deficiência</td>
	</tr>
    <?
//		for($i=0;$i<$total;$i++){
		while ($row   = $banco->criaArray($qry)){
			$nome = $row["nome"];
			$dtNasc = $row["dtNasc"];
			$dia	= substr($dtNasc, 0,2);
			$mes	= substr($dtNasc, 3,2);
			$ano	= substr($dtNasc, 6,9);
			$idade	= $row["idade"];
			$PD		= $row["PD"];
			if(!empty($PD)){
				$t = "<input name='portDef[]' type='checkbox' checked='checked' class='textopequeno' id='portDef' value=".$PD." />";
			}else{
				$t = "<input name='portDef[]' type='checkbox' class='textopequeno' id='portDef' value='A' value=".$PD." />";
			}
    ?>
	<tr class="textonegrito"><input type='hidden' name='user[]' value="" />
	  <td><input name='nm[]' type='text' class="textopequeno" size='35' maxlength='180' value="<?=$nome;?>" /></td>
          <td><div align="right">
            <input name="dia[]" type="text" class="textopequeno" id="dia[]" size="4" maxlength="2" value="<?=$dia;?>"/>
      </div></td>
          <td><div align="center">
            <input name="mes[]" type="text" class="textopequeno" id="mes[]" size="4" maxlength="2" value="<?=$mes;?>"/>
      </div></td>
          <td><div align="center">
            <input name="ano[]" type="text" class="textopequeno" id="ano[]" size="6" maxlength="4" value="<?=$ano;?>"/>
      </div></td>
      <td><input name="idade[]" type="text" class="textopequeno" id="idade[]" size="4" maxlength="2" value="<?=$idade;?>" /></td>
      <td><?=$t;?></td>
  </tr>
  <?
  	}
  ?>
</table>


<?
/*echo "
<style type='text/css'>
<!--
.menu {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bolder;
	color: #000000;
	text-decoration: none;
}
.textopequeno {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	text-decoration: none;
	font-weight: normal;
}
-->
</style>

<script language='javascript' type='text/javascript'>

	function auto_data( campo ) {
	    texto = campo.value;
    	if( texto.length == 2 ) {
	        texto += '/';
    	    campo.value = texto;
	    } else if( texto.length == 5 ) {
	        texto += '/';
	        campo.value = texto;
    	}
	}
	
	function valida_data( campo ) {
		data = campo.value;
		resultado = true;
	
		if( data != '' ) {
			if( data.charAt(0) != '0' ) {
				dia = data.charAt(0) + data.charAt(1);
			} else {
				dia =data.charAt(1);
			}
			dia = parseInt(dia);
	
			if( data.charAt(3) != '0' ) {
				mes = data.charAt(3) + data.charAt(4);
			} else {
				mes = data.charAt(4);
			}
			mes = parseInt(mes);
	
			if( data.charAt(6) != '0' && data.charAt(7) != '0' && data.charAt(8) != '0' ) {
				ano = data.charAt(7) + data.charAt(8) + data.charAt(9);
			} else if( data.charAt(7) != '0' && data.charAt(8) != '0' ) {
				ano = data.charAt(8) + data.charAt(9);
			} else if( data.charAt(8) != '0' ) {
				ano = data.charAt(9);
			} else {
				ano = data.charAt(6) + data.charAt(7) + data.charAt(8) + data.charAt(9);
			}
			ano = parseInt(ano);
	
			if( campo.value.length != 10 ) {
				alert( 'Data Inválida!\nVerifique a quantidade de dígitos' );
				campo.focus();
				resultado = false;
			} else if( (mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia > 30 ) {
				alert( 'Data Inválida!\nEsse mês não permite dia 31' );
				campo.focus();
				resultado = false;
			} else if( mes == 2 && dia > 29 ) {
				alert( 'Data Inválida!\nFevereiro não permite dia com esse valor' );
				campo.focus();
				resultado = false;
			} else if( campo.value.charAt( 2 ) != '/' || campo.value.charAt( 5 ) != '/' ) {
				alert( 'Data Inválida!\nVerifique o formato da data' );
				campo.focus();
				resultado = false;
			} else if( dia < 1 || dia > 31 ) {
				alert( 'Data Inválida!\nVerifique o valor do dia' );
				campo.focus();
				resultado = false;
			} else if( mes < 1 || mes > 12 ) {
				alert( 'Data Inválida!\nVerifique o valor do mês' );
				campo.focus();
				resultado = false;
			} else if( ano < 1 ) {
				alert( 'Data Inválida!\nVerifique o valor do ano' );
				campo.focus();
				resultado = false;
			}
			return resultado;
		}
	}

</script>";


{nomeFilho} = "
				<table width='80%' border='0' align='left' cellpadding='0' cellspacing='0'>
				<tr class='menu'>
					<td width='20%'>Nome:</td>
					<td width='11%'>Data Nasc.</td>
					<td width='6%'>Idade</td>
					<td width='63%'>Portador de Deficiência</td>
				</tr>";
for($i=0;$i<$qtdF;$i++){

{nomeFilho}.= "
				<tr class='textonegrito'><input type='hidden' name='user[]' value=".$id." />
				  <td><input name='nm[]' type='text' class='textopequeno' size='35' maxlength='180' /></td>
				  <td><input name='dtNasc[]' type='text' class='textopequeno' id='dtNasc[]' onkeydown='auto_data(this);' onblur='valida_data(this);' size='12' maxlength='10' /></td>
				  <td><input name='idade[]' type='text' class='textopequeno' id='idade[]' size='4' maxlength='2' /></td>
				  <td><input name='portDef[]' type='checkbox' class='textopequeno' id='portDef' value='A' /></td>
			  </tr>";
}
{nomeFilho}.="</table>";*/

/*{nomeFilhos} = "
	<table border='0' cellpadding='0' cellspacing='0'>";
	for($i=0;$i<$qtdF;$i++){
		{nomeFilhos} .= "<tr><input type='hidden' name='user[]' value=".$id." />
		<td>
	           <input name='nm[]' type='text' size='20' maxlength='180' />
	          </td>
	        </tr>";
	}
	{nomeFilhos} .= "</table>";*/












?>



















</body>
</html>
