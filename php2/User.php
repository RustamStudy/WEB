<?php


class User
{
    public $name;
    public $phone;

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
        
        /*
        $file = new File($this);
        $this->files = $file->checkFile($this);
*/
        File::checkFile($this);

        $mail = new Mail($this);
        $mail->sendMail($this);

        
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
    
}
