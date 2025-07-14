<?php

include __DIR__ . "/public/Person/Person.php";

use request\Person;

header("Content-Type: application/json");

$request = new Person();
$req = file_get_contents("php://input");
$data = json_decode($req);
echo @$_REQUEST["action"];

switch (@$_REQUEST["action"]) {
    case "POST":
        $name = $_POST["name"];
        $genre = $_POST["genre"];
        $birth = $_POST["birth"];
        $height = (float) $_POST["height"];
        $weight = (float) $_POST["weight"];
        $nationality = $_POST["nationality"];

        echo $request->create($name, $genre, $birth, $height, $weight, $nationality);

        break;
    case "PUT":
        $id = (int) $_POST["id"];
        $name = $_POST["name"];
        $genre = $_POST["genre"];
        $birth = $_POST["birth"];
        $height = (float) $_POST["height"];
        $weight = (float) $_POST["weight"];
        $nationality = $_POST["nationality"];

        echo $request->update($id, $name, $genre, $birth, $height, $weight, $nationality);

        break;
    case "DELETE":
        $id = (int) $data->id;

        echo $request->delete($id);
        break;
}

header("Location: index.php");
