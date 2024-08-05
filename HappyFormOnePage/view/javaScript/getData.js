import { createTableClient, DisplayClientsIfNeeded } from './ManageClientsTable.js';
import { preventClosingEmptyForm, getDataToPrefillForm } from './ManageForm.js';

// Enclenche la fonction refreshState en premier lors du chargement de la page
document.addEventListener('DOMContentLoaded', refreshState)


// function appellant la function refreshState toute les 2000 ms pour éviter tout délais.
setInterval(() => {
    refreshState()
  }, 2000)


// Fonction créant et affichant la liste des clients sous forme d'un tableau.
export function refreshState() {

  const clientsList = document.querySelector('#clients-list');

  fetch('./data/displayClients.php', {
    method: "GET",
    headers: { "Content-type": "application/json;charset=UTF-8" }
  })

    .then(response => {
      if (!response.ok) {
        throw new Error('la réponse du réseau n\' est pas ok');
      }
      return response.json();
    })

    .then(data => {
      clientsList.innerHTML = '';

      // Vérification : si il n'y a pas de données dans la base, alors la table ne s'affiche pas.
      DisplayClientsIfNeeded(data);

      // Itérer sur l'objet JSON clients via data.
      data.clients.forEach(client => {
        // Stocker chaque valeur des colonnes de la base de donnée (encodée en format JSON)
        const id = client.id
        const lastName = client.last_name
        const firstName = client.first_name
        const address = client.address
        const telephone = client.telephone
        const meetingDate = client.meeting
        const creationDate = client.createdDate
        
        createTableClient(clientsList, id, lastName, firstName, address, telephone, meetingDate, creationDate);
        
        // Empêcher la validation du formulaire et la fermeture de la fenêtre pop-up en cas de champ vide:
        preventClosingEmptyForm()

    }) // end forEach data.client
      // Appel de la fonction qui permet de pré-remplir le formulaire afin de le modifier - dans le .then
      getDataToPrefillForm();

    }); //then data end

}; // refreshState end
