<?php
require_once "conexaoBanco.php";

if(isset($_POST['nome']) && empty($_POST['nome']) == false){

    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);
    $status = $_POST['status'];
    $ocupacao = $_POST['ocupacao'];
    

    $sql = "INSERT INTO usuarios SET nome = :nome, genero = :genero, email = :email, senha = :senha, token = :token, status = :status, ocupacao = :ocupacao";
    $sql = $pdo->prepare($sql);
    $sql -> bindValue(':nome', $nome);
    $sql -> bindValue(':genero', $genero);
    $sql -> bindValue(':email', $email);
    $sql -> bindValue(':senha', $senha);
    $sql -> bindValue(':token', md5(rand(0,999).rand(0,999)));
    $sql -> bindValue(':status', $status);
    $sql -> bindValue(':ocupacao', $ocupacao);
    $sql->execute();
    header("Location: index.php");
}

?>
<form action="" method="post">
    Nome: <br>
    <input type="text" name="nome" id="">
    Genero:
    <select name="genero" id="">
        <option>...</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
    </select><br><br>
    Email: <br>
    <input type="email" name="email" id=""><br><br>
    Senha: <br>
    <input type="text" name="senha" id=""><br><br>
    Ocupação: <br>
    <input type="text" name="ocupacao" id=""><br><br>
    Status: <br>
    <select name="status" id="">
        <option value="1">Ativo</option>
        <option value="0">Inativo</option>
    </select><br><br>
    <button type="submit">Cadastrar</button>
</form>