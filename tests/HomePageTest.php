<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
{
    public function testProjectPage()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login view
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test project/index view
                ->see('All Projects')
                ->dontSee('Welcome to StormSafe!')

                # Test create project view
                ->click('Create Project')
                ->see('Create Project')
                ->dontSee('All Projects')

                # Test create project
                ->type(str_random(10), 'name')
                ->type(str_random(10), 'description')
                ->type(str_random(10), 'address')
                ->type(str_random(10), 'city')
                ->type(str_random(2), 'state')
                ->type(94612, 'zipcode')
                ->press('Create Project')
                ->see('Project created successfully!')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
}
