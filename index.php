<?php
require_once('Controllers/Page.php');

$url = $_GET['url'];
$title = strtoupper($url);
$page = new Page("$title", "$url");

if (!$url) {
    header("Location: ?url=landing");
} else if ($url == 'landing') {
    $page->callLanding();
} else if ($url == 'login') {
    $page->callLogin();
} else if ($url == 'register') {
    $page->callRegister();
} else {
    $page->callAdmin();
}
