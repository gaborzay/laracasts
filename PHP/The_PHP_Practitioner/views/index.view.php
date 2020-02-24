<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>
        header {
            background-color: grey;
            font-size: 2em;
            text-align: center;
            padding: 2em;
        }
    </style>
</head>
<body>
<header>Hello World!</header>

<ul>
    <?php foreach ($events as $key => $event) : ?>
        <li>
            <strong><?= ucwords($event->title); ?>:</strong> <?= $event->description; ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>