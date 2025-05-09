<?php
session_start();
require_once('Controllers/Page.php');

$url = $_GET['url'];
$title = strtoupper($url);
$page = new Page("$title", "$url");

function isLogin()
{
    $url = $_GET['url'];
    if (isset($_SESSION['user'])) {
        if ($url !== 'umkm') {
            header("Location: ?url=umkm");
            exit();
        }
    } else {
        if ($url !== 'login' && $url !== "register") {
            header("Location: ?url=login");
            exit();
        }
    }
}


if (!$url) {
    header("Location: ?url=landing");
} else if ($url == 'landing') {
    isLogin();
    $page->callLanding();
} else if ($url == 'login') {
    isLogin();
    $page->callLogin();
} else if ($url == 'register') {
    isLogin();
    $page->callRegister();
} else {
    isLogin();
    $page->callAdmin();
}
