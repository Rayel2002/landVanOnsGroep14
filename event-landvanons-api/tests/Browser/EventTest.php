<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Carbon;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EventTest extends DuskTestCase
{
    use DatabaseMigrations;

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
                    ->type('begin_time', '2019')
                    ->type('end_time', '13')
                    ->type('end_time', '09')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '19:30')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '30')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '2020')
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
                    ->type('begin_time', '2019')

                    ->type('end_time', '13')
                    ->type('end_time', '09')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '19:30')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '13')
                    ->keys('#end_time', ['{tab}'])
                    ->type('end_time', '2020')

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
            'begin_time' => '2019-09-13T19:30',
            'end_time' => '2020-09-13T19:30',
            'street_name' => 'bla',
            'house_number' => '2a',
            'postal_code' => '1122ba',
            'amount_of_volunteers_needed' => '16',
            'description' => 'description'
        ]);
    }
}
