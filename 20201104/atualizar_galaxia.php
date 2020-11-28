<?php

    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $update = "UPDATE galaxia SET nome='$nome' 
                            WHERE
                            id_galaxia='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>
