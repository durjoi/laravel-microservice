<?php

namespace App\Domain\Book\Interfaces;

interface BookRepositoryInterface
{
    public function findAll();

    public function findOne($id);

    public function createBook(array $data);

    public function updateBook(array $data, $id);

    public function delete($id);
}
