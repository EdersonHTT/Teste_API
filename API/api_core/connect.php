<?php

$host = "bmavyltiljme8pvlxehm-mysql.services.clever-cloud.com";
$base = "bmavyltiljme8pvlxehm";
$user = "u9odj4jnnwe8t0w0";
$password = "CiYOnlnLB4Hs4H2GhXpU";

$mysqlConnect = new mysqli($host, $user, $password, $base);
if ($mysqlConnect->connect_errno) {
    echo "Falha ao conectar: (" . $mysqlConnect->connect_errno . ")" . $mysqlConnect->connect_error;
}