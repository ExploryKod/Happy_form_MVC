/**
 * Fonction traitant de l'ouverture et de la fermeture du pop-up de confirmation de suppression du client.
 * @function
 * @constant {HTMLElement} suppressButton est une variable contenant la balise du bouton de suppression présent sur le formulaire.
 * @constant {HTMLElement} confirmSuppressContainer est le conteneur du pop-up, il prend toute la page.
 * @constant {HTMLElement} confirmSuppressButton est le bouton de suppression présent sur le pop-up qui déclenche la suppression effective.
 * @constant {HTMLElement} closeModalBtn est la croix en haut à droite du pop-up qui permet sa fermeture sans conséquences.
*/

function OpenCloseConfirmPopUp() {

    const suppressButton = document.getElementById('suppress');

    if(suppressButton) {

        const confirmSuppressContainer = document.getElementById('confirm-container');
        const confirmSuppressButton = document.getElementById('confirm-suppress-btn');
        const closeModalBtn = document.querySelector('.close');
      
        suppressButton.addEventListener('click', () => {
          confirmSuppressContainer.style.display = 'flex';
        })
      
        confirmSuppressButton.addEventListener('click', () => {
          confirmSuppressContainer.style.display = 'none';
        })
      
        closeModalBtn.addEventListener('click', () => { 
          confirmSuppressContainer.style.display = 'none';
        })
      
        window.onclick = function (event) {
          if (event.target == confirmSuppressContainer) {
            confirmSuppressContainer.style.display = 'none';
          }
        }
    }
}

OpenCloseConfirmPopUp();

