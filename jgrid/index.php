<script>

    (function($){
        var $dgLocal = $('#data-grid-local')
     
        $dgLocal.datagrid({
            jsonStore: {
                data: {"rows":[
                    {"id":"1","nome":"Fulano de Tal","empresa":"Empresa 1"}
                    ,{"id":"2","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"3","nome":"Beltrano da Silva","empresa":"Empresa do tal"}
                    ,{"id":"4","nome":"Beltrano da Silva","empresa":"Empresa 123122"}
                    ,{"id":"5","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"6","nome":"Beltrano da Silva","empresa":"Empresa 3312"}
                    ,{"id":"7","nome":"Beltrano da Silva","empresa":"Empresa 312"}
                    ,{"id":"8","nome":"Beltrano da Silva","empresa":"Empresa 3123122"}
                    ,{"id":"9","nome":"Fulano de Tal","empresa":"Empresa 221"}
                    ,{"id":"10","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"11","nome":"Beltrano da Silva","empresa":"Empresa 3123122"}
                    ,{"id":"12","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"13","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"14","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"15","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"16","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"17","nome":"Fulano de Tal","empresa":"Empresa 2"}
                    ,{"id":"18","nome":"Beltrano da Silva","empresa":"Empresa 1232"}
                    ,{"id":"18","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"20","nome":"Fulano de Tal","empresa":"Empresa 2"}
                    ,{"id":"21","nome":"Beltrano da Silva","empresa":"Empresa23 2"}
                    ,{"id":"22","nome":"Beltrano da Silva","empresa":"Empresa 2"}
                    ,{"id":"23","nome":"Fulano de Tal","empresa":"Empresa 1233332"}
                ]}
            }
            ,pagination: false
            ,mapper:[{
                name: 'id',alias:'Código',css:{width:50,textAlign:'center'}
            },{
                name: 'nome',alias:'Nome',css:{width:200,textAlign:'left'}
            },{
                name: 'empresa',alias:'Empresa',css:{textAlign:'left'}
            }]
        })
     
    })(jQuery)

</script>
<!DOCTYPE html>
    <head>
        <title>:: jQuery UI DataGrid ::</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="data-grid-local"></div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="jquery.ui.datagrid.min.js"></script>
    </body>
</html>