<?php

$events = App::get('database')->all('events', Event::class);

require('views/index.view.php');