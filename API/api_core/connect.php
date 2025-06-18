<?php

$host = "localhost";
$base = "bancoteste";
$name = "root";
$password = "";

$mysqlConnect = new mysqli($host, $name, $password, $base);
if ($mysqlConnect->connect_errno) {
    echo "Falha ao conectar: (" . $mysqlConnect->connect_errno . ")" . $mysqlConnect->connect_error;
}