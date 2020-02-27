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

    /** @test */
    public function it_has_a_path()
    {
        $article = factory('App\Article')->create();
        $this->assertEquals('/articles/' . $article->slug, $article->path());
    }

    /** @test */
    public function it_belongs_to_an_admin()
    {
        $article = factory('App\Article')->create();
        $this->assertInstanceOf('App\User', $article->author);
        $this->assertEquals($article->author->is_admin, true);
    }
}
