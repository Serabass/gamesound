<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/stats/all');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'count',
            'doubtful',
            'filled',
            'gender',
            'groups',
            'lang'
        ]);
    }
}
