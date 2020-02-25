<?php
namespace Tests\Feature;

use App\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class ArticlesTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test **/
    public function an_admin_can_create_an_article()
    {
        $this->withoutExceptionHandling();
        $this->actingAsAdmin();
        $this->get('/admin/articles/create')->assertStatus(200);

        $title = $this->faker->sentence;
        $articleAttributes = [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => $this->faker->realText(200),
            'content' => $this->faker->text,
        ];

        $response = $this->post('/admin/articles', $articleAttributes);
        $response->assertRedirect('/admin/articles');

        $article = Article::where($articleAttributes)->first();
        $this->assertDatabaseHas('articles', $articleAttributes);
    }
}
