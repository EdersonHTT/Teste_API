<?php

include __DIR__ . "/API/public/Crud/Crud.php";
use request\Crud;

header("Content-Type: application/json");

$request = new Crud();
$req = file_get_contents("php://input");
$data = json_decode($req);

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        $name = $data->name;
        $sex = $data->sex;
        $birth = $data->birth;
        $height = (float) $data->height;
        $weight = (float) $data->weight;
        if(property_exists($data, "nationality")){
            $nationality = $data->nationality;

            echo $request -> create($name, $sex, $birth, $height, $weight, $nationality);
        } else {
            echo $request -> create($name, $sex, $birth, $height, $weight);
        }
        break;
    case "GET":
        echo $request -> get();

        break;
    case "PUT":
        $id = (int) $data->id;
        $name = $data->name;
        $sex = $data->sex;
        $birth = $data->birth;
        $height = (float) $data->height;
        $weight = (float) $data->weight;
        if(property_exists($data, "nationality")){
            $nationality = $data->nationality;

            echo $request -> update($id, $name, $sex, $birth, $height, $weight, $nationality);
        } else {
            echo $request -> update($id, $name, $sex, $birth, $height, $weight);
        }
        break;
    case "DELETE":
        $id = (int) $data->id;

        echo $request -> delete($id);
        break;
}