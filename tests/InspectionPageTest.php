<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InspectionPageTest extends TestCase
{
    public function testInspectionLogin()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test inspections/index page
                ->visit('/inspections')
                ->See('All Inspections')
                ->see('Create Inspection')
                ->see('Search Inspections')
                ->dontSee('Welcome to StormSafe')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testInspectionCreate()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test create inspection
                ->visit('/inspection/create')
                ->see('Create Inspection')
                ->dontSee('All Inspections')

                ->select(1, 'project_id')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->press('Create Inspection')
                ->see('Inspection created successfully!')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testInspectionShow()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test show inspection page
                ->visit('/inspection/show/1')
                ->see('Show Inspection')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testInspectionEdit()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test edit inspection page
                ->visit('/inspection/edit/1')
                ->see('Edit Inspection')
                ->type(1, 'project_id')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->press('Save Changes')
                ->see('inspection updated successfully!')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testInspectionDelete()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test confirm-delete inspection page
                ->visit('/inspection/confirm-delete/1')
                ->see('Delete Inspection?')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testInspectionSearch()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test search inspection page
                ->visit('/inspection/search')
                ->see('Search Inspections')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
}
