<?php

namespace App\Helpers;

class Helpers
{
    /**
     * Ajout de nouveau fichier
     *
     * @param $file
     * @param string $dirName
     * @return string[]
     */
    public static function addFile($file, string $dirName)
    {
        try {
            $path = public_path() . DIRECTORY_SEPARATOR . 'storage'. DIRECTORY_SEPARATOR . $dirName;

            if(is_dir($path) === false)
            {
                mkdir($path);
            }

            $fileName = date('Ymd.His') . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileName = md5($fileName) . '.' . $fileType;
            $file->move($path, $dirName . DIRECTORY_SEPARATOR . $fileName);

            return ['path' => $path, 'fileName' => $fileName];
        } catch (\Exception $e) {
            dump($e->getMessage());
            die();
        }
    }
}
