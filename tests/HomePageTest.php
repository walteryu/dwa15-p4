<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    public function testExample()
    {
        $this->visit('/login')
           ->see('Welcome to StormSafe!')
           ->dontSee('All Projects');

        try
        {
            $this->visit('/login')
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')
                ->see('All Projects')
                ->onPage('projects');
        }
        catch(Exception $e)
        {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
