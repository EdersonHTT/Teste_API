<?php
include __DIR__ . "/API/public/Crud/Crud.php";

use request\Crud;

$request = new Crud();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="icon" href="IMG\controller.svg">
</head>

<body class="bg-light">
    <header class="border-bottom border-5">
        <img class="ml-3" src="IMG\controller.svg" alt="Controle">
        <h1>Controle</h1>
    </header>
    <div id="control" class="d-flex h-100">
        <table class="table table-border table-bordered border-4 table-striped table-hover fs-4 border-start border-5">
            <th class="">#</th>
            <th class="">Nome</th>
            <th class="">Idade</th>
            <th class="">Sexo</th>
            <th class="">Peso</th>
            <th class="">Altura</th>
            <th class="">Nacionalidade</th>
            <tbody class="table-group-divider">
                <?php
                $list = $request->get();

                while ($res = $list->fetch_object()) {
                    echo "<tr style='cursor: pointer;' onclick='modify($res->id)'>";
                    echo "<td class='id$res->id'>" . $res->id . "</td>";
                    echo "<td class='id$res->id'>" . $res->nome . "</td>";

                    $data = substr($res->nascimento, 0, 4);
                    $data = ((int) date('Y')) - ((int) $data);

                    echo "<td class='id$res->id'>" . $data . "</td>";

                    if ($res->sexo == "M") {
                        echo "<td class='id$res->id'>Masculino</td>";
                    } else {
                        echo "<td class='id$res->id'>Feminino</td>";
                    }

                    echo "<td class='id$res->id'>" . $res->peso . "kg</td>";
                    echo "<td class='id$res->id'>" . $res->altura . "m</td>";
                    echo "<td class='id$res->id'>" . $res->nacionalidade . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div id="centralPanel" class="panel justify-content-evenly align-items-center border-start border-end border-5">
            <div class="image-container mt-6">
                <img src="./IMG/plus-circle.svg" class="p-3 m-0" alt="Criar" onclick="plus()">
            </div>
            <div class="image-container">
                <img src="./IMG/pencil-square.svg" class="p-3 m-0" alt="Atualizar">
            </div>
            <div class="image-container mb-6">
                <img src="./IMG/trash.svg" id="trash" class="p-3 m-0" alt="Excluir">
            </div>
        </div>
        <div id="addPanel" class="panel justify-content-evenly align-items-center border-start border-end border-5">
            
            <button onclick="back()" class="btn align-self-start mt-4 btn-primary mb-3" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><img src="./IMG/arrow-left.svg" alt="voltar"></button>
            
            <form action="action.php" method="post" class="d-flex flex-column p-5 fs-4">
                <div class="d-flex align-items-center justify-content-evenly mb-4">
                    <div class="border border-3 border-dark rounded-start w-25 h-0"></div><h2 class="text-nowrap">Adicionar Pessoa</h2><div class="border border-3 border-dark rounded-end w-25 h-0"></div>
                </div>

                <div class="labelAdd form-floating mb-5 me-5 ms-5" id="labelAdd" style="height: 80px">
                    <input type="text" name="name" class="form-control h-100 fs-5" id="floatingInput" placeholder="Name" require>
                    <label for="name">Nome</label>
                </div>

                <div class="labelAdd form-floating mb-5 me-5 ms-5" style="height: 80px">
                    <input type="date" name="birth" class="form-control h-100 fs-5"  id="floatingInput" placeholder="dd/MM/yyyy" require>
                    <label for="birth">Data de Nascimento</label>
                </div>

                <div class="d-flex flex-column mb-5 ms-5 justify-content-evenly me-5 ms-5">
                    <div class="d-flex align-items-center mb-3">
                        <input class="form-check-input me-1" type="radio" name="genre" value="F" require>
                        <label class="form-check-label" for="female">Feminino</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="form-check-input me-1" type="radio" name="genre" value="M" require>
                        <label class="form-check-label" for="male">Masculino</label>
                    </div>
                </div>

                <div class="d-flex justify-content-evenly me-5 ms-5">
                    <div class="labelAdd form-floating mb-5 w-100 me-3" style="height: 80px">
                        <input type="number" step="0.01" name="height" class="form-control h-100 fs-5" placeholder="0.00" require> 
                        <label for="height" class="form-label">Altura</label>
                    </div>
                    <div class="labelAdd form-floating mb-5 w-100 ms-3" style="height: 80px">
                        <input type="number" step="0.01" name="weight" class="form-control h-100 fs-5" placeholder="000.00" require>
                        <label for="weight" class="form-label">Peso</label>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary align-self-center fs-3 w-75 pt-2 pb-2" value="Criar">
            </form>
        </div>
    </div>
    <footer class="border-top border-5"></footer>
    <script src="script.js"></script>
</body>

</html>

<!-- <?php

// if ($_POST["id"]) {
//     $id = $_REQUEST["id"];
//     echo $id;
// } -->