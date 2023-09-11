<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function dd($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit;
}

function e($value)
{
    return htmlspecialchars(trim($value));
}

define("IP", $_SERVER['SERVER_ADDR']);
