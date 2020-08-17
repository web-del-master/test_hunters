<?php 
    class keyGen {
        public $id, $url_redirect, $display, $scope, $v, $response_type; 
        private $secret_key = 'QHn7V5Lt7f5IHfnq3qy7';

        public function __construct(string $id, string $display , string $url_redirect , string $scope, string $response_type, string $v)
            {
                $this->id = $id;
                $this->display = $display;
                $this->url_redirect = $url_redirect;
                $this->scope = $scope;
                $this->response_type = $response_type;
                $this->v = $v;
            }
         
        public function getCode()
            {
            
                // Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
                // Если не указать "offline", то полученный токен будет жить 12 часов.               
                
                // $code = 'http://oauth.vk.com/authorize?' . http_build_query( $params );
                $code = "https://oauth.vk.com/authorize?client_id=" .$this->id ."&display=". $this->display."&redirect_uri=".$this->url_redirect."&scope=".$this->scope."&response_type=".$this->response_type."&v=".$this->v."";

                return $code;
            }

        public function keygen ($request_code){            

            $content = @file_get_contents("https://oauth.vk.com/access_token?client_id=" .$this->id ."&client_secret=".$this->secret_key."&redirect_uri=".$this->url_redirect."&code=".$request_code."");

            if (!$content) {
                $error = error_get_last();
                return 'HTTP request failed. Error: ' . $error['message'];
            }
         
            $response = json_decode($content);
            
            if (isset($response->error)) {
               return 'При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description;
            }

            $token = $response->access_token; // Токен
	        $expiresIn = $response->expires_in; // Время жизни токена
	        $userId = $response->user_id; // ID авторизовавшегося пользователя
 
            // Сохраняем токен в сессии
	        $_SESSION['token'] = $token;
	        $_SESSION['expiresIn'] = $expiresIn;
	        $_SESSION['userId'] = $userId;             
        }
    }

    class VkFriends
    {
        private $token;
        
        public function __construct(string $token){
            $this->token = $token;
        }   
        
        
        public function people_serch($people_serch) {
            // https://api.vk.com/method/METHOD_NAME?PARAMETERS&access_token=ACCESS_TOKEN&v=V
             $friends = file_get_contents('https://api.vk.com/method/users.search?q='.$people_serch.'&access_token='.$this->token.'&v=5.122');
             $friends = json_decode($friends, true);
             
             if(!isset($friends->error)){
                 return $friends;
             }else{
                 return false;
             }
             
        } 
    }





?>
