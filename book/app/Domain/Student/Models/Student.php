<?php

namespace App\Domain\Student\Models;

use App\Domain\Book\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'roll'
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'student_id');
    }
}
