<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        function altera_galaxia(){
            $("button[name='alterar_galaxia']").click(function(){

            i = $(this).val();
                $.post("seleciona_galaxia.php",{"id":i},function(r){
                    a = r[0];                               
                    $("input[name='id_galaxia']").val(a.id_galaxia);
                    $("input[name='galaxia']").val(a.nome);
                });
            });
        }
        function salvar_galaxia(){
            $("#salvar").click(function(){    
            p = {
                    id:$("input[name='id_galaxia']").val(),
                    nome:$("input[name='galaxia']").val()
            };        
            $.post("atualizar_galaxia.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Galáxia alterada.");
                $(".close").click();
                atualizar_galaxia();                
            }else{
                $("#msg").html("Falha ao atualizar a galáxia.");
                $(".close").click();
            }
           });
           }); 
        }
        function atualizar_galaxia(){           
            $.getJSON("seleciona_galaxia.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_galaxia+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_galaxia' name='alterar_galaxia' value='"+valor.id_galaxia+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>" ;
            });
            $("#lista").html(lista);
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_galaxia";
                    t = "galaxia";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("A Galáxia cadastrada foi removida.");
                            $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Este item não pode ser removido.");
                        }
                    });
                }); 
                altera_galaxia();
                salvar_galaxia();       
        });
        }
        $.getJSON("seleciona_galaxia.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_galaxia+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_galaxia' name='alterar_galaxia' value='"+valor.id_galaxia+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>" ;
            });
            $("#lista").html(lista);
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_galaxia";
                    t = "galaxia";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("A Galáxia cadastrada foi removida.");
                            $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Este item não pode ser removido.");
                        }
                    });
                }); 
                altera_galaxia();
                salvar_galaxia();       
        });
    });
</script>
<?php
echo'<fieldset>
    <legend> Galáxias</legend>
    <div id="msg">
    </div>
    <ul id="lista">
    </ul>
</fieldset>';
$titulo = "Alterar Galáxia";
$nome_form = "galaxia.php";
include "modal.php";

rodape();

?>