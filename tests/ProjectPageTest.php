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

                # Test dashboard
                ->see('All Projects')
                ->see('Create Project')
                ->see('Search Projects')
                ->dontSee('Welcome to StormSafe!')

                # Test create project page
                # ->click('Create Project')
                # ->dontSee('All Projects')

                # Test project/index page
                ->visit('/projects')
                ->See('All Projects')
                ->see('Create project')
                ->see('Search projects')
                ->dontSee('Welcome to StormSafe!')

                # Test create project
                ->visit('/project/create')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->type('1 Airport Dr', 'address')
                ->type('Oakland', 'city')
                ->type('CA', 'state')
                ->type(94621, 'zipcode')
                ->press('Create Project')
                ->see('Project created successfully!')

                # Test show project page
                ->visit('/project/show/1')
                ->see('Show Project')

                # Test edit project page
                ->visit('/project/edit/1')
                ->see('Edit Project')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->type('1 Airport Dr', 'address')
                ->type('Oakland', 'city')
                ->type('CA', 'state')
                ->type(94621, 'zipcode')
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
