<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\Interfaces\BookRepositoryInterface;
use App\Domain\Book\Models\Book;
use Illuminate\Database\Eloquent\Model;

class BookRepository implements BookRepositoryInterface
{

    public function findAll()
    {
        return Book::all();
    }

    public function findOne($id)
    {
        return Book::find($id);
    }

    public function createBook(array $data)
    {
        return Book::create($data);
    }

    public function updateBook(array $data, $id)
    {
        $record = Book::find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        return Book::destroy($id);
    }
}
