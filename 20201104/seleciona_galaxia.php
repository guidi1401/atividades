<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    if(!empty($_POST)){
        $id = $_POST["id"];
        $select="SELECT id_galaxia, nome FROM galaxia WHERE id_galaxia = '$id'";
    }else{
        $select="SELECT id_galaxia, nome FROM galaxia";
    }

    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>