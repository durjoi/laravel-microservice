<?php

namespace App\Domain\Student\Interfaces;

interface StudentRepositoryInterface
{
    public function findAll();

    public function findOne($id);

    public function createStudent(array $data);

    public function updateStudent(array $data, $id);

    public function delete($id);
}
