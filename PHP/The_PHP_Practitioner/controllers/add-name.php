<?php

App::get('database')->insert('events', [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'start' => date('Y-m-d 00:00:00'),
    'end' => date('Y-m-d 00:00:00'),
    'is_private' => 0
]);

header('Location: /');