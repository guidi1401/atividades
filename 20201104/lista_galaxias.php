<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_galaxia.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+"</li>";
            });
            $("#lista").html(lista);
        });
    });
</script>
<?php
echo'<fieldset>
    <legend> Galáxias</legend>
    <ul id="lista">
    </ul>
</fieldset>';

rodape();

?>