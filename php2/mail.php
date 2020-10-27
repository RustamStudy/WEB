<?php
    class Mail {
        public function sendMail($user){
            /*
                $headers = "MIME-Version:1/0\r\n".
                "Content-type:text/html; charset=utf-8\r\n".
                "From: КИНОШКА <info@{$_SERVER['SERVER_NAME']}>";
                
                mail($this->mail,'Новая заявка',$message, $headers);
            */
            //print_r($user);
            $message =  
                "<body>".
                    "<p>Поздравляем <b>".$user->name."</b> с успешным приобритением билетов в кинотеатр</p>".
                    "<p>Фильм: <b>".$user->fname."</b></p>".
                    "<p>Время: <b>".$user->ftime."</b></p>".
                    "<p>Зал: <b>".$user->fzal."</b></p>".
                    "<p>Места: <b>".$user->places."</b></p>".              
                    "<a href='http://rustamcinema.ru/php2/user_info.php?iduser=".$user->id."'>Ссылка на заявку</a>".
                "</body>";
            include __DIR__ . '/../PHPMailer/autoload,php';
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            try {
                $mail->CharSet = 'utf-8';
                //Recipients
                $mail->setFrom("info@{$_SERVER['SERVER_NAME']}", 'КИНОШКА');
                $mail->addAddress($user->mail);
    
                // Attachments
               
                
                if($_FILES['filePromo']['error'] != 4)
                {
                    foreach ($user->files as $file)
                        $mail->addAttachment($file->filePath);         // Add attachments
                }

                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Новая заявка';
                $mail->Body    = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                return $user->statusEmail = [
                    'statusMail'=>'OK'
                ];
            } catch (Exception $e) {
                return $user->statusEmail = [
                    'statusMail'=>'ERROR',
                    'Error' => $mail->ErrorInfo
                ];
            }
        }
    }