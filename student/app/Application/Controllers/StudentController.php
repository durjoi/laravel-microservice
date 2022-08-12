<?php

namespace App\Application\Controllers;

use App\Application\Requests\StudentCreateRequest;
use App\Application\Requests\StudentUpdateRequest;
use App\Application\Resources\StudentCollection;
use App\Application\Resources\StudentResource;
use App\Domain\Student\Interfaces\StudentRepositoryInterface;
use App\Infrastructure\Controller;
use App\Infrastructure\Jobs\StudentCreated;
use App\Infrastructure\Jobs\StudentDeleted;
use App\Infrastructure\Jobs\StudentUpdated;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return response()->json([
            'data' => new StudentCollection($this->student->findAll())
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'data' => new StudentResource($this->student->findOne($id))
        ]);
    }

    public function store(StudentCreateRequest $createStudent)
    {

        $newStudent = $createStudent->only([
            'name',
            'roll'
        ]);

        $createdStudent = $this->student->createStudent($newStudent);

        StudentCreated::dispatch($createdStudent->toArray());

        return response()->json([
            'data' => new StudentResource($createdStudent)
        ], Response::HTTP_CREATED);
    }

    public function update(StudentUpdateRequest $updateStudent, $id)
    {
        $newStudent = $updateStudent->only([
            'name',
            'roll'
        ]);

        $updatedStudent = $this->student->updateStudent($newStudent, $id);

        StudentUpdated::dispatch($updatedStudent->toArray());

        return response()->json([
            'data' => new StudentResource($updatedStudent)
        ]);
    }

    public function destroy($id)
    {
        $this->student->delete($id);

        StudentDeleted::dispatch($id);

        return response()->json(['status' => true]);
    }
}
