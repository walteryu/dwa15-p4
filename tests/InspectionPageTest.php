<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InspectionPageTest extends TestCase
{
    public function testInspectionPage()
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
                ->dontSee('Welcome to StormSafe!')

                # Test create inspection page
                # ->click('Create Inspection')
                # ->see('Create Inspection')
                # ->dontSee('All Inspections')

                # Test create inspection
                ->visit('/inspection/create')
                ->select(1, 'project_id')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->press('Create Inspection')
                ->see('Inspection created successfully!')

                # Test show inspection page
                ->visit('/inspection/show/1')
                ->see('Show Inspection')

                # Test edit inspection page
                ->visit('/inspection/edit/1')
                ->see('Edit Inspection')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->press('Save Changes')
                ->see('inspection updated successfully!')

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
}
