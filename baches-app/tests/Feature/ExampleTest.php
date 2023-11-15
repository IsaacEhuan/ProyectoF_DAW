<?php
// php artisan make:test ExampleTest
//vendor/bin/phpunit    <- para ejecutar
//https://phpunit.de/index.html


//https://www.youtube.com/watch?v=EVMrYC0YFSg

//composer global require laravel/installer

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('hola');
    }
}
