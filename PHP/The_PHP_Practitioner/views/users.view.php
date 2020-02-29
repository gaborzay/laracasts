<?php require 'partials/head.php' ?>

    <header>Users</header>

    <ul>
        <?php foreach ($users as $key => $user) : ?>
            <li>
                <?= $user->name?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require 'partials/foot.php' ?>