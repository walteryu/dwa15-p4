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
        }
        catch(Exception $e)
        {
            echo 'Message: '.$e->getMessage();
        }
    }

}

