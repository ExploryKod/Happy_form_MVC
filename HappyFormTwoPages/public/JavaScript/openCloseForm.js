/** 
 * Fonction qui traite de la fermeture de la page formulaire
 * Elle réoriente vers l'accueil en cas de clic sur le bouton d'annulation.
 * @function
 * @constant {HTMLElement} cancelButton est le bouton d'annulation présent sur le formulaire.
*/
function OpenCloseFormPage() {

  const cancelButton = document.getElementById('cancel-button');

  try {
    cancelButton.addEventListener('click', () => {
      window.location.href = 'index.php';
    })

  } catch (error) {
    console.log(error.message);
  }

}

OpenCloseFormPage();


