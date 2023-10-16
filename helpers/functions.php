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

function not_allowed()
{
    if (!isset($_SESSION['auth'])) {
        $_SESSION['message'] = "Vous ñ'êtes pas autoriser";
        $_SESSION['color'] = "danger";
        header('Location:login.php');
        exit;
    }
}

function logged()
{
    if (isset($_SESSION['auth'])) {
        $_SESSION['message'] = "Vous êtes déja connecté";
        $_SESSION['color'] = "info";
        header('Location:dashboard.php');
        exit;
    }
}

function input($value, $class_input, $class_message, $error)
{
    return <<<HTML
        <div class="mb-3">
            <input type="text" class="form-control {$class_input}" name="nom" id="nom" placeholder="Nom:" value="{$value}">
                <span class="text-danger {$class_message}">
                    {$error}
                </span>
         </div>
HTML;
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


function _get_page_name()
{
    $page = $_SERVER['SCRIPT_NAME'];
    $url_data = explode('/', $page);
    $page_name = end($url_data);
    return explode('.', $page_name)[0];
}
