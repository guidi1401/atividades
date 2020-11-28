<?php

    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $id_planeta = $_POST["id_planeta"];

    $update = "UPDATE planeta SET nome='$nome', cod_galaxia = '$id_planeta'
                            WHERE
                            id_planeta='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>
