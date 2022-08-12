<?php

namespace App\Domain\Student\Repositories;

use App\Domain\Student\Interfaces\BookRepositoryInterface;
use App\Domain\Student\Interfaces\StudentRepositoryInterface;
use App\Domain\Student\Models\Book;
use App\Domain\Student\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentRepository implements StudentRepositoryInterface
{

    public function findAll() {
        return Student::all();
    }

    public function findOne($id) {
        return Student::find($id);
    }

    public function createStudent(array $data) {
        return Student::create($data);
    }

    public function updateStudent(array $data, $id) {
        $record = Student::find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id) {
        return Student::destroy($id);
    }
}
