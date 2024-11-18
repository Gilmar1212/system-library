<?php require '..\catalog\infrastructure\adapters\usecases\bookUseCase.php'; 
require '..\catalog\domain\repositories\bookRepository.php';
require '..\connect.php'; 
use app\catalog\domain\entities\Book;
use app\catalog\domain\repositories\BookRepository;
use app\catalog\infrastructure\adapters\usecases\BookUseCase;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books change </title>
</head>

<body>
    <?php
    $database = new Connect();
    $conn = $database->getConnection();
    $bookRepository = new BookRepository($conn);
    $bookUseCase = new BookUseCase($bookRepository);
    foreach ($bookUseCase->getBooks() as  $index):            
    ?>
    <p>Title: <?=$index["title"]?></p>
    <p>Author: <?=$index["author"]?></p>
    <p>Isbn: <?=$index["isbn"]?></p>
    <p>Gender: <?=$index["gender"]?></p>
    <a href="change-book-form.php?id=<?=$index['id']?>">Change book</a>
    <a href="../book-process.php?id=<?=$index['id']?>">Delete Book</a>
    <?php endforeach; ?>
</body>

</html>