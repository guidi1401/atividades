<?php 
    header("Content-Type: application/json");
    include "conexao.php";

    $select="SELECT id_planeta, nome FROM planeta";

    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>