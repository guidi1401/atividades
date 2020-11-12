<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_planeta.php", function(g){
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
        <legend> Planetas </legend>
        <ul id="lista">
        </ul>
    </fieldset>';

    rodape();

?>