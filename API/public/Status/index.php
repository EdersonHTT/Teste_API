<?php

require_once __DIR__ . "../../../api_core/config.php";
require_once __DIR__ . "../../../api_core/response.php";
header("Content-Type: application/json");

echo Response::json();