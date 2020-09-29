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
                
                var cidade = $("input").val();
                cidade = cidade.toUpperCase();

                if(cidade.length == 1){
                    $("#tab").html("<tr><td>Digite ao menos 2 caracteres para a sua busca.</td></tr>");
                }
                if(cidade.length > 1){
                    $("#tab").html("");
                    var tab = "";
                    tab = $("#tab").html();
                    $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/distritos", function(d){
                        $.each(d, function(i, f){
                            r = f.nome.toUpperCase();
                            if(r.indexOf(cidade) > -1){
                                tab += "<tr><td>"+r+"</td><td>"+f.municipio.microrregiao.mesorregiao.UF.sigla+"</td></tr>";
                                $("#tab").html(tab);
                            }
                        });
                    });
                }
            });
        });
        </script>
    </head>
    <body>
        <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade a procurar..."/>
        <table id="tab" border="1">
            <tr>
                <td>Digite o nome da cidade que deseja procurar informações...</td>
            </tr>
        </table>
    </body>
</html>