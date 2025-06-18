<?php

require_once __DIR__ . "../../../api_core/config.php";
require_once __DIR__ . "../../../api_core/connect.php";

switch($_SERVER["REQUEST_METHOD"]){
    case "POST":
        $req = file_get_contents("php://input");
        $data = json_decode($req);

        $name = $data->name;
        $sex = $data->sex;
        $birth = $data->birth;
        $height = $data->height;
        $weight = $data->weight;
        $nationality = $data->nationality;

        $response = $mysqlConnect -> query("INSERT pessoa(nome, sexo, nascimento, altura, peso, nacionalidade) VALUES ('$name', '$sex', '$birth', $height, $weight, '$nationality')");

        if ($response){
            echo "Success";
        } else {
            echo "Error";
        }
        break;
    case "GET":
        $response = $mysqlConnect -> query("SELECT * FROM pessoa");
        header("Content-Type: application/json");

        while($res = $response->fetch_assoc()){
            echo json_encode($res);

        }
        break;
    case "PUT":
        $req = file_get_contents("php://input");
        $data = json_decode($req);

        $id = $data->id;
        $name = $data->name;
        $sex = $data->sex;
        $birth = $data->birth;
        $height = $data->height;
        $weight = $data->weight;
        $nationality = $data->nationality;

        $response = $mysqlConnect -> query("UPDATE pessoa SET nome = '$name', sexo = '$sex', nascimento = '$birth', altura = $height, peso = $weight, nacionalidade = '$nationality' WHERE id = $id");

        if ($response){
            echo "Success";
        } else {
            echo "Error";
        }
        break;
        break;
    case "DELETE":
        $req = file_get_contents("php://input");
        $data = json_decode($req);

        $id = $data->id;

        $response = $mysqlConnect -> query("DELETE FROM pessoa WHERE id = $id");

        if ($response){
            echo "Success";
        } else {
            echo "Error";
        }
        break;
}