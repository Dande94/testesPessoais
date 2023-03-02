<?php
  $dsn = "mysql:host={$_ENV["HOST"]};dbname={$_ENV["DATABASE"]}";
  $options = array(
    PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
  );
  try{
    $pdo = new PDO($dsn, $_ENV["USERNAME"], $_ENV["PASSWORD"], $options);
}catch(PDOException $e){
    echo "Falhou na conexão: ".$e->getMessage();
}
?>