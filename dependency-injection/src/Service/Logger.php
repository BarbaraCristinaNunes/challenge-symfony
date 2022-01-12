<?php
namespace App\Service;

class Logger 
{
    public function logMessage(string $message){
        $log = "";
        $log .= $message. "\n";
        file_put_contents("log.info",$log, FILE_APPEND);
    }    
}