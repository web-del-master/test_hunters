<?php       
include_once 'lib.php'; 
include_once 'db_connection.php'; 
session_start();
$regexp_valid = '/[^а-яёЁА-Яa-zA-Z0-9]/u'; 

    // проверям существование ключа в сессии и гет параметра
    if(isset($_GET['search']) && isset($_SESSION['token']))
    {  
        // сохраняем данные и обрабатываем их  
        $date = mb_strtolower(trim($_GET['search']));
        // если передано что-то кроме русских ангшлийских символов и цифр - ошибка!
        if((bool)preg_match($regexp_valid, $date)){exit('Входные данные некорректны');}
        
        // Создаем класс для поиска людей в вк
        $vkFriends = new VkFriends($_SESSION['token']);
        $friends = $vkFriends->people_serch($date);
            // если people_serch не вернул ошибку перебираем полученные данные и сохранеям в бд
            if($friends)
            {

                for($i=0;$i<count($friends["response"]["items"]);$i++){
                    $vk_id =  $friends["response"]["items"][$i]['id'];
                    $first_name =  $friends["response"]["items"][$i]['first_name'];
                    $last_name =  $friends["response"]["items"][$i]['last_name'];

                        $insert_user= $pdo->prepare('INSERT INTO `users`(`vk_id_user`, `first_name`, `last_name`) VALUES (:vk_id, :first_name, :last_name)');
                        $insert_user->execute(['vk_id' => $vk_id, 'first_name' => $first_name, 'last_name'=> $last_name ]);                     
                } 
                
            }
                            

    }
    else
    {
        echo 'Страница временно недоступна.';
    }    

?>