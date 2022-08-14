<?php

namespace Tests\Unit;

use App\Domain\Book\Models\Book;
use App\Domain\Student\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    // use DatabaseMigrations;
    use RefreshDatabase;

    protected $book;
    protected $student;
    // protected $;


    public function setup(): void
    {
        parent::setUp();

        $this->student = Student::factory()->create();
        $this->book = Book::factory()->create();
    }

    public function test_can_create_book()
    {
        $formData = [
            'name' => 'fist book',
            'pic' => 'test pic'
        ];

        $this->post(route('books.store'), $formData)
            ->assertStatus(201);
    }

    /** @test */
    public function test_can_delete_a_book()
    {

        Book::factory()->create();


        $latestBook = Book::latest()->first();

        $latestBook->delete();

        $this->assertNull($latestBook->delete());
    }

    /** @test */
    public function test_can_get_a_book()
    {
        $this->get(route('books.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function test_can_update_a_book()
    {
        Book::factory()->create();


        $latestBook = Book::latest()->first();

        $formData = [
            'name' => 'fist book',
            'pic' => 'test pic'
        ];
        $this->patch(route('books.update', $latestBook->id), $formData)
            ->assertStatus(200);
    }

    /** @test */
    public function test_can_find_book_by_id()
    {
        Book::factory()->create();


        $latestBook = Book::latest()->first();

        $formData = [
            'name' => 'fist book',
            'pic' => 'test pic'
        ];
        $this->get(route('books.show', $latestBook->id), $formData)
            ->assertStatus(200);
    }
}
