<?php
namespace App\Service;


class ChangeSpacesToDashes implements Transform 
{
    public function transform(string $string): string{
        return str_replace(" ", "-", $string);
    }   
}