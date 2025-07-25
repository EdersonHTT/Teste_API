<?php
include __DIR__ . "/API/public/Person/Person.php";

use request\Person;

$request = new Person();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="icon" href="IMG\controller.svg">
</head>

<body id="container" class="bg-light">
    <header class="border-bottom border-5 w-100">
        <img class="ml-3" src="IMG\controller.svg" alt="Controle">
        <h1>Control</h1>
        <div id="open" class="menu" onclick="menu(this)">
            <img class="mr-3" src="IMG\list.svg" alt="Controle">
        </div>
    </header>
    <div id="control" class="d-flex h-100">
        <div id="table" class="forTable border-start border-5 div-com-scroll" style="overflow-y: scroll;">
            <table class="table table-border table-bordered border-4 table-striped table-hover fs-4 table-responsive">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Sexo</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>Nacionalidade</th>
                </thead>

                <tbody class="table-group-divider text-truncate">
                    <?php
                    $list = $request->get();

                    while ($res = $list->fetch_object()) {
                        echo "<tr style='cursor: pointer;' onclick='getId($res->id)'>";
                        echo "<td class='id$res->id text-truncate'>" . $res->id . "</td>";
                        echo "<td class='id$res->id text-truncate'>" . $res->nome . "</td>";

                        $data = substr($res->nascimento, 0, 4);
                        $data = ((int) date('Y')) - ((int) $data);

                        echo "<td id='$res->nascimento' class='id$res->id text-truncate'>" . $data . "</td>";

                        if ($res->sexo == "M") {
                            echo "<td class='id$res->id text-truncate'>Masculino</td>";
                        } else {
                            echo "<td class='id$res->id text-truncate'>Feminino</td>";
                        }

                        echo "<td class='id$res->id text-truncate'>" . $res->peso . "kg</td>";
                        echo "<td class='id$res->id text-truncate'>" . $res->altura . "m</td>";
                        echo "<td class='id$res->id text-truncate'>" . $res->nacionalidade . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
        <div id="centralPanel" class="panel justify-content-evenly align-items-center border-start border-end border-5">
            <div class="image-container mt-6">
                <img src="./IMG/plus-circle.svg" class="requirement p-3 m-0" alt="Criar" onclick="plus()">
            </div>
            <div class="image-container">
                <img src="./IMG/pencil-square.svg" id="modifyDisable" class="modify p-3 m-0" alt="Atualizar" onclick="modify(this.id)">
            </div>
            <div class="image-container mb-6">
                <img src="./IMG/trash.svg" id="trashDisable" class="trash p-3 m-0" alt="Excluir" onclick="trash()">
            </div>
        </div>
        <div id="addPanel" class="panel justify-content-evenly align-items-center border-start border-end border-5">

            <button onclick="back()" class="btn align-self-start mt-4 btn-secondary mb-2" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><img src="./IMG/arrow-left.svg" alt="voltar" class="arrow"></button>

            <form action="action.php?action=POST" method="post" class="d-flex flex-column justify-content-center p-5 pt-3 fs-4">
                <div class="d-flex align-items-center justify-content-evenly">
                    <div class="border border-3 border-dark rounded-start w-25 h-0 mb-0 me-4"></div>
                    <h2 class="text-nowrap">Adicionar Pessoa</h2>
                    <div class="border border-3 border-dark rounded-end w-25 h-0 mb-0 ms-4"></div>
                </div>

                <div class="labelAdd form-floating" id="labelAdd">
                    <input type="text" name="name" class="form-control h-100 fs-5" id="floatingInput" placeholder="Name" maxlength="30" require>
                    <label for="name">Nome</label>
                </div>

                <div class="labelAdd form-floating">
                    <input type="date" name="birth" class="form-control h-100 fs-5" id="floatingInput" placeholder="dd/MM/yyyy" require>
                    <label for="birth">Data de Nascimento</label>
                </div>

                <div class="d-flex flex-column justify-content-evenly">
                    <div class="d-flex align-items-center mb-0 ms-4">
                        <input class="form-check-input me-1" type="radio" name="genre" value="F" require>
                        <label class="form-check-label" for="female">Feminino</label>
                    </div>
                    <div class="d-flex align-items-center mb-0 ms-4">
                        <input class="form-check-input me-1" type="radio" name="genre" value="M" require>
                        <label class="form-check-label" for="male">Masculino</label>
                    </div>
                </div>

                <div class="d-flex justify-content-evenly">
                    <div class="labelAdd form-floating w-100 me-3 mb-0">
                        <input type="number" step="0.01" name="height" class="form-control h-100 fs-5" placeholder="0.00" maxlength="3" require>
                        <label for="height" class="form-label">Altura</label>
                    </div>
                    <div class="labelAdd form-floating w-100 ms-3 mb-0">
                        <input type="number" step="0.01" name="weight" class="form-control h-100 fs-5" placeholder="000.00" maxlength="5" require>
                        <label for="weight" class="form-label">Peso</label>
                    </div>
                </div>

                <div class="labelAdd form-floating" id="labelAdd">
                    <input type="text" name="nationality" class="form-control h-100 fs-5" id="floatingInput" placeholder="nationality" require>
                    <label for="nationality">Nacionalidade</label>
                </div>

                <input type="submit" class="btn btn-secondary align-self-center fs-3 pt-2 pb-2 button" value="Criar">
            </form>
        </div>
        <div id="modifyPanel" class="panel align-items-center border-start border-end border-5">

            <button onclick="back()" class="btn align-self-start btn-secondary mb-2 mt-4" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><img src="./IMG/arrow-left.svg" alt="voltar" class="arrow"></button>

            <form action="action.php?action=PUT" id="makePut" method="post" class="d-flex flex-column p-5 pt-3 fs-4">

            </form>
        </div>

    </div>
    <footer class="border-top border-5"></footer>
    <script src="./script.js"></script>
</body>

</html>
