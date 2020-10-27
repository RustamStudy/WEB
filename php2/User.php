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

        
        $this->files = [];
        if($_FILES['filePromo']['error'] != 4){
            print_r($_FILES);
            foreach($_FILES as $single_file) {
                if (is_array($single_file['name']))
                    for ($i = 0; $i < count($single_file['name']); ++$i) {
                        $tmpfile = [
                            'name'=>$single_file['name'][$i],
                            'type'=>$single_file['type'][$i],
                            'tmp_name'=>$single_file['tmp_name'][$i],
                            'error'=>$single_file['error'][$i],
                            'size'=>$single_file['size'][$i]
                        ];
                        array_push($this->files, File::saveFile($this, $tmpfile));
                    }
                else 
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
        /*
            $headers = "MIME-Version:1/0\r\n".
            "Content-type:text/html; charset=utf-8\r\n".
            "From: КИНОШКА <info@{$_SERVER['SERVER_NAME']}>";
            
            mail($this->mail,'Новая заявка',$message, $headers);
        */
        $message =  
            "<body>".
                "<p>Поздравляем <b>".$this->name."</b> с успешным приобритением билетов в кинотеатр</p>".
                "<p>Фильм: <b>".$this->fname."</b></p>".
                "<p>Время: <b>".$this->ftime."</b></p>".
                "<p>Зал: <b>".$this->fzal."</b></p>".
                "<p>Места: <b>".$this->places."</b></p>".              
                "<a href='http://rustamcinema.ru/php2/user_info.php?iduser=".$this->id."'>Ссылка на заявку</a>".
            "</body>";
        include __DIR__ . '/../PHPMailer/autoload,php';
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->CharSet = 'utf-8';
            //Recipients
            $mail->setFrom("info@{$_SERVER['SERVER_NAME']}", 'КИНОШКА');
            $mail->addAddress($this->mail);

            // Attachments
            if($_FILES['filePromo']['error'] != 4)
            {
                foreach ($this->files as $file)
                    $mail->addAttachment($file->filePath);         // Add attachments
            }
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Новая заявка';
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            return $this->statusEmail = [
                'statusMail'=>'OK'
            ];
        } catch (Exception $e) {
            return $this->statusEmail = [
                'statusMail'=>'ERROR',
                'Error' => $mail->ErrorInfo
            ];
        }
    }
}
