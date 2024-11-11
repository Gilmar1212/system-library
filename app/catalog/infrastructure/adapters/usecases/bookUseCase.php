<?php
require_once __DIR__ . '/../../../domain/entities/book.php';
require_once  'connect.php';

use app\catalog\domain\entities\Book;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
class useCaseBook extends Book
{
    public function save($title, $author, $isbn, $gender): bool
    {
        // Cria uma nova conexão
        $database = new Connect();
        $conn = $database->getConnection();

        try {
            // Prepara a instrução SQL
            $stmt = $conn->prepare("INSERT INTO tbl_book (title, author, isbn, gender) VALUES (:title, :author, :isbn, :gender)");

            // Vincula os parâmetros
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":author", $author);
            $stmt->bindParam(":isbn", $isbn);
            $stmt->bindParam(":gender", $gender);

            if ($stmt->execute() == true) {
                echo "Book register successful";
                return $stmt->execute();
            }
        } catch (PDOException $e) {
            // Captura e exibe erros durante a execução da consulta
            echo 'ERROR: ' . $e->getMessage();
            return false; // Retorna falso em caso de erro
        }
    }

    public function update($id, $title, $author, $isbn, $gender): bool
    {
        // Cria uma nova conexão        
        $database = new Connect();
        $conn = $database->getConnection();

        try {
            // Prepara a instrução SQL
            $stmt = $conn->prepare("UPDATE tbl_book SET title = :titleUpdated, author = :authorUpdated, isbn = :isbnUpdated, gender = :genderUpdated WHERE id = :id");            
            // Vincula os parâmetros
            $filter_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":titleUpdated", $title);
            $stmt->bindParam(":authorUpdated", $author);
            $stmt->bindParam(":isbnUpdated", $isbn);
            $stmt->bindParam(":genderUpdated", $gender);

            // Executa a instrução
            if ($stmt->execute() == true) {
                echo "Update successful";
                return $stmt->execute();
            }
        } catch (PDOException $e) {
            // Captura e exibe erros durante a execução da consulta
            echo 'ERROR: ' . $e->getMessage();
            return false; // Retorna falso em caso de erro
        }
    }

    public function delete(): void {}



    public function getBook(): array
    {
        $database = new Connect();
        $conn = $database->getConnection();
        $query = "SELECT * FROM tbl_book ORDER BY id";

        $stmt = $conn->query($query);

        // Verifica se a consulta foi bem-sucedida
        if ($stmt !== false) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Retorna um array vazio se a consulta falhar
        return [];
    }
}


if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['isbn']) && isset($_POST['gender'])) {
    $saveBook = new useCaseBook();
    $saveBook->save($_POST['title'], $_POST['author'], $_POST['isbn'], $_POST['gender']);
}
if (isset($id) && isset($_POST['titleUpdate']) && isset($_POST['authorUpdate']) && isset($_POST['isbnUpdate']) && isset($_POST['genderUpdate'])) {
    $updateBook = new useCaseBook();
    $updateBook->update($id,$_POST['titleUpdate'], $_POST['authorUpdate'], $_POST['isbnUpdate'], $_POST['genderUpdate']);
}
