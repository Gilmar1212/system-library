<?php 
require __DIR__ . '\catalog\domain\entities\book.php';
require __DIR__ . '\catalog\domain\repositories\bookRepository.php';
require __DIR__ . '\catalog\infrastructure\adapters\usecases\bookUseCase.php';
require 'connect.php';

use app\catalog\domain\entities\Book;
use app\catalog\domain\repositories\BookRepository;
use app\catalog\infrastructure\adapters\usecases\BookUseCase;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$database = new Connect();
$conn = $database->getConnection();
$bookRepository = new BookRepository($conn);
$bookUseCase = new BookUseCase($bookRepository);

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['isbn']) && isset($_POST['gender'])) {
    $bookUseCase->save($_POST['title'], $_POST['author'], $_POST['isbn'], $_POST['gender']);
}

if (isset($id) && isset($_POST['titleUpdate']) && isset($_POST['authorUpdate']) && isset($_POST['isbnUpdate']) && isset($_POST['genderUpdate'])) {
    $bookUseCase->update($id, $_POST['titleUpdate'], $_POST['authorUpdate'], $_POST['isbnUpdate'], $_POST['genderUpdate']);
}
if (isset($id)) {
    $bookUseCase->delete($id);
}
?>