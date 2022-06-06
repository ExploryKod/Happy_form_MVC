
function displayList() {

    let table = document.querySelector(".table");
    let tableInnerRows = document.querySelector(".body-row");
    let noClientTitle = document.querySelector("#no-client");

    if(tableInnerRows) {
        tableInnerRows.style.display = "grid";
    } else {
        table.style.display = "none";
        noClientTitle.textContent = "Aucun client";
    }
    
}

displayList() 