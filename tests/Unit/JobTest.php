<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_belongs_to_an_employer(): void
    {
        // Arrange
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id
        ]);
        // Act and Assert
        expect($job->employer->is($employer))->toBeTrue();
    }

    public function test_can_have_tags(): void
    {
        $job = Job::factory()->create();

        $job->tag('Developer');

        expect($job->tags->count())->toBe(1);
    }
}
