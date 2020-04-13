<?php


namespace App\Tutorials;


class TweetsTutorial
{
    private $tutorial;

    public function __construct($tutorial)
    {
        $this->tutorial = $tutorial;
    }

    public function publish()
    {
        $tutorial = $this->tutorial->publish();

        var_dump('tweet the tutorial');
    }
}
