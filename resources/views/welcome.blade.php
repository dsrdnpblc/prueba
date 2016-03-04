<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">UF año 2016 por mes</div>
            {!! Form::open(array('url' => '')) !!}
            <label>Mes </label>
            {!! Form::select('mes', $meses,'', $attributes = array('id'=>'mes','required'=>'true')) !!}
            <label>Opción </label>
            {!! Form::select('opcion', $opciones,'', $attributes = array('id'=>'opcion','required'=>'true')) !!}
            {!! Form::close() !!}
            <button id="boton">Enviar</button>
            <pre id="json"></pre    
        </div>
        <h1>
            </div>
            <script type="text/javascript" src="{{ asset('jquery-2.2.1.min.js') }}"></script>
            <script type="text/javascript">
            // JSON to CSV Converter
            function Json2CSV(objArray)
            {
                var 
                getKeys = function(obj){
                    var keys = [];
                    for(var key in obj){
                        keys.push(key);
                    }
                    return keys.join();
                }, array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray
                , str = ''
                ;

                for (var i = 0; i < array.length; i++) {
                    var line = '';
                    for (var index in array[i]) {
                      if(line != '') line += ','

                          line += array[i][index];
                  }

                  str += line + '\r\n';
              }

              str = getKeys(objArray[0]) + '\r\n' + str;

              var a = document.createElement('a');
              var blob = new Blob([str], {'type':'application\/octet-stream'});
              a.href = window.URL.createObjectURL(blob);
              a.download = 'export.csv';
              a.click();
              return true;
            }

            $("#boton").click(function(){    
                var mes = $("#mes").val();
                var opcion = $("#opcion").val();
                if (mes!="" && opcion!="") {
                    $.getJSON('http://api.sbif.cl/api-sbifv3/recursos_api/uf/2016/'+mes+'?apikey=d8093171162117c0c6e8da895b00978d4e2b6a0e&formato=json', function(data) {
                        if (opcion=="csv") {
                                Json2CSV(data.UFs);
                        }else{
                            var texto = JSON.stringify(data.UFs);
                            $('#json').text(texto);
                        }
                    });  
                }  
            });
        </script>
</body>
</html>
