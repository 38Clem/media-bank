<?php 

namespace App\Entity;

class PasswordToken{
    
    private int $id;
    private string $hash;
    private int $time;
   
    public function __construct(){

    }
}