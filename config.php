<?php

$server = "localhost";
$username = "root";
$pass = "";
$db_name = "db_cozy";

$db = new mysqli($server, $username, $pass, $db_name);

if(!$db){
    die("Gagal Terhubung");
}