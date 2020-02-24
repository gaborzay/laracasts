<?php require 'partials/head.php' ?>

    <header>Home Page</header>

    <ul>
        <?php foreach ($events as $key => $event) : ?>
            <li>
                <strong><?= ucwords($event->title); ?>:</strong> <?= $event->description; ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require 'partials/foot.php' ?>