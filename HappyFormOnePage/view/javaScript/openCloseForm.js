import { emptyInputsFields, suppressButton, formPopUp, deleteBtn, inputId } from './general.js';

// Accés aux élèments html liés à l'ouverture/fermeture du formulaire
const createClientBtn = document.querySelector('#open-form-container button')
const formCancelBtn = document.querySelector('#cancel-button')

// Accés aux élèments html pour ouvrir/fermer la fenêtre pop-up de confirmation
const confirmSuppressContainer = document.getElementById('confirm-container')
const closeModalBtn = document.querySelector('.close')

// ======== Ouverture et fermeture du formulaire ===========

// Fonction déclenchée pour ouvrir la fenêtre pop-up du formulaire et réinitialiser les valeurs
function openForm() {
  formPopUp.style.display = 'flex';
  suppressButton.style.display = 'none';
  inputId.value = "";
  emptyInputsFields()
};

// Fonction déclenchée pour fermer la fenêtre pop-up formulaire et réinitialiser les valeurs
function closeForm() {

  emptyInputsFields()
  suppressButton.style.display = 'block';
  formPopUp.style.display = 'none'
};

createClientBtn.addEventListener('click', openForm)
formCancelBtn.addEventListener('click', closeForm)

// Le clic en dehors du formulaire ferme le formulaire
window.onclick = (event) => {
  if (event.target == formPopUp) {
    formPopUp.style.display = 'none'
  };
}

// ====== Ouverture et fermeture de la fenêtre pop-up de confirmation de la suppression d'un client. =======

// Le clic de l'utilisateur sur le bouton "supprimer" déclenche l'ouverture de la fenêtre de confirmation
suppressButton.addEventListener('click', () => {
  confirmSuppressContainer.style.display = 'flex'
})

// Le clic sur le bouton de confirmation de suppression déclenche la fermeture de la pop-up
deleteBtn.addEventListener('click', () => {
  confirmSuppressContainer.style.display = 'none'
  suppressButton.style.display = 'none'
  formPopUp.style.display = 'none'
})

// Le clic sur la croix ferme la fenêtre sans confirmation de la suppression du client (abandon).
closeModalBtn.addEventListener('click', () => {
  confirmSuppressContainer.style.display = 'none'
})
