<?php

namespace App\Http\Controllers;

use App\Tutorials\PublishesTutorial;
use App\Tutorials\TweetsTutorial;
use Illuminate\Http\Request;

class TutorialsController extends Controller
{
    public function store()
    {
        $tutorial = new TweetsTutorial(
            new PublishesTutorial()
        );

        return $tutorial->publish();
    }
}
