<?php
namespace Tests\Unit;

use App\Jobs\asyncLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class asyncLogTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_job_are_added_to_the_queue(){
        // Fake Queue functionality
        Queue::fake();

        // Assert a job was pushed to a given queue...
        Queue::assertPushedOn('async_logs', Message::class);
    }
}