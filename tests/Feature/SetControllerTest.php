<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SetControllerTest extends TestCase
{
    public function testSetIndexed(): void
    {
        $this->json('GET', 'api/v1/sets')
            ->assertOk();
    }

    public function testSetShow(): void
    {
        $this->json('GET', 'api/v1/sets/1')
            ->assertOk();
    }

    public function testSetStore(): void
    {
        $this->json('POST', 'api/v1/sets')
            ->assertStatus(201);
    }

    public function testSetsUpdate(): void
    {
        $this->json('PATCH', 'api/v1/sets/1')
            ->assertOk();
    }

    public function testSetsReplace(): void
    {
        $this->json('PUT', 'api/v1/sets/1')
            ->assertOk();
    }

    public function testSetsDestroy(): void
    {
        $this->json('DELETE', 'api/v1/sets/1')
            ->assertStatus(204);
    }
}
