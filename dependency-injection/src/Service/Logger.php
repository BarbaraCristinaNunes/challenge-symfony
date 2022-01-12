<?php
namespace App\Service;

class Logger 
{
    public function logMessage(string $message){
        $log = "";
        $log .= $message. "<br>";
        file_put_contents("log.info",$log);
    }    
}