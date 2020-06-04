    <?php
    //importando...
    require_once("class/UsuarioException.php");
    require_once("class/TecnicoException.php");
    require_once("class/Conexao.php");    

    //instancias...
    $banco  = Conexao::singleton();
    
    $sql = "SELECT m.MUN_ID, m.MUN_Descricao, a.AGR_CPF, a.AGR_Nome FROM pam_agr_agricultores a ";
    $sql.= "INNER JOIN cad_mun_municipios m ON (m.MUN_ID = a.MUN_ID) ";
    $sql.= "WHERE a.AGR_CPF IS NOT NULL LIMIT 0, 200";
    $row = $banco->listarArray($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "../../media/css/demo_page.css";
			@import "../../media/css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"aoColumnDefs": [
						{ "bVisible": false, "aTargets": [2] }
					]
				} );
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div id="demo">
                            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                                    <thead>
                                            <tr>
                                                    <th rowspan="2" align="left">CPF</th>
                                                    <th rowspan="2" align="left">Nome</th>
                                                    <th colspan="3" align="center">Munic&iacute;pio</th>
                                            </tr>
                                            <tr>
                                                    <th>Platform(s)</th>
                                                    <th>ID.</th>
                                                    <th>Descri&ccedil;&aacute;o</th>
                                            </tr>
                                    </thead>
                                    <!--
                                    <tfoot>
                                            <tr>
                                                    <th rowspan="2">Rendering engine</th>
                                                    <th rowspan="2">Browser</th>
                                                    <th>Platform(s)</th>
                                                    <th>Engine version</th>
                                                    <th>CSS grade</th>
                                            </tr>
                                            <tr>
                                                    <th colspan="3">Details</th>
                                            </tr>
                                    </tfoot>-->
                                    <tbody>
                                        <?php
                                            $i   = 0;    
                                            $css = "";
                                            foreach($row as $l){
                                                
                                                if($i % 2 == 0) $css = "gradeA"; else $css = "gradeC";

                                                echo "
                                                <tr>
                                                    <td align='left'>".$l["AGR_CPF"]."</td>
                                                    <td align='left'>".$l["AGR_Nome"]."</td>
                                                    <td align='left'>".$l["MUN_ID"]."</td>
                                                    <td align='left'>".$l["MUN_ID"]."</td>
                                                    <td align='left'>".$l["MUN_Descricao"]."</td>
                                                </tr>";
                                                
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                            </table>
			</div>
		</div>
	</body>
</html>