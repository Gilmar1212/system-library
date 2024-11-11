<?php $filter_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books change </title>
</head>
<body>
    <form action="../catalog/infrastructure/adapters/usecases/bookUseCase.php?id=<?=$filter_id?>" method="POST">
        <input type="text" name="titleUpdate" placeholder="Title">
        <input type="text" name="authorUpdate" placeholder="Author">
        <input type="text" name="isbnUpdate" placeholder="ISBN">
        <input type="text" name="genderUpdate" placeholder="Gender">
        <button type="submit">register</button>
    </form>
</body>
</html>