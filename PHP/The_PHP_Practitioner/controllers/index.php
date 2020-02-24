<?php

require('models/Event.php');

$events = $app['database']->all('events', Event::class);

require('views/index.view.php');