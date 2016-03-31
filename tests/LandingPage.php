<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LandingPage extends TestCase
{
    public function testVisitHome()
    {
        $this->visit('/')
             ->see('Developer\'s Best Friend Application');
    }
}
