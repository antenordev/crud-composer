<?php

namespace Crud;

class Environment
{
    /**
     * Method load var
     * @param string $dir path absolute .env
     */
    public static function load($dir)
    {
        // Validate file .env
        if(!file_exists($dir.'/.env')) {
            return false;
        }

        // Define var environment
        $lines = file($dir.'/.env');
        foreach ($lines as $line) {
            putenv(trim($line));
        }
    }
}