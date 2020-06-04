<?
$conn=mysql_connect("localhost","root","ipa");
$banco=mysql_select_db("produtivo",$conn);
if(!$banco){
	echo "<script>alert('Não Conectou ao banco')</script>";
}
?>