<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectPageTest extends TestCase
{
    public function testProjectPage()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test project/index page
                ->see('All Projects')
                ->dontSee('Welcome to StormSafe!')

                # Test create project page
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

                # Test show project page
                ->visit('/project/show/1')
                ->see('Show Project')

                # Test edit project page
                ->visit('/project/edit/1')
                ->see('Edit Project')
                ->type('Fox Theater', 'name')
                ->type('Theater Improvement', 'description')
                ->type('1807 Telegraph Ave', 'address')
                ->type('Oakland', 'city')
                ->type('CA', 'state')
                ->type(94612, 'zipcode')
                ->press('Save Changes')
                ->see('Project updated successfully!')

                # Test confirm-delete project page
                ->visit('/project/confirm-delete/1')
                ->see('Delete Project?')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
}
