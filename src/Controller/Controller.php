<?php


namespace App\Controller;

use App\Helpers\Validate;
use App\Model\User;

class Controller
{
    /**
     * 1 - валидация входящих параметров
     * 2 = сохранение пользователя если нет
     * @param $post
     * @return array
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
     * @return array
     */
    public function film ($post)
    {
        return [];
    }
}