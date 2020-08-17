<?php    

    $host = '127.0.0.1';
    $db   = 'hunter';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;
            dbname=$db;
            charset=$charset"; 

    try
        {  
            $pdo = new PDO($dsn, $user, $pass);  
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
    catch(PDOException $e)
    {  
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
    }

?>