<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    public function testLoginPage()
    {
        try
        {
            # Test auth/login view
            $this->visit('/login')
                ->see('Welcome to StormSafe!')
                ->dontSee('All Projects')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
}
