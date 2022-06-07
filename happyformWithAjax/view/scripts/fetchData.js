document.addEventListener("DOMContentLoaded", refreshState);

// Liste de nos variables utilisées globalement 
let clientsTable = document.querySelector("#table");
let noClientTitle = document.querySelector("#no-client");

let clientsList = document.querySelector("#clients-list");
let clientData;

let formPopUp = document.querySelector('.form-container');
let form = document.querySelector("form");

let inputLastName = document.querySelector("#last_name");
let inputFirstName = document.querySelector("#first_name");
let inputAddress = document.querySelector("#address");
let inputTel = document.querySelector("#tel");
let inputDate = document.querySelector('#date');
let inputId = document.querySelector('#client-id');

let registerClientBtn = document.querySelector('#register-client');
let deleteBtn = document.querySelector("#delete-btn");

let clientIdArray = []

// Pour éviter tout délai d'affichage
setInterval(() => {
    refreshState();
}, 2000);


function getQuery() {

    clientData = document.querySelectorAll(".client-datas");
    
    clientData.forEach(row => {
   
        row.addEventListener("click", e => {
           
            formPopUp.style.display = 'flex';
            let target = e.target;
            
            // Pré-remplissage du champs de l'id du client pour être sûr qu'il y a l'identifiant dans value.
            let clientId = target.firstChild;
            inputId.value = clientId.innerHTML;

            // Pré-remplissage des champs du formulaire avant modification:
            let lastName = clientId.nextElementSibling;
            inputLastName.value = lastName.innerHTML;

            let firstName = lastName.nextElementSibling;
            inputFirstName.value = firstName.innerHTML;

            let address = firstName.nextElementSibling;
            inputAddress.value = address.innerHTML;

            let tel = address.nextElementSibling;
            inputTel.value = tel.innerHTML;

            let date = tel.nextElementSibling;
            inputDate.value = date.innerHTML;

            // Le bouton de suppression ne s'affiche que si le client existe déjà.
            suppressButton.style.display= 'block';

        });
    });
    
};
   

function refreshState() {
    fetch("../data/displayClients.php")
    .then(response => response.json())
    .then(data => {
        console.log(data);
        clientsList.innerHTML = "";

        // Vérification : si il n'y a pas de données dans la base, alors la table ne s'affiche pas.
        if(data.clients.length === 0) {
        
            clientsTable.style.display = 'none';
            noClientTitle.textContent = 'Aucun client';
        } else {
            noClientTitle.textContent = '';
            clientsTable.style.display = 'block';
        };

        // Itérer sur l'objet JSON clients via data 
        data.clients.forEach(client => {

            // Stocker chaque valeur des colonnes de la base de donnée (encodée en format JSON).
            let id = client.id;
            let lastName = client.last_name;
            let firstName = client.first_name;
            let address = client.address;
            let telephone = client.telephone;
            let meetingDate = client.meeting;
            let creationDate = client.createdDate;
            
            // Créer nos élèments html avec les bonnes valeurs dans un élement html table.
            
            let tableRow = document.createElement("div");
            tableRow.className = 'client-datas';
            tableRow.style.display = 'grid';
            
            let cellId = document.createElement("div");
            cellId.style.pointerEvents = 'none';
            let cellLastName = document.createElement("div");
            cellLastName.style.pointerEvents = 'none';
            let cellFirstName = document.createElement("div");
            cellFirstName.style.pointerEvents = 'none';
            let cellAddress = document.createElement("div");
            cellAddress.style.pointerEvents = 'none';
            let cellTelephone = document.createElement("div");
            cellTelephone.style.pointerEvents = 'none';
            let cellMeetingDate = document.createElement("div");
            cellMeetingDate.style.pointerEvents = 'none';
            let cellCreationDate = document.createElement("div");
            cellCreationDate.style.pointerEvents = 'none';
            

            cellId.innerHTML = id;
            cellLastName.innerHTML = lastName;
            cellFirstName.innerHTML = firstName;
            cellAddress.innerHTML = address;
            cellTelephone.innerHTML = telephone;
            cellMeetingDate.innerHTML = meetingDate;
            cellCreationDate.innerHTML = creationDate;
            
            tableRow.append(cellId, cellLastName, cellFirstName, cellAddress, cellTelephone, cellMeetingDate, cellCreationDate);
            clientsList.appendChild(tableRow);
            registerClientBtn.addEventListener("click", () => {
                                                formPopUp.style.display = 'none';});

        });
        getQuery();
    });  
};

// Requête asynchrone lors de la soumission du formulaire
document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault();
    console.log(event);
    fetch("../data/register.php", {
        method: "POST",
        body: new FormData(this),
    }) .then(() => {
        document.querySelector("#last_name").value = "";
        document.querySelector("#first_name").value = "";
        document.querySelector("#address").value = "";
        document.querySelector("#tel").value = "";
        document.querySelector("#date").value = "";
        document.querySelector("#client-id").value = "";
        refreshState();
    });
});


function deleteClient() {

    fetch("../data/delete.php", {
        method: "POST",
        body: new FormData(form),
    }).then( () => {
        document.querySelector("#last_name").value = "";
        document.querySelector("#first_name").value = "";
        document.querySelector("#address").value = "";
        document.querySelector("#tel").value = "";
        document.querySelector("#date").value = "";
        document.querySelector("#client-id").value = "";
        refreshState();  
    });
};

deleteBtn.addEventListener("click", deleteClient);