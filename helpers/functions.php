<?php

date_default_timezone_set('Africa/Casablanca');

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


function _get_plateform($value)
{
    switch ($value) {
        case 'Windows':
            return  "<i class='bi bi-windows me-1 text-info'></i>";
            break;

        case 'Android':
            return  "<i class='bi bi-android2 me-1 text-success'></i>";
            break;

        case 'Mac Os':
            return  "<i class='bi bi-apple me-1 text-dark'></i>";
            break;

        case 'Linux':
            return  "<i class='bi bi-ubuntu me-1 text-warning'></i>";
            break;

        default:
            return "";
            break;
    }
}

function _date_format($date)
{
    return date("d/m/Y", strtotime($date));
}

function _datetime_format($date)
{
    return date("d/m/Y H:i:s", strtotime($date));
}
