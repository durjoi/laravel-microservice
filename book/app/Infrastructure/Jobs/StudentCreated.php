<?php

namespace App\Infrastructure\Jobs;

use App\Domain\Student\Repositories\StudentRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StudentCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StudentRepository $student)
    {
        echo 'Event: StudentCreated' . PHP_EOL;
        echo json_encode($this->data) . PHP_EOL;

        $student->createStudent($this->data);
        // Student::create($this->data);
    }
}
