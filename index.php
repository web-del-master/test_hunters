<?php
    include_once 'lib.php'; 
    session_start();
    
    //при плучении токена в случае ошибки будут переданы параметры error и error_description от vk api
    if(isset($_GET['error'])){
        $msg = $_GET['error'] . $_GET['error_description'];
        exit;
    }

    $key = new keyGen(
                            '7561105',
                            'popup',
                            'http://localhost/hunter/index.php',
                            'friends,offline',
                            'code',
                            '5.122'
                        );

    // Формируем запрос на получение code для последующего получения токена.
    // $request_uri будет передана в шаблон в ссылку
    $request_uri = $key->getCode();
    


    // Если есть в массиве ключ code выполнить получение токена
    if(isset($_GET['code'])){        
        // токен будет сохранен в сесси, а если будет ошибка то ф-я вернет ошибку
        if(!isset($_SESSION['token'])){
            if($keygen_result = $key->keygen($_GET['code'])){
                $msg = $keygen_result;
            }
        }        
    } 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>hunter</title>
</head>
<body>
    <?php if(!isset($_SESSION['token'])){?>
        <p class="query_token">Для поиска вам необходимо <a href="<?php echo $request_uri ?>">получить ключ доступа</a></p>
    <?php } else{?>
        <p class="query_token">Ключ получен успешно, вы можете приступить к поиску</p>
    <?php }?>     
    <form class="search">    
    <input id="people_serch" type="text" name="people_serch" placeholder="Поиск людей в вк" class="input"/>    	
	<input type="submit" value="Искать" class="people_serch__submit"/>
    </form>
    <?php if(isset($msg)){echo $msg;}?>
    <script src="./index.js"></script>
</body>
</html>