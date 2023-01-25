<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    private $product;

    protected function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()->create();

    }

    /** @test */
    public function products_route_return_ok()
    {
        $response = $this->get('products');

        $response->assertSee('Products');

        $response->assertStatus(200);
    }

    /** @test */
    public function product_has_name()
    {
        $this->assertNotEmpty($this->product->name);
    }

    /** @test */
    public function product_are_not_empty()
    {
        $response = $this->get('products');

        $response->assertSee($this->product->name);
    }

    /** @test */
    public function auth_user_can_see_the_buy_button()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertSee('Buy Product');
    }

    /** @test */
    public function auth_user_cannot_see_buy_button()
    {
        $response = $this->get('products');

        $response->assertDontSee('Buy Product');
    }

    /** @test */
    public function auth_user_can_see_create_link()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertSee('Create');
    }

    /** @test */
    public function auth_user_cannot_see_create_link()
    {
        $response = $this->get('products');

        $response->assertDontSee('Create');
    }

//    /** @test */
//    public function auth_user_can_visit_the_products_create_route()
//    {
//        $user = User::factory()->create();
//        $response = $this->actingAs($user)->get('/products/create');
//        $response->assertStatus(200);
//    }
}
