<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoremIpsumTest extends TestCase
{
    public function testExample()
    {
        $this->visit('/lorem-ipsum/create')
             ->type('1', 'count')
             ->press('Create Random Text')
             ->seePageIs('/lorem-ipsum/create');

        $this->visit('/lorem-ipsum/create')
             ->type('10', 'count')
             ->press('Create Random Text')
             ->see('The count must be 1 digits')
             ->see('No Random Text Generated Yet')
             ->seePageIs('/lorem-ipsum/create');
    }
}
