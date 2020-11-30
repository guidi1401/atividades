<?php

    include "conexao.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $id_galaxia = $_POST["id_galaxia"];

    $update = "UPDATE estrela SET nome='$nome', cod_galaxia = '$id_galaxia'
                            WHERE
                            id_estrela='$id'";
    
    mysqli_query($con,$update)
        or die(mysqli_error($con));

    echo "1";
?>