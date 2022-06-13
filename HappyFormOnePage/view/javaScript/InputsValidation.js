import { inputTel } from './general.js';

/**
 * Fonction visant à transformer une entrée en format ISO8601 que peut lire le navigateur (input date).
 * @param {string} date est l'entrée sous format 0000/00/00
 * @array 
 * @return {string} sous forme ISO8601 avec '-' comme séparateur (ex: 2022-06-12).
 */

export function formatDateToIso8601(date) {

  let arrayDate = date.split('/');
  let newDate = `${arrayDate[2]}-${arrayDate[1]}-${arrayDate[0]}`;

  return newDate;

}

// ============ Fonctions pour formatter l'entrée du champ de numéro de téléphone =================

/**
 * Fonction visant à formatter une valeur en entrée et la retourne au format xx xx xx xx xx (ex: 02 80 23 12 26).
 * @function
 * @param {mixed} values ce paramètre est l'entrée de l'utilisateur dans le champ du numéro de téléphone.
 * @return Tout ce qui n'est pas un nombre est remplacé par un espace.
*/
const formatTelInput = (values) => {
  let phonePattern = 'xx xx xx xx xx'

  for (const value of values) {
    phonePattern = phonePattern.replace('x', value);
  }
  return phonePattern.replace(/[^\d]/g, ' ');
}

/**
 * Fonction visant à appliquer sur la valeur entrée par l'utilisateur une couleur et un format selon la longueur de la valeur.
 * @constant {Element} inputTel est le noeud du DOM qui représente la balise html input ayant l'id "tel".
 */
const formatTelNumber = () => {
  const regex = /[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}/;
  if (inputTel.value === 10) {
    inputTel.value = formatTelInput(inputTel.value);
  } else if (!inputTel.value.match(regex)) {
    inputTel.style.color = '#d90429';
    inputTel.value = inputTel.value.substr(0, 14).replace(/[^\d]/g, ' ');
  }

  if(inputTel.value.match(regex)){
    inputTel.style.color = '#006d77';
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

inputTel.addEventListener('keyup', formatTelNumber);
inputTel.addEventListener('keydown', eraseTelInput);
