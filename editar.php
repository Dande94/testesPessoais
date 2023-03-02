<?php
require_once "conexaoBanco.php";


if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = $_GET['id'];
};

if(isset($_POST['nome']) && empty($_POST['nome']) == false){

    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $ocupacao = $_POST['ocupacao'];
    
    $sql = "UPDATE usuarios SET nome = :nome, genero = :genero, email = :email, status = :status ,ocupacao = :ocupacao  WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql -> bindValue(':nome', $nome);
    $sql -> bindValue(':genero', $genero);
    $sql -> bindValue(':email', $email);
    $sql -> bindValue(':status', $status);
    $sql -> bindValue(':ocupacao', $ocupacao);
    $sql -> bindValue(':id', $id);
    $sql->execute();
    header("Location: index.php");
};

$sql = "SELECT * FROM usuarios WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql -> bindValue(':id', $id);
$sql->execute();
if($sql->rowCount() > 0){
    $dado = $sql -> fetch();
}else{
    header("Location: index.php");
};


?>
<form action="" method="post">
    Nome: <br>
    <input type="text" value=" <?=$dado['nome']?> " name="nome" id="">
    Genero:
    <select name="genero" id="">
        <option>...</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
    </select><br><br>
    Email: <br>
    <input type="email" name="email" value =" <?=$dado['email']?>" id=""><br><br>
    Ocupação: <br>
    <input type="text" name="ocupacao" value =" <?=$dado['ocupacao']?>"  id=""><br><br>
    Status:
    <select name="status" id="">
        <option value="1">Ativo</option>
        <option value="0">Inativo</option>
    </select><br><br>



    <button type="submit">Atualizar</button>
</form>