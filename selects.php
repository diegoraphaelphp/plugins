<?
class Select{

	function SelectConvenio($idC){
	  	$sql = "SELECT
					IDCONTAS as id,
					CONCAT(CONTA,' - ',DESCRICAO) AS descricao
				FROM
					tb_contas	
				ORDER BY id";
		$query = mysql_query($sql);
		$total = mysql_num_rows($query);
		
		$opt = "<select name='$idC'>";
		$opt.= "<option value=''>Selecione</option>";
		for($i=0;$i<$total;$i++){
			$id  = mysql_result($query,$i,id);
			$des = mysql_result($query,$i,descricao);
			if(!$idC){
				$select="select";
			}else{
				$select="";
			}
			$opt.="<option value='$id' $select>$des</option>";
		}
		$opt.="</select>";
		return $opt;
	  }



}


?>