<?php

require_once 'Validate.php';
require_once 'User.php';
// require_once 'serverFile.php';
require_once 'Database.php';
require_once 'File.php';

///Роутинг
// Попадаем в нужный окнтроллер
// В уконтролере раскидываем логику по сервисам и моделям
// Отдаем ответ




class Controller {

    public $id;

    public function __construct()
    {

    }

    /**
     * 1 - валидация входящих параметров
     * 2 = сохранение пользователя если нет
     * @param $post
     * @return string
     */
    public function post($post)
    {
        $validate = new Validate([
            'name' => ['min', 'max'],
            'phone' => ['phone']
        ], $post);

        if (count($validate->validate()) > 0 ) {
            return [
                'status' => 'ERROR',
                'error' => $validate->validate()
            ];
        }
        $user = [];
        if (!User::checkCookie() || !User::checkSession()) {
            $user = new User();
            $user->name = $post['name'];
            $user->phone = $post['phone'];
            $user->mail = $post['mail'];
            $user->fname = $post['fname'];
            $user->ftime = $post['ftime'];
            $user->fzal = $post['fzal'];
            $user->places = $post['places'];
            $user->save();
            $user->sendMail();

            // $id = $database->createRecord($user);
            
        }
        else
            $user = User::load();

        return [
            'status' => 'OK',
            'data' => $post,
            'user' => $user
        ];
        
    }
    

    /**
     * @param $post
     * @return mixed
     */
    public function film ($post)
    {
        return json_decode('');
    }
    public function saveToDatabase(Database $pdo){
        $user['name'] = $this->name;
        $user['phone'] = $this->phone;
        return $pdo->createRecord($user);
    }
}

?>