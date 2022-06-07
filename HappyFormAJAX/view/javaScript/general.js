
// Variables utilisées globalement dans tous les fichiers JavaScript qui sont des modules.
export const deleteBtn = document.querySelector('#delete-btn');
export const suppressButton = document.getElementById('open-confirm-panel');

export const formPopUp = document.querySelector('.form-container');
export const inputTel = document.querySelector('#tel');
export const inputDate = document.querySelector('#date');

// Fonction qui vide les champs et utilisée globalement dans tous les fichiers JavaScript qui sont des modules.
export const emptyInputsFields = () => {

    document.querySelector('#last_name').value = '';
    document.querySelector('#first_name').value = '';
    document.querySelector('#address').value = '';
    document.querySelector('#tel').value = '';
    document.querySelector('#date').value = '';
    document.querySelector('#client-id').value = '';
    
}

