<?php
namespace app\catalog\domain\entities;

class Book
{
    private $id;
    private $title;
    private $author;
    private $isbn;
    private $gender;

    public function __construct($id, $title, $author, $isbn, $gender)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->gender = $gender;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        // Aqui você pode adicionar validação do ISBN
        $this->isbn = $isbn;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

}
