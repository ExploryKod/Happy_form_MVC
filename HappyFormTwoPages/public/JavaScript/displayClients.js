/**
 * Fonction qui permet d'afficher ou non les clients dans les lignes du tableau selon qu'il y a des clients ou non.
 * @function
 * @constant {Element} table est le tableau des clients à proprement parlé.
 * @constant {Element} tableInnerRows sont les lignes qui contiennent les informations sur les clients.
 * @constant {Element} noClientTitle est la div html qui affichera le message déterminé par cette fonction si il n'y a aucun client.
 */

function displayList() {
  const table = document.querySelector('.table')
  const tableInnerRows = document.querySelector('.body-row')
  const noClientTitle = document.querySelector('#no-client')

  if (tableInnerRows) {
    tableInnerRows.style.display = 'grid'
  } else {
    table.style.display = 'none'
    noClientTitle.textContent = 'Aucun client'
  }
}

displayList()
