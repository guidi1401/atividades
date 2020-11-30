<?php
include "conf.php";

cabecalho();

?>
<script>
     $(document).ready(function(){
        function alterar_estrela(){
            $("button[name='alterar_estrela']").click(function(){

            i = $(this).val();
                console.log(i);
                $.post("seleciona_estrela.php",{"id":i},function(r){
                    a = r[0];  
                    console.log(r);                             
                    $("input[name='id_estrela']").val(a.id_estrela);
                    $("input[name='estrela']").val(a.nome);
                    $("select[name='recebe3']").val(a.id_galaxia);
                });
            });
        }
        function salvar_estrela(){
            $("#salvar").click(function(){    
            p = {
                    id:$("input[name='id_estrela']").val(),
                    nome:$("input[name='estrela']").val(),
                    id_galaxia:$("select[name='recebe3']").val()
            };        
            $.post("atualizar_estrela.php",p,function(r){
            if(r=='1'){
                $("#msg").html("Estrela alterada.");
                $(".close").click();
                atualizar_estrela();                
            }else{
                $("#msg").html("Falha ao atualizar a estrela.");
                $(".close").click();
            }
           });
           }); 
        }
        function atualizar_estrela(){
            $.getJSON("seleciona_estrela.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_estrela+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_estrela' name='alterar_estrela' value='"+valor.id_estrela+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>";
            });
            $("#lista").html(lista);
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_estrela";
                    t = "estrela";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("A Estrela cadastrada foi removida.");
                            $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Este item não pode ser removido.");
                        }
                    });
                }); 
            alterar_estrela();
            salvar_estrela();
            select_galaxia();
        });
        }
        function select_galaxia(){
            $.getJSON("seleciona_galaxia.php", function(g){
                option="<option label='Galáxia' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_galaxia+"'> "+valor.nome+" </option>";
                });
                $("#recebe3").html(option);
        });
        }
        $.getJSON("seleciona_estrela.php", function(g){
            var lista="";
            $.each(g, function(indice, valor){
                lista+="<li>"+valor.nome+" | <button class='btn btn-danger remover'  value='"+valor.id_estrela+"'>Remover</button> || <button class='btn btn-warning alterar' id='alterar_estrela' name='alterar_estrela' value='"+valor.id_estrela+"' data-toggle='modal' data-target='#modal'>Alterar</button> </li>";
            });
            $("#lista").html(lista);
            $(".remover").click(function(){
                    i = $(this).val();
                    c = "id_estrela";
                    t = "estrela";
                    p = {tabela: t, id:i, coluna:c}
                    $.post("remover.php",p,function(r){
                        if(r=='1'){                
                            $("#msg").html("A Estrela cadastrada foi removida.");
                            $("button[value='"+ i +"']").closest("li").remove();
                        }
                        else
                        {
                            $("#msg").html("Este item não pode ser removido.");
                        }
                    });
                }); 
            alterar_estrela();
            salvar_estrela();
            select_galaxia();
        });
    });

</script>
<?php
    echo'<fieldset>
        <legend> Estrela </legend>
        <div id="msg">
        </div>
        <ul id="lista">
        </ul>
    </fieldset>';

    $titulo = "Alterar Estrela";
    $nome_form = "estrela.php";
    include "modal.php";

    rodape();

?>