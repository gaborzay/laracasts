<?php

function dd(...$args)
{
    die(var_dump(...$args));
}

function view($name, $data = [])
{
    extract($data);

    return require "views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}