let idPrevious;

function modify(id) {

    let column = document.getElementsByClassName("id"+id);
    let columnPrevius = document.getElementsByClassName("id"+idPrevious);

    if (idPrevious == id) {
        for(let i = 0; i < columnPrevius.length; i++) {
            columnPrevius[i].className = "id"+idPrevious;
        }
        idPrevious = "";
        return;
    }

    for(let i = 0; i < columnPrevius.length; i++) {
        columnPrevius[i].className = "id"+idPrevious;
    }
    for(let i = 0; i < column.length; i++) {
        column[i].className = "id"+id+" bg-primary-subtle";
    }

    idPrevious = id;

    fetch("action.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ "id": id })
    });
}


let centralPanel = document.getElementById("centralPanel");
let addPanel = document.getElementById("addPanel");

function plus() {
    centralPanel.style.display = "none";
    addPanel.style.display = "flex";
}

function back() {
    centralPanel.style.display = "flex";
    addPanel.style.display = "none";
}