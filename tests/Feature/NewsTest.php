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
    public function test_check_news_index()
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function test_check_news_showCategory()
    {
        $idCategory = 1;
        $response = $this->get(route('news.category', ['idCategory' => $idCategory]));

        $response->assertDontSeeText('текст');
    }

    public function test_check_news_show()
    {
        $idCategory = 1;
        $id = 1;
        $response = $this->get(route('news.show', ['idCategory' => $idCategory, 'id' => $id]));

        $response->assertViewHasAll(['news', 'categoryName']);
    }
}
