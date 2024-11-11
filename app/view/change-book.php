<?php include("../catalog/domain/repositories/bookRepository.php") ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books change </title>
</head>

<body>
    <?php
    $getBook = new useCaseBook();
    foreach ($getBook->getBook() as  $index):            
    ?>
    <p>Title: <?=$index["title"]?></p>
    <p>Author: <?=$index["author"]?></p>
    <p>Isbn: <?=$index["isbn"]?></p>
    <p>Gender: <?=$index["gender"]?></p>
    <a href="change-book-form.php?id=<?=$index['id']?>">Change book</a>
    <?php endforeach; ?>
</body>

</html>