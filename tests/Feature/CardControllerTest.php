<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardControllerTest extends TestCase
{
    public function testCardIndexed(): void
    {
        $this->json('GET', 'api/v1/cards')
            ->assertOk();
    }

    public function testCardShow(): void
    {
        $this->json('GET', 'api/v1/cards/1')
            ->assertOk();
    }

    public function testCardStore(): void
    {
        $this->json('POST', 'api/v1/cards')
            ->assertStatus(201);
    }

    public function testCardUpdate(): void
    {
        $this->json('PATCH', 'api/v1/cards/1')
            ->assertOk();
    }

    public function testCardReplace(): void
    {
        $this->json('PUT', 'api/v1/cards/1')
            ->assertOk();
    }

    public function testCardDestroy(): void
    {
        $this->json('DELETE', 'api/v1/cards/1')
            ->assertStatus(204);
    }
}
