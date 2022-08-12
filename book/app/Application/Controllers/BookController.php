<?php

namespace App\Application\Controllers;

use App\Application\Requests\BookCreateRequest;
use App\Application\Requests\BookUpdateRequest;
use App\Application\Requests\StudentUpdateRequest;
use App\Application\Resources\BookCollection;
use App\Application\Resources\BookResource;
use App\Domain\Book\Interfaces\BookRepositoryInterface;
use App\Infrastructure\Controller;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct(BookRepositoryInterface $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        return response()->json([
            'data' => new BookCollection($this->book->findAll())
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'data' => new BookResource($this->book->findOne($id))
        ]);
    }

    public function store(BookCreateRequest $createBook)
    {

        $newBook = $createBook->only([
            'name',
            'pic',
            'student_id'
        ]);

        return response()->json([
            'data' => new BookResource($this->book->createBook($newBook))
        ], Response::HTTP_CREATED);
    }

    public function update(BookUpdateRequest $updateBook, $id)
    {
        $newBook = $updateBook->only([
            'name',
            'pic',
            'student_id'
        ]);

        return response()->json([
            'data' => new BookResource($this->book->updateBook($newBook, $id))
        ]);
    }

    public function destroy($id)
    {
        $this->book->delete($id);
        return response()->json(['status' => true]);
    }
}
