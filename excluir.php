<?php
require_once "conexaoBanco.php";

if(isset($_GET['id']) && empty($_GET['id']) == false){

    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql -> bindValue(':id', $id);
    $sql->execute();
    header("Location: index.php");
}else{
    header("Location: index.php");
}

?>