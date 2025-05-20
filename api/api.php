<?php
include 'functions.php';
$action = $_GET['action'] ?? '';


if ($action == 'login') {
    login();
}
