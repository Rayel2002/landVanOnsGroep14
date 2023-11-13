<?php

namespace Tests\Browser;

use App\Models\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EventTest extends DuskTestCase
{
    use DatabaseMigrations;
    use DatabaseTruncation;

    /**
     * @test
     * Checks if website loads correct page after adding an
     * event.
     */
    public function loadsCorrectPageTest(): void {
        $this->browse(function (Browser $browser) {
            $browser->waitForReload(function (Browser $browser) {
                $browser->visitRoute('event.create')
                    ->type('event_name', 'name1')
                    ->type('begin_time', '13')
                    ->type('begin_time', '09')
                    ->keys('#begin_time', ['{tab}'])
                    ->type('begin_time', '19:30')
                    ->keys('#begin_time', ['{tab}'])
                    ->type('begin_time', '30')
                    ->keys('#begin_time', ['{tab}'])
                    ->type('begin_time', '2024')
                    ->type('end_time', '13')
                    ->type('end_time', '09')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '20:30')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '30')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '2024')
                    ->type('street_name', 'bla')
                    ->type('house_number', '2a')
                    ->type('postal_code', '1122ba')
                    ->type('amount_of_volunteers_needed', '16')
                    ->type('description', 'description')
                    ->press('submit');
            })->assertRouteIs('home');
        });
    }

    /**
     * @test
     * Checks if website loads correct page after adding an
     * event.
     */
    public function addsEventToDBTest(): void {
        $this->browse(function (Browser $browser) {
            $browser->waitForReload(function (Browser $browser) {
                $browser->visitRoute('event.create')
                    ->type('event_name', 'name')
                    ->type('begin_time', '13')
                    ->type('begin_time', '09')
                    ->keys('#begin_time', ['{tab}'])
                    ->type('begin_time', '19:30')
                    ->keys('#begin_time', ['{tab}'])
                    ->type('begin_time', '13')
                    ->keys('#begin_time', ['{tab}'])
                    ->type('begin_time', '2024')
                    ->type('end_time', '13')
                    ->type('end_time', '09')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '20:30')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '13')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '2024')
                    ->type('street_name', 'bla')
                    ->type('house_number', '2a')
                    ->type('postal_code', '1122ba')
                    ->type('amount_of_volunteers_needed', '16')
                    ->type('description', 'description')
                    ->press('submit');

            });
            $browser->refresh();
        });

        $this->assertDatabaseHas('events', [
            'event_name' => 'name',
            'begin_time' => '2024-09-13T19:30',
            'end_time' => '2024-09-13T20:30',
            'street_name' => 'bla',
            'house_number' => '2a',
            'postal_code' => '1122ba',
            'amount_of_volunteers_needed' => '16',
            'description' => 'description'
        ]);
    }

    /**
     * @test
     * Checks if homepage loads events correctly
     */
    public function showsEventCorrectlyOnHomePage(): void {
        Event::factory()->count(1)->create([
            'begin_time' => '2025-10-20 21:00:00',
            'end_time' => '2025-10-20 22:00:00',
        ]);
        $this->assertDatabaseCount('events', 1);
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('home')
                ->assertSee("2025-10-20 21:00:00");

        });
    }

    /**
     * @test
     * Checks if begin date cannot be bigger than end date
     */
    public function beginDateIsBiggerThanEndDate(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('event.create')
                ->type('event_name', 'name')
                ->type('begin_time', '13')
                ->type('begin_time', '09')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '19:30')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '13')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '2025')
                ->type('end_time', '13')
                ->type('end_time', '09')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '20:30')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '13')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '2024')
                ->type('street_name', 'bla')
                ->type('house_number', '2a')
                ->type('postal_code', '1122ba')
                ->type('amount_of_volunteers_needed', '16')
                ->type('description', 'description')
                ->press('submit')
                ->assertSee("Begin tijd kan niet later zijn dat eind tijd");
        });
    }

    /**
     * @test
     * Checks if begin date cannot be bigger than end date
     */
    public function beginTimeIsBiggerThanEndTime(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('event.create')
                ->type('event_name', 'name')
                ->type('begin_time', '13')
                ->type('begin_time', '09')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '21:30')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '13')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '2024')
                ->type('end_time', '13')
                ->type('end_time', '09')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '20:30')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '13')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '2024')
                ->type('street_name', 'bla')
                ->type('house_number', '2a')
                ->type('postal_code', '1122ba')
                ->type('amount_of_volunteers_needed', '16')
                ->type('description', 'description')
                ->press('submit')
                ->assertSee("Begin tijd kan niet later zijn dat eind tijd");
        });
    }

    /**
     * @test
     * Checks if begin date cannot be the same as end date
     */
    public function beginDateIsNotTheSameAsEndDate(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('event.create')
                ->type('event_name', 'name')
                ->type('begin_time', '13')
                ->type('begin_time', '09')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '19:30')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '13')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '2024')
                ->type('end_time', '13')
                ->type('end_time', '09')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '19:30')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '13')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '2024')
                ->type('street_name', 'bla')
                ->type('house_number', '2a')
                ->type('postal_code', '1122ba')
                ->type('amount_of_volunteers_needed', '16')
                ->type('description', 'description')
                ->press('submit')
                ->assertSee("Begin tijd kan niet hetzelfde zijn als eind tijd");
        });
    }

    /**
     * @test
     * Checks if begin date has not passed already
     */
    public function beginDateHasNotAlreadyPassed(): void {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('event.create')
                ->type('event_name', 'name')
                ->type('begin_time', '13')
                ->type('begin_time', '09')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '19:30')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '13')
                ->keys('#begin_time', ['{tab}'])
                ->type('begin_time', '2012')
                ->type('end_time', '13')
                ->type('end_time', '09')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '20:30')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '13')
                ->keys('#end_time', ['{tab}'])
                ->type('end_time', '2024')
                ->type('street_name', 'bla')
                ->type('house_number', '2a')
                ->type('postal_code', '1122ba')
                ->type('amount_of_volunteers_needed', '16')
                ->type('description', 'description')
                ->press('submit')
                ->assertSee("Begin tijd kan niet al geweest zijn");
        });
    }
}
