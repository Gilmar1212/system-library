<?php

namespace app\locatary_user\repositories;

use app\locatary_user\domain\entities\Locatary;
use PDO;
interface LocataryInterface
{
    public function save(Locatary $locatary_user): bool;
    public function update(Locatary $locatary_user): bool;
    public function delete(int $id): bool;
    public function findAll(): array;
}

class LocataryRepository implements LocataryInterface
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function save(Locatary $locatary_user): bool
    {
        $stmt = $this->conn->prepare("INSERT INTO tbl_person (`name`, `email`, `phone`, `document`, `age`, `profission`) VALUES (:name, :email, :phone, :document, :age, :profission)");
        $name = $locatary_user->getName();
        $email = $locatary_user->getEmail();
        $phone = $locatary_user->getPhone();
        $document = $locatary_user->getDocument();
        $age = $locatary_user->getAge();        
        $profission = $locatary_user->getProfission();
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":document", $document);
        $stmt->bindParam(":age", $age);        
        $stmt->bindParam(":profission", $profission);        
        return $stmt->execute();
    }

    public function update(Locatary $locatary_user): bool
    {
        $stmt = $this->conn->prepare("UPDATE tbl_user SET title = :title, author = :author, isbn = :isbn, gender = :gender WHERE id = :id");
        $id = $locatary_user->getId();
        $name = $locatary_user->getName();
        $email = $locatary_user->getEmail();
        $phone = $locatary_user->getPhone();
        $document = $locatary_user->getDocument();
        $age = $locatary_user->getAge();        
        $profission = $locatary_user->getProfission();
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":gender", $gender);
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = $this->conn->prepare("DELETE FROM tbl_user WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function findAll(): array
    {
        $stmt = $this->conn->query("SELECT * FROM tbl_user ORDER BY id");
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}

?>
