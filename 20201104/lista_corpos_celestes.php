<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        var id = 0;
        $.post("seleciona_corpos_celestes.php",{"id":id}, function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li> Nome da Galáxia: "+valor.nome_galaxia+" <p> Nome do Planeta: "+valor.nome_planeta+"</p></li>";
            });
            $("#lista").html(lista);
        });

        var id = 1;
        $.post("seleciona_corpos_celestes.php",{"id":id}, function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li> Nome da Galáxia: "+valor.nome_galaxia+" <p> Nome da Estrela:  "+valor.nome_estrela+"</p></li>";
            });
            $("#lista2").html(lista);
        });
    });
</script>
<?php
echo'<fieldset>
    <legend>Corpos Celestes</legend>
    <p> Planetas das Galáxias cadastradas: </p> 
    <ul id="lista">
    </ul>
    <p> Estrelas das Galáxias cadastradas: </p> 
    <ul id="lista2">
    </ul>
</fieldset>';

rodape();

?>