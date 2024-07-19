<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_creation(){
        $product = Product::create([
            'name'=>'Test Product',
            'price'=>99.99,
            'quantity'=>10
        ]);

        $this->assertInstanceOf(Product::class,$product);
        $this->assertEquals('Test Product',$product->name);
        $this->assertEquals(99.99,$product->price);
        $this->assertEquals(10,$product->quantity);
    }
    /**
     * A basic unit test example.
     */
    public function test_product_validation(){
        $this->expectException(QueryException::class);

        Product::create([
            'price'=>99.99,
            'quantity'=>10
        ]);
    }

    public function test_calculate_total_value()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 99.99,
            'quantity' => 10
        ]);

        // Método para calcular el valor total del inventario
        $totalValue = $product->calculateTotalValue();

        $this->assertEquals(999.90, $totalValue);
    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
