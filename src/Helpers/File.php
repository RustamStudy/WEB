<?php
namespace App\Helpers;

define('USER_LIST1', __DIR__ . '/users.csv');
define('UPLOAD_DIR', dirname(__DIR__, 1) . '/uploads');

class File
{
    //    static UPLOAD_DIR = dirname(__DIR__, 1).'/uploads';
    //   static USER_LIST1 = __DIR__.'/users.csv';

    public $id = 0;
    public $filePath = 0;
    public $fileName = 0;

    public static function checkFile(&$file)
    {
        //print_r($file);
        $file->files = [];
        if ($_FILES['filePromo']['error'] != 4) {
            //print_r($_FILES);
            foreach ($_FILES as $single_file) {
                if (is_array($single_file['name']))
                    for ($i = 0; $i < count($single_file['name']); ++$i) {
                        $tmpfile = [
                            'name' => $single_file['name'][$i],
                            'type' => $single_file['type'][$i],
                            'tmp_name' => $single_file['tmp_name'][$i],
                            'error' => $single_file['error'][$i],
                            'size' => $single_file['size'][$i]
                        ];
                        array_push($file->files, File::saveFile($file, $tmpfile));
                    }
                else
                    array_push($file->files, File::saveFile($file, $single_file));
            }
        }
    }

    public static function saveFile(&$user, $file_req)
    {
        $newFile = new File();
        $newFile->fileName = $file_req['name'];

        $data = file_get_contents(USER_LIST1);
        $file = fopen(USER_LIST1, "r");
        $n = -1;
        while ($line = fgets($file)) {
            $n++;
        }
        $newFile->id = $n;
        if (!$data) {
            $data .= "#;Name;Phone;\"date craete\";Place;Link;Post";
        }

        $newFile->filePath = UPLOAD_DIR . '/' . time() . $newFile->fileName;
        move_uploaded_file($file_req['tmp_name'], $newFile->filePath);
        $data .= "\r\n" . $newFile->id . ";" .
            $user->name . ";" .
            $user->phone . ";\"" .
            date('d.m.Y H:i:s') . "\";\"" .
            $user->places . "\";" .
            $newFile->fileName .
            $newFile->filePath;

        file_put_contents(__DIR__ . '/users.csv', $data);

        Database::createLinkFile($user, $newFile);
        print_r($newFile);
        //return $newFile;
    }
}