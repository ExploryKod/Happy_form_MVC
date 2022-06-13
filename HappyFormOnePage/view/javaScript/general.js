
// Variables utilisées globalement dans tous les fichiers JavaScript qui sont des modules.
export let deleteBtn = document.querySelector('#delete-btn');
export let suppressButton = document.getElementById('open-confirm-panel');

export let formPopUp = document.querySelector('.form-container');


// Récupération du conteneur et des champs liés au formulaire.
export let inputTel = document.querySelector('#tel');
export let inputDate = document.querySelector('#date');
export let inputId = document.querySelector('#client-id');
export let inputLastName = document.querySelector('#last_name')
export let inputFirstName = document.querySelector('#first_name')
export let inputAddress = document.querySelector('#address')

/**
 * Function qui vide les champs précèdents lors de la création d'un nouveau client.
 * @function
 * la variable InputId représente un HTML Element issu du DOM : elle permet de récupérer un id client si il existe.
 */
export const emptyInputsFields = () => {

    if (inputId.value === "") {
        document.querySelector('#last_name').value = '';
        document.querySelector('#first_name').value = '';
        document.querySelector('#address').value = '';
        document.querySelector('#tel').value = '';
        document.querySelector('#date').value = '';
        document.querySelector('#client-id').value = '';
    }
}

