<?php

include __DIR__ . "/API/public/Crud/Crud.php";
use request\Crud;

header("Content-Type: application/json");

$request = new Crud();
$req = file_get_contents("php://input");
$data = json_decode($req);
echo $_SERVER["REQUEST_METHOD"];
switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        $name = $_POST["name"];
        $genre = $_POST["genre"];
        $birth = $_POST["birth"];
        $height = (float) $_POST["height"];
        $weight = (float) $_POST["weight"];
        // if(property_exists($_POST, "nationality")){
        //     $nationality = $_POST["nationality"];

        //     echo $request -> create($name, $genre, $birth, $height, $weight, $nationality);
        // } else {
            echo $request -> create($name, $genre, $birth, $height, $weight);
        // }
        header("Location: index.php");
        break;
    case "PUT":
        $id = (int) $data->id;
        $name = $data->name;
        $genre = $data->genre;
        $birth = $data->birth;
        $height = (float) $data->height;
        $weight = (float) $data->weight;
        if(property_exists($data, "nationality")){
            $nationality = $data->nationality;

            echo $request -> update($id, $name, $genre, $birth, $height, $weight, $nationality);
        } else {
            echo $request -> update($id, $name, $genre, $birth, $height, $weight);
        }
        break;
    case "DELETE":
        $id = (int) $data->id;

        echo $request -> delete($id);
        break;
}

