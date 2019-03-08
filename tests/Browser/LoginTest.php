<?php
namespace Tests\Browser;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/')
        //             ->assertSee('Laravel');
        // });
        //Use of Factory database/factories/UserFactory.php
        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);
        //Use of Dusk
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login') //visit login page
                    ->type('email', $user->email) //fill form email field
                    ->type('password', 'password') //fill form password field ("password" is used in factory)
                    ->press('Login') //press login button
                    ->assertPathIs('/home'); //check that we're being redirected to home route
        });
    }
}