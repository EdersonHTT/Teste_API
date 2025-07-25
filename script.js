let idPrevious;

function getId(id) {

    let column = document.getElementsByClassName("id" + id);
    let columnPrevius = document.getElementsByClassName("id" + idPrevious);
    let optionModify = document.getElementsByClassName("modify");
    let optionTrash = document.getElementsByClassName("trash");
    let makePut = document.getElementById("makePut");
    let values = [];

    if (idPrevious === id) {
        for (let i = 0; i < columnPrevius.length; i++) {
            columnPrevius[i].className = "id" + idPrevious;
        }
        optionModify[0].id = "modifyDisable";
        optionModify[0].className = "modify p-3 m-0";
        optionTrash[0].id = "trashDisable";
        idPrevious = "";

        modifyPanel.style.display = "none";

        return;
    }

    for (let i = 0; i < columnPrevius.length; i++) {
        columnPrevius[i].className = "id" + idPrevious;

    }
    for (let i = 0; i < column.length; i++) {
        column[i].className = "id" + id + " bg-primary-subtle";

        if (i === 2) {
            values.push(column[i].id)
        } else {
            values.push(column[i].textContent)
        }
    }

    optionModify[0].id = "modify";
    optionModify[0].className = "requirement modify p-3 m-0";
    optionTrash[0].id = "trash";

    idPrevious = id;

    makePut.innerHTML = `
                <div class="d-flex align-items-center justify-content-evenly">
                    <div class="border border-3 border-dark rounded-start w-25 me-4 h-0 mb-0"></div><h2 class="text-nowrap">Modificar</h2><div class="border border-3 border-dark rounded-end w-25 h-0 ms-4 mb-0"></div>
                </div>

                <div class="labelAdd form-floating" id="labelAdd">
                    <input type="text" name="name" class="form-control h-100 fs-5" id="floatingInput" placeholder="Name" value="${values[1]}" require>
                    <label for="name">Nome</label>
                </div>

                <div class="labelAdd form-floating">
                    <input type="date" name="birth" class="form-control h-100 fs-5"  id="floatingInput" placeholder="dd/MM/yyyy" value="${values[2]}" require>
                    <label for="birth">Data de Nascimento</label>
                </div>
    `
    if (values[3] === "Feminino") {
        makePut.innerHTML += `
                <div class="d-flex flex-column justify-content-evenly">
                    <div class="d-flex align-items-center mb-0 ms-4">
                        <input class="form-check-input me-1" type="radio" name="genre" value="F" checked require>
                        <label class="form-check-label" for="female">Feminino</label>
                    </div>
                    <div class="d-flex align-items-center mb-0 ms-4">
                        <input class="form-check-input me-1" type="radio" name="genre" value="M"require>
                        <label class="form-check-label" for="male">Masculino</label>
                    </div>
                </div>
    `
    } else {
        makePut.innerHTML += `
                <div class="d-flex flex-column justify-content-evenly">
                    <div class="d-flex align-items-center mb-0 ms-4">
                        <input class="form-check-input me-1" type="radio" name="genre" value="F" require>
                        <label class="form-check-label" for="female">Feminino</label>
                    </div>
                    <div class="d-flex align-items-center mb-0 ms-4" >
                        <input class="form-check-input me-1" type="radio" name="genre" value="M" checked require>
                        <label class="form-check-label" for="male">Masculino</label>
                    </div>
                </div>
    `
    }

    values[4] = parseFloat(values[4].replaceAll("kg", ""));
    values[5] = parseFloat(values[5].replaceAll("m", ""));

    makePut.innerHTML += `
                <div class="d-flex justify-content-evenly">
                    <div class="labelAdd form-floating w-100 me-3 mb-0">
                        <input type="number" step="0.01" name="height" class="form-control h-100 fs-5" placeholder="0.00" value="${values[5]}" require> 
                        <label for="height" class="form-label">Altura</label>
                    </div>
                    <div class="labelAdd form-floating w-100 ms-3 mb-0">
                        <input type="number" step="0.01" name="weight" class="form-control h-100 fs-5" placeholder="000.00" value="${values[4]}" require>
                        <label for="weight" class="form-label">Peso</label>
                    </div>
                </div>

                <div class="labelAdd form-floating" id="labelAdd">
                    <input type="text" name="nationality" class="form-control h-100 fs-5" id="floatingInput" placeholder="nationality" value="${values[6]}" require>
                    <label for="nationality">Nacionalidade</label>
                </div>

                <input type="number" name="id" style="display: none" require value="${id}">

                <input type="submit" class="btn btn-secondary align-self-center fs-3 pt-2 pb-2 button" value="Modificar">
    `
}


let centralPanel = document.getElementById("centralPanel");
let addPanel = document.getElementById("addPanel");
let modifyPanel = document.getElementById("modifyPanel");

function plus() {
    centralPanel.style.display = "none";
    addPanel.style.display = "flex";
}

function modify(id) {
    if (id === "modify") {
        modifyPanel.style.display = "flex";
        centralPanel.style.display = "none";
    }
}

function trash() {
    fetch("action.php?action=DELETE", {
        method: "POST",
        body: JSON.stringify({ id: idPrevious })
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        });
    location.reload();
}

function back() {
    centralPanel.style.display = "flex";
    modifyPanel.style.display = "none";
    addPanel.style.display = "none";
}

let table = document.getElementById("table");
let panels = document.getElementsByClassName("panel");
let panel = document.getElementById("centralPanel");

function menu(element) {
    if (window.innerWidth < 1200) {
        if (element.id === "open") {
            table.style.display = "none"
            panel.style.display = "flex"
            addPanel.style.display = "none"
            modifyPanel.style.display = "none";
            element.id = "leave"
            return
        }

        table.style.display = "flex"
        panel.style.display = "none"
        addPanel.style.display = "none"
        modifyPanel.style.display = "none";
        element.id = "open"
    }
}

window.onresize = () => {
    let menu = document.getElementsByClassName("menu")
    let addPanel = document.getElementById("addPanel");
    let modifyPanel = document.getElementById("modifyPanel");

    if (window.innerWidth > 1200) {
        table.style.display = "flex";

        addPanel.style.display = "none"
        modifyPanel.style.display = "none";

        panel.style.display = "flex";
        menu[0].id = "open"
    } else {
        table.style.display = "flex";

        addPanel.style.display = "none"
        modifyPanel.style.display = "none";
        
        panel.style.display = "none";
        menu[0].id = "open"
    }
}