<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/news/category');

        $response->assertStatus(200)
            ->assertSeeInOrder(['Здоровье', 'IT','Спорт','Все новости'])
            ->assertViewIs('news.index');
    }
}
