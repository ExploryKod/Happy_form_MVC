import {emptyInputsFields, suppressButton, deleteBtn, inputTel,inputDate, formPopUp} from './general.js';

// Evenement permettant d'appeller la fonction refreshState avant le chargement des autres ressources.
document.addEventListener('DOMContentLoaded', refreshState)

// Liste de nos variables utilisées globalement:

// Récupérations des élèments liés à l'affichage de la liste des clients.
const clientsTable = document.querySelector('#table')
const noClientTitle = document.querySelector('#no-client')
const clientsList = document.querySelector('#clients-list')
let clientData

// Récupération du conteneur et des champs liés au formulaire.

const form = document.querySelector('form')
const validationTel = document.getElementById('tel-validation')
const inputLastName = document.querySelector('#last_name')
const inputFirstName = document.querySelector('#first_name')
const inputAddress = document.querySelector('#address')
const inputId = document.querySelector('#client-id')

// Récupération des boutons liées au formulaire:
const registerClientBtn = document.querySelector('#register-client')


// function appellant la function refreshState toute les 2000 ms pour éviter tout délais.
setInterval(() => {
  refreshState()
}, 2000)

// function permettant de pré-remplir le formulaire si l'on clique sur une ligne de la liste.
function getDataToPrefillForm () {
  clientData = document.querySelectorAll('.client-datas')

  clientData.forEach(row => {
    row.addEventListener('click', e => {
      formPopUp.style.display = 'flex'
      const target = e.target

      // Pré-remplissage du champs de l'id du client pour être sûr qu'il y a l'identifiant dans value.
      const clientId = target.firstChild
      inputId.value = clientId.innerHTML

      // Pré-remplissage des champs du formulaire avant modification:
      const lastName = clientId.nextElementSibling
      inputLastName.value = lastName.innerHTML

      const firstName = lastName.nextElementSibling
      inputFirstName.value = firstName.innerHTML

      const address = firstName.nextElementSibling
      inputAddress.value = address.innerHTML

      const tel = address.nextElementSibling
      inputTel.value = tel.innerHTML

      const date = tel.nextElementSibling
      inputDate.value = date.innerHTML
      
      // new Date();
      // date.innerHTML
      // toISOString().substring(0, 10)

      // Le bouton de suppression ne s'affiche que si le client existe déjà.
      suppressButton.style.display = 'block'
    })
  })
};

// Fonction créant et affichant la liste des clients sous forme d'un tableau.
function refreshState () {
  fetch('../data/displayClients.php')
    .then(response => response.json())
    .then(data => {
      clientsList.innerHTML = ''

      // Vérification : si il n'y a pas de données dans la base, alors la table ne s'affiche pas.
      if (data.clients.length === 0) {
        clientsTable.style.display = 'none'
        noClientTitle.textContent = 'Aucun client'
      } else {
        noClientTitle.textContent = ''
        clientsTable.style.display = 'block'
      };

      // Itérer sur l'objet JSON clients via data.
      data.clients.forEach(client => {
        // Stocker chaque valeur des colonnes de la base de donnée (encodée en format JSON).
        const id = client.id
        const lastName = client.last_name
        const firstName = client.first_name
        const address = client.address
        const telephone = client.telephone
        const meetingDate = client.meeting
        const creationDate = client.createdDate

        // Créer nos élèments html à partir de JavaScript pour chaque ligne du tableau des clients.
        // Imposer la disposition en display:grid.
        const tableRow = document.createElement('div')
        tableRow.className = 'client-datas'
        tableRow.style.display = 'grid'

        // Création de chaque cellules du tableau des clients.
        const cellId = document.createElement('div')
        cellId.style.pointerEvents = 'none'
        const cellLastName = document.createElement('div')
        cellLastName.style.pointerEvents = 'none'
        const cellFirstName = document.createElement('div')
        cellFirstName.style.pointerEvents = 'none'
        const cellAddress = document.createElement('div')
        cellAddress.style.pointerEvents = 'none'
        const cellTelephone = document.createElement('div')
        cellTelephone.style.pointerEvents = 'none'
        const cellMeetingDate = document.createElement('div')
        cellMeetingDate.style.pointerEvents = 'none'
        const cellCreationDate = document.createElement('div')
        cellCreationDate.style.pointerEvents = 'none'

        // Ajout des valeurs récupérés depuis l'objet "data.clients" via "client".
        cellId.innerHTML = id
        cellLastName.innerHTML = lastName
        cellFirstName.innerHTML = firstName
        cellAddress.innerHTML = address
        cellTelephone.innerHTML = telephone
        cellMeetingDate.innerHTML = meetingDate
        cellCreationDate.innerHTML = creationDate

        // Assemblage du tableau des clients en créant les balises enfants.
        tableRow.append(cellId, cellLastName, cellFirstName, cellAddress, cellTelephone, cellMeetingDate, cellCreationDate)
        clientsList.appendChild(tableRow)

        // Empêcher la validation du formulaire et la fermeture de la fenêtre pop-up pour respecter:
        // - le format de l'entrée du numéro de téléphone, il est imposé par l'expression régulière.
        // - l'impossibilité de soumettre des champs vide: nous voulons empêcher la fermeture de la pop-up.
        registerClientBtn.addEventListener('click', () => {
          const regex = /[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}/

          if (inputTel.value !== inputTel.value.match(regex)) {
            validationTel.innerHTML = '<h1>Entrez un numéro de téléphone valide: xx xx xx xx xx</h1>'
          } else if (inputTel.value.match(regex)) {
            validationTel.innerHTML = '<h1>Numéro de téléphone valide</h1>'
          }

          if (
            inputFirstName !== '' &&
                   inputLastName.value !== '' &&
                   inputAddress.value !== '' &&
                   inputDate.value !== '' &&
                   inputTel.value !== '' &&
                   inputDate.value !== ''
          ) {
            formPopUp.style.display = 'none'
          }
        })
      })
      // Appel de la fonction qui permet de pré-remplir le formulaire afin de le modifier.
      getDataToPrefillForm()
    })
};

// Requête asynchrone lors de la soumission du formulaire
document.querySelector('form').addEventListener('submit', function (event) {
  event.preventDefault()
  
  fetch('../data/register.php', {
    method: 'POST',
    body: new FormData(this)
  }).then(() => {
    emptyInputsFields(),
    refreshState()
  })
})

// function permettant de demander au serveur la suppression d'un client
function deleteClient () {
  fetch('../data/delete.php', {
    method: 'POST',
    body: new FormData(form)
  }).then(() => {
    emptyInputsFields()
    refreshState()
  })
};

// Evenement permettant la suppression du client lors de la confirmation
deleteBtn.addEventListener('click', deleteClient)
