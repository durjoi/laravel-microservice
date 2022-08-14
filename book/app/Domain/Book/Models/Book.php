<?php

namespace App\Domain\Book\Models;

use App\Domain\Student\Models\Student;
use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'student_id', 'pic'
    ];


    protected static function newFactory()
    {
        return new BookFactory();
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
