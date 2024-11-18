<?php 
require __DIR__ . '\locatary-user\domain\entities\locatary.php';
require __DIR__ . '\locatary-user\repositories\locataryRepository.php';
require __DIR__ . '\locatary-user\user-cases\locataryUseCase.php';
require 'connect.php';

use app\locatary_user\domain\etities\Locatary;
use app\locatary_user\repositories\LocataryRepository;
use app\locatary_user\usecases\LocataryUseCase;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$database = new Connect();
$conn = $database->getConnection();
$locataryRepository = new LocataryRepository($conn);
$locataryUseCase = new LocataryUseCase($locataryRepository);

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['document']) && isset($_POST['phone']) && isset($_POST['age']) && isset($_POST['profission'])) {
    $locataryUseCase->save($_POST['name'], $_POST['email'],$_POST['phone'],$_POST['document'] , $_POST['age'],$_POST['profission']);
}

if (isset($id) && isset($_POST['titleUpdate']) && isset($_POST['authorUpdate']) && isset($_POST['isbnUpdate']) && isset($_POST['genderUpdate'])) {
    $bookUseCase->update($id, $_POST['titleUpdate'], $_POST['authorUpdate'], $_POST['isbnUpdate'], $_POST['genderUpdate']);
}
if (isset($id)) {
    $bookUseCase->delete($id);
}
?>