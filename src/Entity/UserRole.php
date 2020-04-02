<?php 

namespace App\Entity;

class UserRole{
    
    private int $id;
    private Role $role;
    private User $user;
   
    public function __construct(){

    }
}