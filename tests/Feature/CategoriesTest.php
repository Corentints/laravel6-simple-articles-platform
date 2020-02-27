<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_category()
    {
        $this->actingAsAdmin();
        $this->get('/admin/categories/create')->assertStatus(200);
        $categoryName = ['name' => $this->faker->word];

        $response = $this->post('/admin/categories', $categoryName);
        $category = Category::where($categoryName)->first();

        $response->assertRedirect('admin' . $category->path());
        $this->assertDatabaseHas('categories', $categoryName);
    }

    /** @test */
    public function an_admin_can_update_a_category()
    {
        $category = factory('App\Category')->create();
        $this->actingAs(factory('App\User')->create(['is_admin' => 1]))
            ->patch('admin' . $category->path(), $categoryName = ['name' => 'category\'s name changed!']);

        $this->assertDatabaseHas('categories', $categoryName);

    }
}
