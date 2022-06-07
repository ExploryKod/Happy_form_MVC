/**
 * Création d'un datepicker  avec l'API flatpickr
 * Site de l'API : https://flatpickr.js.org/
*/
const DatePickerInput = document.querySelector('#date');

/**
 * Fonction issu de l'API qui impose le format de date de type "22 / 06 / 2022".
 * @function
 * @property minDate : Elle détermine que la date minimale commence deux jours aprés la date du jour où le champ est utilisé.
 * */
const fp = flatpickr(DatePickerInput, {
  altInput: true,
  altFormat: 'd / m / Y',
  minDate: new Date().fp_incr(2),
  maxDate: '2025-06'
})

// Fonctions pour formatter l'entrée du champ de numéro de téléphone

// Fonction visant à formatter une valeur en entrée et la retourne au format xx xx xx xx xx (ex: 02 80 23 12 26).
const formatTelInput = (values) => {
  let phonePattern = 'xx xx xx xx xx'

  for (const value of values) {
    phonePattern = phonePattern.replace('x', value);
  }
  // Tout ce qui n'est pas un nombre est remplacé par un espace.
  return phonePattern.replace(/[^\d]/g, ' ');
}

// Fonction visant à appliquer sur la valeur entrée par l'utilisateur une couleur et un format selon la longueur de la valeur.
const formatTelNumber = () => {
  if (inputTel.value.length === 10) {
    inputTel.value = formatTelInput(inputTel.value)
    inputTel.style.color = '#006d77'
  } else if (inputTel.value.length > 10) {
    inputTel.style.color = '#d90429'
    inputTel.value = inputTel.value.substr(0, 14)
  }
}

/** 
 * Fonction permettant de ne plus devoir appuyer en continue sur Backspace pour effacer ses données:
 * Evite les effets inattendues constatés lors de l'usage de la fonction de formattage automatique du champ "inputTel".
**/ 
const eraseTelInput = (e) => {
    let typingKey = e.code;
    if (typingKey === 'Backspace') {
      inputTel.value = "";
    }
}

const inputTel = document.querySelector('#tel');
inputTel.addEventListener('keyup', formatTelNumber);
inputTel.addEventListener('keydown', eraseTelInput);