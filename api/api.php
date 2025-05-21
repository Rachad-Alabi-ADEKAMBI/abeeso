<?php
include 'functions.php';

$action = $_GET['action'] ?? '';


if ($action == 'login') {
    login();
}

if ($action == 'getOrders') {
    getOrders();
}

if ($action == 'serveOrder') {
    serveOrder();
}

if ($action == 'register') {
    register();
}

if ($action == 'logout') {
    logout();
}
