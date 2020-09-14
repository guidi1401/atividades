<!DOCTYPE html>
<html>
    <head>
        <title>Trabalho Prático - Grupo B</title>
        <meta charset="utf-8" />
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        
        $(document).ready(function(){
            $("input").keyup(function(){
                console.log($("input").val());
                
                var cid = $("input").val();
                cid = cid.toUpperCase();

                if(cid.length == 1){
                    $("#t").html("<tr><td>Digite ao menos 2 caracteres para a sua busca.</td></tr>");
                }
                if(cid.length > 1){
                    $("#t").html("");
                    var t = "";
                    t = $("#t").html();
                    $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/distritos", function(d){
                        $.each(d, function(i, f){
                            r = f.nome.toUpperCase();
                            if(r.indexOf(cid) > -1){
                                t += "<tr><td>"+r+"</td><td>"+f.municipio.microrregiao.mesorregiao.UF.sigla+"</td></tr>";
                                $("#t").html(t);
                            }
                        });
                    });
                }
            });
        });
        </script>
    </head>
    <body>
        <input type="text" name="cid" id="cid" placeholder="Digite a cidade a procurar..."/>
        <table id="t" border="1">
            <tr>
                <td>Digite o nome da cidade que deseja procurar informações...</td>
            </tr>
        </table>
    </body>
</html>