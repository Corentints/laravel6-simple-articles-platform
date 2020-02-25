<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_slug() 
    {   
        $article = factory('App\Article')->create();
        $this->assertEquals($article->slug, Str::slug($article->slug));
    }
}
