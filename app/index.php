<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books rent </title>
</head>
<body>
    <form action="process.php" method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="text" name="isbn" placeholder="ISBN" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <button type="submit">register</button>
    </form>
    <a  href="view/change-book.php">Change book</a>
</body>
</html>