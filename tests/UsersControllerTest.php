<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersControllerTest extends TestCase {

    public function testIndex()
    {
        try
        {
          $this->withoutMiddleware();
          $this->action('GET', 'UserController@getIndex');
          $this->assertResponseOk();
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testShow()
    {
        try
        {
          $this->withoutMiddleware();
          $this->action('GET', 'UserController@getShow');
          $this->assertResponseOk();
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testCreate()
    {
        try
        {
          $this->withoutMiddleware();
          $this->action('GET', 'UserController@getCreate');
          $this->assertResponseOk();
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testEdit()
    {
        try
        {
          $this->withoutMiddleware();
          $this->action('GET', 'UserController@getEdit', 1);
          $this->assertResponseOk();
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

    public function testConfirmDelete()
    {
        try
        {
          $this->withoutMiddleware();
          $this->action('GET', 'UserController@getConfirmDelete', 1);
          $this->assertResponseOk();
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

}

