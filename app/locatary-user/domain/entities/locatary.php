<?php

namespace app\locatary_user\domain\entities;

class Locatary
{
    private $id_user;
    private $name;
    private $email;
    private $phone;
    private $document;
    private $age;    
    private $profission;

    public function __construct($id_user, $name, $email,$phone,$document, $age,$profission) {
        $this->id_user = $id_user;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->document = $document;
        $this->age = $age;
        $this->profission = $profission;
    }

    public function getId(){
        return $this->id_user;
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }  
    public function getPhone(){
        return $this->phone;
    }    
    public function getDocument(){
        return $this->document;
    }
    public function getAge(){
        return $this->age;
    }
    public function getProfission(){
        return $this->profission;
    }
    public function setId($id){
         $this->id_user = $id;
    }
    public function setName($name){
         $this->name = $name;
    }
    public function setEmail($email){
         $this->email = $email;
    }    
    public function setPhone($phone){
        $this->phone = $phone;
   }    
    public function setDocument($document){
         $this->document = $document;
    }
    public function setAge($age){
         $this->age = $age;
    }
    public function setProfission($profission){
         $this->profission = $profission;
    }

}
