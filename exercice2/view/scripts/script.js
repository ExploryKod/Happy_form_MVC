// Accés aux élèments html liés à l'ouverture/fermeture du formulaire
const createClientBtn = document.querySelector('#open-form-container button');
const formCancelBtn = document.querySelector('#cancel-button');
const DatePickerInput = document.querySelector('#date');

// Accés aux élèments html pour ouvrir/fermer la pop-up de confirmation
const suppressButton = document.getElementById("open-confirm-panel");
const confirmSuppressContainer = document.getElementById("confirm-container");
const closeModalBtn = document.querySelector(".close");


// Ouverture et fermeture du formulaire
function openForm() {
    formPopUp.style.display = 'flex';
    suppressButton.style.display = "none";

    document.querySelector("#last_name").value = "";
    document.querySelector("#first_name").value = "";
    document.querySelector("#address").value = "";
    document.querySelector("#tel").value = "";
    document.querySelector("#date").value = "";
    document.querySelector("#client-id").value = "";
};

function closeForm() {
    formPopUp.style.display = 'none';
    suppressButton.style.display = "block";

    document.querySelector("#last_name").value = "";
    document.querySelector("#first_name").value = "";
    document.querySelector("#address").value = "";
    document.querySelector("#tel").value = "";
    document.querySelector("#date").value = "";
    document.querySelector("#client-id").value = "";
};

createClientBtn.addEventListener("click", openForm);
formCancelBtn.addEventListener("click", closeForm);


window.onclick = (event) => {
    if (event.target == formPopUp) {
        formPopUp.style.display = "none";
       
    };
  };

// Ouverture et fermeture du modale pour confirmer la suppression

suppressButton.addEventListener("click", () => {
    confirmSuppressContainer.style.display = "flex";  
});

deleteBtn.addEventListener("click", () => {
    confirmSuppressContainer.style.display = "none";
    suppressButton.style.display= 'none'; 
    formPopUp.style.display = 'none';
});

closeModalBtn.addEventListener("click", () => {
    confirmSuppressContainer.style.display = "none";
});

// Création d'un datepicker  

const fp = flatpickr(DatePickerInput, {
    altInput: true,
    altFormat: "d / m / Y",
    minDate: new Date().fp_incr(2),
    maxDate: "2025-06"
});