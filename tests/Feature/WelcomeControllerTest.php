<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Services\Livre;
use Mockery;
class WelcomeControllerTest extends TestCase
{
    public function testIndex()
    {
        // Création Mock
        $mock = Mockery::mock(Livre::class)
        ->shouldReceive('getTitle')
        ->andReturn('Titre');
        // Création lien
        $this->app->instance('\App\Services\Livre', $mock);
        // Action
        $response = $this->call('GET', 'welcome');
        // Assertions
        $response->assertSuccessful();
        $response->assertViewHas('titre', 'Titre');
    }
    // public function tearDown()
    // {
    //     Mockery::close();
    // }
}
