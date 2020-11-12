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
    echo'<form method="POST" action="form_planetas.php">
        <fieldset>
            <legend>Planetas</legend>
            <label> Nome do Planeta: </label>
            <input type="text" name="planeta" id="planeta" required="required"/>
            <select id="recebe" name="recebe">
                <option label="Galáxia" />
            </select>
            <input type="submit" value="Cadastrar"/>
        </fieldset>
    </form>';
    }else{
            include "conexao.php";
            $galaxia = $_POST["recebe"];
            $planeta = $_POST["planeta"];
            
            
            $insert = "INSERT INTO planeta(
                                            nome, 
                                            cod_galaxia
                                        ) VALUES (
                                            '$planeta', 
                                            '$galaxia'
                                        )";
            mysqli_query($con, $insert)
            or die(mysqli_error($con));
            echo'<p> Planeta cadastrado.</p>
            <p><a href="form_planetas.php">Cadastrar outro planeta.</a></p>';
    }


rodape();

?>