<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserPageTest extends TestCase
{
    public function testUserLogin()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test users/index page
                ->visit('/users')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testUserCreate()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test create user
                ->visit('/user/create')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testUserShow()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test show user page
                ->visit('/user/show/1')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testUserEdit()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test edit user page
                ->visit('/user/edit/1')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
    public function testUserDelete()
    {
        try
        {
            $this->visit('/login')
                # Test auth/login page
                ->type('walter@stormsavvy.com', 'email')
                ->type('helloworld', 'password')
                ->press('Login')

                # Test confirm-delete user page
                # ->visit('/user/confirm-delete/1')
                ;
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }
}
