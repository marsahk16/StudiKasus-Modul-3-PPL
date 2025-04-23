<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testNotesPageAfterLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Log in')
                    ->assertSee('Email')
                    ->assertSee('Password')
                    ->type('email',  'marsahaekal@gmail.com')
                    ->type('password', 'marsaadmin')
                    ->press('LOG IN')

                    ->assertPathIs('/dashboard')
                    ->pause(1000) 
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->pause(500) 
                    ->clickLink('Create Note')
                    ->assertSee('Title')
                    ->assertSee('Description')
                    ->type('title', 'Praktikum')
                    ->type('description', 'kerennn')
                    ->press('CREATE') 
                    ->pause(1000) 
                    ->assertSee('Praktikum'); 
        });
    }
}