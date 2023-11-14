<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;
    use DatabaseTruncation;

    /**
     * Admin added to DB
     */
    public function testAdminAdded(): void {
        $this->seed();
        $this->assertDatabaseCount('users', 1);
    }

    /**
     * Can access homepage without authorisation
     */
    public function testHome(): void {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Zoek:');
        });
    }

    /**
     * Can access homepage without authorisation
     */
    public function testHome1(): void {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->assertSee('Zoek:');
        });
    }

    /**
     * Can't access admin homepage without authorisation
     */
    public function testAdmin(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('admin')
                ->assertSee('Forgot Your Password?');
        });
    }

    /**
     * Can access admin homepage with authorisation
     */
    public function testAdmin1(): void {
        $this->browse(function (Browser $browser) {
            $this->seed();
            $browser->loginAs(User::find(1))
                ->visitRoute('admin')
                ->assertSee('create new event');
        });
    }

    /**
     * Can't create event without authorisation
     */
    public function testCreateEvent(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('event.create')
                ->assertSee('Forgot Your Password?');
        });
    }

    /**
     * Can create event with authorisation
     */
    public function testCreateEvent1(): void {
        $this->browse(function (Browser $browser) {
            $this->seed();
            $browser->loginAs(User::find(1))
                ->visitRoute('event.create')
                ->assertSee('straatnaam:');
        });
    }

    /**
     * Can access lists of events without authorisation
     */
    public function testShowEvents(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('event.show')
                ->assertSee('Zoek:');
        });
    }
}
