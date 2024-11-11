<?php

namespace app\catalog\domain\repositories;

use app\catalog\domain\entities\Book;
use PDO;
interface BookInterface
{
    public function save(Book $book): bool;
    public function update(Book $book): bool;
    public function delete(int $id): bool;
    public function findAll(): array;
}

class BookRepository implements BookInterface
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function save(Book $book): bool
    {
        $stmt = $this->conn->prepare("INSERT INTO tbl_book (title, author, isbn, gender) VALUES (:title, :author, :isbn, :gender)");
        $stmt->bindParam(":title", $book->getTitle());
        $stmt->bindParam(":author", $book->getAuthor());
        $stmt->bindParam(":isbn", $book->getIsbn());
        $stmt->bindParam(":gender", $book->getGender());
        return $stmt->execute();
    }

    public function update(Book $book): bool
    {
        $stmt = $this->conn->prepare("UPDATE tbl_book SET title = :title, author = :author, isbn = :isbn, gender = :gender WHERE id = :id");
        $stmt->bindParam(":id", $book->getId());
        $stmt->bindParam(":title", $book->getTitle());
        $stmt->bindParam(":author", $book->getAuthor());
        $stmt->bindParam(":isbn", $book->getIsbn());
        $stmt->bindParam(":gender", $book->getGender());
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = $this->conn->prepare("DELETE FROM tbl_book WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function findAll(): array
    {
        $stmt = $this->conn->query("SELECT * FROM tbl_book ORDER BY id");
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}

?>
