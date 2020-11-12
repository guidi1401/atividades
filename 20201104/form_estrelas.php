<?php
include "conf.php";

cabecalho();
?>

<script>
    $(document).ready(function(){
        $.getJSON("seleciona_galaxia.php", function(g){
                option="<option label='Galáxia' />";
                $.each(g, function(indice, valor){
                    option+="<option value='"+valor.id_galaxia+"'> "+valor.nome+" </option>";
                });
                $("#recebe").html(option);
        });
    });
</script>

<?php 
    if(empty($_POST)){
    echo'<form method="POST" action="form_estrelas.php">
        <fieldset>
            <legend>Estrelas</legend>
            <label> Nome da Estrela: </label>
            <input type="text" name="estrela" id="estrela" required="required"/>
            <select id="recebe" name="recebe">
                <option label="Galáxia" />
            </select>
            <input type="submit" value="Cadastrar"/>
        </fieldset>
    </form>';
    }else{
        include "conexao.php";
        $galaxia = $_POST["recebe"];
        $estrela = $_POST["estrela"];
        
        
        $insert = "INSERT INTO estrela(
                                        nome, 
                                        cod_galaxia
                                    ) VALUES (
                                        '$estrela', 
                                        '$galaxia'
                                    )";
        mysqli_query($con, $insert)
        or die(mysqli_error($con));
        echo'<p> Estrela cadastrada. </p>
        <p><a href="form_estrelas.php">Cadastrar outra estrela.</a></p>';
}

rodape();

?>