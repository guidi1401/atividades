<?php
include "conf.php";

cabecalho();

?>
<script>
    $(document).ready(function(){
        function alterar_planeta(){
            $("button[name='alterar_planeta']").click(function(){

            i = $(this).val();
                console.log(i);
                $.post("seleciona_planeta.php",{"id":i},function(r){
                    a = r[0];  
                    console.log(r);                             
                    $("input[name='id_planeta']").val(a.id_planeta);
                    $("input[name='planeta']").val(a.nome);
                    $("select[name='recebe2']").val(a.id_galaxia);
                });
            });
        }
        function salvar_planeta(){
            $("#salvar").click(function(){    
            p = {
                    id:$("input[name='id_planeta']").val(),
                    nome:$("input[name='planeta']").val(),
                    id_galaxia:$("select[name='recebe2']").val()
            };        
            $.post("atualizar_planeta.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Planeta alterado.");
                $(".close").click();
                atualizar_planeta();                
            }else{
                $("#msg").html("Falha ao atualizar o planeta.");
                $(".close").click();
            }
           });
           }); 
        }
        function atualizar_planeta(){
            $.getJSON("seleciona_planeta.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_planeta+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_planeta' name='alterar_planeta' value='"+valor.id_planeta+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>";
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
            alterar_planeta();
            salvar_planeta();
            select_galaxia();
        });
        }
        function select_galaxia(){
            $.getJSON("seleciona_galaxia.php", function(g){
                option="<option label='Galáxia' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_galaxia+"'> "+valor.nome+" </option>";
                });
                $("#recebe2").html(option);
        });
        }
        $.getJSON("seleciona_planeta.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_planeta+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_planeta' name='alterar_planeta' value='"+valor.id_planeta+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>";
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
            alterar_planeta();
            salvar_planeta();
            select_galaxia();
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
    $titulo = "Alterar Planeta";
    $nome_form = "planeta.php";
    include "modal.php";

    rodape();

?>