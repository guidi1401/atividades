<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        $.getJSON("seleciona_planeta.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_planeta+"'>Remover</button> </li>";
            });
            $("#lista").html(lista);
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_planeta";
                    t = "planeta";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("O Planeta cadastrado foi removido.");
                            $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Este item não pode ser removido.");
                        }
                    });
                }); 
        });
    });
</script>
<?php
    echo'<fieldset>
        <legend> Planetas </legend>
        <div id="msg">
        </div>
        <ul id="lista">
        </ul>
    </fieldset>';

    rodape();

?>