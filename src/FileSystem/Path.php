<?php


namespace Core\FileSystem;


use Exception;

class Path
{
    public static function parts(string $path)
    {
       return explode(DIRECTORY_SEPARATOR, $path);
    }

    public static function start()
    {
        /*'Windows', 'BSD', 'Darwin', 'Solaris', 'Linux' ou 'Unknown'*/
        //PHP_OS_FAMILY == 'LINUX'
        if (PHP_OS_FAMILY == 'Unknown') {
            throw new Exception('Path start position unknown for this Operating system');
        }
        $start = 0;
        if (PHP_OS_FAMILY == 'Windows') {
            $start = 1;
        }
        return $start;
    }

    public static function root(string $path)
    {
        return self::parts(self::start());
    }

    public static function create(string $path)
    {
        // use mkdir recursively
        $parts = self::parts($path);
        for($i = self::start();$i < count($parts) ;$i++) {
            $part = $parts[$i];
            if(!is_dir($dir .= DIRECTORY_SEPARATOR ."$part")) {
                mkdir($dir);
            }
        }
    }
}