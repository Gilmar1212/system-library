<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books rent </title>
</head>
<body>
    <form action="catalog/infrastructure/adapters/usecases/bookUseCase.php" method="POST">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <input type="text" name="isbn" placeholder="ISBN">
        <input type="text" name="gender" placeholder="Gender">
        <button type="submit">send</button>
    </form>
</body>
</html>