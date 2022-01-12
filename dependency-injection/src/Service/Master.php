<?php
namespace App\Service;

// require 'Logger.php';
// require 'ChangeSpacesToDashes.php';
// require 'CapitalizesWords.php';

class Master 
{
    private string $message;
    private Transform $transform;
    private Logger $log;

    public function __construct(Logger $log, Transform $transform){
        $this->transform = $transform;
        $this->log = $log;

    }

    public function transformMessage(string $message){
        $this->message = $this->transform->transform($message);
        $this->logMessage($this->message);
    }

    public function logMessage($message){
        $this->log->logMessage($message);
    }

    public function getMessage(){
        return $this->message;
    }
}