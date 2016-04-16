<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class ProjectTest extends TestCase
{
    public function test_posted_at()
    {
        // Instantiate, fill with values, save and return
        $project = FactoryMuff::create('Project');

        // Regular expression that represents d/m/Y pattern
        $expected = '/\d{2}\/\d{2}\/\d{4}/';

        // True if preg_match finds the pattern
        $matches = ( preg_match($expected, $post->postedAt()) ) ? true : false;
        $this->assertTrue( $matches );
    }
}
