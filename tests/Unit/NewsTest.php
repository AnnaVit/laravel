<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\News;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        //$this->assertTrue(true);
        $model = new News();
        $data = $model->getByCategoryId(1);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        foreach ($data as $item){
            $this->assertEquals(1, $item['category_id']);
        }
    }
}
