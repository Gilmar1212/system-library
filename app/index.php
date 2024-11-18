<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books rent </title>
</head>
<body>
    <form action="user-auth.php" method="POST">
        <input type="email" name="email" placeholder="Title" required>
        <input type="password" name="password" placeholder="Title" required>
        <button type="submit">login</button>
    </form>
    <a  href="view/change-book.php">Change book</a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books rent </title>
</head>
<body>
    <form action="locatary-process.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone" required>
        <input type="text" name="document" placeholder="Credential" required>
        <input type="text" name="age" placeholder="Age" required>
        <input type="text" name="profission" placeholder="Profission" required>        
        <button type="submit">register</button>
    </form>
    <a  href="view/change-book.php">Book list</a>
    <a  href="view/register-book.php">Register books</a>
</body>
</html>