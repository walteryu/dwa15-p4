<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    public function testExample()
    {
        $this->visit('/')
             ->see('Lorem Ipsum & Random User Generator')
             ->see('Welcome! Pacific Standard Time (PST) is now:')
             ->see('Generate Random Text Here')
             ->see('Generate Random Users Here')
             ->dontSee('Laravel 5');

        $this->visit('/')
             ->click('Generate Random Text Here')
             ->seePageIs('/lorem-ipsum/create');

        $this->visit('/')
             ->click('Generate Random Users Here')
             ->seePageIs('/random-user/create');

        $this->visit('/')
             ->click('Subtle Patterns')
             ->seePageIs('http://subtlepatterns.com/');
    }
}
