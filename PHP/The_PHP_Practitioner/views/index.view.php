<?php require 'partials/head.php' ?>

    <header>Home Page</header>

    <ul>
        <?php foreach ($events as $key => $event) : ?>
            <li>
                <strong><?= ucwords($event->title); ?>:</strong> <?= $event->description; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h1>Submit Your Name</h1>

    <form action="/names" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>

<?php require 'partials/foot.php' ?>