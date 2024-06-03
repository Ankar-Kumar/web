<?php
function getDatabaseConnection() {
    $host = '127.0.0.1';
    $db = 'web_eng';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db";
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
    
    
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
   
        return $pdo;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>
