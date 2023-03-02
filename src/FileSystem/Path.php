<?php

namespace Core\FileSystem;

use Exception;

class Path
{
    public static function parts(string $path)
    {
        $parts = explode(DIRECTORY_SEPARATOR, $path);
        $parts = array_filter($parts, 'strlen');

       return $parts;
    }

    public static function start()
    {
        /*'Windows', 'BSD', 'Darwin', 'Solaris', 'Linux' ou 'Unknown'*/
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

    public static function absolute($path): string
    {
        $path = static::normalize($path);
        return $_SERVER['DOCUMENT_ROOT'] .  DIRECTORY_SEPARATOR . $path;
    }

    public static function normalize($path): string
    {
        return str_replace(['/, \\'], DIRECTORY_SEPARATOR, $path);
    }
}
