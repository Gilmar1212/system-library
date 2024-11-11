<?php
namespace app\catalog\domain\entities;

abstract class Book
{
    
    private $id;
    private $title;
    private $author;
    private $isbn;
    private $gender;

    abstract protected function save($title,$author,$isbn,$gender);

    abstract protected function updateBook(Book $book);

    abstract protected function deleteBook(Book $book);
    
    public function __construct(){}
    
    public function getTitleBook(){
       return $this->title;
    }
    public function setTitleBook($title){
        return $this->title = $title;
    }
    public function getAuthorBook(){
        return $this->author;
     }
     public function setAuthorBook($author){
         return $this->author = $author;
     }
     public function getIsbnBook(){
        return $this->isbn;
     }
     public function setIsbnBook($isbn){
         return $this->isbn = $isbn;
     }
     public function getGenderBook(){
        return $this->gender;
     }
     public function setGenderBook($gender){
         return $this->gender = $gender;
     }
    
}

