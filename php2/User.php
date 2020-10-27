<?php


class User
{
    public $name;
    public $phone;
    const MAILTO = 'safiullin_85@mail.ru';

    /**
     * Save user to cookie and session
     */
    public function save()
    {
        $_SESSION['user'] = json_encode($this);
        setcookie('user', json_encode($this), time() + 86400, '.');
        
        //$database = new Database();
        /*$user->id =*/Database::createRecord($this);
        /*$user->id =*/Database::createPlaces($this);
        /*$user->id =*/

        
        $this->files = [];
        if($_FILES){
            foreach($_FILES as $single_file) {
                array_push($this->files, File::saveFile($this, $single_file));
            }
        }
    }
    public function load()
    {
        if (self::checkSession())
            return json_decode($_SESSION['user']);
        if (self::checkCookie())
            return json_decode($_COOKIE['user']);
    }

    public function get()
    {
        $session = $this->checkSession();
        $cookie = $this->checkCookie();
        return [$session, $cookie];
    }

    public function  getSession()
    {

    }

    public function getCookie()
    {

    }

    public static function checkSession()
    {
        if (isset($_SESSION['user']))
            return true;

        return false;
    }

    public static function checkCookie()
    {
        if (isset($_COOKIE['user']))
            return true;

        return false;
    }
    public function sendMail(){
        $headers = "MIME-Version:1/0\r\n".
        "Content-type:text/html; charset=utf-8\r\n".
        "From: КИНОШКА <imfo@{$_SERVER['SERVER_NAME']}>";
        $message =  "<body>".
                    "<p>Поздравляем <b>".$this->name."</b> с успешным приобритением билетов в кинотеатр</p>".
                    "<p>Фильм: <b>".$this->fname."</b></p>".
                    "<p>Время: <b>".$this->ftime."</b></p>".
                    "<p>Зал: <b>".$this->fzal."</b></p>".
                    "<p>Места: <b>".$this->places."</b></p>".$this->id.
                    "</body>";
        mail($this->mail,'Новая заявка',$message, $headers);

    }
}