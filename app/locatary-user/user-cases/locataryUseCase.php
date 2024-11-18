<?php

namespace app\locatary_user\usecases;

use app\locatary_user\repositories\LocataryRepository;
use app\locatary_user\domain\entities\Locatary;

class LocataryUseCase
{
    private $repository;

    public function __construct(LocataryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save($name, $email, $phone, $document, $age, $profission): bool
    {
        $locatary = new Locatary(null, $name, $email, $phone, $document, $age, $profission);
        return $this->repository->save($locatary);
    }

    public function update($id, $name, $email, $phone, $document, $age, $profission): bool
    {
        $locatary = new Locatary($id, $name, $email, $phone, $document, $age, $profission);
        return $this->repository->update($locatary);
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
