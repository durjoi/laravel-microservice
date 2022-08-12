<?php

namespace App\Infrastructure\Jobs;

use App\Domain\Student\Repositories\StudentRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StudentUpdated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $studentId)
    {
        $this->data = $data;
        $this->studentId = $studentId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StudentRepository $student)
    {
        echo 'Event: StudentUpdated' . PHP_EOL;
        echo json_encode($this->data) . PHP_EOL;

        $student->updateStudent($this->data, $this->data['id']);
    }
}
