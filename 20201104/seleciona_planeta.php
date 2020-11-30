<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    if(!empty($_POST)){
        $id = $_POST["id"];
        $select="SELECT id_galaxia, id_planeta, planeta.nome as nome FROM planeta INNER JOIN galaxia on planeta.cod_galaxia = galaxia.id_galaxia WHERE id_planeta = '$id'";
    }else{
        $select="SELECT id_planeta, nome FROM planeta";
    }

    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>

