<?php

namespace Tests\Feature;

use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/v1/students');

        $response->assertStatus(200);
    }
}
