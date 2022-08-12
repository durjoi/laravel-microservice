<?php

namespace App\Application\Controllers;

use App\Application\Requests\StudentCreateRequest;
use App\Application\Requests\StudentUpdateRequest;
use App\Application\Resources\StudentCollection;
use App\Application\Resources\StudentResource;
use App\Domain\Student\Interfaces\StudentRepositoryInterface;
use App\Infrastructure\Controller;
use Illuminate\Http\Request;
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

    // public function store(Request $request)
    // {

    //     // $newStudent = $createStudent->only([
    //     //     'name',
    //     //     'roll'
    //     // ]);

    //     return response()->json([
    //         'data' => $this->student->createStudent($request->all())
    //     ], Response::HTTP_CREATED);
    // }

    // public function update(StudentUpdateRequest $updateStudent, $id)
    // {
    //     $newStudent = $updateStudent->only([
    //         'name',
    //         'roll'
    //     ]);

    //     return response()->json([
    //         'data' => $this->student->updateStudent($newStudent, $id)
    //     ]);
    // }

    // public function destroy($id)
    // {
    //     $this->student->delete($id);
    //     return response()->json(['status' => true]);
    // }
}
