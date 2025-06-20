<?php

$host = "localhost";
$base = "bancoteste";
$user = "root";
$password = "";

$mysqlConnect = new mysqli($host, $user, $password, $base);
if ($mysqlConnect->connect_errno) {
    echo "Falha ao conectar: (" . $mysqlConnect->connect_errno . ")" . $mysqlConnect->connect_error;
}