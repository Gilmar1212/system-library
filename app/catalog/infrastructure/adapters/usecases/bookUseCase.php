<?php 
require_once __DIR__ . '/../../../domain/entities/book.php';
require_once  'connect.php';

use app\catalog\domain\entities\Book;
class useCaseBook extends Book {
    public function save($title, $author, $isbn, $gender)
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
            
            // Executa a instrução
            return $stmt->execute();
        } catch (PDOException $e) {
            // Captura e exibe erros durante a execução da consulta
            echo 'ERROR: ' . $e->getMessage();
            return false; // Retorna falso em caso de erro
        }
    }

     public function updateBook(Book $book){

    }

     public function deleteBook(Book $book){

    }

    
    public function getBook(){
        $database = new Connect();
        $conn = $database->getConnection();
        $query = "SELECT * FROM tbl_book ORDER BY id";        
        foreach($conn->query($query) as $key){
            echo "Title: ".$key['title']."<br>";
            echo "Author: ".$key['author']."<br>";
            echo "ISBN: ".$key['isbn']."<br>";
            echo "Gender: ".$key['gender']."<br>";
        }
    }     
}


$getBook = new useCaseBook();
echo $getBook->getBook();