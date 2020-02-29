<?php


class PagesController
{
    public function home()
    {
        $events = App::get('database')->all('events');

        return view('index', [
            'events' => $events
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function aboutCulture()
    {

        return view('about-culture');
    }

    public function addName()
    {
        App::get('database')->insert('events', [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'start' => date('Y-m-d 00:00:00'),
            'end' => date('Y-m-d 00:00:00'),
            'is_private' => 0
        ]);

        header('Location: /');
    }
}