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

    /** @test */
    public function guests_cannot_manage_articles()
    {
        $this->tryAllBackendArticlesPages();
    }

    /** @test */
    public function an_authenticated_user_cannot_manage_articles()
    {
        $this->actingAs(factory('App\User')->create());
        $this->tryAllBackendArticlesPages();
    }

    /*
     * Try to get and post every backend articles pages (/admin/articles/xxx)
     */
    private function tryAllBackendArticlesPages()
    {
        $article = factory('App\Article')->create();

        // Try to post an article with the same attributes than $articles (faster)
        $this->post('/admin/articles/', $article->toArray())->assertRedirect('login');

        $this->get('/admin' . $article->path() . '/edit')->assertRedirect('login');
        $this->get('/admin/articles')->assertRedirect('login');
        $this->get('/admin/articles')->assertRedirect('login');
        $this->get('/admin/articles/create')->assertRedirect('login');
    }
}
