<?php 
    include_once 'db_connection.php';    

    $vk_id_user= $pdo->prepare('SELECT `vk_id_user`FROM `users`');
    $vk_id_user->execute();
    $users_date = $vk_id_user->fetchAll(PDO::FETCH_ASSOC);
    $arr = array();
    foreach ($users_date as $k){
        array_push($arr, $k["vk_id_user"]); 
      }
    $comma_separated = implode(",", $arr);
    echo 'Строка сформированная из ответа БД';
    var_dump($comma_separated);


    class People {
            private $token;

            public function __construct(string $token){
                $this->token = $token;
            }

            // метод проверки на случай если данные загружаются из формы
            public function checkDate($regExp, $date){
                $date = mb_strtolower(trim($date));
                if((bool)preg_match($regExp, $date))
                {
                    return false;
                }
            }
            // метод формирования запроса
            public function push_people($account_id, $client_id,  $target_group_id, $contacts){               
                
                $friends = file_get_contents('https://api.vk.com/method/ads.importTargetContacts?account_id='.$account_id.'&client_id='.$client_id.'&target_group_id='.$target_group_id.'&contacts='.$contacts.'&access_token='.$this->token.'&v=5.122');
                return $friends;
            }
        }

        $people = new People('668f97e9f45a4badf5dd88a4a135bfa99d40998ca19adf37cad5a69bf184075ba579216265fe0986c5e95');
        $result = $people->push_people('1601860521', '1601860521', '1', $comma_separated);
        echo 'ответ API vk';
        var_dump($result)


?>