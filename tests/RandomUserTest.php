<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RandomUserTest extends TestCase
{
    public function testExample()
    {
        $this->visit('/random-user/create')
             ->type('1', 'count')
             ->check('add_email')
             ->check('add_address')
             ->press('Create Random Users')
             ->seePageIs('/random-user/create');

        $this->visit('/random-user/create')
             ->type('10', 'count')
             ->check('add_email')
             ->check('add_address')
             ->press('Create Random Users')
             ->see('The count must be 1 digits')
             ->seePageIs('/random-user/create');
    }
}
