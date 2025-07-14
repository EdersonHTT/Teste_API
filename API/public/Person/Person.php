<?php
namespace request;

class Person {

    public function create(string $name, string $sex, string $birth, float $height, float $weight, string $nationality = null){
        require_once __DIR__ . "../../../api_core/connect.php";

        $response;

        if ($nationality) {
            $response = $mysqlConnect->query("INSERT pessoa(nome, sexo, nascimento, altura, peso, nacionalidade) VALUES ('$name', '$sex', '$birth', $height, $weight, '$nationality')");
        } else {
            $response = $mysqlConnect->query("INSERT pessoa(nome, sexo, nascimento, altura, peso) VALUES ('$name', '$sex', '$birth', $height, $weight)");
        }

        if (!$response) {
            return "Error";
        }

        return "Success";
    }

    public function get(){
        require_once __DIR__ . "../../../api_core/connect.php";

        $response = $mysqlConnect->query("SELECT * FROM pessoa");

        return $response;
    }

    public function update(int $id, string $name, string $genre, string $birth, float $height, float $weight, string $nationality = null){
        require_once __DIR__ . "../../../api_core/connect.php";

        $response;

        if ($nationality) {
            $response = $mysqlConnect->query("UPDATE pessoa SET nome = '$name', sexo = '$genre', nascimento = '$birth', altura = $height, peso = $weight, nacionalidade = '$nationality' WHERE id = $id");

        } else {
            $response = $mysqlConnect->query("UPDATE pessoa SET nome = '$name', sexo = '$genre', nascimento = '$birth', altura = $height, peso = $weight WHERE id = $id");

        }

        if (!$response) {
            return "Error";
        }

        return "Success";
    }

    public function delete(int $id){
        require_once __DIR__ . "../../../api_core/connect.php";

        $response = $mysqlConnect->query("DELETE FROM pessoa WHERE id = $id");

        if (!$response) {
            return "Error";
        }

        return "Success";
    }
}
