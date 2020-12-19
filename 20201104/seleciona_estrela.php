<?php 
    header("Content-Type: application/json");
    include "conexao.php";

    if(!empty($_POST)){
        $id = $_POST["id"];
        $select="SELECT id_galaxia, id_estrela, estrela.nome as nome FROM estrela INNER JOIN galaxia on estrela.cod_galaxia = galaxia.id_galaxia WHERE id_estrela = '$id' ";
    }else{
        $select="SELECT id_estrela, nome FROM estrela";
    }
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>