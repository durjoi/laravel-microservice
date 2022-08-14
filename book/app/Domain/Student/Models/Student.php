<?php

namespace App\Domain\Student\Models;

use App\Domain\Book\Models\Book;
use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'roll'
    ];

    protected static function newFactory()
    {
        return new StudentFactory();
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'student_id');
    }
}
