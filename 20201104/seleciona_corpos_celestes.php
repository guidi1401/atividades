<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $id = $_POST["id"];
    if($id==0){
        $select="SELECT galaxia.nome as nome_galaxia, planeta.nome as nome_planeta
        FROM galaxia inner join planeta on planeta.cod_galaxia = galaxia.id_galaxia";
    }else{
        $select="SELECT galaxia.nome as nome_galaxia, estrela.nome as nome_estrela
        FROM galaxia inner join estrela on estrela.cod_galaxia = galaxia.id_galaxia";
    }
    
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>