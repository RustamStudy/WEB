<?php
    define('USER_LIST1', __DIR__.'/users.csv');
    define('UPLOAD_DIR', dirname(__DIR__, 1).'/uploads');
    class File{
    //    static UPLOAD_DIR = dirname(__DIR__, 1).'/uploads';
    //   static USER_LIST1 = __DIR__.'/users.csv';

        public $id = 0;
        public $filePath = 0;
        public $fileName = 0;
        
        public static function saveFile(&$user, $file_req){
            $newFile = new File();
            $newFile->fileName = $file_req['name'];

            $data = file_get_contents(USER_LIST1);
            $file = fopen(USER_LIST1, "r");
            $n = -1;
            while ($line = fgets($file)){
                $n++;
            }
            $newFile->id = $n;
            if(!$data){
                $data .= "#;Name;Phone;\"date craete\";Place;Link;Post";
            }

            $newFile->filePath = UPLOAD_DIR.'/'.time().$newFile->fileName; 
            move_uploaded_file($file_req['tmp_name'],$newFile->filePath);
            $data .= "\r\n".$newFile->id.";".
                $user->name.";".
                $user->phone.";\"".
                date('d.m.Y H:i:s')."\";\"".
                $user->places."\";".
                $newFile->fileName.
                $newFile->filePath;
            
            file_put_contents(__DIR__.'/users.csv', $data);

            Database::createLinkFile($user, $newFile);
            return $newFile;
        }
    }