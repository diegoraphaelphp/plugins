<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://www.pureexample.com/js/lib/jquery.ui.touch-punch.min.js"></script>

<!-- CSS -->
<style type="text/css">
.list {
    background-color: grey;
    color: white;
    background-repeat: no-repeat;
    text-align: center;
    cursor: pointer;   
    width: 300px;    
}
 
#items .ui-selected {
    background: red;
    color: white;
    font-weight: bold;
}
 
#items {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
 
#items li {
    float: left;
    margin: 2px;
    padding: 2px;
    width: 280px;
}
 
.highlight {
    border: 1px solid red;
    font-weight: bold;
    font-size: 45px;
    background-color: yellow;
}
</style>
<script>
    $(function (){        
        $("#items").sortable({
            placeholder: "highlight",
            start: function(e, ui) {
            // creates a temporary attribute on the element with the old index
            $(this).attr('data-previndex', ui.item.index());
            },
            update: function (event, ui){
                var ordemNova   = ui.item.index();
                var ordemAntiga = $(this).attr('data-previndex');

                $(this).removeAttr('data-previndex');

                // consulta os dados da OS
                $.post("http://localhost/SIG/modulos/sistema/gerencial/controladores/ModuloCategoriaControlador.php", {
                    acao: "AtualizarOrdemCategoriaModulo", MCT_OrdemNova: ordemNova, MCT_OrdemAntiga: ordemAntiga
                },
                    function(data){
                        alert(data); return;
                        if(data.sucesso == "true"){

                        }else{
                            
                        }
                    }//, "json"
                );                
            }
        });
        
        $("#items").disableSelection();
});
</script>
<div style="width:900px">
  <ul id="items">
      <?php
        $a = 0;
        for($i=0;$i<15;$i++){
            $a++;
            $strNome = "";
            $strNome = "lista_".$i;
            
            $id = rand(10, 100);

            echo "<li class='list' id='".$strNome."'>".$id."</li>";
        }
      ?>
  </ul>
</div>