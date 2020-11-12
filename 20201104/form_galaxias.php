<?php
include "conf.php";

cabecalho();

    if(empty($_POST)){
    echo'<form method="POST" action="form_galaxias.php">
        <fieldset>
            <legend>Galáxias</legend>
            <label> Nome da Galáxia: </label>
            <input type="text" name="galaxia" id="galaxia" required="required"/>
            <input type="submit" value="Cadastrar"/>
        </fieldset>
    </form>';
    }else{
            include "conexao.php";
            $galaxia = $_POST["galaxia"];
            
            $insert = "INSERT INTO galaxia(
                                            nome
                                        ) VALUES (
                                            '$galaxia'
                                        )";
            mysqli_query($con, $insert)
            or die(mysqli_error($con));
            echo'<p> Galáxia cadastrada. </p>
            <p><a href="form_galaxias.php">Cadastrar outra galáxia.</a></p>';
    }

rodape();

?>