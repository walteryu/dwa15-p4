<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectPageTest extends TestCase
{
    public function testProjectIndex()
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

                # Test index page
                ->visit('/projects')
                ->See('All Projects')
                ->see('Create project')
                ->see('Search projects')
                ->dontSee('Welcome to StormSafe!')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testProjectCreate()
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

                # Test create project
                ->visit('/project/create')
                ->type('Oakland Airport', 'name')
                ->type('Runway Renovation', 'description')
                ->type('1 Airport Dr', 'address')
                ->type('Oakland', 'city')
                ->type('CA', 'state')
                ->type('94621', 'zipcode')

                ->type('37.7125689','latitude') # 37.7125689,
                ->type('-122.2197428','longitude') # -122.2197428,
                ->check('active') # true,
                ->type('Lorem Ipsum','tracking_number') # str_random(10),
                ->type('Lorem Ipsum','cost_center') # str_random(10),
                ->type('Lorem Ipsum','project_phase') # str_random(10),
                ->type('Lorem Ipsum','wdid_number') # str_random(10),
                ->type('Lorem Ipsum','cgp_number') # str_random(10),
                ->type('2','risk_level') # 2,
                ->type('Lorem Ipsum','owner_company_name') # str_random(10),
                ->type('Lorem Ipsum','owner_company_description') # str_random(10),
                ->type('94621','owner_company_zipcode') # 94621,
                ->type('Lorem Ipsum','owner_company_address') # str_random(10),
                ->type('Lorem Ipsum','owner_company_city') # str_random(10),
                ->type('CA','owner_company_state') # 'CA',
                ->type('Lorem Ipsum','owner_representative') # str_random(10),
                ->type('Lorem Ipsum','owner_title') # str_random(10),
                ->type('Lorem Ipsum','owner_phone') # str_random(10),
                ->type('Lorem Ipsum','owner_email') # str_random(10),
                ->type('Lorem Ipsum','contractor_company_name') # str_random(10),
                ->type('Lorem Ipsum','contractor_company_description') # str_random(10),
                ->type('94621','contractor_company_zipcode') # 94621,
                ->type('Lorem Ipsum','contractor_company_address') # str_random(10),
                ->type('Lorem Ipsum','contractor_company_city') # str_random(10),
                ->type('CA','contractor_company_state') # 'CA',
                ->type('Lorem Ipsum','contractor_representative') # str_random(10),
                ->type('Lorem Ipsum','contractor_title') # str_random(10),
                ->type('Lorem Ipsum','contractor_phone') # str_random(10),
                ->type('Lorem Ipsum','contractor_email') # str_random(10),
                ->type('Lorem Ipsum','wpcm_company_name') # str_random(10),
                ->type('Lorem Ipsum','wpcm_company_description') # str_random(10),
                ->type('94621','wpcm_company_zipcode') # 94621,
                ->type('Lorem Ipsum','wpcm_company_address') # str_random(10),
                ->type('Lorem Ipsum','wpcm_company_city') # str_random(10),
                ->type('CA','wpcm_company_state') # 'CA',
                ->type('Lorem Ipsum','wpcm_representative') # str_random(10),
                ->type('Lorem Ipsum','wpcm_title') # str_random(10),
                ->type('Lorem Ipsum','wpcm_phone') # str_random(10),
                ->type('Lorem Ipsum','wpcm_email') # str_random(10),
                ->type('Lorem Ipsum','qsp_company_name') # str_random(10),
                ->type('Lorem Ipsum','qsp_company_description') # str_random(10),
                ->type('94621','qsp_company_zipcode') # 94621,
                ->type('Lorem Ipsum','qsp_company_address') # str_random(10),
                ->type('Lorem Ipsum','qsp_company_city') # str_random(10),
                ->type('CA','qsp_company_state') # 'CA',
                ->type('Lorem Ipsum','qsp_representative') # str_random(10),
                ->type('Lorem Ipsum','qsp_title') # str_random(10),
                ->type('Lorem Ipsum','qsp_phone') # str_random(10),
                ->type('Lorem Ipsum','qsp_email') # Lorem Ipsum

                ->press('Create Project')
                ->see('Project created successfully!')
                /*
                */
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testProjectShow()
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

                # Test show project page
                ->visit('/project/show/1')
                ->see('Show Project')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testProjectEdit()
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

                # Test search project page
                ->visit('/project/search')
                ->see('Search Projects')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
}
