import { emptyInputsFields, deleteBtn } from "./general.js";
import { refreshState } from "./getData.js"

// Requête asynchrone lors de la soumission du formulaire
let form = document.querySelector('form');

form.addEventListener('submit', function (event) {
  event.preventDefault()

  fetch('./data/register.php', {
    method: 'POST',
    body: new FormData(this),
  }).then(() => {
    emptyInputsFields()
    refreshState()
  }).catch(error => console.log("Erreur : " + error));
})

// function permettant de demander au serveur la suppression d'un client
function deleteClient() {
  fetch('./data/delete.php', {
    method: 'POST',
    body: new FormData(form),
  }).then(() => {
    emptyInputsFields()
    refreshState()
  }).catch(error => console.log("Erreur : " + error));
};

// Evenement permettant la suppression du client lors de la confirmation
deleteBtn.addEventListener('click', deleteClient)