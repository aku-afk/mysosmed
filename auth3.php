<?php
$lk = $_SESSION['user']['username'];
session_start();
if(!isset($_SESSION["user"])) header("Location: ./");