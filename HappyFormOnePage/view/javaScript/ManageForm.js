import { formatDateToIso8601 } from './InputsValidation.js';
import {
    formPopUp,
    inputId,
    inputLastName,
    inputFirstName,
    inputAddress,
    inputTel,
    inputDate,
    suppressButton
} from './general.js';

// function permettant de pré-remplir le formulaire si l'on clique sur une ligne de la liste.
export function getDataToPrefillForm() {

    let clientData = document.querySelectorAll('.client-datas');

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

            const date = tel.nextElementSibling.innerHTML
            let iso8601Date = formatDateToIso8601(date);
            console.log(iso8601Date);
            inputDate.value = iso8601Date;

            // Le bouton de suppression ne s'affiche que si le client existe déjà.
            suppressButton.style.display = 'block'
        })
    })
};


export function preventClosingEmptyForm() {

    const registerClientBtn = document.querySelector('#register-client');
    registerClientBtn.addEventListener('click', () => {

        if (
            inputFirstName.value !== '' &&
            inputLastName.value !== '' &&
            inputAddress.value !== '' &&
            inputDate.value !== '' &&
            inputTel.value !== '' &&
            inputDate.value !== ''
        ) {
            formPopUp.style.display = 'none';
        }
    })
}
