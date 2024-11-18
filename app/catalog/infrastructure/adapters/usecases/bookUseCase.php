<?php
namespace app\catalog\infrastructure\adapters\usecases;

use app\catalog\domain\repositories\BookRepository;
use app\catalog\domain\entities\Book;

class BookUseCase
{
    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save($title, $author, $isbn, $gender): bool
    {
        $book = new Book(null, $title, $author, $isbn, $gender);
        return $this->repository->save($book);
    }

    public function update($id, $title, $author, $isbn, $gender): bool
    {
        $book = new Book($id, $title, $author, $isbn, $gender);
        return $this->repository->update($book);
    }
    public function delete($id): bool
    {
        // Chama diretamente o método de exclusão do repositório
        return $this->repository->delete($id);
    }

    public function getBooks(): array
    {
        return $this->repository->findAll();
    }
}

?>
